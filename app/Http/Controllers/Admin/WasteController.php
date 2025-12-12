<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WasteItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = WasteItem::query();

        // Filter by category if provided
        if ($request->has('category') && in_array($request->category, ['anorganik', 'organik', 'b3'])) {
            $query->where('category', $request->category);
        }

        $wastes = $query->latest()->paginate(10);
        
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
            'name'        => 'required|string|max:255',
            'category'    => 'required|in:organik,anorganik,b3',
            'description' => 'nullable|string',
            'composition' => 'nullable|string',
            'impact'      => 'nullable|string',
            'handling'    => 'nullable|string',
            'recycling'   => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2. Handle upload gambar
        $imagePath = null;

        if ($request->hasFile('image')) {
            // generate nama unik
            $filename = Str::uuid() . '.' . $request->file('image')->extension();

            // simpan di folder public/waste_images
            $imagePath = $request->file('image')->storeAs(
                'waste_images',
                $filename,
                'public'
            );
        }

        // 3. Simpan ke database
        WasteItem::create([
            'name'        => $validated['name'],
            'category'    => $validated['category'],
            'description' => $validated['description'] ?? null,
            'composition' => $validated['composition'] ?? null,
            'impact'      => $validated['impact'] ?? null,
            'handling'    => $validated['handling'] ?? null,
            'recycling'   => $validated['recycling'] ?? null,
            'image_path'  => $imagePath ? 'storage/' . $imagePath : null,
        ]);

        // 4. Redirect dengan success message
        return redirect()
            ->route('admin.waste.index')
            ->with('success', 'Waste item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WasteItem $wasteItem)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WasteItem $wasteItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WasteItem $wasteItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WasteItem $wasteItem)
    {
        //
    }
}
