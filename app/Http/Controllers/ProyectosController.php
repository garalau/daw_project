<?php

namespace App\Http\Controllers;

use App\Models\ForumQuestion;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\ForumReply;



class ProyectosController extends Controller
{
    // Muestra el formulario para crear un nuevo proyecto
    public function create()
    {
        
        return view('proyectos.create');
    }

    // Muestra la lista de proyectos
    public function index()
    {
        $proyectos = Proyecto::with('user', 'especie')->get(); // Carga relaciones para evitar errores
        return view('proyectos.index', compact('proyectos'));
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado con éxito.');
    }

    // Muestra los proyectos en la papelera
    public function trash()
    {
        return view('proyectos.trash');
    }

     // Muestra el foro
// public function forum()
// {
//     $questions = ForumQuestion::with('user')->latest()->paginate(10);
//     return view('proyectos.forum', compact('questions'));
// }

// public function storeQuestion(Request $request)
// {
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'body' => 'required|string',
//     ]);

//     ForumQuestion::create([
//         'title' => $request->title,
//         'body' => $request->body,
//         'user_id' => auth()->id(),
//     ]);

//     return redirect()->route('proyectos.forum')->with('success', 'Duda publicada correctamente.');
// }

// public function storeReply(Request $request, $questionId)
// {
//     $request->validate([
//         'reply' => 'required|string',
//         'parent_id' => 'nullable|exists:forum_replies,id',
//     ]);

//     ForumReply::create([
//         'body' => $request->reply,
//         'user_id' => auth()->id(),
//         'question_id' => $questionId,
//         'parent_id' => $request->parent_id, 
//     ]);

//     // Actualizar el contador de respuestas en la pregunta
//     $question = ForumQuestion::findOrFail($questionId);
//     $totalReplies = $question->countReplies();
//     $question->update(['replies_count' => $totalReplies]);

//     return redirect()->back()->with('success', 'Respuesta publicada correctamente.');
// }


// public function showQuestion($id)
// {
//     // // Obtener la pregunta con las respuestas principales y sus respuestas anidadas
//     // $question = ForumQuestion::with(['replies' => function($query) {
//     //     $query->whereNull('parent_id'); // Solo obtener respuestas principales
//     // }, 'replies.nestedReplies'])->findOrFail($id);

//     $question = ForumQuestion::with('replies')->findOrFail($id);

//     return view('proyectos.show-question', compact('question'));
// }

// public function storeNestedReply(Request $request, $replyId)
// {
//     $request->validate([
//         'reply' => 'required|string',
//     ]);

//     $reply = ForumReply::findOrFail($replyId);

//     // Crear una nueva respuesta anidada
//     $nestedReply = new ForumReply();
//     $nestedReply->body = $request->input('reply');
//     $nestedReply->user_id = auth()->id();
//     $nestedReply->question_id = $reply->question_id;
//     $nestedReply->parent_id = $reply->id;
//     $nestedReply->save();

//     // Incluir respuestas anidadas en el conteo total
//     $question = $reply->question;
//     $totalReplies = $question->repliesIncludingNested->count();

//     // Actualizar el contador de respuestas
//     $question->update(['replies_count' => $totalReplies]);

//     return redirect()->back()->with('success', 'Respuesta añadida con éxito.');
// }


     public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'especie_id' => 'required|exists:especies_coniferas,id',
            'altura' => 'required|numeric|min:0',
            'valor_y' => 'required|numeric', 
            'estado_sanitario' => 'required|string',
        'expectativa_vida' => 'required|string',
        'estetico_funcional' => 'required|string',
        'representatividad_rareza' => 'required|string',
        'situacion' => 'required|string',
        'factores_extraordinarios' => 'nullable|string',
            'valor_intrinseco' => 'required|numeric',
            'valor_extrinseco' => 'required|numeric',
            'valor_final' => 'required|numeric',
        ]);

        Proyecto::create([
            'user_id' => auth()->id(),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'especie_id' => $request->especie_id,
            'altura' => $request->altura,
            'valor_y' => $request->valor_y,
            'tamano_fotosintetico' => $request->tamano_fotosintetico,
            'estado_sanitario' => $request->estado_sanitario,
            'expectativa_vida' => $request->expectativa_vida,
            'estetico_funcional' => $request->estetico_funcional,
            'representatividad_rareza' => $request->representatividad_rareza,
            'situacion' => $request->situacion,
            'factores_extraordinarios' => $request->factores_extraordinarios,
            'valor_intrinseco' => $request->valor_intrinseco,
            'valor_extrinseco' => $request->valor_extrinseco,
            'valor_final' => $request->valor_final,
        ]);
        

        return response()->json(['success' => true, 'message' => 'Proyecto guardado con éxito.']);

        //return redirect()->route('proyectos.index')->with('success', 'Proyecto guardado con éxito.');
    }

}
