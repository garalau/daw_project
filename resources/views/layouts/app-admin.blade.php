<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="bg-light"> 

        <div class="d-flex">
            <!-- Barra lateral -->
            <div class="bg-dark text-white" style="width: 250px; height: 100vh; position: fixed; padding-top: 20px;">
                <h2 class="text-center mb-4">Administración</h2>
                <ul class="nav flex-column px-2">
                    <li class="nav-item border-bottom border-white">
                        <a href="{{ route('users') }}" class="nav-link text-white ms-3">
                            <i class="bi bi-person-lines-fill"></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item border-bottom border-white">
                        <a href="{{ route('news') }}" class="nav-link text-white ms-3">
                            <i class="bi bi-newspaper"></i> Noticias
                        </a>
                    </li>
                </ul>
            </div>
        
            <!-- Contenido principal -->
            <div class="flex-grow-1" style="margin-left: 250px;">
                <!-- Barra de navegación -->
                @include('layouts.nav-admin')
                <!-- Header -->
                <header class="bg-white shadow-md py-4">
                    <div class="container px-4 sm:px-6 lg:px-8 ms-4">
                        @yield('header')
                    </div>
                </header>

                <!-- Contenido -->
                <main class="p-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-white shadow mt-auto">
        <div class="container text-center">
            <p class="m-0">&copy; TreeWorth Analytics 2023</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

