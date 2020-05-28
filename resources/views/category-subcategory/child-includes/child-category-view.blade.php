@if(!empty($v->categories))
    <ol class="dd-list list-group">
        @foreach($v->categories as $kk => $vv)
            <li class="dd-item list-group-item" data-id="{{ $vv['category_id'] }}" >
                <div class="dd-handle" >{{ $vv['name'] }}</div>
                <div class="dd-option-handle">
                    <button type="button" class="btn btn-success btn-sm" >Edit</button> 
                    <button type="button" class="btn btn-danger btn-sm" >Delete</button>
                </div>

                @include('category-subcategory.child-includes.child-category-view', [ 'v' => $vv])
            </li>
        @endforeach
    </ol>
@endif

