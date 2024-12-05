@extends('layouts.app-user')

@section('content')

    <!-- Header-->
    <x-header-welcome title="Calcula la Norma Granada de manera fácil y precisa"
        subtitle="Optimiza el proceso de cálculo en tus proyectos y toma decisiones informadas sobre el cuidado y mantenimiento del arbolado"
        :show-buttons="true" />

        
    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center"><i
                            class="bi bi-collection"></i></div>
                    <h2 class="h4 fw-bolder">Featured title</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
                    <a class="text-decoration-none" href="#!">
                        Call to action
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center"><i
                            class="bi bi-building"></i></div>
                    <h2 class="h4 fw-bolder">Featured title</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
                    <a class="text-decoration-none" href="#!">
                        Call to action
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3 text-center"><i
                            class="bi bi-toggles2"></i></div>
                    <h2 class="h4 fw-bolder">Featured title</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
                    <a class="text-decoration-none" href="#!">
                        Call to action
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing section-->
    <section class="bg-light py-5 border-bottom" id="prices">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="fw-bolder">Pay as you grow</h2>
                <p class="lead mb-0">With our no hassle pricing plans</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <!-- Pricing card free-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Free</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">$0</span>
                                <span class="text-muted">/ mo.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    <strong>1 users</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    5GB storage
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Unlimited public projects
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Community access
                                </li>
                                <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Unlimited private projects
                                </li>
                                <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Dedicated support
                                </li>
                                <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Free linked domain
                                </li>
                                <li class="text-muted">
                                    <i class="bi bi-x"></i>
                                    Monthly status reports
                                </li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-outline-success" href="#!">Choose plan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pricing card pro-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold">
                                <i class="bi bi-star-fill text-warning"></i>
                                Pro
                            </div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">$9</span>
                                <span class="text-muted">/ mo.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    <strong>5 users</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    5GB storage
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Unlimited public projects
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Community access
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Unlimited private projects
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Dedicated support
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Free linked domain
                                </li>
                                <li class="text-muted">
                                    <i class="bi bi-x"></i>
                                    Monthly status reports
                                </li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-success" href="#!">Choose plan</a></div>
                        </div>
                    </div>
                </div>
                <!-- Pricing card enterprise-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Enterprise</div>
                            <div class="mb-3">
                                <span class="display-4 fw-bold">$49</span>
                                <span class="text-muted">/ mo.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    <strong>Unlimited users</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    5GB storage
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Unlimited public projects
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Community access
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Unlimited private projects
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    Dedicated support
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success"></i>
                                    <strong>Unlimited</strong>
                                    linked domains
                                </li>
                                <li class="text-muted">
                                    <i class="bi bi-check text-success"></i>
                                    Monthly status reports
                                </li>
                            </ul>
                            <div class="d-grid"><a class="btn btn-outline-success" href="#!">Choose plan</a>
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
                                <div class="flex-shrink-0"><i
                                        class="bi bi-chat-right-quote-fill text-success fs-1"></i></div>
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
                                <div class="flex-shrink-0"><i
                                        class="bi bi-chat-right-quote-fill text-success fs-1"></i></div>
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
                            <input class="form-control" id="name" type="text"
                                placeholder="Enter your name..." data-sb-validations="required" />
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
