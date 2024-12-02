@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Herramientas" 
    subtitle=""
    :show-buttons="false"
    />


    <!-- Features section-->
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <!-- Norma Granada -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center">
                        <i class="bi bi-filetype-pdf"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Norma Granada</h2>
                    <p>Accede a los documentos disponibles sobre la Norma Granada.</p>
                    <x-primary-button class="mt-2" onclick="showNormaGranada()">Ver Documentos</x-primary-button>
                </div>
                
                <!-- Conversor de Unidades -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center">
                        <i class="bi bi-toggles2"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Conversor de Unidades</h2>
                    <p>Convierte las unidades de medida fácilmente usando esta herramienta.</p>
                    <x-primary-button class="mt-2" onclick="showConversor()">Ver Conversor</x-primary-button>
                </div>
                
                <!-- Mapa -->
                <div class="col-lg-4">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center">
                        <i class="bi bi-map"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Mapa de Proyectos</h2>
                    <p>Consulta las ubicaciones de tus proyectos.</p>
                    <x-primary-button class="mt-2" onclick="showMapa()">Ver Mapa</x-primary-button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Al hacer clic en los botones -->
    <!-- Tabla de documentos -->
    <div id="normaGranada" class="content-sectio"n style="display: none;">
        <div class="container px-5 my-5">
            <h1 class="display-5 my-4">Norma Granada</h1>
            <table class="table table-bordered">
                <thead class="bg-success text-white">
                    <tr>
                        <th>Año</th>
                        <th>Descripción</th>
                        <th>Enlace</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2020</td>
                        <td>Versión más reciente de la Norma Granada.</td>
                        <td><a href="{{ asset('pdfs/Norma2020.pdf') }}" target="_blank">Abrir PDF</a></td>
                    </tr>
                    <tr>
                        <td>2020</td>
                        <td>Glosario Norma Granada 2020.</td>
                        <td><a href="{{ asset('pdfs/Glosario2020.pdf') }}" target="_blank">Abrir PDF</a></td>
                    </tr>
                    <tr>
                        <td>1991</td>
                        <td>Versión anterior de la Norma Granada.</td>
                        <td><a href="{{ asset('pdfs/Norma1991.pdf') }}" target="_blank">Abrir PDF</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!--Conversor de unidades -->
    <div id="conversor" class="content-section" style="display: none;">
        <div class="container px-5 my-5">
            <h2 class="display-5 my-4">Conversor de Unidades</h2>
            <div class="row">
                <div class="col-lg-6">
                    <form id="unitConverterForm">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Cantidad</label>
                            <input type="number" id="amount" class="form-control" placeholder="Introduce la cantidad">
                        </div>
    
                        <div class="mb-3">
                            <label for="fromUnit" class="form-label">Unidad de origen</label>
                            <select id="fromUnit" class="form-select">
                                <option value="m2">Metros cuadrados (m²)</option>
                                <option value="ha">Hectáreas (ha)</option>
                                <option value="m">Metros (m)</option>
                                <option value="km">Kilómetros (km)</option>
                            </select>
                        </div>
    
                        <div class="mb-3">
                            <label for="toUnit" class="form-label">Unidad de destino</label>
                            <select id="toUnit" class="form-select">
                                <option value="m2">Metros cuadrados (m²)</option>
                                <option value="ha">Hectáreas (ha)</option>
                                <option value="m">Metros (m)</option>
                                <option value="km">Kilómetros (km)</option>
                            </select>
                        </div>
    
                        <button type="submit" class="btn btn-success">Convertir</button>
                    </form>    
                    <p class="mt-4 fw-bold" id="conversionResult"></p>
                </div>
            </div>
        </div>
    </div>

    <!--mapa-->
    <div id="mapa" class="content-section" style="display: none;">
        <div class="container px-5 my-5">
            <h3 class="display-5 my-4">Mapa de Proyectos</h3>
            <div id="map" style="height: 400px; width: 100%"></div> 
        </div>
    </div>

    <script>
        function showNormaGranada() {
    document.getElementById("normaGranada").style.display = "block";
    document.getElementById("conversor").style.display = "none";
    document.getElementById("mapa").style.display = "none";
}

function showConversor() {
    document.getElementById("normaGranada").style.display = "none";
    document.getElementById("conversor").style.display = "block";
    document.getElementById("mapa").style.display = "none";
}

function showMapa() {
    document.getElementById("normaGranada").style.display = "none";
    document.getElementById("conversor").style.display = "none";
    document.getElementById("mapa").style.display = "block";
}

//conversor
function convertUnits(amount, fromUnit, toUnit) {
        const conversions = {
            'm2': {
                'ha': amount / 10000,
                'm': amount,
                'km': amount / 1000000
            },
            'ha': {
                'm2': amount * 10000,
                'm': amount * 100,
                'km': amount / 100
            },
            'm': {
                'm2': amount,
                'ha': amount / 100,
                'km': amount / 1000
            },
            'km': {
                'm2': amount * 1000000,
                'ha': amount * 100,
                'm': amount * 1000
            }
        };

        return conversions[fromUnit][toUnit] || amount;
    }

    // envío
    document.getElementById('unitConverterForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const amount = parseFloat(document.getElementById('amount').value);
        const fromUnit = document.getElementById('fromUnit').value;
        const toUnit = document.getElementById('toUnit').value;

        if (isNaN(amount)) {
            document.getElementById('conversionResult').textContent = 'Por favor, ingresa una cantidad válida.';
        } else {
            const result = convertUnits(amount, fromUnit, toUnit);
            document.getElementById('conversionResult').textContent = `${amount} ${fromUnit} es igual a ${result} ${toUnit}.`;
        }
    });

    //mapa

    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 40.4168, lng: -3.7034 }, // Madrid
            zoom: 13
        });
    }

    </script>
    
    @endsection