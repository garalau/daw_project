@extends('layouts.app-user')

@section('content')
<!-- Header-->
<x-header-welcome 
    title="Foro de Dudas" 
    subtitle="Explora preguntas y comparte tus conocimientos" 
    :show-buttons="false"
/>

<x-navproject />

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <!-- Botón para abrir el formulario -->
            @auth
            <button id="toggleForm" class="btn btn-success w-100 mb-3">Nueva Duda</button>
            
            <!-- Formulario para publicar una duda -->
            <form id="newQuestionForm" action="{{ route('forum.storeQuestion') }}" method="POST" style="display: none;">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Descripción</label>
                    <textarea name="body" id="body" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100">Publicar</button>
            </form>
            @endauth

            <!-- Listado de preguntas -->
            <div class="mt-4">
                @foreach ($questions as $question)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('forum.show', $question->id) }}" class="text-decoration-none text-dark">
                                {{ $question->title }}
                            </a>
                        </h5>
                        <p class="card-text text-truncate">{{ $question->body }}</p>
                        <p class="text-muted">
                            Publicado por {{ $question->user->name }} - {{ $question->created_at->diffForHumans() }}
                        </p>
                        <p>
                            <a href="{{ route('forum.show', $question->id) }}" class="btn btn-link text-success p-0">
                                {{ $question->repliesIncludingNested()->count() }} respuesta(s)
                            </a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center">
                {{ $questions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleFormButton = document.getElementById('toggleForm');
        const newQuestionForm = document.getElementById('newQuestionForm');

        toggleFormButton.addEventListener('click', () => {
            newQuestionForm.style.display = newQuestionForm.style.display === 'none' ? 'block' : 'none';
        });
    });
</script>
@endsection
