@extends('layouts.app-user')

@section('content')
<!-- Header-->
<x-header-welcome 
title="Bienvenid@ {{ Auth::user()->name }}"
subtitle=""
:show-buttons="false"
/>

<section class="py-5 border-bottom" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center"><i class="bi bi-file-earmark-plus"></i></div>
                <h2 class="h4 fw-bolder">NUEVO PROYECTO</h2>
                <p>Comienza un nuevo proyecto desde cero.</p>
                <a class="text-decoration-none" href="#!">
                    Acceder
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center"><i class="bi bi-collection"></i></div>
                <h2 class="h4 fw-bolder">CARPETA DE PROYECTOS</h2>
                <p>Explora tus proyectos almacenados.</p>
                <a class="text-decoration-none" href="#!">
                    Acceder
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-4">
                <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center"><i class="bi bi-book"></i></div>
                <h2 class="h4 fw-bolder">DOCUMENTOS Y RECURSOS</h2>
                <p>Accede a tus documentos y materiales necesarios.</p>
                <a class="text-decoration-none" href="#!">
                    Acceder
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection