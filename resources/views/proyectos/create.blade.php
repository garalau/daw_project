@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Crear Proyecto" 
    subtitle=""
    :show-buttons="false"
    />

    <x-navproject />

    <!-- Aquí comienza el formulario -->
    <h1>Crear Proyecto de Árbol</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    
    <!-- Formulario para calcular el valor de la especie -->
    <div class="container p-4">
    <form id="form-calculo">
        @csrf
        <!-- Nombre del proyecto -->
        <div class="form-group mt-3">
            <label for="altura">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <!-- Descripción del proyecto -->
        <div class="form-group mt-3">
            <label for="altura">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" required>
        </div>

        <!-- Selección de la especie -->
        <div class="form-group">
            <label for="especie_id">Selecciona tipo de especie:</label>
            <select name="especie_id" id="especie_id" class="form-control" required>
                <option value="">Seleccione una especie</option>
                <option value="conifera">Coníferas</option>
                <option value="frondosa">Frondosas</option>
            </select>
        </div>

        <!-- Aquí se cargarán los formularios dinámicamente -->
        <div id="form-conifera" class="especie-form" style="display: none;"></div>
    </form>
</div>

<!-- Modal para mostrar el resultado -->
<div class="modal fade" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resultadoModalLabel">Resultado del Proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-resultados">
                <!-- Aquí se mostrarán los resultados calculados -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="guardarProyectoBtn" class="btn btn-primary">Guardar Proyecto</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        document.getElementById('especie_id').addEventListener('change', function() {
            var especieSeleccionada = this.value;
            var formConifera = document.getElementById('form-conifera');

            // Si la opción seleccionada es 'conifera', se carga el formulario de Coníferas
            if (especieSeleccionada === 'conifera') {
                // Usar AJAX para cargar el formulario de Coníferas
                fetch("{{ route('formularioConifera') }}")
                    .then(response => response.text())
                    .then(data => {
                        formConifera.innerHTML = data;
                        formConifera.style.display = 'block'; // Mostrar el formulario
                    });
            } else {
                formConifera.innerHTML = ''; // Limpiar el contenido del formulario
                formConifera.style.display = 'none'; // Ocultar el formulario
            }
        });
        document.getElementById('form-calculo').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch("{{ route('proyectos.resultado') }}", {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mostrar el resultado en el modal
                    document.getElementById('modal-resultados').innerHTML = data.html;
                    $('#resultadoModal').modal('show');
                } else {
                    alert('Hubo un error al calcular el valor');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al calcular el valor');
            });
        });

        document.getElementById('guardarProyectoBtn').addEventListener('click', function() {
            var formData = new FormData(document.getElementById('form-calculo'));

            fetch("{{ route('proyectos.store') }}", {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Proyecto guardado con éxito');
                    $('#resultadoModal').modal('hide');
                } else {
                    alert('Hubo un error al guardar el proyecto');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al guardar el proyecto');
            });
        });
        </script>
@endsection