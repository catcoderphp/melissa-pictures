@extends('layouts.app')
@section('content')
    <div id="ng-app" ng-app="app"> <!-- id="ng-app" IE<8 -->
        <!-- Example: nv-file-drop="" uploader="{Object}" options="{Object}" filters="{String}" -->
        <div ng-controller="AppController" nv-file-drop="" uploader="uploader">

            <div class="container">
                <div class="form-group">

                    <div class="row">

                        <div class="col-md-3">
                            <h3>Mis fotos recientes</h3>
                            <ul class="recent_images">
                                @foreach($recent_images->photos as $photo)
                                    <li>
                                        <a class="albumPhoto cboxElement" href="{{asset('uploads/'.$photo->photo)}}">
                                            <img src="{{route('imagecache',[
                                                'size' => '120x90',
                                                'name' => $photo->photo,
                                            ])}}" alt="{{$photo->photo}}">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-9" style="margin-bottom: 40px">
                            @include('albums.partials.form')
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example4/colorbox.css">
    <script type="text/javascript" src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
    <script type="text/javascript">
        $(".albumPhoto").colorbox({
            rel:"albumPhoto",
            transition:"elastic"
        });
    </script>
@endsection