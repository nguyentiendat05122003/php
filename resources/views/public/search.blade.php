@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-3 col-md-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form method="POST" action="{{ route('filterProduct') }}">
                        @csrf
                        <div class="custom-control custom-radio mb-3">
                            <input {{ request()->price == "0" ? 'checked' : '' }} type="radio" id="price-0" name="price" value="0" class="custom-control-input" onchange="this.form.submit()">
                            <label class="custom-control-label" for="price-0">All</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input {{ request()->price == "1" ? 'checked' : '' }} type="radio" id="price-1" name="price" value="1" class="custom-control-input" onchange="this.form.submit()">
                            <label class="custom-control-label" for="price-1">0 - {{ number_format(100000) }}</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input {{ request()->price == "2" ? 'checked' : '' }} type="radio" id="price-2" name="price" value="2" class="custom-control-input" onchange="this.form.submit()">
                            <label class="custom-control-label" for="price-2">{{ number_format(100000) }} - {{ number_format(1000000) }}</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input {{ request()->price == "3" ? 'checked' : '' }} type="radio" id="price-3" name="price" value="3" class="custom-control-input" onchange="this.form.submit()">
                            <label class="custom-control-label" for="price-3">1 triệu trở lên</label>
                        </div>

                </div>
                <!-- Price End -->

                <!-- Color Start -->

                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Brand</span></h5>
                <div class="bg-light p-4 mb-30">
                        @if (!@empty($allBrand))
                        @foreach ($allBrand as $key => $item)
                        <div class="custom-control  custom-control custom-radio ">
                            <input  {{request()->brandID == $item->id ? 'checked': ''}} onChange="this.form.submit()"  type="radio" name="brandID" value="{{$item->id}}" class="custom-control-input-{{$item->id}}" id="color-{{$item->id}}">
                            <label class="" for="color-{{$item->id}}">{{$item->name}}</label>
                        </div>
                        @endforeach
                        @else
                        <div colspan="4">No one product</div>
                        @endif

                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <select id="sortProduct" name="sortProduct" class="form-select text-capitalize">
                                        <option value="0">Sorting</option>
                                        <option value="1" {{request()->sortProduct == "1" ? 'selected': false}}>Latest</option>
                                        <option value="2" {{request()->sortProduct == "2" ? 'selected': false}}>Popularity</option>
                                    </select>
                                    <select id="ProductCategory" name="categoryID" class="form-select text-capitalize" style="margin-left:'4px'">
                                        <option value="0">Category</option>
                                        @if(!empty($allCategory))
                                          @foreach ($allCategory as $item)
                                            <option value="{{$item->id}}" {{request()->categoryID == $item->id ? 'selected': false}}>{{$item->name}}</option>
                                          @endforeach
                                          @endif
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    @if ($productList->count() > 0)
                                   @foreach ($productList as $key =>$item)
                                   <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100"  style="max-height: 261px" src="{{URL::asset('storage/'.$item->thumb)}}" alt="">
                                            <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="{{route('productDetail',['id'=> $item->id])}}"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="">{{$item->name}}</a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5>{{number_format($item->MinPrice)}} - {{number_format($item->MaxPrice)}} VND</h5>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mb-1">
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small>(99)</small>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                   @endforeach
                    @elseif($productList->count() == 0)
                                <div colspan="4">No one product</div>
                    @endif

                    <div class="col-12">
                        <nav>
                            <div style="display: flex;justify-content: center;">{{$productList->appends($_GET)->links()}}</div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
@stop
