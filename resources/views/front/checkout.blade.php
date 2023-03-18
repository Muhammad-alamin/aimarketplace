@extends('front.layouts.master')
@section('content')
<div class="container">
    <ul class="list-unstyled thm-breadcrumb thm-breadcrumb__two">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Pages</a></li>
        <li><a href="proudcts.html">Shop</a></li>
        <li>Checkout</li>
    </ul><!-- /.thm-breadcrumb -->
</div><!-- /.container -->
<section class="checkout-one">
    <div class="container">
        <form action="{{route('billingAddress.store')}}" method="post" class="row checkout-one__main-form">
            @csrf
            <div class="col-lg-6">
                <div class="checkout-one__form">
                    <h3 class="checkout-one__title">Contact Information</h3><!-- /.checkout-one__title -->
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="shipping_phone" placeholder="Phone Number">
                        </div><!-- /.col-md-12 -->
                        <div class="col-md-12">
                            <input type="email" name="shipping_email" placeholder="Email Address">
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                    {{-- <p class="checkout-one__checkbox">
                        <input type="checkbox" id="test1" name="radio-group" checked>
                        <label for="test1">Get Product Updates & Offers</label>
                    </p> --}}
                </div><!-- /.checkout-one__form -->
                <div class="checkout-one__form">
                    <h3 class="checkout-one__title">Shipping Address</h3><!-- /.checkout-one__title -->
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="shipping_name" placeholder="Name">
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-12">
                            <input type="text" name="shipping_address" placeholder="Address">
                        </div><!-- /.col-md-12 -->
                        <div class="col-md-12">
                            <input type="text" name="shipping_city" placeholder="City">
                        </div><!-- /.col-md-12 -->
                        <div class="col-md-6">
                            <input type="text" name="shipping_state" placeholder="state">
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <input type="text" name="shipping_zipcode" placeholder="zipcode">
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                    {{-- <p class="checkout-one__checkbox">
                        <input type="checkbox" id="test2" name="radio-group">
                        <label for="test2">Save for future shopping</label>
                    </p> --}}
                </div><!-- /.checkout-one__form -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="checkout-one__content">
                    <?php $total_amount = 0; ?>
                    @foreach($userCart as $eachCartItem)
                    <div class="checkout-one__content-single">
                        <div class="checkout-one__content-single__left">
                            <div class="checkout-one__content-image">
                                <div class="checkout-one__content-image-inner">
                                    <img src="{{asset($eachCartItem->image)}}" alt="Awesome Image" style="width: 100px; height:70px;" />
                                </div><!-- /.checkout-one__content-image-inner -->
                            </div><!-- /.checkout-one__content-image -->
                            <h3 class="checkout-one__content-title">{{$eachCartItem->pro_name}}</h3><!-- /.checkout-one__content-title -->
                        </div><!-- /.checkout-one__content-single__left -->
                        <div class="checkout-one__content-single__right">
                            <p class="checkout-one__content-price">{{$eachCartItem->pro_quantity}} x ${{$eachCartItem->pro_price}}</p><!-- /.checkout-one__content-price -->
                        </div><!-- /.checkout-one__content-single__right -->
                    </div><!-- /.checkout-one__content-single -->
                    <?php $total_amount = $total_amount + ($eachCartItem->pro_quantity * $eachCartItem->pro_price) ?>
                    <?php $category_id = $eachCartItem->category_id ?>
                    <?php $seller_id = $eachCartItem->user_id ?>
                    <?php $product_price = $eachCartItem->pro_price ?>
                    @endforeach
                    <div class="checkout-one__price">
                        <div class="checkout-one__price-single">
                            <p class="checkout-one__price-name"><span>Sub total</span></p><!-- /.checkout-one__price-name -->
                            <p class="checkout-one__price-amount"><span>$<?php echo number_format($total_amount,2); ?></span></p><!-- /.checkout-one__price-amount -->
                        </div><!-- /.checkout-one__price-single -->
                        {{-- <div class="checkout-one__price-single">
                            <p class="checkout-one__price-name"><span>Shipping</span></p><!-- /.checkout-one__price-name -->
                            <p class="checkout-one__price-amount"><span>$100.00</span></p><!-- /.checkout-one__price-amount -->
                        </div><!-- /.checkout-one__price-single --> --}}
                    </div><!-- /.checkout-one__price -->

                    <div class="checkout-one__total">
                        <p class="checkout-one__total-name">Total</p><!-- /.checkout-one__total-name -->
                        <p class="checkout-one__total-amount">$<?php echo number_format($total_amount,2); ?></p><!-- /.checkout-one__total-amount -->
                    </div><!-- /.checkout-one__total -->

                    <div class="payment-methods" id="payment_method">
                        <h4 class="checkout-one__price-name">Payment Methods</h4>
                        <br>
                        <div class="accordion payment-accordion">
                            <div class="">
                                <div class="radio">
                                    <label><input type="radio" value="cod" name="payment_method" class="mr-2" @if (old('payment_method') == 'cod') checked @endif> Cash on delivery </label>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <div class="radio">
                                        <label><input type="radio" value="card" name="payment_method" class="mr-2" @if (old('payment_method') == 'card') checked @endif> Online Payment </label>
                                    </div>
                                </div>
                            </div>
                            @error('payment_method')<i class="text-danger">{{$message}}</i>@enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="thm-btn checkout-one__btn">Continue PAyment <span>+</span></button>
                </div><!-- /.checkout-one__content -->
            </div><!-- /.col-lg-6 -->
            <input type="hidden" value="{{$seller_id}}" name="seller_id">
            <input type="hidden" value="{{$category_id}}" name="category_id">
            <input type="hidden" value="{{$total_amount}}" name="grand_total">
            <input type="hidden" value="{{$product_price}}" name="product_price">
        </form><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.checkout-one -->
@endsection
