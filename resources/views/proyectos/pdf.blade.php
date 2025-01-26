<!DOCTYPE html>
<html>
<head>
    <title>Proyecto PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .title { text-align: center; font-weight: bold; font-size: 24px; }
        .content { margin: 20px; }
    </style>
</head>
<body>
    <div class="title">Proyecto: {{ $proyecto->nombre }}</div>
    <div class="content">
        <p><strong>Descripción:</strong> {{ $proyecto->descripcion }}</p>
        <p><strong>Altura:</strong> {{ $proyecto->altura }} m</p>
        <p><strong>Especie:</strong> {{ $proyecto->especie->nombre_cientifico ?? 'No asignada' }}</p>
        <p><strong>Valor Intrínseco:</strong> {{ $proyecto->valor_intrinseco }}</p>
        <p><strong>Valor Extrínseco:</strong> {{ $proyecto->valor_extrinseco }}</p>
        <p><strong>Valor Final:</strong> {{ number_format($proyecto->valor_final, 2, ',', '.') }} €</p>
    </div>
</body>
</html>