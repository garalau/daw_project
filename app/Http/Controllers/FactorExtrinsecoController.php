<?php

namespace App\Http\Controllers;

use App\Models\FactorExtrinseco;
use Illuminate\Http\Request;

class FactorExtrinsecoController extends Controller
{
    /**
     * Mostrar el formulario para crear un factor extrínseco.
     */
    public function create()
    {
        return view('factor_extrinsecos.create');
    }

    /**
     * Almacenar un nuevo factor extrínseco.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'social' => 'required|numeric|min:0|max:100',
            'ambiental' => 'required|numeric|min:0|max:100',
            'localizacion' => 'required|numeric|min:0|max:100',
        ]);

        // Crear el registro en la base de datos
        FactorExtrinseco::create($request->all());

        // Redirigir al formulario con un mensaje de éxito
        return redirect()->route('factor_extrinsecos.create')->with('success', 'Datos guardados correctamente.');
    }
}
