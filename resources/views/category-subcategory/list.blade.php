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

        <h2> List of Category</h2>

        <div class="row">
            <div class="col-md-6">
                <ul class="main">
                    @foreach($categories as $k => $v)
                        <li class="item">{{ $v['name'] }}</li>

                        @if(!empty($v->categories))
                            @include('category-subcategory.child-includes.child-category-view', [ 'v' => $v])
                        @endif

                    @endforeach
                </ul>
            </div>
        </div>

        
    </div>


    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>