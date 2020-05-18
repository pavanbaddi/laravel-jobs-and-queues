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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @if(!empty($products))
                            <tr>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" >Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" >Remove</button>
                                </td>
                            </tr>
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

</div>