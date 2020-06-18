
@extends('plantilla')

@section('inicio')

<?php
use App\Http\Controllers\AbogadosController;
$control = new AbogadosController();
$data = $control->show();

?>
            <section>
        <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true">
          <div class="swiper-wrapper text-center">
       <!--     <div class="swiper-slide" data-slide-bg="assets/img/home-slider-slide-.jpg">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">Con nuestros servicios</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Obtendrá un amplio soporte legal</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Tenemos años de experiencia en la prestación de asistencia jurídica en diversas esferas del derecho.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">¡Quiero hacer una consulta!</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
         <!--      <div class="swiper-slide" data-slide-bg="assets/img/home-slider-slide-.jpg">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">Con nuestros servicios</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Obtendrá un amplio soporte legal</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Tenemos años de experiencia en la prestación de asistencia jurídica en diversas esferas del derecho.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">¡Quiero hacer una consulta!</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <div class="swiper-slide" data-slide-bg="images/home-slider-slide-.jpg">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">Con nuestros servicios</h3>
                      </div>
                      <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Obtendrá un amplio soporte legal</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Tenemos años de experiencia en la prestación de asistencia jurídica en diversas esferas del derecho.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#lawyers">¡Quiero hacer una consulta!</a></div> <!-- !!!!!!!!!!!!!!bajar -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </section>

      <section id="lawyers" class="section-60 section-lg-100">
        <div class="container">
          <hr>
          <h2 class="text-center">Selecciona un abogado</h2><hr>
          <div  class="row row-40 align-items-sm-end"><!--lista de abogados -->


           
           @foreach($data as $abo)
          
           <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                   <?php 
                        $foto = 0;
                        //$foto = $abo->id;
                      ?>
                  <figure class="thumbnail-image"><img src="images/perfil/{{$foto}}.jpg" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                     <div class="link-group"><span class="  "></span><a class="link-white" href="{{ route('profile', ['id' => $abo->id]) }}">PERFIL</a></div>
                        <!-- <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="{{ route('eventos.get', ['idabogado' => $abo->id]) }}">CONSULTAR</a></div> -->
                        <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="{{ route('home', ['id' => $abo->id]) }}">CONSULTAR</a></div>
                        <!-- Cambie esto para que primero se pague antes de la consulta -->
                  </div>
                  
                
                    
                  
                <div class="thumbnail-caption">
                    <p class="text-header"><a href="{{ route('profile', ['id' => $abo->id]) }}">{{$abo->name}} {{$abo->surname}}</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">{{$abo->specialty}}</p>
                  </div> 
                </div>
              </div>
            </div>
          @endforeach
           <div class="col-sm-6 col-md-12 col-lg-3 text-center">
              <div class="block-wrap-1">
                <div class="block-number">1</div>
                <h3 class="text-normal">Expertos</h3>
                <p class="h5 h5-smaller text-style-4">Los mejores en sus campos</p>
                <p>Contacta el abogado que desees para realizar una consulta.</p><a class="link link-group link-group-animated link-bold link-secondary" href="#">
              </div>
              <a href="{{route('lista')}}" class="btn-lg btn-primary"> Ver más abogados</a>
             </div>

