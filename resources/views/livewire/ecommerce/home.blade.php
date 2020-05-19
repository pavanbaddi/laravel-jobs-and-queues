<div class="container" >

    @push('styles')
        <style>
            .content-container{
                margin-top: 25px;
            }

            .filter-container{
                padding: 10px 15px;
                background: #f1f1f1;
            }
            
            .filter-container > div{
                margin-bottom: 15px;
            }

            .img-container{
                height: 150px;
                background: #fff;
            }

            .img-container > img{
                width: 100%;
                height: 150px;
                object-fit: contain;
                padding: 10px 0;
            }

            .products-list-container{
                display: grid;
                grid-template-columns: repeat(3,1fr);
                grid-column-gap: 10px;
                grid-row-gap: 10px;
            }

            .products-list-container > .item{
                padding: 10px;
                background-color: #eaa356;
            }

            .product-content-container > p{
                margin: 0;
            }

            .product-content-container > p:nth-child(1){
                font-weight: bold;
                font-size: 18px;
            }
        </style>
    @endpush

    <div class="title-container">
        <h2 class="text-center" style="margin: 0;" >Laravel Livewire | E-Commerce Application using Turbolinks</h2>
    </div>

    <div class="content-container">
        <div class="row">
            <div class="col-md-3">
                <div class="filter-container">
                    <div>
                        <h3 class="" style="margin: 0;" >Filter</h3>
                        <hr>
                    </div>

                    <div>
                        <label for="">Search</label>
                        <input type="text" wire:model="filter.name" class="form-control" >
                    </div>

                    <div>
                        <label for="">Range</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">From</label>
                                <input type="number" wire:model="filter.range-from" class="form-control" >
                            </div>

                            <div class="col-md-6">
                                <label for="">To</label>
                                <input type="number" wire:model="filter.range-to" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <div style="text-align: right;">
                        <button type="button" wire:click="loadProducts" class="btn btn-primary btn-sm" >Filter</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="product-layout-container">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">List View</a></li>
                        <li class="page-item"><a class="page-link" href="#">Grid View</a></li>

                        <li class="page-item" style="margin-left:15px;">
                            <select class="form-control" wire:model="filter.order_field" wire:change="loadProducts" >
                                <option value="order_by_name_asc">Order name by ascending</option>
                                <option value="order_by_name_desc">Order name by decending</option>
                                <option value="order_by_price_low">Price: Low to High</option>
                                <option value="order_by_price_high">Price: High to Low</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="products-list-container">
                    @if(!empty($products))
                        @foreach($products as $k => $v)
                            <div class="item">
                                <div class="img-container">
                                    <img src="{{ $v['image'] ?? '' }}" alt="">
                                </div>

                                <div class="product-content-container">
                                    <p>{{ $v['name'] }}</p>
                                    <p>Price : {{ $v['price'] }}/-</p>
                                    <a href="" class="btn btn-primary btn-sm">Add to Cart</a>
                                </div>
                            </div>
                        @endforeach
                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>