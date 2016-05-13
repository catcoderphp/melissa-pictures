@extends('layouts.app')

@section('content')
        <!-- Features -->
<div id="features-wrapper">
    <div class="container">
        <h2><p>Fotos de melissa creadas {{"\t"}} <a href="{{route('photos.create')}}" class="btn btn-success">+ Agregar foto</a></p></h2>
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
