<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Departamento; // Asegúrate de importar el modelo Departamento
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Utilizando Eloquent para obtener todos los municipios con la relación 'departamento' cargada
        $municipios = Municipio::with('departamento')->get();

        // Si necesitas paginación (recomendado para grandes conjuntos de datos)
        // $municipios = Municipio::with('departamento')->paginate(10); // Paginar cada 10 registros

        return view('municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener los departamentos para el select en el formulario de creación
        $departamentos = Departamento::all();
        return view('municipios.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'muni_nomb' => 'required|string|max:255',
            'dep_codi' => 'required|exists:tb_departamento,dep_codi', // Asegurar que el departamento exista
        ]);

        // Crear un nuevo municipio
        $municipio = new Municipio();
        $municipio->muni_nomb = $request->input('muni_nomb');
        $municipio->dep_codi = $request->input('dep_codi');
        $municipio->save();

        // Redireccionar al listado con un mensaje de éxito
        return redirect()->route('municipios.index')->with('success', 'Municipio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener un municipio por su ID con la relación 'departamento'
        $municipio = Municipio::with('departamento')->findOrFail($id);
        return view('municipios.show', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el municipio a editar por su ID
        $municipio = Municipio::findOrFail($id);

        // Obtener todos los departamentos para el select en el formulario de edición
        $departamentos = Departamento::all();

        return view('municipios.edit', compact('municipio', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'muni_nomb' => 'required|string|max:255',
            'dep_codi' => 'required|exists:tb_departamento,dep_codi', // Asegurar que el departamento exista
        ]);

        // Obtener el municipio a actualizar por su ID
        $municipio = Municipio::findOrFail($id);

        // Actualizar los datos del municipio
        $municipio->muni_nomb = $request->input('muni_nomb');
        $municipio->dep_codi = $request->input('dep_codi');
        $municipio->save();

        // Redireccionar al listado con un mensaje de éxito
        return redirect()->route('municipios.index')->with('success', 'Municipio actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener el municipio a eliminar por su ID
        $municipio = Municipio::findOrFail($id);

        // Eliminar el municipio
        $municipio->delete();

        // Redireccionar al listado con un mensaje de éxito
        return redirect()->route('municipios.index')->with('success', 'Municipio eliminado exitosamente.');
    }
}