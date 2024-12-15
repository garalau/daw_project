<?php

namespace App\Http\Controllers;

use App\Models\EspeciesConiferas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CalculoValorConiferaController extends Controller
{
    
     /**
     * Mostrar el formulario inicial.
     */
    public function showForm()
    {
        $especies = EspeciesConiferas::all();
        return view('formulario', compact('especies'));
    }

    /**
     * Calcular el valor de la conífera.
     */
    public function calcularValorConifera(Request $request)
    {
        $request->validate([
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
        ]);

        // Obtener la especie seleccionada
        $especie = EspeciesConiferas::find($request->especie_id);

        // Obtener el grupo de la especie
        $grupo = $especie->grupo;

        // Buscar el valor de "y" según el grupo y la altura
        $valor_y = DB::table('valores_y')
            ->where('grupo', $grupo)
            ->where('altura_min', '<=', $request->altura)
            ->where('altura_max', '>', $request->altura)
            ->value('valor_y');

        if (!$valor_y) {
            return back()->withErrors(['message' => 'No se encontró un valor de "y" para la altura ingresada.']);
        }

        // Aplicar la fórmula matemática usando el valor de "y"
        $valor_conifera = $valor_y * 10; // Ejemplo de fórmula

        return view('resultado', compact('valor_conifera'));
    }

    //CREAR LA FUNCIÓN PARA GUARDAR LOS DATOS EN LA TABLA RESGISTROSPROYECTOS O HACER OTRO CONTROLADOR PARA TENERLO MÁS ORGANIZADO

}
