<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.update', $user->id) }}" method="POST">
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
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                                <!-- Añadir más opciones de rol si es necesario -->
                            </select>
                        </div>

                        <!-- Botón de Actualizar -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
