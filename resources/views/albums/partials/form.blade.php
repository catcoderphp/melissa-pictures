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
    {!! Form::label('cover','Portada de &Aacute;lbum') !!}
    <img class='preview-image' src="" alt="preview image">
    {!! Form::file('cover',null,[
        'class' => 'form-control',
    ]) !!}
</div>
<div class="form-group">
    {!! Form::submit(isset($album)? "Actualizar &aacute;lbum":'Crear &aacute;lbum',[
            'class' => 'btn btn-success',
            'id' => isset($album) ? "update_album" : 'new_album'
        ])
    !!}
</div>
@section('scripts')
<script type="text/javascript">
    function imageBase64(file){
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.addEventListener('load',function () {
            $('.preview-image').hide('delay').show('delay').attr({
                'width':200,
                'height':200,
                'src':reader.result
            });
        });
    }
    $(document).ready(function () {
        $('#cover').change(function(){
            imageBase64(this.files[0]);
        });
    });
</script>
@endsection
{!! Form::close() !!}