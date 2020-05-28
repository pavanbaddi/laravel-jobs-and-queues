@if(!empty($v->categories))
    <ul class="child-main">
        @foreach($v->categories as $kk => $vv)
            <li class="item">{{ $vv['name'] }}</li>
            @include('category-subcategory.child-includes.child-category-view', [ 'v' => $vv])
        @endforeach
    </ul>
@endif

