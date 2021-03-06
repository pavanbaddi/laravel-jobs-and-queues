<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turbolinks</title>
    <script src="{{ url('js/app.js') }}" ></script>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
</head>
<body>
    
    @yield('content')

    <script src="{{ url('assets/js/jquery.min.js') }}" data-turbolinks-eval=false ></script>
    <script src="{{ url('assets/js/popper.min.js') }}" data-turbolinks-eval=false ></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}" data-turbolinks-eval=false ></script>

    @stack('scripts')
</body>
</html>