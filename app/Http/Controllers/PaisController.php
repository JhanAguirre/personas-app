<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = Pais::all(); // Obtener todos los países
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pais_codi' => 'required|string|size:3|unique:tb_pais,pais_codi', // Código de país único y de 3 caracteres
            'pais_nomb' => 'required|string|max:255',
        ]);

        $pais = new Pais();
        $pais->pais_codi = $request->input('pais_codi');
        $pais->pais_nomb = $request->input('pais_nomb');
        $pais->save();

        return redirect()->route('paises.index')->with('success', 'País creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pais = Pais::findOrFail($id);
        return view('paises.show', compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pais = Pais::findOrFail($id);
        return view('paises.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pais_nomb' => 'required|string|max:255',
        ]);

        $pais = Pais::findOrFail($id);
        $pais->pais_nomb = $request->input('pais_nomb');
        $pais->save();

        return redirect()->route('paises.index')->with('success', 'País actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pais = Pais::findOrFail($id);
        $pais->delete();
        return redirect()->route('paises.index')->with('success', 'País eliminado exitosamente.');
    }
}