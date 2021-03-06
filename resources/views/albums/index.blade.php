@extends('layouts.app')

@section('content')
    <!-- Features -->
    <div id="features-wrapper">
        <div class="container">
            <h2><p>Albumes creados {{"\t"}} <a href="{{route('albums.create')}}" class="btn btn-success">+ Nuevo &aacute;lbum</a></p></h2>
            <div class="row">

                <!-- Box -->
                @if(count($albums) > 0)
                    @foreach($albums as $album)
                        <div class="4u 12u(medium)">
                            <section class="box feature">
                                <a href="{{route('albums.show',$album->id)}}" class="image featured"><img src="{{route('imagecache',[
                                    'size' => '350x277',
                                    'name' => $album->cover,

                                ])}}" alt="{{str_replace(" ","-",$album->name)}}-photo" class='' /></a>
                                <div class="inner">
                                    <header>

                                        <h2><a href="{{route('albums.show',$album->id)}}">{{$album->name}}</a></h2>
                                        <span class="fotos_count">{{$album->photos->count()}} Fotos</span>
                                    </header>
                                    <p>{{$album->description}}</p>
                                    {!! Form::open([
                                            'method' => 'delete',
                                            'route' => ['albums.destroy',$album->id]
                                        ]) !!}
                                    {!! Form::submit('Borrar') !!}
                                    {!! Form::close() !!}
                                </div>
                            </section>
                        </div>
                    @endforeach
                @else
                    <h1>No has agregado ningun &aacute;lmbum :(</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
