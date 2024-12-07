@extends('layouts.app-admin')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Editar Noticia') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Título -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-semibold">Título</label>
                        <input type="text" name="title" id="title" value="{{ $news->title }}" 
                               class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold">Descripción</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="w-full px-4 py-2 border rounded-lg" required>{{ $news->description }}</textarea>
                    </div>

                    <!-- Contenido -->
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-semibold">Contenido</label>
                        <textarea name="content" id="content" rows="6" 
                                  class="w-full px-4 py-2 border rounded-lg" required>{{ $news->content }}</textarea>
                    </div>

                    <!-- Imagen -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-semibold">Imagen</label>
                        <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg">
                        @if ($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="Imagen actual" class="mt-2 rounded" style="max-width: 200px;">
                        @endif
                    </div>

                    <!-- Botón de Volver y Actualizar -->
                    <div class="flex justify-end">
                        <a href="{{ route('news') }}" class="btn btn-secondary me-2">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded">
                            Actualizar Noticia
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

