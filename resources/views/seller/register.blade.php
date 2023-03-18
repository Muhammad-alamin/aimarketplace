
@extends('front.layouts.master')

@section('content')
<div class="container">
    <ul class="list-unstyled thm-breadcrumb thm-breadcrumb__two">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Pages</a></li>
        <li><a href="proudcts.html">Shop</a></li>
        <li>My Account</li>
    </ul><!-- /.thm-breadcrumb -->
</div><!-- /.container -->
<section class="login-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="login-form__title">Register as a Seller</h3><!-- /.login-form__title -->
                <form method="POST" action="{{ route('seller.store') }}" class="login-form__form">
                    @csrf
                    <div class="login-form__field">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter User name" required autocomplete="name">

                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="login-form__field">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" required autocomplete="phone">

                        @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="login-form__field">
                        <input type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" autocomplete="email">

                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <!-- /.login-form__field -->
                    <div class="login-form__field" >
                        <input type="password" class=" form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password" autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="login-form__field" >
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Passsword" required autocomplete="new-password">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <!-- /.login-form__field -->
                    <div class="login-form__bottom">
                        <button type="submit" class="thm-btn login-form__btn">Register <span>+</span></button>
                        <div class="login-form__bottom">
                            <span>
                            <a href="{{ route('login') }}">
                                Login here!
                            </a>
                            </span>

                        </div><!-- /.login-form__social -->
                    </div><!-- /.login-form__bottom -->
                </form><!-- /.login-form__form -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.login-form -->
@endsection

