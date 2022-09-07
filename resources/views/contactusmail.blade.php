


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col">
            <h1> Thank you for contacting us.</h1>
            <h3>{{$email}}</h3>
            <h4>We'll contact you soon.</h4>

        </div>

    </div>


</div>
</body>
</html>