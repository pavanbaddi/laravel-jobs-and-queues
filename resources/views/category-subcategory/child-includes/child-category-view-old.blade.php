@if(!empty($category->categories))
    <ul class="child-main">
        @foreach($category->categories as $kk => $sub_category)
            <li class="item">{{ $sub_category['name'] }}</li>
            @include('category-subcategory.child-includes.child-category-view-old', [ 'category' => $sub_category])
        @endforeach
    </ul>
@endif

