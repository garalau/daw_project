<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" name="description" id="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea class="form-control" name="content" id="content" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Seleccionar Imagen</label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Crear Noticia</button>
</form>

<!--control de noticias, añadir y modificar-->
