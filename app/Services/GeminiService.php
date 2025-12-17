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
        Tugas: Analisis sampah dari deskripsi user.
        
        Aturan Penting:
        1. Jawab HANYA dalam format JSON valid.
        2. Field 'processing_suggestion' dan 'environmental_impact' HARUS detail (minimal 3-5 kalimat atau 1 paragraf penuh).
        3. Jelaskan langkah konkret untuk pengolahan.
        4. Jelaskan dampak jangka panjang untuk lingkungan.
        5. Gaya bahasa: Edukatif, menyemangati, mudah dipahami pelajar.
        6. JANGAN pakai Markdown.

        Format JSON:
        {
          \"waste_name\": \"Nama sampah\",
          \"category\": \"organik | anorganik | b3\",
          \"processing_suggestion\": \"Penjelasan panjang 1 paragraf...\",
          \"environmental_impact\": \"Penjelasan panjang 1 paragraf...\"
        }

        Input: " . $userInput;

        return $this->sendRequest($prompt);
    }

    /**
     * Handle Image Analysis
     */
    public function analyzeImage($imagePath, $mimeType)
    {
        // Convert image to base64
        $imageData = base64_encode(file_get_contents($imagePath));

        $prompt = "Kamu adalah ahli lingkungan hidup.
        Tugas: Analisis sampah yang terlihat di gambar.
        
        Aturan Penting:
        1. Jawab HANYA dalam format JSON valid.
        2. Field 'processing_suggestion' dan 'environmental_impact' HARUS detail (minimal 3-5 kalimat atau 1 paragraf penuh).
        3. Berikan tutorial singkat cara mengolahnya jika memungkinkan.
        4. Jelaskan bahaya spesifik jika dibuang sembarangan.
        5. Gaya bahasa: Edukatif, detail, tapi mudah dipahami.
        6. JANGAN pakai Markdown.

        Format JSON:
        {
          \"waste_name\": \"Nama sampah\",
          \"category\": \"organik | anorganik | b3\",
          \"processing_suggestion\": \"Penjelasan panjang 1 paragraf...\",
          \"environmental_impact\": \"Penjelasan panjang 1 paragraf...\"
        }";

        // Payload khusus Multimodal (Text + Image)
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
            ->timeout(60)
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
            'data' => $decoded, // Hasil rapi (array)
            'raw' => $text      // Hasil mentah (string) buat disimpan di DB
        ];
    }
}
