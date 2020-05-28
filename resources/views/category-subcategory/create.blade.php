<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Form</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Category Form</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Parent Category ID</label>
                <select name="parent_id" class="form-control">
                    <option value="">Choose One</option>
                    @foreach($categories as $k => $v)
                        <option value="{{ $v['category_id'] }}" {{ (isset($category['category_id']) && $category['category_id'] == $v['category_id'])? 'selected="selected"' : '' }} >{{ $v['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input type="submit" class="btn btn-success" value="Save">
            </div>
        </div>
    </div>


    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>