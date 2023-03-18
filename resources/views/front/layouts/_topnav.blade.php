
<section class="topbar-one">
    <div class="container">
        <div class="inner-container">
            <div class="topbar-one__left">
                <a href="{{ route('front.home') }}" class="topbar-one__link"><i class="egypt-icon-maps-and-location"></i>
                    <!-- /.egypt-icon-maps-and-location -->Get Direction</a><!-- /.topbar-one__link -->
            </div><!-- /.topbar-one__left -->
            <ul class="topbar-one__right list-unstyled">
                <li>
                    <div class="topbar-one__social">
                        <a href="#"><i class="egypt-icon-logo"></i></a>
                        <a href="#"><i class="egypt-icon-twitter"></i></a>
                        <a href="#"><i class="egypt-icon-instagram"></i></a>
                        <a href="#"><i class="egypt-icon-play"></i></a>
                    </div><!-- /.topbar-one__social -->
                </li>
                <li>
                    <a href="#" class="topbar-one__search search-popup__toggler"><i class="egypt-icon-search"></i>
                        <!-- /.egypt-icon-search --></a>
                </li>
                <li>
                    @if (Route::has('login') && Auth::check())
                    <a href="{{ route('login') }}" class="thm-btn topbar-one__btn">{{ substr(Auth::user()->name, 0,  6) }}</a><!-- /.thm-btn -->
                    @else
                    <a href="{{ route('login') }}" class="thm-btn topbar-one__btn">Sign in</a><!-- /.thm-btn -->
                    @endif
                </li>
            </ul><!-- /.topbar-one__right -->
        </div><!-- /.inner-container -->
    </div><!-- /.container -->
</section><!-- /.topbar-one -->

<header class="site-header site-header__header-one  ">
    <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="logo-box">
                <a class="navbar-brand" href="{{ route('front.home') }}">
                    <img src="{{asset('front/assets/images/resources/Art-Gallery5.png')}}" style="width:199px; height:45px" class="main-logo" alt="Awesome Image" />
                </a>
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- /.logo-box -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-navigation">
                <ul class=" navigation-box @@extra_class">
                    <li class="current">
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#">Collections</a>
                        <ul class="submenu">
                            @php
                            use Illuminate\Support\Facades\DB;
                                $categories = DB::table('categories')->select('id','category_title')->get();
                            @endphp
                            @foreach ($categories as $category)
                            <li><a href="{{ route('category.product',encrypt($category->id)) }}">{{ $category->category_title }}</a></li>
                            @endforeach
                        </ul><!-- /.submenu -->
                    </li>

                    <li>
                        <a href="{{ route('front.shop') }}">Shop</a>
                    </li>

                    <li>
                        <a href="{{ route('seller_register') }}">Become a member</a>
                    </li>

                    <li>
                        <a href="javascript:void(0)">Blog</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="right-side-box">
                <a href="{{ route('cart') }}" class="site-header__cart"><i class="egypt-icon-supermarket"></i>
                    <!-- /.egypt-icon-supermarket --> <span class="count">3</span><!-- /.count --></a>
                <!-- /.site-header__cart -->
                <a href="#" class="site-header__sidemenu-nav side-menu__toggler">
                    <span class="site-header__sidemenu-nav-line"></span><!-- /.site-header__sidemenu-nav-line -->
                    <span class="site-header__sidemenu-nav-line"></span><!-- /.site-header__sidemenu-nav-line -->
                    <span class="site-header__sidemenu-nav-line"></span><!-- /.site-header__sidemenu-nav-line -->
                </a><!-- /.site-header__sidemenu -->
            </div><!-- /.right-side-box -->
        </div>
        <!-- /.container -->
    </nav>
</header><!-- /.site-header -->
