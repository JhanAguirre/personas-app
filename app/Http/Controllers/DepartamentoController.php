<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Pais; // Importa el modelo Pais
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::with('pais')->get();
        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = Pais::all();
        return view('departamentos.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dep_nomb' => 'required|string|max:255',
            'pais_codi' => 'required|exists:tb_pais,pais_codi', // Asegurar que el país exista
        ]);

        $departamento = new Departamento();
        $departamento->dep_nomb = $request->input('dep_nomb');
        $departamento->pais_codi = $request->input('pais_codi');
        $departamento->save();

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departamento = Departamento::with('pais')->findOrFail($id);
        return view('departamentos.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departamento = Departamento::findOrFail($id);
        $paises = Pais::all();
        return view('departamentos.edit', compact('departamento', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'dep_nomb' => 'required|string|max:255',
            'pais_codi' => 'required|exists:tb_pais,pais_codi', // Asegurar que el país exista
        ]);

        $departamento = Departamento::findOrFail($id);
        $departamento->dep_nomb = $request->input('dep_nomb');
        $departamento->pais_codi = $request->input('pais_codi');
        $departamento->save();

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente.');
    }
}