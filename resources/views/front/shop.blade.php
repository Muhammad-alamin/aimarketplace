@extends('front.layouts.master')
@section('content')
<section class="inner-banner" style="background-image: url({{ asset('front/assets/images/background/inner-banner-bg-1-2.jpg') }});">
    <div class="container">
        <h2 class="inner-banner__title">Our Store</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li>Store</li>
        </ul><!-- /.thm-breadcrumb -->
    </div><!-- /.container -->
</section><!-- /.inner-banner -->
<div class="product-sorting">
    <div class="container">
        <div class="inner-container">
            <select class="selectpicker">
                <option>Default Sorting</option>
                <option>Best Selling</option>
                <option>Top Rated</option>
                <option>Sort By Price</option>
            </select>
            <p class="product-sorting__text">Showing 1-12 of 35 results</p><!-- /.product-sorting__text -->
        </div><!-- /.inner-container -->
    </div><!-- /.container -->
</div><!-- /.product-sorting -->
<section class="product-one">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-duration="1500ms">
                <div class="product-one__single">
                    <div class="product-one__image">
                        <img src="{{ asset($product->image) }}" style="height: 270px;" alt="Awesome Image" />
                    </div><!-- /.product-one__image -->
                    <div class="product-one__content">
                        <div class="product-one__content-left">
                            <h3 class="product-one__title">
                                <a href="{{ route('product.details',encrypt($product->id)) }}">{{ $product->product_name }}</a>
                            </h3><!-- /.product-one__title -->
                            <p class="product-one__text">${{ number_format($product->price,2)}}</p><!-- /.product-one__text -->
                            <p class="product-one__stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span>(24 Reviews)</span>
                            </p><!-- /.product-one__stars -->
                        </div><!-- /.product-one__content-left -->


                        <div class="product-one__content-right">
                            @if($product->quantity < 1)

                            <a href="{{route('product.details',encrypt($product->id))}}" class="btn-product-icon w-icon-hamburger " title="Add to cart">
                            </a>
                            @else
                            @php($countCartItem = 0 )
                            @php($countCartItem = DB::table('carts')->where(['pro_id' => $product->id, 'session_id' => \Illuminate\Support\Facades\Session::get('session_id') ])->count())
                            <button type="button" data-toggle="tooltip" data-placement="top" title="Add to Cart" class=" @if($countCartItem > 0)  product-one__cart-btn @else product-one__cart-btn @endif  updateCart"

                            data-cart_pro_id="{{$product->id}}"
                            data-user_id="{{$product->user_id}}"
                            data-category_id="{{$product->product_category_id}}"
                            data-productprice="{{$product->price}}"
                            data-size="{{$product->size}}"
                            data-product_name="{{$product->product_name}}">
                            <i class="egypt-icon-supermarket"></i></button>
                            @endif
                        </div><!-- /.product-one__content-right -->
                    </div><!-- /.product-one__content -->
                </div><!-- /.product-one__single -->
            </div><!-- /.col-lg-3 col-md-6 -->
            @endforeach
        </div><!-- /.row -->
        <div class="post-pagination">
            <a href="#">Prev</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">Next</a>
        </div><!-- /.post-pagination -->
    </div><!-- /.container -->
</section><!-- /.product-one -->
@endsection
