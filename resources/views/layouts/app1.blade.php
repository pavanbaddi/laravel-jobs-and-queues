<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire | Todo Application with Sorting, Filtering and Paginating</title>
    @livewireStyles
    @livewireScripts

    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

    <style>
        .error{
            color: red;
        }

        .container{
            max-width: 70%;
        }
    </style>
</head>
<body>

    @yield('content')

    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>