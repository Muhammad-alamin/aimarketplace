@extends('front.layouts.master')
@section('content')

<div class="container">
    <ul class="list-unstyled thm-breadcrumb thm-breadcrumb__two">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Pages</a></li>
        <li><a href="proudcts.html">Shop</a></li>
        <li>Shopping Cart</li>
    </ul><!-- /.thm-breadcrumb -->
</div><!-- /.container -->
<section class="cart-page">
    <div class="container">
        <div class="cart-main" id="appendCartItem">

            @include('front.ajax-cartItem')

        </div><!-- /.cart-main -->
        <div class="cart-update">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    {{-- <form action="#" class="cart-update__form">
                        <input type="text" placeholder="Enter Coupon Code...">
                        <button type="submit" class="thm-btn cart-update__btn">Apply Coupon<span>+</span></button>
                    </form><!-- /.cart-update__form --> --}}
                </div><!-- /.col-lg-5 -->
                <div class="col-lg-5">
                    <div class="cart-update__button-box">
                        {{-- <button type="submit" class="thm-btn cart-update__btn cart-update__btn-two">Update Cart <span>+</span></button> --}}
                        @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="{{route('checkout')}}" class="thm-btn cart-update__btn cart-update__btn-three">Checkout <span>+</span></a>
                        @else
                        <a href="{{route('checkout')}}" class="thm-btn cart-update__btn cart-update__btn-three">Checkout <span>+</span></a>
                        @endif
                    </div><!-- /.cart-update__button-box -->
                </div><!-- /.col-lg-5 -->
            </div><!-- /.row -->
        </div><!-- /.cart-update -->
    </div><!-- /.container -->
</section><!-- /.cart-page -->
@endsection
