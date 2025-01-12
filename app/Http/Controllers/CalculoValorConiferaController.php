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
        $especies = EspeciesConiferas::all(['id', 'nombre_cientifico']);

        $valores_intrínsecos = ['Alta calidad' => 0.2,
    'Media calidad' => 0.1,
    'Baja calidad' => 0.05,];

        $valores_extrínsecos = [ 'Zona urbana' => 0.3,
        'Zona rural' => 0.1,
        'Zona protegida' => 0.5,];

        
        return view('proyectos.create', compact('especies', 'valores_intrínsecos', 'valores_extrínsecos'));
    }

    /**
     * Calcular el valor de la conífera.
     */
    public function calcularValorConifera(Request $request)
    {
        $request->validate([
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
            //valores intrínsecos y extrínsecos...
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

        // Aplicar la fórmula matemática usando el valor de "y" y los valores intrínseco/extrínseco
        $valor_caracteristico = 800 ;
        $valor_basico = $valor_caracteristico * $valor_y;
        $valor_final = $valor_basico * (1 + $request->valor_intrinseco + $request->valor_extrinseco);

        return view('resultado', compact('valor_conifera'));
    }

    //CREAR LA FUNCIÓN PARA GUARDAR LOS DATOS EN LA TABLA REGISTROSPROYECTOS O HACER OTRO CONTROLADOR PARA TENERLO MÁS ORGANIZADO

}
