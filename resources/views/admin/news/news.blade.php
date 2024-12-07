@extends('layouts.app-admin')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Noticias') }}
    </h2>
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <table class="table-auto w-full mt-4 border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Título</th>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Contenido</th>
                <th class="px-4 py-2 border">Imagen</th> 
                <th class="px-4 py-2 border">Actualizado</th>
                <th class="px-4 py-2 border">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-gray-200">
            @foreach ($news as $item)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $item->id }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->title }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->description }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->content }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->image }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->updated_at->format('d-m-Y H:i') }}</td>
                <td class="border px-4 py-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary px-4 py-2 rounded me-2">Editar</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4 py-2 rounded">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



