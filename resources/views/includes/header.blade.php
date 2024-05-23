<div class="container-fluid">
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="{{route('search')}}" method="GET">
                <div class="input-group">
                        <input name="keywords" value="{{request()->keywords}}"  type="text" class="form-control" placeholder="Search for products">
                        <button type="submit" class="input-group-text bg-transparent text-primary">
                            <span class="">
                                <i class="fa fa-search"></i>
                            </span>
                        </button>
                </div>
            </form>
        </div>
            <div class="col-lg-4 col-6 text-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Account
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                      <li><a class="dropdown-item" href="{{route('register')}}">Sign Up</a></li>
                      <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                  </div>
                </div>

    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Brands</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    @isset($brands)
            @if ($brands->isNotEmpty())
                @foreach ($brands as $brand_id => $brand)
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $brand->first()->brand_name }} <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            @foreach ($brand as $type)
                                @if ($type->type_id)
                                    <a href="" class="dropdown-item">{{ $type->type_name }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <p>No brands available.</p>
            @endif
        @else
            <p>No brands data available.</p>
        @endisset
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('shop')}}" class="nav-item nav-link">Shop</a>
                        <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                        <a href="/products" class="nav-item nav-link">Admin</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="{{route('clients.cart')}}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
