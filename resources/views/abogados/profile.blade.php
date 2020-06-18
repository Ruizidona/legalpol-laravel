
<?php 
$foto = 0;
//$foto = $user->id;
?>


@extends('plantilla')

@section('profile')


<style type="text/css">

span.tags 
{
    background: #343a40;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }

 	.container p{
	font-size: 1.5em;

 	}
    .container img{
    	float: left;
    	margin-right:15px;
    	
    }
    .container{
    	
    }

</style>

<br><br>
<div class="container ">

	<div class="card-header alert-primary">
	    <h2 class="text-center">{{$user->name}} {{$user->surname}}</h2>
	</div><br>

	

		<div class="text-justify">

      <p class="card-img">
            
        @if($user->rol == 2)             
        <img class="img-circle"  src="../images/perfil/{{$foto}}.jpg" alt="">
        @endif
      
        @if($user->rol == 1)  
      <strong class="text-dark">Telefono:</strong> {{$user->telephone_pri}}<br><br>
      <strong class="text-dark">Email:</strong> {{$user->email}}<br><br>
      <strong class="text-dark">Provincia:</strong> {{$user->province}}<br><br>
      <strong class="text-dark">Cuidad:</strong> {{$user->location}}<br><br>
      @endif
      
      @if($user->rol != 1)  
      <br>
		 	<strong class="text-dark">Matrícula:</strong><br>
		  {{$user->description}}
   <!--    <strong class="text-dark">Precio:</strong><br>
      ${{$user->precio}} -->

     <br> <strong class="text-dark">Provincia:</strong> {{$user->province}}<br><br>
    <!-- <strong class="text-dark">Email:</strong> {{$user->email}}<br><br> -->
      @endif

       </p><br>
                    
     </div><br>
     <div class="clearfix"></div><br>
     @if($user->rol == 2)  
         <p class="fa fa-tag"><strong>Especialidad/es:</strong>
              
             <span class="tags">{{$user->specialty}}</span>
             <span class="tags">{{$user->specialty1}}</span> 
             <span class="tags">{{$user->specialty2}}</span>

                
         </p><br>
    @endif
  @if($user->rol == 2)
  <br><br><br><hr>
<h2 class="text-center">¿Querés contactarme? <br> <i class="fa fa-arrow-down"></i></h2>



	 <section class="section-50 section-md-75 section-lg-100edit">


        <div class="container">
          <div class="row row-40">
            <div class="col-md-4 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-users"></span></div>
                  <div class="box-header">
                  	<a href="{{ route('home', ['id' => $user->id]) }}"> <img src="http://legalpol-laravel.com.devel/images/agenda.png" alt="" width="50px"></a>
                  	<h5><a href="{{ route('home', ['id' => $user->id]) }}">Presencial</a></h5>
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="">
                  <p>Para realizar una consulta de manera presencial</p>
                </div>
              </article>
            </div>
            <div class="col-md-4 col-lg-4 height-fill">
              <article class="icon-box">
                <div class="box-top">
                  <div class="box-icon"><span class="novi-icon icon icon-primary icon-lg mercury-icon-lib"></span></div>
                  <div class="box-header">
                  	<a href="{{ route('home', ['id' => $user->id]) }}"> <img src="http://legalpol-laravel.com.devel/images/whatsapp.png" alt="" width="50px"></a>
                    <h5><a href="{{ route('home', ['id' => $user->id]) }}">	Whatsapp</a></h5> <!-- https://api.whatsapp.com/send?phone={{$user->telephone_pri}} -->
                  </div>
                </div>
                <div class="divider bg-accent"></div>
                <div class="">
                  <p>Para realizar una consulta de manera a través de whatsapp</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <hr>
	@endif


      <!--	 <a class="btn alert-primary" href="{{ route('eventos.get', ['idabogado' => $user->id]) }}">Hacer consulta</a>
		 <a class=" fa fa-whatsapp btn alert-success" href="https://api.whatsapp.com/send?phone={{$user->telephone_pri}}"> Enviar Whatsapp</a> -->


</div>










@endsection