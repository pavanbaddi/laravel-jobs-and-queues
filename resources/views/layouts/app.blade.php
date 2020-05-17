<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire | Todo Application with Sorting, Filtering and Paginating</title>
    @livewireStyles
    @livewireScripts
    <script src="{{ url('js/app.js') }}" ></script>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    @livewire('ecommerce.menu-component')

    @yield('content')

    <script src="{{ url('assets/js/jquery.min.js') }}" data-turbolinks-eval=false ></script>
    <script src="{{ url('assets/js/popper.min.js') }}" data-turbolinks-eval=false ></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}" data-turbolinks-eval=false ></script>
</body>
</html>