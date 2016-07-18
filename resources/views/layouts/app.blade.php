<!DOCTYPE HTML>
<html>
<head>
    <title>Melissa</title>

    <link rel="icon" href="{{asset('images/osod.png')}}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body class="homepage">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header-wrapper">
        <header id="header" class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="{{asset('/')}}">Melissa</a></h1>
                <span>by catcoder.php</span>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li class="current"><a href="{{asset('/')}}">Home</a></li>
                    @if(!Auth::check())
                        <li>
                            <a href="#">Usuario</a>
                        </li>
                    @else
                        <li class="current"><a href="{{route('albums.index')}}">&Aacute;lbums</a></li>
                        <li><a href="#">Bienvenid@ {{Auth::user()->name}}</a></li>
                        <li><a class="btn btn-default" href="/logout">Cerrar session</a></li>
                    @endif

                </ul>
            </nav>
            <div class="container">
                @if (Session::has('errors'))
                    <div class="alert alert-warning" role="alert">
                        <ul>
                            <strong>Oops! Something went wrong : </strong>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <ul>
                            <strong>Success! Your action has been correct: </strong>
                            <li>{{ Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </header>
    </div>

@yield('content')

<!-- Footer -->
    <div id="footer-wrapper">
        <footer id="footer" class="container">
            <div class="row">
                <div class="12u">
                    <div id="copyright">
                        <ul class="menu">
                            <li>&copy; Melissa-bb.mx {{date("Y")}}. All rights reserved</li>
                            <li>Design: <a href="mailto:catcoder.php@gmail.com">CATCODER.PHP</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>

<!-- Scripts -->
{!! Minify::stylesheetDir('/assets/css/')->withFullUrl() !!}
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('assets/js/skel.min.js')}}"></script>
<!--[if lte IE 8]><script src="{{asset('assets/js/ie/respond.min.js')}}"></script><![endif]-->
{!! Minify::javascript(['/assets/js/actions.js','/assets/js/main.js','/assets/js/util.js'])->withFullUrl() !!}
@yield('scripts')
</body>
</html>
