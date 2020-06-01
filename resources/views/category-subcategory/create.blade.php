<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Form</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
</head>
<body>

    @include('category-subcategory.includes.menu')

    <div class="container">

        @include('category-subcategory.includes.notification')

        <div class="row">
            <div class="col-md-6">
                <h2> {{ (isset($category['category_id']))? "Edit" : "Create" }} Category Form</h2>
            </div>
        </div>

        <form action="{{ route('category-subcategory.store') }}" method="post">
            @csrf
            @if(isset($category['category_id']))
                <input type="hidden" name="category_id" value="{{ $category['category_id'] }}" >
            @endif
            <div class="row">
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ (isset($category['name']))? $category['name'] : '' }}" >
                    @if($errors->first('name'))
                        <label for="" style="color:red;">{{ $errors->first('name') }}</label>
                    @endif
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Parent Category ID</label>
                    <select name="parent_id" class="form-control">
                        <option value="">Choose One</option>
                        @foreach($categories as $k => $v)
                            <option value="{{ $v['category_id'] }}" {{ (isset($category['parent_id']) && $category['parent_id'] == $v['category_id'])? 'selected="selected"' : '' }} >{{ $v['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <br>
            
            <div class="row">
                <div class="col-md-6">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </div>

        </form>
    </div>


    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>