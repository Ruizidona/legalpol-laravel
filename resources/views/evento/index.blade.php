<?php

//var_dump($idabogado);

//var_dump($evento);
?>

<!--//layouts.app-->


@extends('plantilla')

@section('scripts')
<link rel="stylesheet" href="{{asset('fullcalendar/core/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/daygrid/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/timegrid/main.css')}}">

<script src="{{asset('fullcalendar/core/main.js')}}" defer></script>
<script src="{{asset('fullcalendar/core//locales/es.js')}}" defer></script>

<script src="{{asset('fullcalendar/interaction/main.js')}}" defer></script>

<script src="{{asset('fullcalendar/daygrid/main.js')}}" defer></script>
<script src="{{asset('fullcalendar/list/main.js')}}" defer></script>
<script src="{{asset('fullcalendar/timegrid/main.js')}}" defer></script>





<script>


	//Envios enviados en ajax 
	var url_="{{ url('/eventos') }}";

	var url_show="";
	//Se consulta la info en json para mostrar los datoss
	@if(auth()->user()->rol == 2)
	url_show="{{ route ('eventos.abogados') }}";
	@endif
	@if(auth()->user()->rol ==1)
	url_show="{{ route ('eventos.showCliente') }}";
	@endif
	@if(auth()->user()->rol==0)
	url_show="{{ route ('eventos.showAll') }}";
	@endif
	
	
</script>

<!-- Funcionalidad y uso de Fullcalendar -->

     <script>

      document.addEventListener('DOMContentLoaded', function() {




        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          defaultDate:new Date(),
          plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],
         // defaultView: ''

         header:{
				left:'today,prev,next, MiBoton',
				center:'title',
				right:'dayGridMonth,timeGridWeek,timeGridDay,'
				},
		 /* customButtons:{

		  	MiBoton:{
		  		text:"Boton",
		  		click:function(){
		  			alert("hola mundo");
		  			$('#exampleModal').modal('toggle');
		  		}
		  	}
		  },*/
		  dateClick:function(info){

		  	limpiarFormulario();

		  	$('#txtFecha').val(info.dateStr);

		  	$('#btnAgregar').prop("disabled", false);
		  	$('#btnModificar').prop("disabled", false);
		  	$('#btnEliminar').prop("disabled", true);

		  	$('#exampleModal').modal();
		  	//console.log(info);
		  	//calendar.addEvent({title:"Consulta X", date:info.dateStr});
		  },
		  eventClick:function(info){

			  	$('#btnAgregar').prop("disabled", true);
			  	$('#btnModificar').prop("disabled", false);
			  	$('#btnEliminar').prop("disabled", false);

			  	/*console.log(info);
			  	console.log(info.event.title);
			  	console.log(info.event.start);
			  	console.log(info.event.extendedProps.descripcion);
	*/
		
				//console.log(info.event.extendedProps.id_user_cliente);

		  	//	
			  	$('#txtID').val(info.event.extendedProps.id_evento);//
			  	console.log(info.event);
			  	$('#idUser').val(info.event.extendedProps.id_user_cliente);
			  	$('#txtUser').html(
			  		"<br>Nombre: "+info.event.extendedProps.name +" "+ info.event.extendedProps.surname +
			  		"<br>Email: "+ info.event.extendedProps.email +
			  		"<br>Teléfono: "+ info.event.extendedProps.telephone_pri
			  		);
			  	
			  	$('#linkUser').attr('href', "{{ route('inicio') }}/perfil/"+info.event.extendedProps.id_user_cliente  );
			  	$('#txtTitulo').val(info.event.title);
			//  	

			  	mes = (info.event.start.getMonth()+1);

			 	dia = (info.event.start.getDate());

			 	anio = (info.event.start.getFullYear());

			 	mes=(mes<10)?"0"+mes:mes;
			 	dia=(dia<10)?"0"+dia:dia;

			 	minutos =info.event.start.getMinutes();
			 	hora =info.event.start.getHours();

			 	minutos=(minutos<10)?"0"+minutos:minutos;
			 	hora=(hora<10)?"0"+hora:hora;

			 	horario = (hora+":"+minutos);


			  	$('#txtFecha').val(anio+"-"+mes+"-"+dia);
			  	$('#txtHora').val(horario);
			  	$('#txtColor').val(info.event.backgroundColor);

			  	$('#txtDescripcion').val(info.event.extendedProps.descripcion);



			  	$('#exampleModal').modal();
		  },
		  @if(auth()->user()->rol == 2 || auth()->user()->rol == 0)
		  	editable:true,
			eventDrop:function(info){

				console.log(info);

			  	mes = (info.event.start.getMonth()+1);

			 	dia = (info.event.start.getDate());

			 	anio = (info.event.start.getFullYear());

			 	mes=(mes<10)?"0"+mes:mes;
			 	dia=(dia<10)?"0"+dia:dia;

			 	minutos =info.event.start.getMinutes();
			 	hora =info.event.start.getHours();

			 	minutos=(minutos<10)?"0"+minutos:minutos;
			 	hora=(hora<10)?"0"+hora:hora;

			 	horario = (hora+":"+minutos);
				$('#txtID').val(info.event.extendedProps.id_evento);

				$('#idUser').val(info.event.extendedProps.id_user_cliente);         
			  	$('#txtTitulo').val(info.event.title);
				$('#txtFecha').val(anio+"-"+mes+"-"+dia);
			  	$('#txtHora').val(horario);
			  	$('#txtColor').val(info.event.backgroundColor);

			  	$('#txtDescripcion').val(info.event.extendedProps.descripcion);

			  	objEvento=recolectarDatosGUI("PATCH");
	        	EnviarInformacion('/'+$('#txtID').val()+ '/update', objEvento,true); 

			},
			@endif
		  
		  events:url_show
		   
		  /* events:"{{ url('/eventos/show') }}"*/

        });
        calendar.setOption('locale', 'Es');
        calendar.render();

        $('#btnAgregar').click(function(){
        	objEvento=recolectarDatosGUI("POST");
        	EnviarInformacion(''+'/store', objEvento);
        });
        $('#btnEliminar').click(function(){
        	objEvento=recolectarDatosGUI("DELETE");
        	EnviarInformacion('/'+$('#txtID').val()+'/delete', objEvento);
        });
        $('#btnModificar').click(function(){
        	objEvento=recolectarDatosGUI("PATCH");
        	EnviarInformacion('/'+$('#txtID').val()+'/update', objEvento); //error
        });


    function recolectarDatosGUI(method){
		NuevoEvento = {
			id:$('#txtID').val(),
			id_usuario:$('#idUser').val(),      /*peligro*/                       /*txtuser*/
			title:$('#txtTitulo').val(),
			descripcion:$('#txtDescripcion').val(),
			
			id_abogado: {{auth()->user()->id}},       /*!!!!!!!!!!!!!!!!!!!!!! PELIGROOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO*/
			
			color: $('#txtColor').val(),
			textColor:"#FFFFFF",
			start:$('#txtFecha').val()+" "+$('#txtHora').val(),
			'_token':$("meta[name='csrf-token']").attr("content"),
			'_method':method
			
			
			
			}
			return (NuevoEvento);
		 }

    function EnviarInformacion(accion,objEvento, modal){


		console.log("accion: "+ accion);
		console.log("modal: "+ modal);
		console.log("obj: "+ objEvento);
		$.ajax(
			{
			type:'POST',
			url:url_+accion,
			/*url:"{{ url('/eventos') }}"+accion,*/
			data:objEvento,
				success:function(msg){ 
					console.log(msg);
					if(!modal){
			  			$('#exampleModal').modal('toggle');
			  		}
			  		calendar.refetchEvents();
				},
				error:function(){ alert("Hay un error"); }
			} 

      );
	}

	function limpiarFormulario(){

			$('#txtID').val("");
		  	$('#txtTitulo').val("");
		  	$('#txtUser').html("");                           /*txtuser*/
		  	$('#txtFecha').val("");
		  	$('#txtHora').val("");
		  	$('#txtColor').val("");

		  	$('#txtDescripcion').val("");


	}
});//<--- v????

    </script>





