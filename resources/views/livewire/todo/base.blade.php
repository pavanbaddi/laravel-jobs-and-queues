<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel LiveWire Multiple File Validation and Uploads</title>
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

    


    <div class="container" >
        <div class="wrapper">
            <div class="title-container">
                <h1 class="title text-center">Laravel Livewire | Todo Application with Sorting, Filtering and Paginating</h1>
            </div>

            <div class="row">
                <div class="col-md-4">

                    @livewire('todo.todo-notification-component')
                
                    @livewire('todo.form-component')

                </div>

                <div class="col-md-8">

                    @livewire('todo.list-component')
            
                </div>
            </div>
        </div>

    </div>
    
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>