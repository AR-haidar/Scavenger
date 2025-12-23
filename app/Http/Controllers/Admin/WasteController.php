<?php

namespace App\Http\Controllers\Admin;

use App\Models\WasteItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AiClassifications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AiClassifications::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('waste_name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('composition', 'like', '%' . $search . '%')
                    ->orWhere('impact', 'like', '%' . $search . '%')
                    ->orWhere('handling', 'like', '%' . $search . '%')
                    ->orWhere('recycling', 'like', '%' . $search . '%');
            });
        }

        // Filter by category
        if ($request->has('category') && in_array($request->category, ['anorganik', 'organik', 'b3'])) {
            $query->where('category', $request->category);
        }

        $wastes = $query->latest()->paginate(10)->appends($request->query());

        return view('admin.waste.index', compact('wastes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.waste.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'waste_name' => 'required|string|max:255',
            'category' => 'required|in:organik,anorganik,b3',
            'description' => 'nullable|string',
            'composition' => 'nullable|string',
            'impact' => 'nullable|string',
            'handling' => 'nullable|string',
            'recycling' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Tambahkan User ID yang sedang login
        $validated['user_id'] = Auth::id();

        // 3. Handle image upload & Input Type
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($validated['waste_name']) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Simpan ke storage
            $image->storeAs('images/ai_classification', $filename, 'public');

            // Set data untuk database
            $validated['input_image_path'] = 'storage/images/ai_classification/' . $filename; // Simpan path relatif
            $validated['input_type'] = 'image'; // Set tipe jadi image

            unset($validated['image']); // Hapus object file image agar tidak error saat create
        } else {
            // Jika tidak ada gambar
            $validated['input_type'] = 'text';
            $validated['input_image_path'] = null;
        }

        // 4. Simpan ke Database
        AiClassifications::create($validated);

        return redirect()
            ->route('admin.waste.index')
            ->with('success', 'Item sampah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $waste = AiClassifications::findOrFail($id);

        return view('admin.waste.show', compact('waste'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $waste = AiClassifications::findOrFail($id);

        return view('admin.waste.edit', compact('waste'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $waste = AiClassifications::findOrFail($id);

        // 1. Validasi (Ganti 'name' jadi 'waste_name' sesuai DB)
        $validated = $request->validate([
            'waste_name' => 'required|string|max:255',
            'category' => 'required|in:organik,anorganik,b3',
            'description' => 'nullable|string',
            'composition' => 'nullable|string',
            'impact' => 'nullable|string',
            'handling' => 'nullable|string',
            'recycling' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Handle Image Upload
        if ($request->hasFile('image')) {
            // A. Hapus gambar lama jika ada
            if ($waste->input_image_path && Storage::disk('public')->exists($waste->input_image_path)) {
                Storage::disk('public')->delete($waste->input_image_path);
            }

            // B. Upload gambar baru
            $image = $request->file('image');
            $filename = Str::slug($validated['waste_name']) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Simpan di folder yang SAMA dengan function store
            $image->storeAs('images/ai_classification', $filename, 'public');

            // Update data path & tipe
            $validated['input_image_path'] = 'storage/images/ai_classification/' . $filename;
            $validated['input_type'] = 'image'; // Paksa jadi image karena admin baru upload foto

            unset($validated['image']); // Hapus key image mentah
        }

        // 3. Update Data
        $waste->update($validated);

        return redirect()
            ->route('admin.waste.index')
            ->with('success', 'Item sampah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $waste = AiClassifications::findOrFail($id);

        // Delete image if exists
        if ($waste->input_image_path && file_exists(public_path($waste->input_image_path))) {
            unlink(public_path($waste->input_image_path));
        }

        $waste->delete();

        return redirect()
            ->route('admin.waste.index')
            ->with('success', 'Item sampah berhasil dihapus!');
    }
}
