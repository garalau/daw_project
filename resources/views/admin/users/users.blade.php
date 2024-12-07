@extends('layouts.app-admin')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Usuarios') }}
    </h2>
@endsection

    @section('content')
    <!-- Mensaje de bienvenida en el centro -->
    <div class="d-flex justify-content-center align-items-center">
        <table class="table-auto w-full mt-4 border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Correo Electrónico</th>
                    <th class="px-4 py-2 border">Rol</th>
                    <th class="px-4 py-2 border">Creado</th> 
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-gray-200">
                @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2 text-center">{{ $user->id }}</td>
                    <td class="border px-4 py-2 text-center">{{ $user->name }}</td>
                    <td class="border px-4 py-2 text-center">{{ $user->email }}</td>
                    <td class="border px-4 py-2 text-center">{{ $user->role }}</td>
                    <td class="border px-4 py-2 text-center">{{ $user->created_at->format('d-m-Y H:i') }}</td>
                    <td class="border px-4 py-2 flex justify-center space-x-4"> 
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary px-4 py-2 rounded me-2">Editar</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4 py-2 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
