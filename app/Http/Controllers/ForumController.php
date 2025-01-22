<?php

namespace App\Http\Controllers;

use App\Models\ForumQuestion;
use App\Models\ForumReply;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    // Muestra la lista de preguntas en el foro
    public function index()
    {
        $questions = ForumQuestion::with('user')->latest()->paginate(10);
        return view('proyectos.forum', compact('questions'));
    }

    // Muestra los detalles de una pregunta específica junto con sus respuestas
    public function showQuestion($id)
    {
        $question = ForumQuestion::with('replies')->findOrFail($id);
        return view('proyectos.show-question', compact('question'));
    }

    // Almacena una nueva pregunta en el foro
    public function storeQuestion(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        ForumQuestion::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('forum.index')->with('success', 'Duda publicada correctamente.');
    }

    // Almacena una respuesta a una pregunta
    public function storeReply(Request $request, $questionId)
    {
        $request->validate([
            'reply' => 'required|string',
            'parent_id' => 'nullable|exists:forum_replies,id',
        ]);

        ForumReply::create([
            'body' => $request->reply,
            'user_id' => auth()->id(),
            'question_id' => $questionId,
            'parent_id' => $request->parent_id, 
        ]);

        // Actualizar el contador de respuestas en la pregunta
        $question = ForumQuestion::findOrFail($questionId);
        $totalReplies = $question->countReplies();
        $question->update(['replies_count' => $totalReplies]);

        return redirect()->back()->with('success', 'Respuesta publicada correctamente.');
    }

    // Almacena una respuesta anidada
    public function storeNestedReply(Request $request, $replyId)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $reply = ForumReply::findOrFail($replyId);

        // Crear una nueva respuesta anidada
        ForumReply::create([
            'body' => $request->input('reply'),
            'user_id' => auth()->id(),
            'question_id' => $reply->question_id,
            'parent_id' => $reply->id,
        ]);

        // Actualizar el contador de respuestas
        $question = $reply->question;
        $totalReplies = $question->repliesIncludingNested->count();
        $question->update(['replies_count' => $totalReplies]);

        return redirect()->back()->with('success', 'Respuesta añadida con éxito.');
    }
}
