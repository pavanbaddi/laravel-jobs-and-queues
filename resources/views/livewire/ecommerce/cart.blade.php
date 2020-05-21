<div class="container">
    @push('styles')
        <style>
            .order-form-container{

            }

            .order-form-container .title{
                margin: 0;
            }

            .order-form-container > div{
                margin-bottom: 15px;
            }
        </style>
    @endpush

    @include('livewire.ecommerce.notification')
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
                                    <td><input type="number" min="1" class="form-control" wire:model="items.{{ $k }}.quantity" ></td>
                                    <td>{{ $v['price'] }}</td>
                                    <td>{{ (int)$v['quantity']*$v['price'] }}</td>
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

                    @if($items)
                        <tfoot>
                            <td colspan="2" ></td>
                            <td>{{ $totals["qty"] }}</td>
                            <td></td>
                            <td>{{ $totals["amount"] }}</td>
                            <td></td>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <form wire:submit.prevent="saveOrder" method="post">
                <div class="order-form-container" >
                    <div>
                        <h2 class="title">Order Form</h2>
                    </div>

                    <div>
                        <label for="">Customer Name</label>
                        <input type="text" wire:model="order_form.customer_name" class="form-control">
                        @error('customer_name') 
                            <label class="error" >{{ $message }}</label>
                        @enderror
                    </div>

                    <div>
                        <label for="">Email</label>
                        <input type="text" wire:model="order_form.email" class="form-control">
                        @error('email') 
                            <label class="error" >{{ $message }}</label>
                        @enderror
                    </div>

                    <div>
                        <label for="">Mobile No</label>
                        <input type="text" wire:model="order_form.mobile_no" class="form-control">
                        @error('mobile_no') 
                            <label class="error" >{{ $message }}</label>
                        @enderror
                    </div>

                    <div>
                        <label for="">Alternate Mobile No</label>
                        <input type="text" wire:model="order_form.alternate_mobile_no" class="form-control">
                        @error('alternate_mobile_no') 
                            <label class="error" >{{ $message }}</label>
                        @enderror
                    </div>

                    <div>
                        <label for="">Delivery Address</label>
                        <textarea wire:model="order_form.delivery_address" class="form-control" rows="3" ></textarea>
                        @error('delivery_address') 
                            <label class="error" >{{ $message }}</label>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success btn-sm" >Confirm Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>