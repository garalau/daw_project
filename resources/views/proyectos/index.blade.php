@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Mis Proyectos" 
    subtitle="Gestiona tus proyectos aquí."
    :show-buttons="!auth()->check()"
    />

    <x-navproject></x-navproject>

    <div class="container my-4">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h1 class="my-4 text-center fw-bold fs-2">Listado de Proyectos</h1>
        
        <!-- Table Wrapper -->
        <div class="table-responsive px-3">
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Especie</th>
                        <th>Altura</th>
                        <th>Valores</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proyectos as $proyecto)
                    <tr class="mb-3">
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->user->name }}</td> {{-- Asumiendo que el usuario tiene un campo "name" --}}
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->descripcion }}</td>
                        <td>{{ $proyecto->especie->nombre_cientifico ?? 'No asignada' }}</td> {{-- Relación con especie --}}
                        <td>{{ $proyecto->altura }} m</td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                <li><strong>Valor Y:</strong> {{ $proyecto->valor_y }}</li>
                                <li><strong>Valor Intrínseco:</strong> {{ $proyecto->valor_intrinseco }}</li>
                                <li><strong>Valor Extrínseco:</strong> {{ $proyecto->valor_extrinseco }}</li>
                                <li><strong>Valor Final:</strong> {{number_format( $proyecto->valor_final, 2, ',', '.') }} €</li>
                            </ul>
                        </td>
                        <td>{{ $proyecto->created_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Boton para elimiinar -->
                            <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este proyecto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            <br>
                            <!-- Botones para descargar en PDF o Excell -->
                            <a href="{{ route('proyectos.export-pdf', $proyecto->id) }}" class="btn btn-success btn-sm">Descargar PDF</a>
                            <a href="{{ route('proyectos.export-excel', $proyecto->id) }}" class="btn btn-success btn-sm">Descargar Excel</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No hay proyectos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 

@endsection 
    