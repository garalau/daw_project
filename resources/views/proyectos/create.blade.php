@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Crear Proyecto" 
    subtitle=""
    :show-buttons="false"
    />

    <x-navproject />

    <div>
        <h1>Nuevo Proyecto de Árbol</h1>
        <h1>Calcular Valor Ornamentístico de la Conífera</h1>
    </div>

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
                <label for="especie_id">Selecciona la especie:</label>
                <select name="especie_id" id="especie_id" class="form-control" required>
                    <option value="">Seleccione una especie</option>
                    @foreach ($especies as $especie)
                        <option value="{{ $especie->id }}">{{ $especie->nombre_cientifico }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Introducción de la altura -->
            <div class="form-group mt-3">
                <label for="altura">Altura en metros:</label>
                <input type="number" name="altura" id="altura" class="form-control" step="0.1" min="0" required>
            </div>

            <!-- Valores intrínsecos NO TERMINADOS, SOLO UNA PRUEBA-->
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

            <!-- Valores extrínsecos  NO TERMINADOS, SOLO UNA PRUEBA-->
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
                <button type="button" class="btn btn-success" id="calcular-btn">Calcular Valor</button>
            </div>
        </form>
    </div>

    <!-- Modal para mostrar el resultado -->
    <div class="modal fade" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultadoModalLabel">Resultado del Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-resultados">
                    <p id="nombre-modal"><strong>Nombre:</strong> </p>
                    <p id="descripcion-modal"><strong>Descripción:</strong> </p>
                    <p id="especie-modal"><strong>Especie:</strong> </p>
                    <p id="altura-modal"><strong>Altura:</strong> metros</p>
                    <p id="valor_y-modal"><strong>Valor Y:</strong></p>
                    <p id="valor_intrinseco-modal"><strong>Valor Intrínseco:</strong></p>
                    <p id="valor_extrinseco-modal"><strong>Valor Extrínseco:</strong></p>
                    <p id="valor_final-modal"><strong>Valor Final:</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarProyectoBtn" class="btn btn-success">Guardar Proyecto</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('calcular-btn').addEventListener('click', function() {
            let form = document.getElementById('form-calculo');
            let formData = new FormData(form);

            fetch('{{ route('proyectos.resultado') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mostrar los datos en el modal
                    document.getElementById('nombre-modal').innerText = 'Nombre: ' + formData.get('nombre');
                    document.getElementById('descripcion-modal').innerText = 'Descripción: ' + formData.get('descripcion');
                    document.getElementById('altura-modal').innerText = 'Altura: ' + formData.get('altura') + ' metros';
                    document.getElementById('especie-modal').innerText = 'Especie: ' + document.getElementById('especie_id').selectedOptions[0].text;
                    document.getElementById('valor_y-modal').innerText = 'Valor Y: ' + data.data.valor_y;
                    document.getElementById('valor_intrinseco-modal').innerText = 'Valor Intrínseco: ' + formData.get('valor_intrinseco');
                    document.getElementById('valor_extrinseco-modal').innerText = 'Valor Extrínseco: ' + formData.get('valor_extrinseco');
                    document.getElementById('valor_final-modal').innerText = 'Valor Final: ' + Math.round(data.data.valor_final);

                    // Abrir el modal
                    var myModal = new bootstrap.Modal(document.getElementById('resultadoModal'));
                    myModal.show();
                } else {
                    alert(data.message);
                }

            }).catch(error => {
             console.error('Error:', error);
             alert('Hubo un error al calcular el valor');
            });
        });
    


        document.getElementById('guardarProyectoBtn').addEventListener('click', function() {
            // Recoger los datos del modal
            let nombre = document.getElementById('nombre').value;
    let descripcion = document.getElementById('descripcion').value;
    let altura = document.getElementById('altura').value;
    let especie_id = document.getElementById('especie_id').value;
    let valor_y = document.getElementById('valor_y-modal').innerText.replace('Valor Y: ', '');
    let valor_intrinseco = document.getElementById('valor_intrinseco-modal').innerText.replace('Valor Intrínseco: ', '');
    let valor_extrinseco = document.getElementById('valor_extrinseco-modal').innerText.replace('Valor Extrínseco: ', '');
    let valor_final = document.getElementById('valor_final-modal').innerText.replace('Valor Final: ', '');

            // Enviar los datos al servidor con fetch
            fetch("{{ route('proyectos.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', 
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    nombre: nombre,
                    descripcion: descripcion,
                    especie_id: especie_id,
                    altura: altura,
                    valor_y: valor_y,
                    valor_intrinseco: valor_intrinseco,
                    valor_extrinseco: valor_extrinseco,
                    valor_final: valor_final,
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    alert('Proyecto guardado con éxito');
                    $('#resultadoModal').modal('hide');
                } 
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al guardar el proyecto');
            });
        });

    });
        </script>
@endsection