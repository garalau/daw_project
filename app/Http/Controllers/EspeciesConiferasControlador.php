<?php

namespace App\Http\Controllers;

use App\Models\EspeciesConiferas;
use Illuminate\Http\Request;

class EspeciesConiferasControlador extends Controller
{
    /**
     * Mostrar una lista de las especies.
     */
    public function index()
    {
        $especies = EspeciesConiferas::all(); // Recupera todas las especies
        return view('especies_coniferas.index', compact('especies'));
    }

    /**
     * Mostrar el formulario para crear una nueva especie.
     */
    public function create()
    {
        return view('especies_coniferas.create');
    }

    /**
     * Almacenar una nueva especie en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre_cientifico' => 'required|string|max:255',
            'grupo' => 'required|string|max:1',
            'longevidad' => 'required|string',
            'velocidad_crecimiento' => 'required|string',
            'k_factor' => 'required|numeric',
            'xi_factor' => 'required|numeric',
            'b_factor' => 'required|numeric',
        ]);

        // Crear la nueva especie
        EspeciesConiferas::create($request->all());

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('especies.index')->with('success', 'Especie creada correctamente.');
    }
}