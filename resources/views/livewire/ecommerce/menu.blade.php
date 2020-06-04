<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">E-Commerce</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ecommerce.home') }}">Home</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Products
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('ecommerce.product.form') }}">Create Product</a>
                    <a class="dropdown-item" href="{{ route('ecommerce.product.list') }}">List Products</a>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ecommerce.cart-items') }}">Cart</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ecommerce.test') }}">Test link</a>
            </li>
        </ul>
    </div>  
</nav>