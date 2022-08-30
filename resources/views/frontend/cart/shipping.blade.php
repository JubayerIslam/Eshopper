@extends('frontend.master')

@section('content')
 <!-- Page Header Start -->
 <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
       <form action="{{ url('/shipping/store') }}" method="POST">
        @csrf
        @php 
            $total_qty = 0;
            $total_price = 0;
        @endphp
        @foreach($products as $product)
        <input class="form-control" name="product_id[]" type="hidden" value="{{ $product->product_id }}">
        <input class="form-control" name="qty[]" type="hidden" value="{{ $qty =$product->qty }}">
        <input class="form-control" name="price[]" type="hidden" value="{{ $price = $product->price }}">

        @php 
            $total_qty += $qty;
            $total_price += $price;
        @endphp
        @endforeach
        <input class="form-control" name="total_qty" type="hidden" value="{{ $total_qty }}">
        <input class="form-control" name="total_price" type="hidden" value="{{ $total_price }}">
       <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing & Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text" placeholder="+123 456 789">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control @error('address_one') is-invalid @enderror" name="address_one" type="text" placeholder="123 Street">
                            @error('address_one')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control @error('address_two') is-invalid @enderror" name="address_two" type="text" placeholder="123 Street">
                            @error('address_two')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select @error('country') is-invalid @enderror" name="country">
                                <option selected>United States</option>
                                <option value="afghanistan" >Afghanistan</option>
                                <option value="albania" >Albania</option>
                                <option value="algeria" >Algeria</option>
                            </select>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control @error('city') is-invalid @enderror" name="city" type="text" placeholder="New York">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control @error('state') is-invalid @enderror" name="state" type="text" placeholder="New York">
                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control @error('zip') is-invalid @enderror" name="zip" type="text" placeholder="123">
                            @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products Details</h5>
                        @foreach($products as $product)
                        <div class="d-flex justify-content-between product-deatils">
                        <img src="{{ asset('/product/img/'.$product->products->image) }}" alt="" style="width: 50px;"> 
                            <p>{{ $product->products->name }}</p>
                            <p>${{ $product->price }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card border-secondary mb-5 @error('payment_type') is-invalid @enderror">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type" id="paypal" value="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type" id="directcheck" value="cash">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input @error('payment_type') is-invalid @enderror" name="payment_type" id="banktransfer" value="bank">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        @error('payment_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
       </form>
    </div>
    <!-- Checkout End -->
@endsection