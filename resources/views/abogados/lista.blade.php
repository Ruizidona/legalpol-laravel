
@extends('plantilla')

@section('content')

<?php
use App\Http\Controllers\AbogadosController;
$control = new AbogadosController();
$data = $control->show();

?>

              <section id="lawyers" class="section-60 section-lg-100">
        <div class="container">
          <hr>
          <h2 class="text-center">Abogados</h2><hr>
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
           
            </div>
        </div>

      </section>

@endsection