@endsection

@section('content')
@if(!\Request::is('eventos/*'))
<h2 class="alert-primary text-center text-center header ">Agenda personal</h2>


<h5 class="text-center text-center header" style="color:#128c7e">Los eventos que aparecerán en verde hacen referencia a Whatsapp</h5>

<div class="row" >
	<div class="col"></div>
	<div class="col-5"><div id="calendar"></div></div><!-- movil col12 escritorio col5 -->
	<div class="col"></div>
</div>

@endif
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Consultas:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          <div class="modal-body">
       <div id="descripcionEvento"></div>



       	 <div class="d-none">	
       	
       	 	 <label>eventid:</label><br>
			 <input type="text" id="txtID" name="txtID" />
			 <label>Fecha:</label><br>
	         <input type="text" id="txtFecha" name="txtFecha"/>
         </div>

		@if(auth()->user()->rol == 2 || auth()->user()->rol == 0)	
		  <div class="form-row">
			<div class="form-group col-md-8">
			 <strong>Usuario de la consulta:</strong>
			<input type="hidden" id="idUser" value=""/>
			<div id="txtUser" ></div>
			<a id="linkUser" href="#">ir al perfil</a> 	<!--  -->
			<div class="form-group">
				
			<!--  ($evento) -->
			</div> 
			<!-- json_encode($evento)   -->
			  
			
		 	</div>
		@endif

		@if(auth()->user()->rol == 1)
		
		@endif


			
		<div class="form-row">
			<div class="form-group col-md-8">
		 <label>Título:</label>
		 <input type="text" id="txtTitulo" class="form-control" placeholder="Título de la consulta" />
		 	</div>

		 	<div class="form-group col-md-8">
		 		<label>Hora de consulta:</label>
		 		 <input type="time" min="12:00" max="20:00" step="600" id="txtHora" name="txtHora"class="form-control"/>
			 </div>
		</div>
		<div class="form-group">
			<label> Descripción:</label>
		<textarea id="txtDescripcion" rows="9" name="txtDescripcion" class="form-control"></textarea>
		</div>
		
		<div class="form-group">
		
		<label> Color:</label>
		 <input type="color" value="#ff0000" id="txtColor" name="txtColor" class="form-control" style="height: auto;">
		
		</div>
		

  
       <div class="modal-footer">


    
       	
       	@if(auth()->user()->rol == 2)
      <!--  <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>-->
        <button type="button" id="btnModificar" class="btn btn-primary">Modificar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
        @endif
        <button type="button" id="btnCancelar" data-dismiss="modal" class="btn btn-default">Cancelar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('formulario')

