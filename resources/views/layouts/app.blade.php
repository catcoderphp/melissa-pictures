<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Melissa</title>

    <link rel="icon" href="{{asset('images/osod.png')}}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {!! Minify::stylesheetDir('/assets/css/')->withFullUrl() !!}
    {!! Minify::stylesheetDir('/css/')->withFullUrl() !!}


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
                            <ul>
                                <li><a href="/login">Acceder</a></li>
                            </ul>
                        </li>
                    @else
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





    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u(medium)">

                    <!-- Sidebar -->
                    <div id="sidebar">
                        <section class="widget thumbnails">
                            <h3>Interesting stuff</h3>
                            <div class="grid">
                                <div class="row 50%">
                                    <div class="6u"><a href="#" class="image fit"><img src="{{asset('images/pic04.jpg')}}" alt="" /></a></div>
                                    <div class="6u"><a href="#" class="image fit"><img src="{{asset('images/pic05.jpg')}}" alt="" /></a></div>
                                    <div class="6u"><a href="#" class="image fit"><img src="{{asset('images/pic06.jpg')}}" alt="" /></a></div>
                                    <div class="6u"><a href="#" class="image fit"><img src="{{asset('images/pic01.jpg')}}" alt="" /></a></div>
                                </div>
                            </div>
                            <a href="#" class="button icon fa-file-text-o">More</a>
                        </section>
                    </div>

                </div>
                <div class="8u 12u(medium) important(medium)">

                    <!-- Content -->
                    <div id="content">
                        <section class="last">
                            <h2>So what's this all about?</h2>
                            <p>This is <strong>Verti</strong>, a free and fully responsive HTML5 site template by <a href="http://html5up.net">HTML5 UP</a>.
                                Verti is released under the <a href="http://html5up.net/license">Creative Commons Attribution license</a>, so feel free to use it for any personal or commercial project you might have going on (just don't forget to credit us for the design!)</p>
                            <p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit amet phasellus quam turpis.</p>
                            <a href="#" class="button icon fa-arrow-circle-right">Continue Reading</a>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer-wrapper">
        <footer id="footer" class="container">
            <div class="row">
                <div class="3u 6u(medium) 12u$(small)">

                    <!-- Links -->
                    <section class="widget links">
                        <h3>Random Stuff</h3>
                        <ul class="style2">
                            <li><a href="#">Etiam feugiat condimentum</a></li>
                            <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                            <li><a href="#">Sed porttitor cras in erat nec</a></li>
                            <li><a href="#">Felis varius pellentesque potenti</a></li>
                            <li><a href="#">Nullam scelerisque blandit leo</a></li>
                        </ul>
                    </section>

                </div>
                <div class="3u 6u$(medium) 12u$(small)">

                    <!-- Links -->
                    <section class="widget links">
                        <h3>Random Stuff</h3>
                        <ul class="style2">
                            <li><a href="#">Etiam feugiat condimentum</a></li>
                            <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                            <li><a href="#">Sed porttitor cras in erat nec</a></li>
                            <li><a href="#">Felis varius pellentesque potenti</a></li>
                            <li><a href="#">Nullam scelerisque blandit leo</a></li>
                        </ul>
                    </section>

                </div>
                <div class="3u 6u(medium) 12u$(small)">

                    <!-- Links -->
                    <section class="widget links">
                        <h3>Random Stuff</h3>
                        <ul class="style2">
                            <li><a href="#">Etiam feugiat condimentum</a></li>
                            <li><a href="#">Aliquam imperdiet suscipit odio</a></li>
                            <li><a href="#">Sed porttitor cras in erat nec</a></li>
                            <li><a href="#">Felis varius pellentesque potenti</a></li>
                            <li><a href="#">Nullam scelerisque blandit leo</a></li>
                        </ul>
                    </section>

                </div>
                <div class="3u 6u$(medium) 12u$(small)">

                    <!-- Contact -->
                    <section class="widget contact last">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                            <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                        </ul>
                        <p>1234 Fictional Road<br />
                            Nashville, TN 00000<br />
                            (800) 555-0000</p>
                    </section>

                </div>
            </div>
            <div class="row">
                <div class="12u">
                    <div id="copyright">
                        <ul class="menu">
                            <li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>

<!-- Scripts -->

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('assets/js/skel.min.js')}}"></script>
<script src="{{asset('assets/js/util.js')}}"></script>
<!--[if lte IE 8]><script src="{{asset('assets/js/ie/respond.min.js')}}"></script><![endif]-->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('/assets/js/actions.js')}}"></script>

</body>
</html>