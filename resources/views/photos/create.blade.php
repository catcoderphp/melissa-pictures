@extends('layouts.app')
@section('title','Add new photo')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ (!isset($product) ? 'Nueva foto' : "Edicion de foto") }}</div>

                    <div class="panel-body">
                        @include('photos.partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')

@endsection

@endsection