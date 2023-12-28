<?php

namespace App\Http\Controllers;

use App\Models\Kelurahaan;
use App\Models\Data;
use Illuminate\Http\Request;

class KelurahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahaan = Kelurahaan::All();
        return view('pages.kelurahaan.index', ['kelurahaan' => $kelurahaan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kelurahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Kelurahaan::create($data);

        return redirect()
            ->route('kelurahaan.index')
            ->with('Success', 'Kelurahaan has been add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelurahaan $kelurahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelurahaan $kelurahaan)
    {
        $kel = Kelurahaan::findOrFail($kelurahaan->id);
        return view('pages.kelurahaan.edit', ['kel' => $kel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelurahaan $kelurahaan)
    {
        $data = $request->all();

        $item = Kelurahaan::findOrFail($kelurahaan->id);

        $item->update($data);

        return redirect()
            ->route('kelurahaan.index')
            ->with('Success', 'Kelurahaan Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelurahaan $kelurahaan)
    {
        $item = Kelurahaan::findOrFail($kelurahaan->id);

        Data::where('kelurahaan_id', $kelurahaan->id)->delete();

        $item->delete();

        return redirect()
            ->route('kelurahaan.index')
            ->with('Success', 'Kelurahaan Dihapus');
    }
}
