@if(Auth::check())
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a id ="subtitle" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">Fotos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a id="subtitle"href="{{route('photos.create')}}">Crear nueva foto</a></li>
                <li><a id ="subtitle" href="{{route('photos.index')}}">Todas las fotos</a></li>
            </ul>
        </li>
    </ul>
@endif