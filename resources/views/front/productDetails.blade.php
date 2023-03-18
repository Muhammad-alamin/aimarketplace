@extends('front.layouts.master')
@section('content')

<div class="container">
    <ul class="list-unstyled thm-breadcrumb thm-breadcrumb__two">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Pages</a></li>
        <li><a href="proudcts.html">Shop</a></li>
        <li>Single Product</li>
    </ul><!-- /.thm-breadcrumb -->
</div><!-- /.container -->
<section class="product-details">
    <form action="{{route('addToCart')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="container">
        <div class="row">
            <input type="hidden" value="{{$product->id}}" name="pro_id">
            <input type="hidden" value="{{$product->user_id}}" name="user_id">
            <input type="hidden" value="{{$product->product_category_id}}" name="category_id">
            <input type="hidden" value="{{$product->product_name}}" name="pro_name">
            <input type="hidden" value="{{$product->price}}" name="pro_price">
            <input type="hidden" value="{{$product->size}}" name="pro_size">

                <div class="col-lg-6">
                    <div class="product-details__image">
                        <img class="img-fluid" src="{{ asset($product->image) }}" alt="Awesome Image" />
                        <a href="{{ asset($product->image) }}" class="product-details__img-popup img-popup"><i class="fa fa-search"></i></a>
                    </div><!-- /.product-details__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="product-details__content">
                        <h3 class="product-details__title">{{ $product->product_name }}</h3><!-- /.product-details__title -->
                        <p class="product-details__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>(24 Reviews)</span>
                        </p><!-- /.product-details__stars -->
                        <p class="product-details__price">${{ number_format($product->price,2) }}</p><!-- /.product-details__price -->
                        <p class="product-details__text">{{ $product->description }}</p><!-- /.product-details__text -->
                        <p class="product-details__categories">
                            <span class="text-uppercase">Categories:</span>
                            <a href="#">{{ $product->category->category_title }}</a>
                        </p><!-- /.product-details__categories -->
                        <div class="product-details__button-block">
                            <input class="quantity-spinner" type="text" value="1" name="quantity">
                            <button type="submit" class="thm-btn product-details__cart-btn">Add to Cart <span>+</span></button>
                        </div><!-- /.product-details__button-block -->
                        <p class="product-details__availabelity">
                            <span>Availability:</span>
                            In stock
                        </p><!-- /.product-details__availabelity -->
                        <p class="product-details__social">
                            <span><i class="egypt-icon-share"></i></span>
                            <a href="#"><i class="fa fa-facebook-f"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </p><!-- /.product-details__social -->
                        <div class="accrodion-grp" data-grp-name="product-details__accrodion">
                            <div class="accrodion ">
                                <div class="accrodion-title">
                                    <h4>Description</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>{{ $product->description }}</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>Reviews</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <div class="product-details__review">
                                            <div class="product-details__review-single">
                                                <div class="product-details__review-left">
                                                    <img src="{{ asset('front/assets/images/shop/review-1-2.jpg') }}" alt="Awesome Image" />
                                                </div><!-- /.product-details__review-left -->
                                                <div class="product-details__review-right">
                                                    <div class="product-details__review-top">
                                                        <div class="product-details__review-top-left">
                                                            <h3 class="product-details__review-title">William Cobus</h3>
                                                            <span class="product-details__review-sep">–</span>
                                                            <span class="product-details__review-date">Nov 10, 2022</span>
                                                        </div><!-- /.product-details__review-top-left -->
                                                        <div class="product-details__review-top-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div><!-- /.product-details__review-top-right -->
                                                    </div><!-- /.product-details__review-top -->
                                                    <p class="product-details__review-text">We denounce with righteous indignation and dislike men who are so beguiled & demoralized.</p><!-- /.product-details__review-text -->
                                                </div><!-- /.product-details__review-right -->
                                            </div><!-- /.product-details__review-single -->
                                            <div class="product-details__review-single">
                                                <div class="product-details__review-left">
                                                    <img src="{{ asset('front/assets/images/shop/review-1-1.jpg') }}" alt="Awesome Image" />
                                                </div><!-- /.product-details__review-left -->
                                                <div class="product-details__review-right">
                                                    <div class="product-details__review-top">
                                                        <div class="product-details__review-top-left">
                                                            <h3 class="product-details__review-title">William Cobus</h3>
                                                            <span class="product-details__review-sep">–</span>
                                                            <span class="product-details__review-date">Nov 10, 2022</span>
                                                        </div><!-- /.product-details__review-top-left -->
                                                        <div class="product-details__review-top-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div><!-- /.product-details__review-top-right -->
                                                    </div><!-- /.product-details__review-top -->
                                                    <p class="product-details__review-text">We denounce with righteous indignation and dislike men who are so beguiled & demoralized.</p><!-- /.product-details__review-text -->
                                                </div><!-- /.product-details__review-right -->
                                            </div><!-- /.product-details__review-single -->
                                        </div><!-- /.product-details__review -->
                                        <div class="product-details__review-form">
                                            <h3 class="product-details__review-form__title">Add Your Comments</h3><!-- /.product-details__review-form__title -->
                                            <p class="product-details__review-form__text">Your email address will not be published. Required fields are marked*</p><!-- /.product-details__review-form__text -->
                                            <p class="product-details__review-form__rating">
                                                <span>Rating</span>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </p><!-- /.product-details__review-form__rating -->
                                            <form action="#" class="contact-one__form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p class="contact-one__field">
                                                            <label>Your Name<span>*</span></label>
                                                            <input type="text" name="fname">
                                                        </p><!-- /.contact-one__field -->
                                                    </div><!-- /.col-lg-6 -->
                                                    <div class="col-lg-6">
                                                        <p class="contact-one__field">
                                                            <label>Email<span>*</span></label>
                                                            <input type="text" name="email">
                                                        </p><!-- /.contact-one__field -->
                                                    </div><!-- /.col-lg-6 -->
                                                    <div class="col-lg-12">
                                                        <p class="contact-one__field">
                                                            <label>Your Comments</label>
                                                            <textarea name="message"></textarea>
                                                            <button type="submit" class="thm-btn contact-one__btn">Submit <span>+</span></button>
                                                        </p><!-- /.contact-one__field -->
                                                    </div><!-- /.col-lg-6 -->
                                                </div><!-- /.row -->
                                            </form>
                                        </div><!-- /.product-details__review-form -->
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                        </div>
                    </div><!-- /.product-details__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
    </div><!-- /.container -->
    </form>
