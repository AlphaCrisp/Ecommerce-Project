@extends('frontend.main_master')
@section('content')

@section('title')
My Cart Page
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>MyCart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th class="cart-romove item">Remove</th> -->
                                    <th class="cart-description item" style="text-align: initial !important;"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Image</th>
                                    <th class="cart-product-name item" style="text-align: initial !important;">Product Name</th>
                                    <th class="cart-edit item" style="text-align: initial !important;">&nbsp&nbsp&nbsp&nbsp&nbsp Quantity</th>
                                    <th class="cart-sub-total item" style="text-align: initial !important;">&nbsp&nbsp Subtotal</th>
                                    <th class="cart-qty item" style="text-align: initial !important;">Remove</th>
                                    <!-- <th class="cart-total last-item">Grandtotal</th> -->
                                </tr>
                            </thead>
                            <tbody id="cartPage">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 cart-shopping-total"></div>

                <div class="col-md-4 col-sm-12 estimate-ship-tax">

                    @if(Session::has('coupon'))

                    @else

                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter Your Coupon Code</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input" placeholder="Enter Coupon Here" id="coupon_name">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary" onClick="applyCoupon()">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    @endif
                </div>

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="couponCalField">

                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->

            </div><!-- /.row -->
        </div><!-- /.sigin-in-->



        <br>
        @include('frontend.body.brands')
    </div>







    @endsection