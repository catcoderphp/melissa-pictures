@extends('layouts.app')

@section('content')
    <div id="banner-wrapper">

        <div id="banner" class="box container">
            <div class="row">
                @if(Auth::check())
                    <div class="7u 12u(medium)">
                        <h2>Hola! Ahora puedes crear &aacute;lbumes</h2>
                        <p>Y guardar fotos nuevas en cada uno!</p>
                    </div>
                    <div class="5u 12u(medium)">
                        <ul>
                            <li><a href="{{route('photos.create')}}" class="button big icon fa-arrow-circle-right">Nueva Foto</a></li>
                            <li><a href="{{route('photos.index')}}" class="button alt big icon fa-question-circle">Fotos agregadas</a></li>
                        </ul>
                    </div>
                @else
                    <div class="7u 12u(medium)">
                        <h2>Fotos de melissa</h2>
                        <p>Necesitas iniciar sesi&oacute;n :(</p>
                    </div>
                    <div class="5u 12u(medium)">
                        <ul>
                            <li id="login-start"><a href="javascript:void(0)" class="button big icon fa-arrow-circle-right">Iniciar sesi&oacute;n</a></li>
                        </ul>
                        <div id="login-form">
                            @include('auth.login')
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
