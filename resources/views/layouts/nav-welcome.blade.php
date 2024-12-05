<nav x-data="{ open: false }" class="navbar navbar-expand-lg" style="background-color: #198754;">
    <div class="container-fluid px-2 mx-4">
        <!--Logo-->
        <div class="d-flex align-items-center text-white">
            <x-application-logo style="height: 100%; display: flex; "> </x-application-logo>
            <h6>TreeWorth Analytics</h6>
        </div>
        <!-- Nav items -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Nav items -->
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
            <ul class="navbar-nav ms-auto me-0 mb-2 mb-lg-0">
                @if (Auth::check())
                    <!-- Profile and Logout options -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('home') }}">{{ __('Escritorio') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Login and Register options for guest users -->
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">{{ __('Log in') }}</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white">{{ __('Register') }}</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>   