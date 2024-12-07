@extends('layouts.app-admin')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Editar Usuario') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Formulario de edición -->
                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}"
                                class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}"
                                class="w-full px-4 py-2 border rounded-lg" required>
                        </div>

                        <!-- Rol -->
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 font-semibold">Rol</label>
                            <select name="role" id="role" class="w-full px-4 py-2 border rounded-lg">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador
                                </option>
                                <!-- Añadir más opciones de rol si es necesario -->
                            </select>
                        </div>

                        <!-- Botón de Volver y Actualizar -->
                        <div class="flex justify-end">
                            <a href="{{ route('users') }}" class="btn btn-secondary me-2">
                                Volver
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded">
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
