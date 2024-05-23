

@extends('layouts.defaultAdmin')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
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
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Add a new Product</h4>
                      <p class="text-muted">Orders placed across your store</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <button class="btn btn-secondary">Discard</button>
                      <button class="btn btn-primary">Save draft</button>
                      <button type="submit" class="btn btn-primary">Publish product</button>
                    </div>

                  </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-title mb-0">Product information</h5>
                        </div>
                        <div class="card-body">
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-name">Name</label>
                            <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product title" name="name" aria-label="Product title">
                            @error('name')
                            <span style="color: red">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">


                            </div>
                            </div>

                            <!-- Description -->

                          <div>
                            <div>
                                <label class="form-label">Description <span class="text-muted">(Optional)</span></label>
                                <div class="form">
                                    <textarea class="wysihtml5 form-control" name="desc"></textarea>
                                </div>
                                @error('desc')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                          <h5 class="mb-0 card-title">Thumbnail Product</h5>
                          <a href="javascript:void(0);" class="fw-medium">Add media from URL</a>
                        </div>
                        <div class="card-body">
                          <div  class="dropzone needsclick dz-clickable" id="dropzone-basic">
                            <div class="dz-message needsclick my-5 text-center">
                              <p class="fs-4 note needsclick my-2 ">Drag and drop your image here</p>
                              <small class="text-muted d-block fs-6 my-2">or</small>
                              <span class="note needsclick btn btn-primary d-inline" id="btnBrowse">Browse image</span>
                            </div>
                            <input type="file" name="thumb" id="upload" class="upload-input" onchange="readURL(this)"/>
                            <img style="display: none!important" id="img" width="100px" class="img-thumbnail image-thumb rounded mx-auto d-block" height="100px" src="#" alt="your image" />
                          </div>
                        </div>
                      </div>
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Detail Image Product</h5>
                        <a href="javascript:void(0);" class="fw-medium">Choose multiple images</a>
                      </div>
                      <div class="card-body">
                        <div class="row g-2 justify-content-center">
                            <input type="file" name="images[]" class="form-control @error('image.*') is-invalid @enderror" multiple>
                        </div>
                      </div>

                    </div>

                </div>
                <div class="col-12 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="card mb-4">
                      <div class="card-header">
                        <h5 class="card-title mb-0">Pricing</h5>
                      </div>
                      <div class="card-body">

                        <div class="form-check mb-2">
                          <input class="form-check-input" type="checkbox" value="" id="price-charge-tax" checked="">
                          <label class="form-label" for="price-charge-tax">
                            Charge tax on this product
                          </label>
                        </div>
                        <!-- Instock switch -->
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                          <span class="mb-0 h6">In stock</span>
                          <div class="w-25 d-flex justify-content-end">
                            <label class="switch switch-primary switch-sm me-4 pe-2">
                              <input type="checkbox" class="switch-input" checked="">
                              <span class="switch-toggle-slider">
                                <span class="switch-on">
                                  <span class="switch-off"></span>
                                </span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-title mb-0">Organize</h5>
                        </div>
                        <div class="card-body">
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
                              <span>Category</span><a href="javascript:void(0);" class="fw-medium">Add new category</a>
                            </label>
                            <div class="position-relative">
                              <select name="categoryID"  id="category-org" class="select2 form-select select2-hidden-accessible" data-placeholder="Select Category" data-select2-id="category-org" tabindex="-1" aria-hidden="true">
                              <option value="0" data-select2-id="8">Select Category</option>
                              @if(!empty($allCategory))
                              @foreach ($allCategory as $item)
                                <option value="{{$item->id}}" {{old('id') == $item->id ? 'selected':false}}>{{$item->name}}</option>
                              @endforeach
                              @endif
                            </select>
                            @error('categoryID')
                            <span style="color: red">{{$message}}</span>
                            @enderror
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 251.771px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-category-org-container"><span class="select2-selection__rendered" id="select2-category-org-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                          </div>
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="brand">
                              Brand
                            </label>
                            <div class="position-relative">
                              <select name="brandID" id="brand" class="select2 form-select select2-hidden-accessible" data-placeholder="Select Vendor" data-select2-id="vendor" tabindex="-1" aria-hidden="true">
                              <option value="0" data-select2-id="6">Select Brand</option>
                              @if(!empty($allBrand))
                              @foreach ($allBrand as $item)
                                <option value="{{$item->id}}" {{old('id') == $item->id ? 'selected':false}}>{{$item->name}}</option>
                              @endforeach
                              @endif
                            </select>
                            @error('brandID')
                            <span style="color: red">{{$message}}</span>
                            @enderror
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 251.771px;"><span class="selection">
                                <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-vendor-container">
                                    <span class="select2-selection__rendered" id="select2-vendor-container" role="textbox" aria-readonly="true">
                                        </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                          </div>

                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="typeBrand">Type of Brand
                            </label>
                            <div class="position-relative"><select name="typeBrandID" id="typeBrand" class="select2 form-select select2-hidden-accessible" >
                              <option value="0" data-select2-id="10">Select Brand before</option>

                            </select>
                            @error('typeBrandID')
                            <span style="color: red">{{$message}}</span>
                            @enderror
                            <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="9" style="width: 251.771px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-collection-container"><span class="select2-selection__rendered" id="select2-collection-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                          </div>
                          <!-- Status -->
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Status
                            </label>
                            <div class="position-relative"><select name="status" id="status-org" class="select2 form-select select2-hidden-accessible" data-placeholder="Published" data-select2-id="status-org" tabindex="-1" aria-hidden="true">
                              <option value="status">Choose Status</option>
                              <option value="0" {{old('Status')==0 ? 'selected':false}}>In active</option>
                              <option value="1"  {{old('Status')==1 ? 'selected':false}}>Active</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="11" style="width: 251.771px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-status-org-container"><span class="select2-selection__rendered" id="select2-status-org-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                          </div>

                        </div>
                      </div>
                  </div>
            </div>
          </form>
            <!-- Page Heading -->

        </div>
    </div>



    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>

</div>

@stop
