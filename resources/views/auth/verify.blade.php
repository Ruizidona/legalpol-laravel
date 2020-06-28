@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificación se ha enviado a su casilla de correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, confirma tu email de verificación.') }}
                    {{ __('Si no recibiste ningún mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aquí para reenviar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
