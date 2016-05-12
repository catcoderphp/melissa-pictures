@extends('layouts.app')

@section('title','All photos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Fotos</div>

                    <h2>Fotos</h2>
                    <p>Fotos subidas por ti</p>
                    <div class="panel panel-default">
                        <div class="panel-heading">Users</div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Compartida con...</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($photos as $photo)
                                <tr>
                                    <td>{{ $photo->name }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $photo->share->name}}</td>
                                    <td><a class='btn btn-success' href="{{route('photos.edit',$photo->id)}}">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $photos->render() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection