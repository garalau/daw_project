<nav x-data="{ open: false }" class="navbar navbar-expand-lg" style="background-color: #198754;">
    <div class="container-fluid px-2 mx-4">
        <!-- Logo enlace -->
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="d-flex align-items-center text-white text-decoration-none">
                <x-application-logo style="height: 100%; display: flex;"> </x-application-logo>
                <h6 class="ms-2">TreeWorth Analytics</h6>
            </a>
        </div>
        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ms-5 mb-2 mb-lg-0">
                <li class="nav-item fw-bold">
                    <x-navuser-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        {{ __('Inicio') }}
                    </x-navuser-link>
                </li>
                <li class="nav-item fw-bold">
                    <x-navuser-link :href="route('conocenos')" :active="request()->routeIs('conocenos')">
                        {{ __('Conócenos') }}
                    </x-navuser-link>
                </li>
                <li class="nav-item fw-bold">
                    <x-navuser-link :href="route('noticias')" :active="request()->routeIs('noticias')">
                        {{ __('Noticias') }}
                    </x-navuser-link>
                </li>
                <li class="nav-item fw-bold">
                    <x-navuser-link :href="route('herramientas')" :active="request()->routeIs('herramientas')">
                        {{ __('Herramientas') }}
                    </x-navuser-link>
                </li>
            </ul>
            <!-- Opciones perfil usuarios registrados-->
            <ul class="navbar-nav ms-auto me-0 mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('home') }}">{{ __('Escritorio') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Perfil') }}</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Cerrar sesión') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Login y Register invitados -->
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">{{ __('Iniciar sesión') }}</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white">{{ __('Registrarse') }}</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
