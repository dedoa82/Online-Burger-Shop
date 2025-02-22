@extends('layouts.index')

@section('css')

        <link rel="stylesheet" href="{{asset('css/cart.css')}}">
        <link rel="stylesheet" href="{{asset('css/check.css')}}">
    
@endsection

@section('content')

        <!-- Rout-->
        <div class="rout ">
            <div class="container ">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="index.html" class="title">Jevelin</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="url">
                                <span> <a href="index.html">Home</a> </span>
                                <span class="ml-2">></span>
                                <span class="ml-2">Done</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END Rout-->
        <!-- progress bar-->
        <div class="prog">
            <div class="container">
                <div class="content">
                    <ul class="probar">
                        <li class="cart activeCart">View Cart</li>
                        <li class="cart activeCart">Checkout</li>
                        <li class="cart">Done</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Billing details-->
        <div class="billDet">
            <div class="container">
                <div class="content">
                    <form action="{{ url('billing')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="addDet">
                                    <h3 class="litTitle">Billing details</h3>
                                    {{--  --}}
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#AddNewAddress" aria-expanded="false" aria-controls="AddNewAddress">
                                        Add New Address
                                      </button>

                                      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#UseOldAddress" aria-expanded="false" aria-controls="UseOldAddress">
                                        Use Old Address
                                      </button>
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="collapse show" id="AddNewAddress">
                                        <div class="form-group">
                                            <label for="country">Name Of Location *</label>
                                            <input class="input @error('name') is-invalid @enderror" type="text"  placeholder="Set Name Of this Location " id="name" name="name" value="{{ old('name') }}" />
                                        </div>

                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="country">Country / Region *</label>
                                            <input class="input @error('country') is-invalid @enderror" type="text"  placeholder="United Kingdom" id="country" name="country" value="{{ old('country') }}" />
                                        </div>

                                        @error('country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="street">Street address *</label>
                                            <input class="input @error('street') is-invalid @enderror" type="text"  placeholder="House Number and Street Name" id="street" name="street" value="{{ old('street') }}" />
                                        </div>

                                        @error('street')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="street">Town / City * </label>
                                            <input class="input @error('city') is-invalid @enderror" type="text"  placeholder="" id="city" name="city" value="{{ old('city') }}" >
                                        </div>

                                        @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="street">Postcode *</label>
                                            <input class="input @error('postcode') is-invalid @enderror" type="number"  placeholder="Enter Postcode of Country" id="postcode" name="postcode" value="{{ old('postcode') }}" />
                                        </div>

                                        @error('postcode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="street">Phone *</label>
                                            <input class="input @error('phone') is-invalid @enderror" type="text"  placeholder="Enter Your Phone" id="phone" name="phone" value="{{ old('phone') }}" />
                                        </div>

                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <h3 class="litTitle">Additional information</h3>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Order notes (optional)</label>
                                            <textarea class="@error('order_notes') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" placeholder="Notes about your order, e.g. special notes for delivery." name="order_notes"></textarea>
                                        </div>

                                        @error('order_notes')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>   
                                    {{--  --}}
                                    <div class="collapse" id="UseOldAddress">
                                        <h1>Hello</h1>
                                    </div>
                                    {{--  --}}
                                    
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="yourOrder">
                                    <h3 class="litTitle">Your order</h3>
                                    <div class="order">
                                        {{--  --}}
                                        <div class="disF orderInfo first top">
                                            <div class="leftOrder disF-a">
                                                <img src="{{$carts[0]->img}}" alt="" width="50px" height="50px" class="mr-4">
                                                <h5 class="price">{{$carts[0]->name}}  × {{$carts[0]->quantity}}</h5>
                                            </div>
                                            <h5 class="price">
                                                <i class="fas fa-chevron-circle-down "></i>
                                            </h5>
                                        </div>
                                        {{--  --}}
                                        <div class="your_order_product  orderInfo first hidden">
                                            @foreach ($carts as $cart)
                                                @if (!$loop->first)
                                                    <div class="leftOrder disF-a">
                                                        <img src="{{$cart->img}}" alt="" width="50px" height="50px" class="mr-4">
                                                        <h5 class="price">{{$cart->name}}  × {{$cart->quantity}}</h5>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        {{--  --}}
                                        <div class="disF orderInfo">
                                            <h5 class="title">Subtotal</h5>
                                            <h5 class="pric total_price">$8.00</h5>
                                        </div>
                                        <div class="disF orderInfo">
                                            <h5 class="title">Total</h5>
                                            <h5 class="price total_price">$8.00</h5>
                                            <input type="number" name="total_price" class="total_price hidden"  value="" >
                                        </div>
                                    </div>
                                    <div class="payMethode">
                                        <div class="methode">
                                            <input type="radio" name="payment_method" id="methode1" value="Bank Transfer"> 
                                            <label for="methode1">Direct bank transfer</label>
                                            <div class="box hidden">
                                                <p>
                                                    Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="methode">
                                            <input type="radio" name="payment_method" id="methode2" value="Check"> 
                                            <label for="methode2">Check payments</label>
                                            <div class="box hidden">
                                                <p>
                                                    Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="methode">
                                            <input type="radio" name="payment_method" id="methode3" value="Cash On Delivery" checked> 
                                            <label for="methode3">Cash on delivery</label>
                                            <div class="box hidden">
                                                <p>
                                                    Pay with cash upon delivery.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="methode">
                                            <input type="radio" name="payment_method" id="methode4" value="PayPal"> 
                                            <label for="methode4"> PayPal</label>
                                            <img src="https://jevelin.shufflehound.com/burger-shop/wp-content/themes/jevelin/img/paypal.png" alt="" class="ml-2">
                                            <div class="box hidden">
                                                <p>
                                                    Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                                </p>
                                            </div>
                                        </div>
                                        @error('payment_method')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="placeOrder" type="submit">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Billing details-->

@endsection
