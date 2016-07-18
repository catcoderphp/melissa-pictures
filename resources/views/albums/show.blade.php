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
                            <a href="{{asset('uploads/'.$photo->photo)}}" class="albumPhoto cboxElement image featured"><img src="{{route('imagecache',[
                            'size' => '350x277',
                            'name' => $photo->photo,

                        ])}}" alt="{{str_replace(" ","-",$album->name)}}-photo" class='' /></a>
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
        <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example4/colorbox.css">
        <script type="text/javascript" src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
        <script type="text/javascript">
            $(".albumPhoto").colorbox({rel:"albumPhoto"});
        </script>
@endsection
