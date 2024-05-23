@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if (!@empty($carts))
                        @foreach ($carts as $key => $item)
                        <tr>
                            <td class="align-middle"><img src="{{URL::asset('storage/'.$item->thumb)}}" alt="" style="width: 50px;"> {{$item->name}}</td>
                            <td class="align-middle">{{$item->size}}</td>
                            <td class="align-middle">{{$item->color}}</td>
                            <td class="align-middle">{{number_format($item->price)}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <form action="{{route('clients.decrementQuantity',['id'=> $item->id])}}" method="POST">
                                        @csrf
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <input name='quantity' type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value={{$item->quantity}}>
                                    <form action="{{route('clients.incrementQuantity',['id'=> $item->id])}}" method="POST">
                                        @csrf
                                        <div class="input-group-btn">
                                            <button  type="submit"  class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                </td>
                                <td class="align-middle">{{number_format($item->price * $item->quantity)}}</td>
                                <td class="align-middle"><form action="{{route('clients.deleteCart',['id'=> $item->id])}}" method="POST">
                                    @csrf
                                    <button  type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></form></td>
                                </tr>
                        @endforeach
                        @else
                        <div colspan="4">No one product</div>
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">

                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{number_format($totalPrice)}} VND</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3"><a style="color: black;text-decoration:none" href="{{route('clients.checkout')}}">Proceed To Checkout</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


