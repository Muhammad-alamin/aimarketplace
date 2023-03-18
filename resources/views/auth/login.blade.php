

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
                <h3 class="login-form__title">Login</h3><!-- /.login-form__title -->
                <form method="POST" action="{{ route('login') }}" class="login-form__form">
                    @csrf
                    <div class="login-form__field">
                        <input type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" autocomplete="email">
                        <i class="fa fa-envelope-o"></i>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <!-- /.login-form__field -->
                    <div class="login-form__field" >
                        <input type="password" class=" form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password" autocomplete="password">
                        <i class="fa fa-lock"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <!-- /.login-form__field -->
                    <div class="login-form__bottom">
                        <button type="submit" class="thm-btn login-form__btn">Login <span>+</span></button>
                        <div class="login-form__bottom">
                            <span>
                                <a href="{{ route('custom_register') }}">
                                    Register
                                </a>
                                or
                                @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                            @endif
                            </span>

                        </div><!-- /.login-form__social -->
                    </div><!-- /.login-form__bottom -->
                    <p class="login-form__checkbox">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="test1">Remember Me</label>
                    </p>
                </form><!-- /.login-form__form -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.login-form -->
@endsection
