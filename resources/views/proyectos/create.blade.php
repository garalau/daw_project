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
    
    <!-- Formulario para calcular el valor de la especie -->
    <form action="" method="POST">
        @csrf

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
                <div id="form-conifera" class="especie-form" style="display: none;">
                    <!-- El formulario de Coníferas será cargado aquí mediante AJAX -->
                </div>
    </form>
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
    </script>
@endsection