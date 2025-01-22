<!-- Barra proyectos-->
<div class="row">
    <div class="col-md-12 p-0 bg-dark">
        <div class="d-flex justify-content-start">
        <!-- Opción Nuevo Proyecto -->
        <a href="{{ route('proyectos.create') }}" class="bg-dark text-white list-group-item list-group-item-action {{ Request::is('proyectos/create') ? 'active' : '' }} d-inline-flex align-items-center px-4 py-3 mx-2 rounded">
            <i class="bi bi-file-earmark-plus me-2"></i> Crear Proyecto
        </a>
        <!-- Opción Consultar Proyectos -->
        <a href="{{ route('proyectos.index') }}" class="bg-dark text-white list-group-item list-group-item-action {{ Request::is('proyectos') || Request::is('proyectos/*') ? 'active' : '' }} d-inline-flex align-items-center px-4 py-3 mx-2 rounded">
            <i class="bi bi-folder me-2"></i> Mis Proyectos
        </a>
        <!-- Opción Papelera -->
        <a href="{{ route('proyectos.trash') }}" class="bg-dark text-white list-group-item list-group-item-action {{ Request::is('proyectos/trash') ? 'active' : '' }} d-inline-flex align-items-center px-4 py-3 mx-2 rounded">
            <i class="bi bi-trash me-2"></i> Papelera
        </a>
        <!-- Opción Foro si hay tiempo y ganas-->
        <a href="{{ route('forum.index') }}" class="bg-dark text-white list-group-item list-group-item-action {{ Request::is('proyectos/forum') ? 'active' : '' }} d-inline-flex align-items-center px-4 py-3 mx-2 rounded">
            <i class="bi bi-chat-left me-2"></i> Foro
        </a>
        
    </div>
</div>