<?php

namespace App\Http\Controllers\Admin;

use App\Models\WasteItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = WasteItem::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
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
            'name' => 'required|string|max:255',
            'category' => 'required|in:organik,anorganik,b3',
            'description' => 'nullable|string',
            'composition' => 'nullable|string',
            'impact' => 'nullable|string',
            'handling' => 'nullable|string',
            'recycling' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Store in storage/app/public/images/waste
            $path = $image->storeAs('images/waste', $filename, 'public');

            $validated['image_path'] = $path;
            unset($validated['image']); // Remove 'image' key
        }

        WasteItem::create($validated);

        return redirect()
            ->route('admin.waste.index')
            ->with('success', 'Item sampah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $waste = WasteItem::findOrFail($id);

        return view('admin.waste.show', compact('waste'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $waste = WasteItem::findOrFail($id);

        return view('admin.waste.edit', compact('waste'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $waste = WasteItem::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:organik,anorganik,b3',
            'description' => 'nullable|string',
            'composition' => 'nullable|string',
            'impact' => 'nullable|string',
            'handling' => 'nullable|string',
            'recycling' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($waste->image_path) {
                Storage::disk('public')->delete($waste->image_path);
            }

            $image = $request->file('image');
            $filename = Str::slug($validated['name']) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Store in storage/app/public/images/waste
            $path = $image->storeAs('images/waste', $filename, 'public');

            $validated['image_path'] = $path;
            unset($validated['image']); // Remove 'image' key
        }

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
        $waste = WasteItem::findOrFail($id);

        // Delete image if exists
        if ($waste->image_path && file_exists(public_path($waste->image_path))) {
            unlink(public_path($waste->image_path));
        }

        $waste->delete();

        return redirect()
            ->route('admin.waste.index')
            ->with('success', 'Item sampah berhasil dihapus!');
    }
}
