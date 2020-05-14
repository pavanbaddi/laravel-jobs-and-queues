<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel LiveWire Multiple File Uploads</title>
    @livewireStyles
    @livewireScripts

    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>

    @livewire('files.file-upload')

    <!-- 
        {# livewire('Files.FileUpload') #} this does not work
     -->
    
    

    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>