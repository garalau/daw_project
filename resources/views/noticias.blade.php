@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Noticias" 
    subtitle="Consulta las últimas actualizaciones ambientales y paisajísticas"
    :show-buttons="!auth()->check()"
    />

    <div class="container my-5">
        <div class="row">
            <!-- Listado de Noticias -->
            <div class="col-md-12">
                <div id="news-list" class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $item)
                    <div class="col mb-3">
                        <div class="card h-100 d-flex flex-column news-item" data-id="{{ $item->id }}" style="cursor: pointer;">
                            <div class="card-body d-flex flex-column">
                                <!-- Imagen de la noticia -->
                                @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid mb-3" alt="{{ $item->title }}">
                                @endif           
                                <!-- Título -->
                                <h5 class="card-title fs-4 fw-bold">{{ $item->title }}</h5>                               
                                <!-- Descripción breve -->
                                <p class="card-text mb-2">{{ $item->description }}</p>
                                <a href="#" class="btn btn-success btn-sm mt-auto">Ver noticia</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>            
    
            <!-- Detalles de la Noticia -->
            <div class="col-md-8 mx-auto">
                <div id="news-details" class="d-none p-4 border border-success rounded ">
                    <h2 id="news-title" class="fs-4 fw-bold mb-4 text-center"></h2>                   
                    <!-- Imagen de la noticia seleccionada -->
                    <img id="news-image" class="img-fluid mb-3 d-none" alt="Noticia" style="max-width: 80%; margin: 0 auto; display: block;">                    
                    <!-- Contenido -->
                    <p id="news-content" class="text-justify"></p>
                    <button id="back-to-list" class="btn btn-secondary mt-3">Volver</button>
                </div>
            </div>
            
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const newsList = document.getElementById('news-list');
            const newsDetails = document.getElementById('news-details');
            const backToList = document.getElementById('back-to-list');
            
            newsList.addEventListener('click', (e) => {
                const card = e.target.closest('.news-item');
                if (!card) return;
    
                const newsId = card.getAttribute('data-id');
                
                fetch(`/noticias/${newsId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Cargar los detalles
                        document.getElementById('news-title').innerText = data.title;
                        document.getElementById('news-content').innerText = data.content;
                        
                        // Cargar la imagen
                        const newsImage = document.getElementById('news-image');
                        if (data.image) {
                            newsImage.src = `/storage/${data.image}`;
                            newsImage.classList.remove('d-none');
                        } else {
                            newsImage.classList.add('d-none');
                        }
    
                        // Mostrar los detalles y ocultar el listado
                        newsDetails.classList.remove('d-none');
                        newsList.parentElement.classList.add('d-none');

                    })
                    .catch(error => console.error('Error:', error));
            });
    
            backToList.addEventListener('click', () => {
                // Volver al listado de noticias
                newsDetails.classList.add('d-none');
                newsList.parentElement.classList.remove('d-none');
            });
        });
    </script>
@endsection