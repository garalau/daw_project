@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Mis Proyectos" 
    subtitle=""
    :show-buttons="!auth()->check()"
    />

    <x-navproject></x-navproject>

    <div class="container my-5">
        <div class="row">
            <!-- Listado de Noticias -->
            <div class="col-md-12">
                <div id="news-list" class="row row-cols-1 row-cols-md-3 g-4">
                    <p>PROYECTOS</p>
                </div>
            </div>         
        </div>
    </div>
@endsection   
    