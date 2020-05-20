<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 style="margin:0">Cart Items</h2>
            <div>
                <table class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($items)
                            @foreach($items as $k => $v)
                                <tr>
                                    <td>
                                        @if($v["image"])
                                            <img src="{{ $v['image'] }}" style="height: 100px;">
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>{{ $v['name'] }}</td>
                                    <td>{{ $v['quantity'] }}</td>
                                    <td>{{ $v['price'] }}</td>
                                    <td>{{ $v['quantity']*$v['price'] }}</td>
                                    <td>
                                        <button type="button" wire:click="removeItem({{ $v['product_id'] }})" class="btn btn-danger btn-sm">Remove</button>
                                    </td>
                                </tr>
                            
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No products added...<a href="{{ route('ecommerce.home') }}">click here</a> to start shopping.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- table>((thead>tr>(th*3))) -->
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>