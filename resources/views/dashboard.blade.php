@extends('layouts.app-user')

@section('content')

<x-header-welcome 
    title="Bienvenid@, {{ Auth::user()->name }}!" 
    subtitle=""
    :show-buttons="false"
    class="p-0 px-6 text-m"
    />

    <div class="container-fluid">
        <div class="row">
            <!-- Barra -->
            <div class="col-md-12 p-0 bg-dark">
                <div class="d-flex justify-content-start">
                <!-- Opción Nuevo Proyecto -->
                <a href="#nuevo" onclick="loadContent('{{ route('proyectos.create') }}')" class="bg-dark text-white list-group-item list-group-item-action {{ Request::is('proyectos/create') ? 'active' : '' }} d-inline-flex align-items-center px-4 py-3 mx-2 rounded">
                    <i class="bi bi-file-earmark-plus me-2"></i> Crear Proyecto
                </a>
                <!-- Opción Consultar Proyectos -->
                <a href="#lista" onclick="loadContent('{{ route('proyectos.index') }}')" class="bg-dark text-white list-group-item list-group-item-action {{ Request::is('proyectos') || Request::is('proyectos/*') ? 'active' : '' }} d-inline-flex align-items-center px-4 py-3 mx-2 rounded">
                    <i class="bi bi-folder me-2"></i> Mis Proyectos
                </a>
                <!-- Opción Papelera -->
                <a href="#eliminados" onclick="loadContent('{{ route('proyectos.trash') }}')" class="bg-dark text-white list-group-item list-group-item-action {{ Request::is('proyectos/trash') ? 'active' : '' }} d-inline-flex align-items-center px-4 py-3 mx-2 rounded">
                    <i class="bi bi-trash me-2"></i> Papelera
                </a>
                <!-- Opción Foro si hay tiempo y ganas-->
                
            </div>
            </div>
    
            <!-- Contenido Principal -->
            <div class="col-md-9" id="main-content">
                <!-- Aquí se cargan los archivos -->
            </div>
        </div>
    </div>
    
    <script>
        // Función para cargar contenido 
        function loadContent(url) {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    // Reemplazar el contenido del div con el contenido recibido
                    document.getElementById('main-content').innerHTML = data;
                })
                .catch(error => console.error('Error al cargar contenido:', error));
        }
    </script>

@endsection