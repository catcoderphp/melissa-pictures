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
                        </div>

                        <div class="col-md-9" style="margin-bottom: 40px">
                            @include('albums.partials.form')
                            @include('albums.partials.files')
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection