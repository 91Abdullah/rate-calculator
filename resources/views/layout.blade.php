<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rate Calculator') }}</title>

    <!-- Styles -->
    <link href="{{ URL::to('css/app.css') }}" rel="stylesheet">
    @yield('styles')

            <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">


        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                {{--<a class="navbar-brand" href="#menu-toggle" id="menu-toggle">--}}
                    {{--<i class="fa fa-bars fa-lg"></i>--}}
                {{--</a>--}}

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Rate Calculator') }}
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('admin/services') || Request::is('admin/services/*') ? 'active' : '' }}"><a href="{{ url('admin/services') }}">Services</a></li>
                    <li class="{{ Request::is('admin/destinations') || Request::is('admin/destinations/*') ? 'active' : '' }}"><a href="{{ url('admin/destinations') }}">Destinations</a></li>
                    <li class="{{ Request::is('admin/types') || Request::is('admin/types/*') ? 'active' : '' }}"><a href="{{ url('admin/types') }}">Weight Class</a></li>
                    <li class="{{ Request::is('admin/rates') || Request::is('admin/rates/*') ? 'active' : '' }}"><a href="{{ url('admin/rates') }}">Rates</a></li>
                    <li class="{{ Request::is('admin/zones') || Request::is('admin/zones/*') ? 'active' : '' }}"><a href="{{ url('admin/zones') }}">Zones</a></li>
                    <li class="{{ Request::is('admin/cities') || Request::is('admin/cities/*') ? 'active' : '' }}"><a href="{{ url('admin/cities') }}">Cities</a></li>
                    <li class="{{ Request::is('admin/limit_types') || Request::is('admin/limit_types/*') ? 'active' : '' }}"><a href="{{ url('admin/limit_types') }}">Limit Types</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ URL::to('js/app.js') }}"></script>
<script src="https://use.fontawesome.com/53e7ef1a91.js"></script>
@yield('scripts')
</body>
</html>