@if( (\Request::is('eventos/*')) )
<br>



<div class="container"><br>
    <div class="row justify-content-center">
        <div class="col-md-5">
           
                   <form action="crear" method="post" >
                    <fieldset>
                        <h2 class="alert-primary text-center text-center header ">Hacer nueva consulta</h2>
                        <hr>

							@csrf
							<div class="form-group">
									<input type="hidden" name="id_abogado" value="{{$idabogado}}">	
									<input type="hidden" name="id_usuario" value="">


							</div> 

							<div class="form-group text-center"><br>
								<label for="color">Tipo de consulta:</label><br>
							  <input type="radio" id="color"
							     name="color" value="#cca876" >
							    <label for="color">Presencial</label>

							    <input type="radio" id="color"
							     name="color" value="#128c7e" >
							    <label for="color">Whatsapp</label>
							</div>

							<div class="form-group">
								<label for="title">Titulo:</label>
									<input type="text" name="title" class="form-control">
							</div>

							<div class="form-group">
								<label for="descripcion">Descripción de la consulta:</label>
									<textarea name="descripcion" class="form-control mb-4"> </textarea>
							</div>

							<!--
							<div class="form-group">
								<label for="color"> Color:</label>
									 <input type="hidden" value="#FFFFFF" id="txtColor" name="textColor" class="form-control" style="height: 36px;">
									  Color de fondo //		 
									 <input type="color" value="#ff0000" id="color" name="color" class="form-control" style="height: 36px;"><br>
							</div>
							-->
							

							<div class="form-group">
								<label for="start">Dia y horario de consulta:</label>
								<!--<input type="Datetime-local" min="2020-05-26T14:00" name="start" id="start"/><br> 19-->
								<input type="Datetime-local" min="<?php echo substr(date('c'), 0, 19) ?>" name="start" id="start" /><br>
								<small class="form-text text-muted">
                                    Si tu navegador no selecciona la fecha, seleccionala a través de tu teclado.<!--  o buscar otra forma de hacerlo XD -->
                                </small>
							</div>
								
							<div class="form-group">
							   <button type="submit" class="btn btn-primary">
									Hacer consulta
							   </button>
							</div>

							</form>
								



                  </fieldset>
                </form>
            </div>
        
    </div>
</div>	
<br><hr>



   <!-- ?????????????????????      <section class="bg-whisper">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-7">
              <div class="section-50 section-md-75 section-xl-100">
                <h3>Hacer nueva consulta</h3>
                <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="crear">
                	@csrf
							<div class="form-group">
									<input type="hidden" name="id_abogado" value="{{$idabogado}}">	
									<input type="hidden" name="id_usuario" value="">
							</div>
<hr>
                  <div class="row row-30">
                    <div class="col-md-6">
                      <div class="form-wrap">
                      	 <label class="" for="title">Titulo:</label>
                        <input type="text" name="title" class="form-control">
                       
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-wrap">
                      	<label class="" for="start">Dia y horario de consulta:</label><br>
                         <input type="Datetime-local"  name="start"/>
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap">
                      	  <label class="" for="color"> Color: </label>
                      	<input type="hidden" value="#FFFFFF" id="txtColor" name="textColor" class="form-control" style="height: 36px;">
								  Color de fondo //	
                        <input type="color" value="#ff0000" id="color" name="color" class="form-control" style="height: 36px;"><br>
                      
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <div class="form-wrap">
                      	  <label class="" for="descripcion">Descripción de la consulta:</label>
                        <textarea class="form-input" id="feedback-2-message" name="message" data-constraints="@Required"></textarea>
                      
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-md-6">
                          <button class="button button-block button-primary" type="submit">Hacer consulta</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        <div class="col-xl-5 d-none d-xl-block">
              <div style="margin-top: -40px;"><img src="http://legalpol-laravel.com.devel/images/home-4-472x753.png" alt="" width="472" height="753"/>
              </div>
            </div>
          </div>
        </div>
      </section>-->

@endif



@endsection