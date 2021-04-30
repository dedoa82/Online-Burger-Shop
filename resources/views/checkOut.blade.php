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
            <div class="row">
                <div class="col-lg-7">
                    <div class="addDet">
                        <h3 class="litTitle">Billing details</h3>
                        <form action="/action_page.php">
                            <div class="form-group">
                              <label for="country">Country / Region *</label>
                              <input class="input" type="text"  placeholder="United Kingdom" id="country">
                            </div>
                            <div class="form-group">
                              <label for="street">Street address *</label>
                              <input class="input" type="text"  placeholder="House Number and Street Name" id="street">
                            </div>
                            <div class="form-group">
                                <label for="street">Town / City * </label>
                                <input class="input" type="text"  placeholder="" id="street">
                            </div>
                            <div class="form-group">
                                <label for="street">Postcode *</label>
                                <input class="input" type="text"  placeholder="Enter Postcode of Country" id="street">
                            </div>
                            <div class="form-group">
                                <label for="street">Phone *</label>
                                <input class="input" type="text"  placeholder="Enter Your Phone" id="street">
                            </div>
                            <h3 class="litTitle">Additional information</h3>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Order notes (optional)</label>
                                <textarea id="exampleFormControlTextarea1" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="yourOrder">
                        <h3 class="litTitle">Your order</h3>
                        <div class="order">
                            <div class="disF orderInfo first">
                                <div class="leftOrder disF-a">
                                    <img src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/44/2020/11/Layer-1-300x300.png" alt="" width="50px" height="50px" class="mr-4">
                                    <h5 class="price">Juicy Burger  × 2</h5>
                                </div>
                                <h5 class="price">$8.00</h5>
                            </div>
                            <div class="disF orderInfo">
                                <h5 class="title">Total</h5>
                                <h5 class="price">$8.00</h5>
                            </div>
                            <div class="disF orderInfo">
                                <h5 class="title">Total</h5>
                                <h5 class="price">$8.00</h5>
                            </div>
                        </div>
                        <div class="payMethode">
                            <div class="methode">
                                <input type="radio" name="payMethode" id="methode1" value="methode1"> 
                                <label for="methode1">Direct bank transfer</label>
                                <div class="box hidden">
                                    <p>
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                    </p>
                                </div>
                            </div>
                            <div class="methode">
                                <input type="radio" name="payMethode" id="methode2" value="methode2"> 
                                <label for="methode2">Check payments</label>
                                <div class="box hidden">
                                    <p>
                                        Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                    </p>
                                </div>
                            </div>
                            <div class="methode">
                                <input type="radio" name="payMethode" id="methode3" value="methode3"> 
                                <label for="methode3">Cash on delivery</label>
                                <div class="box hidden">
                                    <p>
                                        Pay with cash upon delivery.
                                    </p>
                                </div>
                            </div>
                            <div class="methode">
                                <input type="radio" name="payMethode" id="methode4" value="methode4"> 
                                <label for="methode4"> PayPal</label>
                                <img src="https://jevelin.shufflehound.com/burger-shop/wp-content/themes/jevelin/img/paypal.png" alt="" class="ml-2">
                                <div class="box hidden">
                                    <p>
                                        Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a href="Done.html">
                            <button class="placeOrder">Place Order</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Billing details-->

@endsection
