@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>


   <form method="POST" action="{{route('clients.payment')}}">
    @csrf
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input name="firstName" class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input name="lastName" class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input name="email" class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phone</label>
                                <input name="phone" class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input name="address" class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Description</label>
                                <input name="desc" class="form-control" type="text" placeholder="Description">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select name="country" class="custom-select">
                                    <option value="Viet Name" selected>Viet Nam</option>                             
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input name="city" class="form-control" type="text" placeholder="Hung Yen">
                            </div>                                         
                        </div>
                    </div>
                  
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            
                            @if (!@empty($carts))                                                                                                  
                            @foreach ($carts as $key => $item)   
                            <div class="d-flex justify-content-between">
                                <p>{{$item->name}}</p>
                                <p>x {{$item->quantity}}</p>
                                <p>{{number_format($item->price)}}</p>
                            </div>
                            @endforeach                    
                            @else
                            <div colspan="4">No one product</div>
                            @endif                                        
                        </div>          
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>{{number_format($total)}}</h5>
                                <input type="hidden" name="total_amount" value={{$total}}>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="bg-light p-30">          
                            <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </form>
@stop