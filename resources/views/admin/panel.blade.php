@extends('layouts.app-admin')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Panel de Administración') }}
    </h2>
@endsection

    @section('content')
    <!-- Mensaje de bienvenida en el centro -->
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="text-center">
            <h1 class="display-4">¡Bienvenido al Panel de Administración!</h1>
            <p class="lead">Aquí puedes gestionar tu aplicación web.</p>
        </div>
    </div>
@endsection
    




