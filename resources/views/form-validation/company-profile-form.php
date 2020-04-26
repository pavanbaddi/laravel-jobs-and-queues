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

        <label for="company_email">Company Eail</label><br>
        <input type="text" name="company_email" value="">
        @if($errors->first('company_email'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_email') }}</label>
        @endif
        <br><br>

        <label for="company_phone[0]">Contact Number 1</label><br>
        <input type="text" name="company_phone[0]" value="">
        @if($errors->first('company_phone[0]'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_phone[0]') }}</label>
        @endif
        <br><br>
        

        <label for="company_phone[1]">Contact Number 2</label><br>
        <input type="text" name="company_phone[1]" value="">
        @if($errors->first('company_phone[1]'))
            <br>
            <label for="" style="color:red;">{{ $errors->first('company_phone[1]') }}</label>
        @endif
        <br><br>
        
        <input type="submit" value="Submit"><br><br>
    </form>
</body>
</html>