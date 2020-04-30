<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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


    <h2>Contact us Form</h2>

    <form action="{{ url('contact-us/send') }}" method="post">
        @csrf
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" value="{{ old('first_name') }}">
        @if($errors->first('first_name'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('first_name') }}</label>
        @endif  
        <br><br>

        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" value="">
        @if($errors->first('last_name'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('last_name') }}</label>
        @endif
        <br><br>

        <label for="email">Email</label><br>
        <input type="text" name="email" value="">
        @if($errors->first('email'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('email') }}</label>
        @endif
        <br><br>

        <label for="phone">phone</label><br>
        <input type="text" name="phone" value="">
        @if($errors->first('phone'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('phone') }}</label>
        @endif
        <br><br>
        
        <label for="subject">Subject</label><br>
        <input type="text" name="subject" value="">
        @if($errors->first('subject'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('subject') }}</label>
        @endif
        <br><br>

        <label for="message">Message</label><br>
        <textarea type="text" name="message" value=""></textarea><br><br>
        
        <input type="submit" value="Submit"><br><br>
    </form>
</body>
</html>