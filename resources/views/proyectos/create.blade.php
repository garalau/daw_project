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
    <form action="{{ route('calcular.conifera') }}" method="POST">
        @csrf

        <!-- Selección de la especie -->
        <div class="form-group">
            <label for="especie_id">Selecciona la especie:</label>
            <select name="especie_id" id="especie_id" class="form-control" required>
                <option value="">Seleccione una especie</option>
                @foreach ($especies as $especie)
                    <option value="{{ $especie->id }}">{{ $especie->nombre_cientifico }}</option>
                @endforeach
            </select>
        </div>

        <!-- Aquí se cargarán los formularios dinámicamente -->
        <div id="form-conifera" class="especie-form" style="display: none;">
            <h3>Formulario para Coníferas</h3>

            <!-- Introducción de la altura -->
            <div class="form-group mt-3">
                <label for="altura">Altura en metros:</label>
                <input type="number" name="altura" id="altura" class="form-control" step="0.1" min="0" required>
            </div>

            <!-- Valores intrínsecos -->
            <div class="form-group mt-3">
                <label>Valores Intrínsecos:</label>
                @foreach ($valores_intrinsecos as $label => $valor)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valor_intrinseco" value="{{ $valor }}" id="intrinseco_{{ $valor }}" required>
                        <label class="form-check-label" for="intrinseco_{{ $valor }}">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- Valores extrínsecos -->
            <div class="form-group mt-3">
                <label>Valores Extrínsecos:</label>
                @foreach ($valores_extrinsecos as $label => $valor)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valor_extrinseco" value="{{ $valor }}" id="extrinseco_{{ $valor }}" required>
                        <label class="form-check-label" for="extrinseco_{{ $valor }}">
                            {{ $label }}
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- Botón de envío -->
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Calcular Valor</button>
            </div>
        </div>

    </form>

    <script>
        // Usamos jQuery para manejar la visibilidad del formulario según la especie seleccionada
        $(document).ready(function() {
            $('#especie_id').change(function() {
                var especieSeleccionada = $(this).val();

                // Ocultar todos los formularios dinámicos
                $('.especie-form').hide();

                // Mostrar el formulario correspondiente a la especie seleccionada
                if (especieSeleccionada == '1') { // Aquí '1' es el ID de las coníferas
                    $('#form-conifera').show();
                }

                // Puedes añadir más condiciones para mostrar otros formularios
                // if (especieSeleccionada == 'otro_id') {
                //     $('#form-otra-especie').show();
                // }
            });
        });
    </script>
@endsection
