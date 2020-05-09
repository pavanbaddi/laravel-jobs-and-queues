<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(!empty($errors->all()))
        <h2>Validation errors while filling form.</h2>
        <ul style="color: red" >
            @foreach($errors->all() as $k => $v)
                <li>{{ $v }}</li>
            @endforeach
        </ul>
    @endif
    <h3>User Profile</h3>
    <form action="{{ url('user/profile/save') }}" method="post" enctype="multipart/form-data" >
        @csrf

        <label for="image">Upload Image</label><br>
        <input type="file" name="image" id="">
        @if($errors->first('image')) 
            <br>
            <label for="" style="color:red;">{{ $errors->first('image') }}</label>
        @endif
        <br><br>
        <input type="submit" value="save">
    </form>
</body>
</html>