<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WasteItem;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = WasteItem::query();

        // Filter by category if provided
        if ($request->has('category') && in_array($request->category, ['anorganik','organik','b3'])) {
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WasteItem $wasteItem)
    {
        //
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
