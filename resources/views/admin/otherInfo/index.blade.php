@extends('layouts.defaultAdmin')
@section('content')


<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </form>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                    alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                    alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">DatNguyen</span>
                        <img class="img-profile rounded-circle"
                            src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <div class="container-fluid">
            <!-- Page Heading -->
            @if(session('msg'))
            <div class="alert alert-success" role="alert">
                {{session('msg')}}
            </div>
            @endif
          <div class="row">
                   <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Brand</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('other.postAddBrand')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row align-items-end">
                                <div class="mb-3 col-8">
                                    <label class="form-label">Name Brand <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Brand" name="nameBrand" aria-label="Product title">
                                    <label class="form-label mt-2">Description <span class="text-muted">(Optional)</span></label>
                                    <textarea class="wysihtml5 form-control" name="desc"></textarea>
                                </div>
                            </div>
                            <div  class="dropzone needsclick dz-clickable" id="dropzone-basic">
                                <div class="dz-message needsclick my-5 text-center">
                                  <p class="fs-4 note needsclick my-2 ">Drag and drop your image here</p>
                                  <small class="text-muted d-block fs-6 my-2">or</small>
                                  <span class="note needsclick btn btn-primary d-inline" id="btnBrowse">Browse image</span>
                                </div>
                                <input type="file" name="logo" id="upload" class="upload-input" onchange="readURL(this)"/>
                                <img style="display: none!important" id="img" width="100px" class="img-thumbnail image-thumb rounded mx-auto d-block" height="100px" src="#" alt="your image" />
                              </div>
                            <button type="submit" class="btn btn-primary mt-2">Add another brand</button>
                        </form>
                    </div>
                   </div>

                <div class="card mb-4">
                 <div class="card-header">
                     <h5 class="card-title mb-0">Type of Brand</h5>
                 </div>
                 <div class="card-body">
                     <form action="{{route('other.postAddTypeOfBrand')}}" method="POST">
                        @csrf
                         <div class="row align-items-start">
                            <div class="mb-3 col-4">
                                <label for="">Type of Brand</label>
                                <select name="brandID" id="brand" class="select2 form-select select2-hidden-accessible" data-placeholder="Select Vendor" data-select2-id="vendor" tabindex="-1" aria-hidden="true">
                                    <option value="0" data-select2-id="6">Select Brand</option>
                                    @if(!empty($allBrand))
                                    @foreach ($allBrand as $item)
                                      <option value="{{$item->id}}" {{old('id') == $item->id ? 'selected':false}}>{{$item->name}}</option>
                                    @endforeach
                                    @endif
                                  </select>
                            </div>
                             <div class="mb-3 col-8">
                                 <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Name" name="nameBrand" aria-label="Product title">
                                 <label class="form-label mt-2">Description <span class="text-muted">(Optional)</span></label>
                                 <textarea class="wysihtml5 form-control" name="desc"></textarea>
                             </div>
                         </div>
                         <button type="submit" class="btn btn-primary">Add another type brand</button>
                     </form>
                 </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Color</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('other.postAddColor')}}"  method="POST">
                            @csrf
                            <div class="row align-items-end">
                                <div class="mb-3 col-8">
                                    <label class="form-label">Value Color</label>
                                    <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Color" name="valueColor" aria-label="Product title">
                                    <label class="form-label mt-2">Description <span class="text-muted">(Optional)</span></label>
                                    <textarea class="wysihtml5 form-control" name="desc"></textarea>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-2">Add another color</button>
                        </form>
                    </div>
                   </div>

                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('other.postAddCategory')}}"  method="POST">
                            @csrf
                            <div class="row align-items-end">
                                <div class="mb-3 col-8">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Category" name="nameCategory" aria-label="Product title">
                                    <label class="form-label mt-2">Description <span class="text-muted">(Optional)</span></label>
                                    <textarea class="wysihtml5 form-control" name="desc"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-2">Add another category</button>
                        </form>
                    </div>
                   </div>
                   <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Size</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('other.postAddSize')}}"  method="POST">
                            @csrf
                            <div class="row align-items-end">
                                <div class="mb-3 col-8">
                                    <label class="form-label">Size</label>
                                    <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Size" name="value" aria-label="Product title">
                                    <label class="form-label mt-2">Description <span class="text-muted">(Optional)</span></label>
                                    <textarea class="wysihtml5 form-control" name="desc"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-2">Add another size</button>
                        </form>
                    </div>
                   </div>
        </div>

    </div>
    @include('includes.footerAdmin')
</div>

@stop
