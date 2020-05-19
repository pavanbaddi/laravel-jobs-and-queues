<div class="container-fluid" >
    <div class="title-container">
        <h2 class="text-center" style="margin: 0;" >List Products</h2>
    </div>

    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 100px;" >Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if(!empty($products))
                            @foreach($products as $k => $v)
                                <tr>
                                    <td>
                                        @if(!empty($v['image']))
                                            <img src="{{ $v['image'] }}" alt="" style="width: 100%;" >
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>{{ $v['name'] }}</td>
                                    <td>{{ $v['price'] }}</td>
                                    <td>
                                        <a href="{{ route('ecommerce.product.edit', ['product_id' => $v['product_id'] ]) }}" class="btn btn-primary btn-sm" >Edit</a>
                                        <button type="button" wire:click="$emit('confirm_product_before_delete', {{ $v['product_id'] }} )" class="btn btn-danger btn-sm" >Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" >No products... <a href="{{ route('ecommerce.product.form') }}">click here</a> to add</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.livewire.on('confirm_product_before_delete', function(id){
                let cfn = confirm('Confirm to remove product ?');

                if(cfn){
                    window.livewire.emit('delete_product', id);
                }else{
                    return false;
                }
            });
        </script>
    @endpush
</div>