</section><!-- /.product-details -->
<section class="related-product">
    <div class="container">
        <h3 class="related-product__title">Related Products</h3><!-- /.related-product__title -->
        <div class="related-product__carousel owl-carousel owl-theme">
            @foreach ($related_products as $related_product)
            <div class="item">
                <div class="product-one__single">
                    <div class="product-one__image">
                        <img src="{{ asset($related_product->image) }}" alt="Awesome Image" />
                    </div><!-- /.product-one__image -->
                    <div class="product-one__content">
                        <div class="product-one__content-left">
                            <h3 class="product-one__title">
                                <a href="{{ route('product.details',encrypt($related_product->id)) }}">{{ $related_product->product_name }}</a>
                            </h3><!-- /.product-one__title -->
                            <p class="product-one__text">${{ number_format($related_product->price,2) }}</p><!-- /.product-one__text -->
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
                            <a href="cart.html" data-toggle="tooltip" data-placement="top" title="Add to Cart" class="product-one__cart-btn"><i class="egypt-icon-supermarket"></i></a>
                        </div><!-- /.product-one__content-right -->
                    </div><!-- /.product-one__content -->
                </div><!-- /.product-one__single -->
            </div><!-- /.item -->
            @endforeach
        </div><!-- /.related-product__carousel owl-carousel owl-theme -->
    </div><!-- /.container -->
</section><!-- /.related-product -->

@endsection

