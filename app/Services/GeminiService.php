<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key');
        $this->baseUrl = config('services.gemini.base_url');
    }

    /**
     * Handle Text Analysis
     */
    public function analyzeText($userInput)
    {
        $prompt = "Kamu adalah ahli lingkungan hidup.
            Tugas: Analisis sampah berdasarkan deskripsi dari pengguna.

            Aturan Penting:
            1. Jawab HANYA dalam format JSON yang valid.
            2. Field 'description', 'composition', 'handling', 'recycling', dan 'impact' WAJIB diisi dan masing-masing minimal 2-3 kalimat.
            3. Jelaskan langkah konkret dan realistis untuk pengolahan sampah.
            4. Gaya bahasa edukatif, menyemangati, dan mudah dipahami oleh pelajar.
            5. JANGAN gunakan Markdown (```json).

            Format JSON yang HARUS diikuti:
            {
              \"waste_name\": \"Nama sampah\",
              \"category\": \"organik | anorganik | b3\",
              \"description\": \"Deskripsi singkat dan jelas tentang sampah tersebut.\",
              \"composition\": \"Penjelasan bahan atau kandungan utama dari sampah.\",
              \"handling\": \"Langkah penanganan awal yang aman dan tepat.\",
              \"recycling\": \"Cara pengolahan atau daur ulang yang disarankan secara detail.\",
              \"impact\": \"Dampak lingkungan jangka panjang jika sampah tidak dikelola dengan baik.\"
            }

            Input pengguna:
            " . $userInput;

        return $this->sendRequest($prompt);
    }

    /**
     * Handle Image Analysis
     * PERBAIKAN: Prompt disamakan dengan Text & Ditambah Timeout
     */
    public function analyzeImage($imagePath, $mimeType)
    {
        // Convert image to base64
        $imageData = base64_encode(file_get_contents($imagePath));

        // Prompt Image DISAMAKAN dengan Prompt Text agar kuncinya cocok dengan Controller
        $prompt = "Kamu adalah ahli lingkungan hidup.
            Tugas: Analisis jenis sampah yang terlihat pada gambar.
                
            Aturan Penting:
            1. Jawab HANYA dalam format JSON yang valid.
            2. Field 'description', 'composition', 'handling', 'recycling', dan 'impact' WAJIB diisi detail (minimal 2-3 kalimat).
            3. Berikan langkah konkret dan realistis.
            4. Gaya bahasa edukatif, detail, dan mudah dipahami pelajar.
            5. JANGAN gunakan Markdown (```json).
                
            Format JSON HARUS SAMA PERSIS seperti ini:
            {
              \"waste_name\": \"Nama sampah\",
              \"category\": \"organik | anorganik | b3\",
              \"description\": \"Deskripsi visual dan kondisi sampah di gambar.\",
              \"composition\": \"Perkiraan bahan utama sampah tersebut.\",
              \"handling\": \"Cara penanganan awal (misal: cuci dulu, pisahkan tutup, dll).\",
              \"recycling\": \"Saran daur ulang atau pemanfaatan kembali.\",
              \"impact\": \"Dampak jika sampah ini dibuang sembarangan ke alam.\"
            }";

        // Payload khusus Multimodal
        $payload = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt],
                        [
                            'inline_data' => [
                                'mime_type' => $mimeType,
                                'data' => $imageData
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return $this->executeApiCall($payload);
    }

    /**
     * Internal function untuk request Text-Only
     */
    private function sendRequest($prompt)
    {
        $payload = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ];

        return $this->executeApiCall($payload);
    }

    /**
     * Eksekusi HTTP Request ke Google
     */
    private function executeApiCall($payload)
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])
                ->timeout(120)
                ->post($this->baseUrl . '?key=' . $this->apiKey, $payload);

            if ($response->failed()) {
                Log::error('Gemini API Error: ' . $response->body());
                return null;
            }

            $data = $response->json();

            // Ambil text response dari struktur JSON Gemini
            $responseText = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$responseText) return null;

            return $this->cleanAndParseJson($responseText);
        } catch (\Exception $e) {
            Log::error('Gemini Connection Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Bersihin Markdown ```json ... ``` biar jadi Array PHP Murni
     */
    private function cleanAndParseJson($text)
    {
        // Hapus backticks markdown jika ada
        $cleanText = str_replace(['```json', '```'], '', $text);
        $cleanText = trim($cleanText);

        $decoded = json_decode($cleanText, true);

        return [
            'data' => $decoded, 
            'raw' => $text      
        ];
    }
}