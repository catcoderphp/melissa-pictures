<div id="form_create_photos">
    {!! Form::open([
            'method' => ((!isset($photo)) ? 'post' : 'put'),
            'route' => ((!isset($photo)) ? 'photos.store' : ['photos.update',$photo->id]),
            'class' => 'form',
            'files' => true
        ])
    !!}

    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name',(!isset($photo) ? null : $photo->name),[
                'id' => 'photoName',
                'class' => 'form-control',
                'required'
            ])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('description','Descripcion') !!}
        {!! Form::textarea('description',(!isset($photo) ? null : $photo->description),[
                'id' => 'photoName',
                'class' => 'form-control',
                'required'
            ])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('share_with','Compartir con...') !!}
        {!! Form::select('share_with',$users,0,[
                'class' => 'form-control'
            ])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('name','Fecha') !!}
        {!! Form::date('date',(!isset($photo) ? null : $photo->date),[
                'id' => 'photoDate',
                'class' => 'form-control',
                'required'
            ])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo','Foto') !!}
        {!! Form::file('photos[]',['class','form-control','multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit((!isset($photo) ? 'Save photo' : "Edit photo"),['class' => 'btn btn-success','id' => '']) !!}
        <a href="{{route('photos.index')}}" class="btn-danger btn">Cancelar</a>
    </div>

    {!! Form::close() !!}
</div>
