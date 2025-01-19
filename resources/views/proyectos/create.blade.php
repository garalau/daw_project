{{-- @extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Crear Proyecto" 
    subtitle=""
    :show-buttons="false"
    />

    <x-navproject />

    <div class="container py-5">
        <h1 class="text-center mb-4">Nuevo Proyecto de Árbol: Calcular Valor Ornamentístico de la Conífera</h1>

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
        <form id="form-calculo" class="bg-light p-4 rounded shadow-sm">
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

            
            
            <!-- Valores Intrínsecos -->
            <h3>Valores Intrínsecos</h3>
            <div>
                <label for="tamano_fotosintetico">1. Tamaño fotosintéticamente activo:</label>
                <select name="tamano_fotosintetico" id="tamano_fotosintetico" required>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="media">Media</option>
                    <option value="regular">Regular</option>
                    <option value="poca">Poca</option>
                    <option value="escasa">Escasa/Nula</option>
                </select>
            </div>

            <div>
                <label for="estado_sanitario">2. Estado sanitario:</label>
                <select name="estado_sanitario" id="estado_sanitario" required>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="media">Media</option>
                    <option value="regular">Regular</option>
                    <option value="poca">Poca</option>
                    <option value="escasa">Escasa/Nula</option>
                </select>
            </div>

            <div>
                <label for="expectativa_vida">3. Expectativa de vida útil:</label>
                <select name="expectativa_vida" id="expectativa_vida" required>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="media">Media</option>
                    <option value="regular">Regular</option>
                    <option value="poca">Poca</option>
                    <option value="escasa">Escasa/Nula</option>
                </select>
            </div>

            <!-- Valores Extrínsecos -->
            <h3>Valores Extrínsecos</h3>
            <div>
                <label for="estetico_funcional">1. Estético y funcional:</label>
                <select name="estetico_funcional" id="estetico_funcional" required>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="media">Media</option>
                    <option value="regular">Regular</option>
                    <option value="poca">Poca</option>
                    <option value="escasa">Escasa/Nula</option>
                </select>
            </div>

            <div>
                <label for="representatividad_rareza">2. Representatividad y rareza:</label>
                <select name="representatividad_rareza" id="representatividad_rareza" required>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="media">Media</option>
                    <option value="regular">Regular</option>
                    <option value="poca">Poca</option>
                    <option value="escasa">Escasa/Nula</option>
                </select>
            </div>

            <div>
                <label for="situacion">3. Situación:</label>
                <select name="situacion" id="situacion" required>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="media">Media</option>
                    <option value="regular">Regular</option>
                    <option value="poca">Poca</option>
                    <option value="escasa">Escasa/Nula</option>
                </select>
            </div>

            <div>
                <label for="factores_extraordinarios">4. Factores extraordinarios:</label>
                <select name="factores_extraordinarios" id="factores_extraordinarios" required>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="media">Media</option>
                    <option value="regular">Regular</option>
                    <option value="poca">Poca</option>
                    <option value="escasa">Escasa/Nula</option>
                </select>
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
                    <p id="nombre-modal"></p>
                    <p id="descripcion-modal"></p>
                    <p id="especie-modal"></p>
                    <p id="altura-modal"></p>
                    <p id="valor_y-modal"></p>
                    <p id="valor_intrinseco-modal"><</p>
                    <p id="valor_extrinseco-modal"></p>
                    <p id="valor_final-modal"></p>

                    <!-- Detalles de los valores intrínsecos -->
                <h4>Detalles de los Valores Intrínsecos:</h4>
                <p id="tamano_fotosintetico-modal"></p>
                <p id="estado_sanitario-modal"></p>
                <p id="expectativa_vida-modal"></p>

                <!-- Detalles de los valores extrínsecos -->
                <h4>Detalles de los Valores Extrínsecos:</h4>
                <p id="estetico_funcional-modal"></p>
                <p id="representatividad_rareza-modal"></p>
                <p id="situacion-modal"></p>
                <p id="factores_extraordinarios-modal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="guardarProyectoBtn" class="btn btn-success">Guardar Proyecto</button>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.app-user')

@section('content')
    <x-header-welcome title="Crear Proyecto" subtitle="" :show-buttons="false"/>

    <x-navproject />

    <div class="container col-md-8 py-5">
        <h1 class="text-center mb-4 fw-bold fs-3">Valor Ornamentístico Conífera</h1>

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
        <form id="form-calculo" class="bg-light p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre del Proyecto</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
                </div>
            </div>

            <!-- Selección de la especie -->
            <div class="mb-3">
                <label for="especie_id" class="form-label">Selecciona la Especie</label>
                <select name="especie_id" id="especie_id" class="form-select" required>
                    <option value="">Seleccione una especie</option>
                    @foreach ($especies as $especie)
                        <option value="{{ $especie->id }}">{{ $especie->nombre_cientifico }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Introducción de la altura -->
            <div class="mb-3">
                <label for="altura" class="form-label">Altura (en metros)</label>
                <input type="number" name="altura" id="altura" class="form-control" step="0.1" min="0" required>
            </div>

            <!-- Valores Intrínsecos -->
            <h5 class="my-4 fw-semibold text-center">Valores Intrínsecos</h5>
            @foreach(['tamano_fotosintetico', 'estado_sanitario', 'expectativa_vida'] as $item)
                <div class="mb-3">
                    <label for="{{ $item }}" class="form-label">{{ ucwords(str_replace('_', ' ', $item)) }}:</label>
                    <select name="{{ $item }}" id="{{ $item }}" class="form-select" required>
                        <option value="excelente">Excelente</option>
                        <option value="buena">Buena</option>
                        <option value="media">Media</option>
                        <option value="regular">Regular</option>
                        <option value="poca">Poca</option>
                        <option value="escasa">Escasa/Nula</option>
                    </select>
                </div>
            @endforeach

            <!-- Valores Extrínsecos -->
            <h5 class="my-4 fw-semibold text-center">Valores Extrínsecos</h5>
            @foreach(['estetico_funcional', 'representatividad_rareza', 'situacion', 'factores_extraordinarios'] as $item)
                <div class="mb-3">
                    <label for="{{ $item }}" class="form-label">{{ ucwords(str_replace('_', ' ', $item)) }}:</label>
                    <select name="{{ $item }}" id="{{ $item }}" class="form-select" required>
                        <option value="excelente">Excelente</option>
                        <option value="buena">Buena</option>
                        <option value="media">Media</option>
                        <option value="regular">Regular</option>
                        <option value="poca">Poca</option>
                        <option value="escasa">Escasa/Nula</option>
                    </select>
                </div>
            @endforeach

            <!-- Botón de envío -->
            <div class="text-center mt-4">
                <button type="button" class="btn btn-success" id="calcular-btn">Calcular Valor</button>
            </div>
        </form>
    </div>

    <!-- Modal para mostrar el resultado -->
<div class="modal fade" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-success text-white rounded-top">
                <h5 class="modal-title" id="resultadoModalLabel">Resultado del Proyecto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center bg-light font-weight-semibold">Detalles del Proyecto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Nombre:</strong></td>
                                <td id="nombre-modal"></td>
                            </tr>
                            <tr>
                                <td><strong>Descripción:</strong></td>
                                <td id="descripcion-modal"></td>
                            </tr>
                            <tr>
                                <td><strong>Especie:</strong></td>
                                <td id="especie-modal"></td>
                            </tr>
                            <tr>
                                <td><strong>Altura:</strong></td>
                                <td id="altura-modal"></td>
                            </tr>
                            <tr>
                                <td><strong>Valor Y:</strong></td>
                                <td id="valor_y-modal"></td>
                            </tr>
                            <tr>
                                <td><strong>Valor Intrínseco:</strong></td>
                                <td id="valor_intrinseco-modal"></td>
                            </tr>
                            <tr>
                                <td><strong>Valor Extrínseco:</strong></td>
                                <td id="valor_extrinseco-modal"></td>
                            </tr>
                            <tr>
                                <td><strong>Valor Final:</strong></td>
                                <td id="valor_final-modal"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Detalles de los Valores Intrínsecos -->
                <h5 class="mt-4 text-success font-weight-semibold">Detalles de los Valores Intrínsecos:</h5>
                <div id="tamano_fotosintetico-modal" class="p-2 rounded-3 bg-light mb-2"></div>
                <div id="estado_sanitario-modal" class="p-2 rounded-3 bg-light mb-2"></div>
                <div id="expectativa_vida-modal" class="p-2 rounded-3 bg-light mb-2"></div>

                <!-- Detalles de los Valores Extrínsecos -->
                <h5 class="mt-4 text-success font-weight-semibold">Detalles de los Valores Extrínsecos:</h5>
                <div id="estetico_funcional-modal" class="p-2 rounded-3 bg-light mb-2"></div>
                <div id="representatividad_rareza-modal" class="p-2 rounded-3 bg-light mb-2"></div>
                <div id="situacion-modal" class="p-2 rounded-3 bg-light mb-2"></div>
                <div id="factores_extraordinarios-modal" class="p-2 rounded-3 bg-light mb-2"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="guardarProyectoBtn" class="btn btn-success rounded-3">Guardar Proyecto</button>
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
                console.log(data);
                if (data.success) {
                    // Mostrar los datos en el modal
                    document.getElementById('nombre-modal').innerText = formData.get('nombre');
                    document.getElementById('descripcion-modal').innerText = formData.get('descripcion');
                    document.getElementById('altura-modal').innerText = formData.get('altura') + ' metros';
                    document.getElementById('especie-modal').innerText = data.data.especie; /*document.getElementById('especie_id').selectedOptions[0].text;*/
                    document.getElementById('valor_y-modal').innerText = data.data.valor_y;
                   document.getElementById('valor_intrinseco-modal').innerText = data.data.valor_intrinseco;
                    document.getElementById('valor_extrinseco-modal').innerText =  data.data.valor_extrinseco;
                    document.getElementById('valor_final-modal').innerText =  Math.round(data.data.valor_final) + '€';

                    // Mostrar las respuestas intrínsecas
                document.getElementById('tamano_fotosintetico-modal').innerHTML = `<h3 class="fw-semibold">Tamaño fotosintéticamente activo:</h3> ${formData.get('tamano_fotosintetico')}`;
                document.getElementById('estado_sanitario-modal').innerHTML = `<h3 class="fw-semibold">Estado sanitario:</h3> ${formData.get('estado_sanitario')}`;
                document.getElementById('expectativa_vida-modal').innerHTML = `<h3 class="fw-semibold">Expectativa de vida útil:</h3> ${formData.get('expectativa_vida')}`;

                // Mostrar las respuestas extrínsecas
                document.getElementById('estetico_funcional-modal').innerHTML = `<h3 class="fw-semibold">Estético y funcional:</h3> ${formData.get('estetico_funcional')}`;
                document.getElementById('representatividad_rareza-modal').innerHTML = `<h3 class="fw-semibold">Representatividad y rareza:</h3> ${formData.get('representatividad_rareza')}`;
                document.getElementById('situacion-modal').innerHTML = `<h3 class="fw-semibold">Situación:</h3> ${formData.get('situacion')}`;
                document.getElementById('factores_extraordinarios-modal').innerHTML = `<h3 class="fw-semibold">Factores extraordinarios:</h3> ${formData.get('factores_extraordinarios')}`;
                
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
            let valor_final = document.getElementById('valor_final-modal').innerText
        .replace('Valor Final: ', '')
        .replace('€', ''); 

        // Recoger valores de los elementos adicionales de intrínseco y extrínseco
        let tamano_fotosintetico = document.getElementById('tamano_fotosintetico').value;
        let estado_sanitario = document.getElementById('estado_sanitario').value;
        let expectativa_vida = document.getElementById('expectativa_vida').value;
        let estetico_funcional = document.getElementById('estetico_funcional').value;
        let representatividad_rareza = document.getElementById('representatividad_rareza').value;
        let situacion = document.getElementById('situacion').value;
        let factores_extraordinarios = document.getElementById('factores_extraordinarios').value;



         // Enviar los datos al servidor con fetch
            
         fetch("{{ route('proyectos.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    nombre: nombre,
                    descripcion: descripcion,
                    especie_id: especie_id,
                    altura: altura,
                    valor_y: valor_y,
                    tamano_fotosintetico: tamano_fotosintetico,
                    estado_sanitario: estado_sanitario,
                    expectativa_vida: expectativa_vida,
                    estetico_funcional: estetico_funcional,
                    representatividad_rareza: representatividad_rareza,
                    situacion: situacion,
                    factores_extraordinarios: factores_extraordinarios,
                    valor_intrinseco: valor_intrinseco,
                    valor_extrinseco: valor_extrinseco,
                    valor_final: valor_final,
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