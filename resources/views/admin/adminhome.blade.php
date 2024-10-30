<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Bienvenid@ Administrador!') }}

                    <!-- Admin Panel Section -->
                    <h3 class="font-semibold text-lg mt-6">{{ __('Control de Usuarios') }}</h3>
                    <table class="table-auto w-full mt-4 border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Nombre</th>
                                <th class="px-4 py-2 border">Correo Electrónico</th>
                                <th class="px-4 py-2 border">Rol</th>
                                <th class="px-4 py-2 border">Creado</th> <!-- Nueva columna para la fecha de creación -->
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
                                <td class="border px-4 py-2 text-center">{{ $user->created_at->format('d-m-Y H:i') }}</td> <!-- Mostrar fecha de creación -->
                                <td class="border px-4 py-2 flex justify-center space-x-4"> <!-- Centrar botones -->
                                    <a href="{{ route('admin.edit', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Editar</a>
                                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



