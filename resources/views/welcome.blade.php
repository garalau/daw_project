@extends('layouts.app-user')

@section('content')
    <!-- Header-->
    <x-header-welcome title="Calcula la Norma Granada de manera fácil y precisa"
        subtitle="Optimiza el proceso de cálculo en tus proyectos y toma decisiones informadas sobre el cuidado y mantenimiento del arbolado"
        :show-buttons="!auth()->check()" />


    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center">
                        <i class="bi bi-tree"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Valoración Arborícola</h2>
                    <p>Automatización del cálculo del valor de arbolado ornamental siguiendo las directrices de la norma
                        Granada, asegurando precisión y cumplimiento normativo.</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Cálculos Personalizados</h2>
                    <p>Integración de índices correctores y factores específicos para garantizar un análisis adaptado a cada
                        proyecto de arboricultura.</p>
                </div>
                <div class="col-lg-4">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Reportes Detallados</h2>
                    <p>Generación de reportes profesionales en formatos como PDF y Excel para facilitar la comunicación y el
                        análisis de resultados.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing section solo si no estas registrado-->
    @guest
        <section class="bg-light py-5 border-bottom" id="prices">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Planes Flexibles para Profesionales</h2>
                    <p class="lead mb-0">Elige el plan que se ajuste a tus necesidades</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- Plan Básico -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5 d-flex flex-column">
                                <div class="small text-uppercase fw-bold text-muted">Básico</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">25€</span>
                                    <span class="text-muted">/ mes</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li><i class="bi bi-check text-success"></i> Cálculo esencial</li>
                                    <li><i class="bi bi-check text-success"></i> Reportes básicos</li>
                                    <li class="text-muted"><i class="bi bi-x"></i> Actualizaciones avanzadas</li>
                                    <li class="text-muted"><i class="bi bi-x"></i> Soporte prioritario</li>
                                </ul>
                                <div class="mt-auto d-grid"><a class="btn btn-outline-success" href="#!">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Plan Premium -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5 d-flex flex-column">
                                <div class="small text-uppercase fw-bold">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    Premium
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">40€</span>
                                    <span class="text-muted">/ mes</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li><i class="bi bi-check text-success"></i> Herramientas avanzadas</li>
                                    <li><i class="bi bi-check text-success"></i> Reportes en Excel/PDF</li>
                                    <li><i class="bi bi-check text-success"></i> Soporte técnico prioritario</li>
                                    <li><i class="bi bi-check text-success"></i> Actualizaciones automáticas</li>
                                </ul>
                                <div class="mt-auto d-grid"><a class="btn btn-success" href="#!">Seleccionar</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Plan Pago por Uso -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="card h-100 mb-5 mb-xl-0">
                            <div class="card-body p-5 d-flex flex-column">
                                <div class="small text-uppercase fw-bold text-muted">Pago por Uso</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">10€</span>
                                    <span class="text-muted">/ uso</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li><i class="bi bi-check text-success"></i> Acceso completo a cálculos</li>
                                    <li><i class="bi bi-check text-success"></i> Reportes detallados (PDF/Excel)</li>
                                    <li><i class="bi bi-check text-success"></i> Sin compromiso de suscripción</li>
                                    <li class="text-muted"><i class="bi bi-x"></i> Soporte prioritario</li>
                                </ul>
                                <div class="mt-auto d-grid"><a class="btn btn-outline-success" href="#!">Pagar por Uso</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
    
    <!-- Testimonials section-->
    <section class="py-5 border-bottom">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Reseñas de nuestros usuarios</h2>
                <p class="lead mb-0">Profesionales satisfechos confirman: nuestra herramienta hace la diferencia</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- Testimonial 1-->
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-success fs-1"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">
                                        "Llevo años trabajando en proyectos relacionados con el arbolado urbano, y la
                                        aplicación para la norma Granada ha sido un cambio
                                        radical en mi día a día. Antes, calcular el valor ornamental de los árboles
                                        requería horas de trabajo y revisiones constantes.
                                        Ahora el proceso es rápido, intuitivo y preciso."
                                    </p>
                                    <div class="small text-muted"> -Laura Garay, Barcelona</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2-->
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-success fs-1"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">
                                        "Como ingeniero agrónomo, aplico la norma Granada en muchos proyectos de obra
                                        pública. Esta aplicación no solo me ha facilitado los cálculos,
                                        sino que también me ha permitido centralizar toda la información de mis
                                        proyectos en un solo lugar. La posibilidad de guardar datos y exportar
                                        documentos ha
                                        sido un plus increíble. Me sorprendió lo fácil que es de usar, incluso para
                                        alguien que no es experto en tecnología. Definitivamente la recomiendo!"
                                    </p>
                                    <div class="small text-muted">- Miguel de la Rubia, Huesca</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endguest
    <!-- Contact section-->
    <section class="bg-light py-5" id="contact">
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i>
                </div>
                <h2 class="fw-bolder">Contáctanos</h2>
                <p class="lead mb-0">Nos encantaría saber de ti</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."
                                data-sb-validations="required" />
                            <label for="name">Nombre</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">Se requiere un nombre.
                            </div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com"
                                data-sb-validations="required,email" />
                            <label for="email">Correo electrónico</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">Se requiere un correo.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">El correo no es válido.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890"
                                data-sb-validations="required" />
                            <label for="phone">Número de teléfono</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Se requiere un número de
                                teléfono.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..."
                                style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Mensaje</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Se requiere un mensaje.
                            </div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">El mensaje se ha enviado correctamente!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error al enviar el mensaje!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-success btn-lg disabled" id="submitButton"
                                type="submit">Enviar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
