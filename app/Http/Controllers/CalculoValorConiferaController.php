<?php

namespace App\Http\Controllers;

use App\Models\EspeciesConiferas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Proyecto;

class CalculoValorConiferaController extends Controller
{
    
     /**
     * Mostrar el formulario inicial.
     */
    public function showForm()
    {
        $especies = EspeciesConiferas::all(['id', 'nombre_cientifico']);

        $valores_intrinsecos = [
            'Alta calidad' => 0.2,
            'Media calidad' => 0.1,
            'Baja calidad' => 0.05,
        ];

        $valores_extrinsecos = [ 
            'Zona urbana' => 0.3,
            'Zona rural' => 0.1,
            'Zona protegida' => 0.5,
        ];

        
        return view('proyectos.formularioConifera', compact('especies', 'valores_intrinsecos', 'valores_extrinsecos'));
    }

    /**
     * Calcular el valor de la conífera.
     */
    public function calcularValorConifera(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
            'valor_intrinseco' => 'required|numeric',
            'valor_extrinseco' => 'required|numeric',
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

        //deuelve los datos en json
        $resultHtml = view('proyectos.resultado', [
            'nombre' => $request->nombre,
            'descripcion' => $request ->descripcion,
            'especie' => $especie->nombre_cientifico,
            'altura' => $request ->altura,
            'valor_intrinseco' => $request->valor_intrinseco,
            'valor_extrinseco' => $request->valor_extrinseco,
            'valor_final' => $valor_final
        ])->render();

        // Devolver los datos como JSON
        return response()->json([
        'success' => true,
        'html' => $resultHtml
    ]);
    }
    

    //CREAR LA FUNCIÓN PARA GUARDAR LOS DATOS EN LA TABLA REGISTROSPROYECTOS O HACER OTRO CONTROLADOR PARA TENERLO MÁS ORGANIZADO

}
