<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Legalpol</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">


        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles     <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->


   @yield('scripts')

    <style type="text/css">
      
      .btn {
      margin-top: 0;
      }

    </style>

  </head>


 <body>
   <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"> </div>
        </div>
        <p>Cargando...</p>
      </div>
    </div>
    <div class="page">
      <header class="page-head">
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner">
              
              <div class="rd-navbar-group">
                <div class="rd-navbar-panel">
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <a class="rd-navbar-brand brand" href="{{ route('inicio')}}">
                      <img src="{{ route('inicio')}}/images/logo-default-143x27.png" alt="" width="143" height="27"/></a>
                </div>
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-nav-inner">
                    <!--<div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="{{ route('consultar')}}">Consultar</a></div> -->
                    <ul class="rd-navbar-nav">
                      <li class="active"><a href="{{ route('inicio')}}">Inicio</a>
                      </li>
                      <li><a href="#">Sobre nosotros</a>
                      </li>
                    <!--    <li><a href="{{ route('consultar')}}">Contacto</a>
                      </li>-->
                      <li><a href="/eventos">Mis consultas</a>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else

                         <li class="nav-item">
                                    <a class="nav-link" href="{{ route('inicio') }}/perfil/{{ auth()->user()->id }}">{{ auth()->user()->name }} {{ auth()->user()->surname }}</a>
                         </li>
                         <li class="nav-item">
                             <div class="rd-navbar-btn-wrap">  
                                    
                                    <a class="button button-smaller button-primary-outline" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('cerrar sesión') }}
                                    </a></div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>   


<!--tipo esto es lo que cambia nomas-->
  @yield('inicio')
  @yield('profile')
  
  @yield('consulta')
  @yield('consultarealizada')
  @yield('content')
  @yield('formulario')
<!--tipo esto es lo que cambia nomas-->

<!-- FOOTER -->
<div class="clearfix"></div>

<footer class="mt-5">
  
  <div class="container-fluid bg-dark py-3">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-9">
          <p class="text-white">2020&copy Sistemas Americo.</p>
        </div>
        <div class="col-md-3">
          <div class="d-inline-block">
            <div class="bg-circle-outline d-inline-block">
              <a href="https://www.facebook.com/" class="text-white"><i class="fa fa-2x fa-fw fa-facebook"></i>
              </a>
            </div>

              <a href="https://twitter.com/" class="text-white">
                <i class="fa fa-2x fa-fw fa-instagram"></i></a>
            </div>

            <div class="bg-circle-outline d-inline-block">
            <div class="bg-circle-outline d-inline-block">
              <a href="https://www.linkedin.com/company/" class="text-white">
                <i class="fa fa-2x fa-fw fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="{{ asset('../../js/core.min.js') }}" defer></script> 
    <script src="{{ asset('../../js/script.js') }}" defer></script>
      

        
      
  </body>
@yield('modal')
</html>
