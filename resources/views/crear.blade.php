
@extends('plantilla')

@section('consultarealizada')


<div style="margin:150px 0 150px 0">
<h2 class="text-center">Tu consulta se realizo exitosamente!</h3>
<div class="text-center" style="font-size:32px">El abogado seleccionado recibirá tus datos </div>
</div>


<center>
<a class="btn btn-primary" href="{{route('eventos.get2')}}">ver mis consultas</a>
<a class="btn btn-primary" href="{{route('inicio')}}">volver al inicio</a>
</center>

@endsection