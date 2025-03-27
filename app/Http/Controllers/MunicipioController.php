<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Pais;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipio::with('departamento')->get();
        return view('municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('municipios.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'muni_nomb' => 'required|string|max:255',
            'depa_codi' => 'required|exists:tb_departamento,depa_codi',
        ]);

        $municipio = new Municipio();
        $municipio->muni_nomb = $request->input('muni_nomb');
        $municipio->depa_codi = $request->input('depa_codi');
        $municipio->save();

        return redirect()->route('municipios.index')->with('success', 'Municipio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $municipio = Municipio::with('departamento')->findOrFail($id);
        return view('municipios.show', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $municipio = Municipio::findOrFail($id);
        $departamentos = Departamento::all();
        return view('municipios.edit', compact('municipio', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'muni_nomb' => 'required|string|max:255',
            'depa_codi' => 'required|exists:tb_departamento,depa_codi',
        ]);

        $municipio = Municipio::findOrFail($id);
        $municipio->muni_nomb = $request->input('muni_nomb');
        $municipio->depa_codi = $request->input('depa_codi');
        $municipio->save();

        return redirect()->route('municipios.index')->with('success', 'Municipio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return redirect()->route('municipios.index')->with('success', 'Municipio eliminado exitosamente.');
    }
}