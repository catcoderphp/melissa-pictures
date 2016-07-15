@extends('layouts.app')

@section('content')
        <!-- Features -->
<div id="features-wrapper">
    <div class="container">
        <h2><p>{{$album->name}} {{"\t"}} <a href="javascript:void(0)" id='newPhotos' class="btn btn-success">+ Agregar fotos</a></p></h2>
        <div class="row">

            <div class="addPhotos">
                @include('albums.partials.files')
            </div>
            <!-- Box -->

            @if(count($album->photos) > 0)
                @foreach($album->photos as $photo)
                    <div class="4u 12u(medium)">
                        <section class="box feature">
                            <a href="#" class="image featured"><img src="{{route('imagecache',[
                            'size' => '350x277',
                            'name' => $photo->photo
                        ])}}" alt="" /></a>
                            <div class="inner">
                                <header>
                                    <h2>{{$photo->name}}</h2>
                                    <p>Fecha: {{$photo->date}}</p>
                                </header>
                                <p>{{$photo->description}}</p>
                            </div>
                        </section>
                    </div>
                @endforeach
            @else
                <h1>No existen fotos :(</h1>
            @endif
        </div>
    </div>
</div>
@endsection
