{!! Form::open([
        'method' => isset($album) ? 'PUT':'POST',
        'files' => 1,
        'url'=> isset($album) ? route('albums.update',$album->id) : route('albums.store')
    ])
!!}

<div class="form-group">
    {!! Form::label('name','Nombre del &aacute;lbum') !!}
    {!! Form::text('name',isset($album) ? $album->name : null,['class' => 'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Descripci&oacute;n') !!}
    {!! Form::textarea('description',isset($album) ? $album->description : null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit(isset($album)? "Actualizar &aacute;lbum":'Crear &aacute;lbum',[
            'class' => 'btn btn-success',
            'id' => isset($album) ? "update_album" : 'new_album'
        ])
    !!}
</div>
{!! Form::close() !!}