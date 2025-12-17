<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;
use App\Models\AiClassifications; // Pastikan Model sudah dibuat
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AIController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function index() {
        return view('user.explore.index');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input (Salah satu wajib diisi)
        $request->validate([
            'image' => 'nullable|image|max:2048', // Max 2MB
            'text' => 'nullable|string|max:500',
        ]);

        if (!$request->hasFile('image') && !$request->input('text')) {
            return response()->json(['message' => 'Harap masukkan gambar atau teks.'], 400);
        }

        try {
            DB::beginTransaction();

            $imagePath = null;
            $inputType = 'text';
            $aiResult = null;

            // 2. Logika Prioritas: Gambar > Teks
            if ($request->hasFile('image')) {
                $inputType = 'image';
                $file = $request->file('image');

                // Sesuaikan dengan pola controller lu: Nama file unik + Folder spesifik
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images/ai_classification', $filename, 'public');

                // Path untuk disimpan di DB agar bisa dipanggil di tag <img src="{{ asset(...) }}">
                $imagePath = 'storage/' . $path;

                // Path absolut untuk dibaca oleh Gemini Service
                $absolutePath = storage_path('app/public/' . $path);

                // Panggil Service
                $aiResult = $this->geminiService->analyzeImage($absolutePath, $file->getMimeType());
            } else {
                // Panggil Service Teks
                $aiResult = $this->geminiService->analyzeText($request->input('text'));
            }

            // 3. Cek apakah AI berhasil
            if (!$aiResult || empty($aiResult['data'])) {
                return response()->json(['message' => 'Gagal menganalisis sampah. Coba lagi.'], 500);
            }

            $data = $aiResult['data']; // Array bersih
            $raw = $aiResult['raw'];   // String JSON mentah

            // 4. Simpan ke Database (Sesuai struktur FINAL)
            $classification = AiClassifications::create([
                'user_id' => Auth::id(), // Asumsi user login
                'input_type' => $inputType,
                'input_text' => $request->input('text'),
                'input_image_path' => $imagePath,

                // Mapping hasil AI ke kolom
                'waste_name' => $data['waste_name'] ?? 'Tidak teridentifikasi',
                'category' => $data['category'] ?? 'anorganik', // Default fallback
                'processing_suggestion' => $data['processing_suggestion'] ?? '-',
                'environmental_impact' => $data['environmental_impact'] ?? '-',

                'raw_ai_response' => $raw,
            ]);

            DB::commit();

            // 5. Return JSON ke Frontend (AJAX)
            return response()->json([
                'status' => 'success',
                'data' => $classification
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan server.',
                'error' => $e->getMessage() // Matikan ini pas production
            ], 500);
        }
    }
}
