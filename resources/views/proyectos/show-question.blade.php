@extends('layouts.app-user')

@section('content')
<!-- Header -->
<x-header-welcome 
    title="Respuestas" 
    subtitle="{{ $question->title }}" 
    :show-buttons="false"
/>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <!-- Botón Volver -->
            <div class="mb-4">
                <a href="{{ route('forum.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Foro
                </a>
            </div>

            <!-- Detalle de la Duda -->
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $question->title }}</h3>
                    <p class="card-text">{{ $question->body }}</p>
                    <p class="text-muted">Publicado por {{ $question->user->name }} - {{ $question->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <!-- Listado de Respuestas -->
            @if ($question->replies->count())
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">Respuestas ({{ $question->repliesIncludingNested->count() }})</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($question->replies as $reply)
                        <li class="list-group-item">
                            <p class="mb-1">{{ $reply->body }}</p>
                            <small class="text-muted">Respondido por {{ $reply->user->name }} - {{ $reply->created_at->diffForHumans() }}</small>

                            <!-- Botón para mostrar formulario de respuesta anidada -->
                            @auth
                            <button class="btn btn-link text-success btn-sm text-decoration-none toggleReplyForm mt-2">
                                <i class="fas fa-reply"></i> Responder
                            </button>
                            <form action="{{ route('forum.storeNestedReply', $reply->id) }}" method="POST" style="display: none;" class="nestedReplyForm mt-3">
                                @csrf
                                <textarea name="reply" class="form-control mb-2" rows="2" placeholder="Escribe tu respuesta..." required></textarea>
                                <button type="submit" class="btn btn-success btn-sm">Responder</button>
                            </form>
                            @endauth

                            <!-- Respuestas anidadas dentro de la respuesta original -->
                            @if ($reply->nestedReplies->count())
                            <ul class="list-group mt-3">
                                @foreach ($reply->nestedReplies as $nestedReply)
                                    <li class="list-group-item bg-light">
                                        <p class="mb-1">{{ $nestedReply->body }}</p>
                                        <small class="text-muted">Respondido por {{ $nestedReply->user->name }} - {{ $nestedReply->created_at->diffForHumans() }}</small>

                                        <!-- Respuestas anidadas dentro de la respuesta anidada -->
                                        @if ($nestedReply->nestedReplies->count())
                                            <ul class="list-group mt-3">
                                                @foreach ($nestedReply->nestedReplies as $nestedNestedReply)
                                                    <li class="list-group-item bg-light">
                                                        <p class="mb-1">{{ $nestedNestedReply->body }}</p>
                                                        <small class="text-muted">Respondido por {{ $nestedNestedReply->user->name }} - {{ $nestedNestedReply->created_at->diffForHumans() }}</small>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        <!-- Botón para responder a la respuesta anidada -->
                                        @auth
                                            <button class="btn btn-link text-success btn-sm text-decoration-none toggleNestedReplyForm mt-2">
                                                <i class="fas fa-reply"></i> Responder
                                            </button>
                                            <form action="{{ route('forum.storeNestedReply', $nestedReply->id) }}" method="POST" style="display: none;" class="nestedReplyForm mt-3">
                                                @csrf
                                                <textarea name="reply" class="form-control mb-2" rows="2" placeholder="Escribe tu respuesta..." required></textarea>
                                                <button type="submit" class="btn btn-success btn-sm">Responder</button>
                                            </form>
                                        @endauth
                                    </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @else
            <p class="text-center my-4">No hay respuestas aún. ¡Sé el primero en responder!</p>
            @endif

            <!-- Responder a la Duda -->
            @auth
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Añadir una Respuesta</h5>
                    <form action="{{ route('forum.storeReply', $question->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="reply" class="form-control" rows="4" placeholder="Escribe tu respuesta..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Responder</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleForms = (className) => {
            document.querySelectorAll(className).forEach(button => {
                button.addEventListener('click', () => {
                    const form = button.nextElementSibling;
                    form.style.display = form.style.display === 'none' ? 'block' : 'none';
                });
            });
        };
        toggleForms('.toggleReplyForm'); // Para respuestas principales
        toggleForms('.toggleNestedReplyForm'); // Para respuestas anidadas
    });
</script>
@endsection
