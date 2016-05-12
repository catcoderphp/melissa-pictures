@extends('layouts.app')

@section('title','All photos')

@section('content')
        <!-- Features -->
<div id="features-wrapper">
    <div class="container">
        <h2><p>Fotos de melissa creadas</p></h2>
        <div class="row">

            <!-- Box -->

            @if(count($photos) > 0)
                @foreach($photos as $photo)

                    <div class="4u 12u(medium)">
                        <section class="box feature">
                            <a href="#" class="image featured"><img src="{{route('imagecache',[
                            'size' => '350x277',
                            'name' => json_decode($photo->photo,true)[0]
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