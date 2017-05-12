<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Encounter More Sign In Application">

    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

    <title>Encounter More Sign In Application</title>

    <link rel="stylesheet" href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sticky-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('encounter.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Wrap all page content here -->
    <div id="wrap">

        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="{{ asset('images/logo.png') }}" class="navbar-brand" alt="Encounter more">
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">{{ link_to_route('home', 'HOME') }}</li>
                        <li class="">{{ link_to_route('register', 'REGISTER') }}</li>
                        <li class="">{{ link_to_route('bookings', 'BOOKINGS') }}</li>
                        <li class="">{{ link_to_route('registrations', 'REGISTRATIONS') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Begin page content -->
        <div class="container">

            <div class="page-header">
                <img src="{{ asset('images/banner.jpg') }}" class="img-responsive" alt="Encounter more banner">
                <h1 class="text-uppercase">Encounter More 2017 @if ($subtitle) <span class="subtitle text-lowercase"><small>&raquo; {{ $subtitle }}</small></span> @endif</h1>
            </div>

            <div>
                {{ $content }}
            </div>

        </div>

    </div>

    <!-- JavaScript placed at the end of the document so the pages load faster -->
    <script src="{{ asset('jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}"></script>

    @yield('extra_js')

</body>

</html>
