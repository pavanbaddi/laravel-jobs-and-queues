<div class="container" >
    @push('styles')
        <style>
            .form-container > div{
                margin-bottom: 20px;
            }
        </style>
    @endpush

    <div class="title-container">
        <h2 class="text-center" style="margin: 0;" >Create Product</h2>
    </div>

    <br>
    <form wire:submit.prevent="save" method="post">
        <input type="hidden" wire:model="product.product_id" >
        <div class="row form-container">
            <div class="col-md-4 offset-4">
                <div>
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" wire:model="product.name" >
                    @if(!empty($validation_errors["name"]))
                        @foreach($validation_errors["name"] as $k => $v)
                            <label for="" class="error" >{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 offset-4">
                <div>
                    <label for="">Image</label>
                    <input type="file" wire:change=$emit('product_file_selected')" class="form-control" >
                    @if(!empty($validation_errors["image"]))
                        @foreach($validation_errors["image"] as $k => $v)
                            <label for="" class="error" >{{ $v }}</label>
                        @endforeach
                    @endif

                    @if(!empty($product["image"]))
                        <br>
                        <img src="{{ $product['image'] }}" class="img-thumbnail" >
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 offset-4">
                <div>
                    <label for="">Price</label>
                    <input type="text" class="form-control" wire:model="product.price" >
                    @if(!empty($validation_errors["price"])) 
                        @foreach($validation_errors["price"] as $k => $v)
                            <label for="" class="error" >{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 offset-4">
                <div>
                    <input type="submit" class="btn btn-success btn-sm" value="Save" >
                    @if(!empty($product["product_id"]))
                        <a href="{{ route('ecommerce.product.form') }}" class="btn btn-primary btn-sm" >Create New Product</a>
                    @endif
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script src="{{ url('ecommerce/create_product.js') }}"></script>
    @endpush

</div>