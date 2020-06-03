<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | Implement Remember Me Functionality</title>
    
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">

    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>

    
    <div class="container">
        <div class="col-md-3 offset-4">
            <h2 class="text-center" >Login</h2>

            <div class="">
                <form action="{{ route('remember-me.login-verify') }}" method="post">
                    @csrf
                    <div>
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="john123@gmail.com">
                    </div>

                    <div>
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" value="123456">
                    </div>

                    <div>
                        <br>
                        <label for="">Remember Me</label>
                        <input type="checkbox" name="remember_me" value="1">
                    </div>

                    <div>
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>