<!--
           <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="images/team-9-246x300.jpg" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                
                    
                  </div>
                <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">Amanda Smith</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Paralegal</p>
                  </div> 
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="images/team-10-246x300.jpg" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                     <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="#">PERFIL</a></div>
                        <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="#">CONSULTAR</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">John Doe</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Attorney</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="images/team-11-246x300.jpg" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">+1 (409) 987–5874</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">info@demolink.org</a></div>
                  </div>
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">Vanessa Ives</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Legal Assistant</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-3 text-center">
              <div class="block-wrap-1">
                <div class="block-number">06</div>
                <h3 class="text-normal">Experts</h3>
                <p class="h5 h5-smaller text-style-4">in Their Fields</p>
                <p>If you or your business is facing a legal challenge, contact us today to arrange a free initial consultation with an attorney.</p><a class="link link-group link-group-animated link-bold link-secondary" href="#"><span>Read more</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
              </div>
            </div>

          -->

          </div>
        </div>

      </section>

          
           
             
                <a class="link link-group link-group-animated link-bold link-secondary" href="#"></a>
              
     



      <!-- <section class="section-60 section-lg-100">
        <div class="container">
          <div class="row row-40 align-items-sm-end">
           <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div>
            // <div class="thumbnail thumbnail-variant-2">
                    <figure class="thumbnail-image"><img src="assets/img/team-9-246x300.jpg" alt="" width="246" height="300"/>
                  </figure>-
                    <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">+1 (409) 987–5874</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">info@demolink.org</a></div>
                  </div> //
                  <div>
              //  <div class="thumbnail-caption">
                     <p class="text-header"><a href="#">Amanda Smith</a></p>
                    <div class="divider divider-md bg-teak"></div>
                  <p class="text-caption">Paralegal</p>//
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="images/team-10-246x300.jpg" alt="" width="246" height="300"/>
                  </figure>
              //   <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">+1 (409) 987–5874</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">sebastian@gmail.com</a></div>
                  </div>//
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#">Sebastián Daniel Lafuente</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Abogado penalista</p>
                  </div>
                </div>
              </div>
            </div>
           <div class="col-sm-6 col-md-4 col-lg-1">
            <div>
              <div class="thumbnail-variant-2-wrap">
          //    <div class="thumbnail thumbnail-variant-2">
                 <figure class="thumbnail-image"><img src="assets/img/team-11-246x300.jpg" alt="" width="246" height="300"/>
                  </figure>
                  <div class="thumbnail-inner">
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary material-icons-local_phone"></span><a class="link-white" href="tel:#">+1 (409) 987–5874</a></div>
                    <div class="link-group"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span><a class="link-white" href="mailto:#">info@demolink.org</a></div>
                  </div> //
                  <div>
                 // <div class="thumbnail-caption">
                      <p class="text-header"><a href="#">Vanessa Ives</a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption">Legal Assistant</p> //
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-2 text-center">
              <div class="block-wrap-1">
                <div class="block-number">01</div>
                <h3 class="text-normal">Experto</h3>
                <p class="h5 h5-smaller text-style-4">en su campo</p>
                <p>Si usted o su empresa se enfrentan a un desafío legal, contáctenos hoy para concertar una consulta inicial gratuita con un abogado.</p><a class="link link-group link-group-animated link-bold link-secondary" href="consulta.php"><span>Hace tu consulta</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
              </div>
            </div>
          </div>
        </div>
      </section>-->
       


<section class="bg-displaced-wrap">
        <div class="bg-displaced-body">
          <div class="container">
            <div class="inset-xl-left-70 inset-xl-right-70">
              <article class="box-cart bg-ebony-clay">
                <div class="box-cart-image"><img src="images/home-2-342x338.jpg" alt="" width="342" height="338"/>
                </div>
                <div class="box-cart-body">
                  <blockquote class="blockquote-complex blockquote-complex-inverse">
                    <h3>Sobre nosotros</h3>
                    <p>
                      <q>
                        Cuando coloca su caso en manos de nuestros abogados y asistentes legales, está colocando su caso en manos de profesionales comprometidos a lograr el mejor resultado posible.</q>
                    </p>
                    <div class="quote-footer">
                      <cite>Sebastián Daniel Lafuente</cite><small>Legalpol</small>
                    </div>
                  </blockquote>
                  <div class="button-wrap inset-md-left-70"><a class="button button-responsive button-medium button-primary-outline-v2" href="#">¡Quiero unirme a Consultorio Legal! </a></div>
                </div>
              </article>
            </div>
          </div>
        </div>
        <div class="bg-displaced bg-image" style="background-image: url(images/home-1.jpg);"></div>
      </section>


@endsection


