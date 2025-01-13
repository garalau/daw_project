  
    <p><strong>Nombre:</strong> {{ $nombre }}</p>
    <p><strong>Descripción:</strong> {{ $descripcion }}</p>
    <p><strong>Especie:</strong> {{ $especie }}</p>
    <p><strong>Altura:</strong> {{ $altura }} metros</p>
    <p><strong>Valor Intrínseco:</strong> {{ $valor_intrinseco }}</p>
    <p><strong>Valor Extrínseco:</strong> {{ $valor_extrinseco }}</p>
    <p><strong>Valor Final:</strong> {{ $valor_final }}</p>

    <!-- Botón para guardar -->
    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <input type="hidden" name="nombre" value="{{ $nombre }}">
        <input type="hidden" name="descripcion" value="{{ $descripcion }}">
        <input type="hidden" name="valor_final" value="{{ $valor_final }}">
        <button type="submit" class="btn btn-success mt-4">Guardar</button>
    </form>

