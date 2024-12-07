<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();
        return view('noticias', compact('news')); 
    }

    public function adminIndex()
    {
        $news = News::all();
        return view('admin.news.news', compact('news')); 
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

public function update(Request $request, $id) {
    
    // Validar los datos del formulario
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
    ]);

    $news = News::findOrFail($id);

    // Actualizar los datos
    $news->title = $validated['title'];
    $news->description = $validated['description'];
    $news->content = $validated['content'];

    // Si hay una nueva imagen, guardarla
    if ($request->hasFile('image')) {
        // Eliminar la imagen antigua si existe
        if ($news->image) {
            Storage::delete('public/' . $news->image);
        }

        // Subir la nueva imagen
        $path = $request->file('image')->store('news_img', 'public');
        $news->image = $path;
    }

    $news->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('news')->with('success', 'Noticia actualizada exitosamente');
}

public function edit($id)
{
    $news = News::findOrFail($id);
    return view('admin.news.edit', compact('news'));
}

public function destroy($id) {
    $news = News::findOrFail($id);
    $news->delete();
    return redirect()->route('panel')->with('success', 'Noticia eliminada exitosamente');
}    
}
