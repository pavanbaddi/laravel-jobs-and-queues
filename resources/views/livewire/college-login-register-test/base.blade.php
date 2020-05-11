<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel LiveWire Login & Register Application</title>
    @livewireStyles

    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>

    @livewire('college-login-register.register')

    <!-- 
        {# livewire('CollegeLoginRegister.Registers') #} this does not work
     -->
    
    @livewireScripts

    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>