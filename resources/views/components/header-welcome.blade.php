<header class="py-5" style="position: relative;"> 
    <!-- Overlay -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.65); z-index: 1;"></div>

    <!-- Background image -->
    <div style="background-image: url('{{ asset('images/background.jfif') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 0;"></div>

    <!-- Content -->
    <div class="container px-5" style="position: relative; z-index: 2;">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <!-- Dynamic titles -->
                    <h1 class="display-5 fw-bolder text-white mb-2">{{ $title }}</h1>
                    <p class="lead text-white-50 mb-4 fw-semibold">{{ $subtitle }}</p>
                    
                    <!-- Conditional buttons -->
                    @if ($showButtons)
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-success btn-lg px-4 me-sm-3" href="#prices">Hazte Socio</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#contact">Contacto</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
