@if(!empty($category->categories))
    <ol class="dd-list list-group">
        @foreach($category->categories as $kk => $sub_category)
            <li class="dd-item list-group-item" data-id="{{ $sub_category['category_id'] }}" >
                <div class="dd-handle" >{{ $sub_category['name'] }}</div>
                <div class="dd-option-handle">
                    <a href="{{ route('category-subcategory.edit', ['category_id' => $sub_category['category_id'] ]) }}" class="btn btn-success btn-sm" >Edit</a> 
                    <a href="{{ route('category-subcategory.remove', ['category_id' => $sub_category['category_id'] ]) }}" class="btn btn-danger btn-sm" >Delete</a>
                </div>

                @include('category-subcategory.child-includes.child-category-view', [ 'category' => $sub_category])
            </li>
        @endforeach
    </ol>
@endif

