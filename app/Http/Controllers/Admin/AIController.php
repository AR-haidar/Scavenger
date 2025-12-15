<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AIClassifications;
use App\Models\AiClassifications as ModelsAiClassifications;
use Illuminate\Http\Request;

class AIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AIClassifications::with('user');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('input_text', 'like', "%{$search}%")
                    ->orWhere('result_description', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($uq) use ($search) {
                        $uq->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by category
        if (
            $request->filled('category') &&
            in_array($request->category, ['anorganik', 'organik', 'b3'])
        ) {
            $query->where('category', $request->category);
        }

        $datas = $query->latest()
            ->paginate(10)
            ->appends($request->query());

        return view('admin.ai.index', compact('datas'));
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
    public function show($id)
    {
        $data = AiClassifications::with('user')->findOrFail($id);

        return view('admin.ai.show', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AIClassifications $aIClassifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = AiClassifications::findOrFail($id);

        // Delete image if exists
        if ($data->input_text && file_exists(public_path($data->input_text))) {
            unlink(public_path($data->input_text));
        }

        $data->delete();

        return redirect()
            ->route('admin.ai.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
