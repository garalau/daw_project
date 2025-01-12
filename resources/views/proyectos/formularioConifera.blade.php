<h1>Calcular Valor Ornamentístico de la Conífera</h1>
    
        <!-- Formulario para calcular el valor de la conífera -->
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
                <button type="submit" class="btn btn-primary">Calcular Valor</button>
            </div>
        </form>
    </div>