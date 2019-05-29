@extends('laracrud::layouts.auth')

@section('title', 'Home')
@section('child-content')
<link rel="stylesheet" href="{{ asset('css/one-page-wonder.css') }}">
            <header class="masthead text-center text-white h-100 bg-light">
                  <div class="masthead-content">
                    <div class="container">
                      <h1 class="masthead-heading mb-0">Gestion de Horarios</h1>
                      <h2 class="masthead-subheading mb-0">Sistema Facil y Flexible</h2>
                    </div>
                  </div>
                  <div class="bg-circle-1 bg-circle"></div>
                  <div class="bg-circle-2 bg-circle"></div>
                  <div class="bg-circle-3 bg-circle"></div>
                  <div class="bg-circle-4 bg-circle"></div>
                </header>
                <img style="width:100%;margin-top:0px;margin-bottom:80px;" src="img/00.jpg" alt="">
                <hr>
                <section>
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-lg-6 order-lg-2">
                        <div class="p-5">
                          <img class="img-fluid rounded-circle" src="img/01.jpg" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                          <h2 class="display-4">Mision</h2>
                          <p>
                              El SENA está encargado de cumplir la función que le corresponde al Estado de invertir en el desarrollo social y técnico de los trabajadores colombianos, ofreciendo y ejecutando la formación profesional integral, para la incorporación y el desarrollo de las personas en actividades productivas que contribuyan al desarrollo social, económico y tecnológico del país
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                <section>
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-lg-6">
                        <div class="p-5">
                          <img class="img-fluid rounded-circle" src="img/02.jpg" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="p-5">
                          <h2 class="display-4">Vision</h2>
                          <p>
                              El SENA será reconocido por la efectividad de su gestión, sus aportes al empleo decente y a la generación de ingresos, impactando la productividad de las personas y de las empresas; que incidirán positivamente en el desarrollo de las regiones como contribución a una Colombia educada, equitativa y en paz
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <!--
                <section>
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-lg-6 order-lg-2">
                        <div class="p-5">
                          <img class="img-fluid rounded-circle" src="img/03.jpg" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                          <h2 class="display-4">Let there be rock!</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              -->
                <!-- Footer -->
                <footer class="py-5 bg-black">
                  <div class="container">
                    <p class="m-0 text-center text-white small">Copyright &copy; Yodaris, Nayeth 2019</p>
                  </div>
                  <!-- /.container -->
                </footer>

                      </div>
    </div>
@endsection
