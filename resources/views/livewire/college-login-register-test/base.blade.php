<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel LiveWire Login & Register Application</title>
    @livewireStyles

    @section('stylesheets')

    @endsection
</head>
<body>

    @livewire('college-login-register.register')

    <!-- 
        {# livewire('CollegeLoginRegister.Registers') #} this does not work
     -->
    
    @livewireScripts

    @section('scripts')

    @endsection
</body>
</html>