@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Conócenos" 
    subtitle="Descubre nuestros valores y cómo podemos ayudarte"
    :show-buttons="!auth()->check()"
    />


    <!-- Features section-->
    <section class="py-4 border-bottom" id="features">
        <div class="container px-5 my-5">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="fw-bold mb-2 fs-4">Nuestra Historia</h2>
                    <p>
                        En <strong>TreeWorth Analytics</strong>, nuestra misión es simplificar y automatizar el proceso de valoración del arbolado ornamental siguiendo las directrices de la <strong>Norma Granada</strong>.
                        Creemos en el poder de la tecnología para transformar la gestión medioambiental, proporcionando herramientas digitales precisas, fiables e intuitivas.
                    </p>
                    <p>
                        Nuestra herramienta está diseñada para optimizar el tiempo y los recursos de los profesionales: Priorizamos la precisión en los cálculos, la facilidad de uso y la actualización constante según las normativas vigentes. 
                        Con una interfaz intuitiva y funcionalidades avanzadas como la exportación de informes y la integración de datos en tiempo real, queremos empoderar a los profesionales para enfrentar los retos actuales y futuros en la gestión de espacios verdes.
                    </p>
                </div>
                <div class="col-md-6 p-3">
                    <img src="{{ asset('images/empresa.jpg') }}" alt="Nuestra Historia" class="img-fluid rounded shadow mx-auto" style="height:300px">
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-6">
                    <img src="{{ asset('images/valores.jpg') }}" alt="Valores" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6 p-3">
                    <h5 class="fw-bold mb-2 fs-4">Nuestros Valores</h5>
                    <ul>
                        <li><strong>Innovación:</strong> Adaptamos las últimas tecnologías para garantizar herramientas eficientes y vanguardistas.</li>
                        <li><strong>Sostenibilidad:</strong> Promovemos la conservación del medio ambiente a través de la gestión responsable.</li>
                        <li><strong>Precisión:</strong> Nos aseguramos de que nuestros cálculos y análisis cumplan con los más altos estándares.</li>
                        <li><strong>Compromiso Ambiental:</strong> Trabajamos para contribuir a un mundo más verde y sostenible.</li>
                    </ul>
                </div>
            </div>
            <div class="text-center my-4">
                <h2 class="fw-bold mb-2 fs-4">¿Por qué elegirnos?</h2>
                <p>
                    En TreeWorth Analytics, automatizamos cálculos complejos, ofrecemos soporte 24/7 y garantizamos actualizaciones continuas 
                    según los cambios normativos. Únete a nosotros y marca la diferencia en la valoración ambiental.
                </p>
            </div>
        </div>
    </section>
    @endsection