<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile Form</title>
</head>
<body>
    <h2>Company Profile</h2>

    <form action="{{ url('company/profile/save') }}" method="post">
        @csrf
        <label for="company_name">Company Name</label><br>
        <input type="text" name="company_name" value="">
        @if($errors->first('company_name'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_name') }}</label>
        @endif
        <br><br>

        <label for="company_location">Company Location</label><br>
        <input type="text" name="company_location" value="">
        @if($errors->first('company_location'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_location') }}</label>
        @endif
        <br><br>

        <label for="company_email">Company Email</label><br>
        <input type="text" name="company_email" value="">
        @if($errors->first('company_email'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_email') }}</label>
        @endif
        <br><br>

        <hr>

        <h3>Point Of Contact 1</h3>
        <label for="company_point_of_contact[0][name]">Company Agent Name</label><br>
        <input type="text" name="company_point_of_contact[0][name]" value="">
        @if($errors->first('company_point_of_contact.0.name')) 
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_point_of_contact.0.name') }}</label>
        @endif
        <br><br>

        <label for="company_point_of_contact[0][phone]">Contact Number</label><br>
        <input type="text" name="company_point_of_contact[0][phone]" value="">
        @if($errors->first('company_point_of_contact.0.phone')) 
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_point_of_contact.0.phone') }}</label>
        @endif
        <br><br>

        <label for="company_point_of_contact[0][email]">Contact Email</label><br>
        <input type="text" name="company_point_of_contact[0][email]" value="">
        @if($errors->first('company_point_of_contact.0.email')) 
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_point_of_contact.0.email') }}</label>
        @endif

        <hr>

        <h3>Point Of Contact 2</h3>
        <label for="company_point_of_contact[1][name]">Company Agent Name</label><br>
        <input type="text" name="company_point_of_contact[1][name]" value="">
        <br><br>
       
        <label for="company_point_of_contact[1][phone]">Contact Number</label><br>
        <input type="text" name="company_point_of_contact[1][phone]" value="">
        <br><br>

        <label for="company_point_of_contact[1][email]">Contact Email</label><br>
        <input type="text" name="company_point_of_contact[1][email]" value="">
       
        <br><br>
        
        <input type="submit" value="Submit"><br><br>
    </form>
</body>
</html>