<div class="container" >
    <style>
        .form-container > div{
            margin-bottom: 20px;
        }
    </style>

    <div class="title-container">
        <h2 class="text-center" style="margin: 0;" >Create Product</h2>
    </div>
    <br>
    <form wire:submit.prevent="save" method="post">
        <div class="row form-container">
            <div class="col-md-4 offset-4">
                <div>
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" wire:model="product.name" >
                    @if(!empty($product["name"]))
                        @foreach($product["name"] as $k => $v)
                            <label for="" class="error" >{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 offset-4">
                <div>
                    <label for="">Image</label>
                    <input type="file" class="form-control" >
                    @if(!empty($product["image"]))
                        @foreach($product["image"] as $k => $v)
                            <label for="" class="error" >{{ $v }}</label>
                        @endforeach
                    @endif

                    @if(!empty($product["image"]))
                        <img src="{{ $product['image'] }}" class="img-thumbnail" >
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 offset-4">
                <div>
                    <label for="">Price</label>
                    <input type="text" class="form-control" wire:model="product.price" >
                    @if(!empty($product["price"]))
                        @foreach($product["price"] as $k => $v)
                            <label for="" class="error" >{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 offset-4">
                <div>
                    <input type="submit" class="btn btn-success btn-sm" value="Save" >
                </div>
            </div>
        </div>
    </form>

</div>