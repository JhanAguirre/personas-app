<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunas = Comuna::with('municipio')->get();
        return view('comunas.index', compact('comunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = Municipio::all();
        return view('comunas.create', compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comu_nomb' => 'required|string|max:255',
            'muni_codi' => 'required|exists:tb_municipio,muni_codi',
        ]);

        $comuna = new Comuna();
        $comuna->comu_nomb = $request->input('comu_nomb');
        $comuna->muni_codi = $request->input('muni_codi');
        $comuna->save();

        return redirect()->route('comunas.index')->with('success', 'Comuna creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comuna = Comuna::with('municipio')->findOrFail($id);
        return view('comunas.show', compact('comuna'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comuna = Comuna::findOrFail($id);
        $municipios = Municipio::all();
        return view('comunas.edit', compact('comuna', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'comu_nomb' => 'required|string|max:255',
            'muni_codi' => 'required|exists:tb_municipio,muni_codi',
        ]);

        $comuna = Comuna::findOrFail($id);
        $comuna->comu_nomb = $request->input('comu_nomb');
        $comuna->muni_codi = $request->input('muni_codi');
        $comuna->save();

        return redirect()->route('comunas.index')->with('success', 'Comuna actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comuna = Comuna::findOrFail($id);
        $comuna->delete();
        return redirect()->route('comunas.index')->with('success', 'Comuna eliminada exitosamente.');
    }
}