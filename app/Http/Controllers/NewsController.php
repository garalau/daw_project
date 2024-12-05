<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    { 
        //mostrar las noticias
        $news = News::all(); 
        return view('noticias', compact('news'));
    }

    public function show($id)
    {
        //obtener noticia en concreto
        $news = News::findOrFail($id); 
        return response()->json($news);
    }

    public function store(Request $request)
{
    // Validar los datos
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
    ]);

    // Subir la imagen (si existe)
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news_img', 'public');
    }

    // Crear la noticia
    News::create([
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content,
        'image' => $imagePath, // Guardar la ruta de la imagen
    ]);

    return redirect()->route('news.index');
}

}
