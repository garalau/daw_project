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
        
        //VALORES INTRÍNSECOS Y EXTRÍNSECOS
       /* $valores_intrinsecos = [
            'Tamaño fotosintéticamente activo' => [
                'excelente' => 0.5,
                'buena' => 0.4,
                'media' => 0.3,
                'regular' => 0.2,
                'poca' => 0.1,
                'escasa' => 0,
            ],
            'Estado sanitario' => [
                'excelente' => 0.5,
                'buena' => 0.4,
                'media' => 0.3,
                'regular' => 0.2,
                'poca' => 0.1,
                'escasa' => 0,
            ],
            'Expectativa de vida útil' => [
                'excelente' => 0.5,
                'buena' => 0.4,
                'media' => 0.3,
                'regular' => 0.2,
                'poca' => 0.1,
                'escasa' => 0,
            ],
        ];

        $valores_extrinsecos = [
            'Estético y funcional' => [
                'excelente' => 0.25,
                'buena' => 0,
                'media' => 0.15,
                'regular' => 0,
                'poca' => 0.05,
                'escasa' => 0,
            ],
            'Representatividad y rareza' => [
                'excelente' => 0.25,
                'buena' => 0,
                'media' => 0.15,
                'regular' => 0,
                'poca' => 0.05,
                'escasa' => 0,
            ],
            'Situación' => [
                'excelente' => 0.25,
                'buena' => 0,
                'media' => 0.15,
                'regular' => 0,
                'poca' => 0.05,
                'escasa' => 0,
            ],
            'Factores extraordinarios' => [
                'excelente' => 0.25,
                'buena' => 0,
                'media' => 0.15,
                'regular' => 0,
                'poca' => 0.05,
                'escasa' => 0,
            ],
        ];*/
        
        /*
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
        */
        
        return view('proyectos.create', compact('especies'));
    }

    /**
     * Calcular el valor de la conífera.
     */
    public function calcularValorConifera(Request $request)
    {
        
        // Validar los campos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
            'tamano_fotosintetico' => 'required|string',
            'estado_sanitario' => 'required|string',
            'expectativa_vida' => 'required|string',
            'estetico_funcional' => 'required|string',
            'representatividad_rareza' => 'required|string',
            'situacion' => 'required|string',
            'factores_extraordinarios' => 'required|string',
        ]);
        
        // Definir los valores intrínsecos y extrínsecos
        $valores_intrinsecos = [
            'excelente' => 0.5,
            'buena' => 0.4,
            'media' => 0.3,
            'regular' => 0.2,
            'poca' => 0.1,
            'escasa' => 0,
        ];

        $valores_extrinsecos = [
            'excelente' => 0.25,
            'buena' => 0,
            'media' => 0.15,
            'regular' => 0,
            'poca' => 0.05,
            'escasa' => 0,
        ];

        // Calcular suma de valores intrínsecos
        $sumaIntrinsecos =
            $valores_intrinsecos[$request->tamano_fotosintetico] +
            $valores_intrinsecos[$request->estado_sanitario] +
            $valores_intrinsecos[$request->expectativa_vida];

        // Calcular suma de valores extrínsecos
        $sumaExtrinsecos =
            $valores_extrinsecos[$request->estetico_funcional] +
            $valores_extrinsecos[$request->representatividad_rareza] +
            $valores_extrinsecos[$request->situacion] +
            $valores_extrinsecos[$request->factores_extraordinarios];
            
        /*
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
            'intrinsecos' => 'required|array',
            'extrinsecos' => 'required|array',
        ]);*/
        /*REQUEST ANTIGUO*/ 
        /*
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
            'valor_intrinseco' => 'required|numeric',
            'valor_extrinseco' => 'required|numeric',
        ]);*/

        
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
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontró un valor de "y" para la altura ingresada.'
                ]);
            }

        // Aplicar la fórmula matemática usando el valor de "y" y los valores intrínseco/extrínseco
        $valor_caracteristico = 800 ;
        $valor_basico = $valor_caracteristico * $valor_y;
        $valor_final_pesetas = $valor_basico * (1 + ($sumaIntrinsecos) + ($sumaExtrinsecos));
        $valor_final = $valor_final_pesetas / 166.386;
        /*$valor_final = $valor_basico * (1 + $request->valor_intrinseco + $request->valor_extrinseco);*/

        //devuelve los datos en json
        return response()->json([
            'success' => true,
            'data' => [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'especie' => $especie->nombre_cientifico,
                'altura' => $request->altura,
                'valor_y' => $valor_y,
                'valor_intrinseco' => $sumaIntrinsecos,
                'valor_extrinseco' => $sumaExtrinsecos,
                'valor_final' => $valor_final,
            ]
        ]);
    }
    

    //CREAR LA FUNCIÓN PARA GUARDAR LOS DATOS EN LA TABLA REGISTROSPROYECTOS O HACER OTRO CONTROLADOR PARA TENERLO MÁS ORGANIZADO

}
