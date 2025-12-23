<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;
use App\Models\AiClassifications; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AIController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function index()
    {
        return view('user.explore.scan');
    }

    public function store(Request $request)
    {
        // ... (Validasi input sama seperti sebelumnya) ...
        $request->validate([
            'image' => 'nullable|image|max:2048',
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

            // ... (Logika upload gambar & panggil service sama seperti sebelumnya) ...
            if ($request->hasFile('image')) {
                $inputType = 'image';
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images/ai_classification', $filename, 'public');
                $imagePath = 'storage/' . $path;
                $absolutePath = storage_path('app/public/' . $path);
                $aiResult = $this->geminiService->analyzeImage($absolutePath, $file->getMimeType());
            } else {
                $aiResult = $this->geminiService->analyzeText($request->input('text'));
            }

            // Cek hasil AI
            if (!$aiResult || empty($aiResult['data'])) {
                return response()->json(['message' => 'Gagal menganalisis sampah. Coba lagi.'], 500);
            }

            $data = $aiResult['data'];
            $raw = $aiResult['raw'];

            // --- TAMBAHAN LOGIC SLUG DISINI ---

            // 1. Ambil nama sampah dari AI, atau pakai default
            $finalWasteName = $data['waste_name'] ?? 'Tidak teridentifikasi';

            // 2. Generate Slug dari nama tersebut + time() biar unik
            $slug = Str::slug($finalWasteName) . '-' . time();

            // ----------------------------------

            // Simpan ke Database
            $classification = AiClassifications::create([
                'user_id' => Auth::id(),
                'input_type' => $inputType,
                'input_text' => $request->input('text'),
                'input_image_path' => $imagePath,

                'waste_name' => $finalWasteName, // Pakai variabel yang sudah kita set diatas
                'slug' => $slug, // <--- MASUKKAN SLUG DISINI

                'category' => $data['category'] ?? 'anorganik',
                'description' => $data['description'] ?? '-',
                'composition' => $data['composition'] ?? '-',
                'handling' => $data['handling'] ?? '-',
                'recycling' => $data['recycling'] ?? '-',
                'impact' => $data['impact'] ?? '-',
                'raw_ai_response' => $raw ?? '-',
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => $classification
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
