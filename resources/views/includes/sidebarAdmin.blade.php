<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">Dat ADMIN </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
            <i class="fa-brands fa-product-hunt"></i>
            <span>Products</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('other.index')}}">
            <i class="fa-solid fa-list"></i>
            <span>Other info</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('import.view')}}">
            <i class="fa-brands fa-bandcamp"></i>
            <span>Import</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('payment.index')}}">
            <i class="fa-brands fa-shopware"></i>
            <span>Payment</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('provider.index')}}">
            <i class="fa-brands fa-shopware"></i>
            <span>Provider</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">
            <i class="fa-brands fa-shopware"></i>
            <span>User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fa-brands fa-shopware"></i>
            <span>Page user</span>
        </a>
    </li>
    <hr class="sidebar-divider">
</ul>
