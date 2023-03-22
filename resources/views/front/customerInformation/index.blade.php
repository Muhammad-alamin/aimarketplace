@extends('front.layouts.master')
@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical ">
                    <ul class="nav nav-tabs mb-6" >
                        <li class="link-item">
                            <a href="{{route('customer.dashboard',\Illuminate\Support\Facades\Crypt::encryptString(\Illuminate\Support\Facades\Auth::user()->id))}}" class="">Dashboard</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.orders')}}" >Orders</a>
                        </li>
                        <li class="link-item">
                           <a class="" href="{{route('customer.edit',encrypt($userId->id))}}">Account details</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.address')}}">Address</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('wishlist')}}">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <em class="icon ni ni-signout"></em><span>Log out</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">{{auth()->user()->name}}</span>
                                (not
                                <span class="text-dark font-weight-bold">{{auth()->user()->name}}</span>?
                                <a class="" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <em class="icon ni ni-signout"></em><span>Log out</span>
                                </a>)

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </p>

                            <p class="mb-4">
                                From your account dashboard you can view your <a href="{{route('customer.orders')}}"
                                                                                 class="text-primary link-to-tab">recent orders</a>,
                                manage your <a href="{{route('customer.address')}}" class="text-primary link-to-tab">shipping
                                    and billing
                                    addresses</a>, and
                                <a href="{{route('customer.edit',encrypt($userId->id))}}" class="text-primary link-to-tab">edit your password and
                                    account details.</a>
                            </p>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route('customer.orders')}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route('customer.edit',encrypt($userId->id))}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href={{route('customer.address')}} class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Address</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href={{route('wishlist')}} class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Wishlist</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Logout</p>
                                            </div>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                <tr>
                                    <th class="order-id">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total">
                                        <span class="order-price">$121.00</span> for
                                        <span class="order-quantity"> 1</span> item
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total">
                                        <span class="order-price">$150.00</span> for
                                        <span class="order-quantity"> 1</span> item
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2319</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total">
                                        <span class="order-price">$201.00</span> for
                                        <span class="order-quantity"> 1</span> item
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2318</td>
                                    <td class="order-date">August 20, 2021</td>
                                    <td class="order-status">Processing</td>
                                    <td class="order-total">
                                        <span class="order-price">$321.00</span> for
                                        <span class="order-quantity"> 1</span> item
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="account-downloads">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-downloads mr-2">
                                        <i class="w-icon-download"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title ls-normal">Downloads</h4>
                                </div>
                            </div>
                            <p class="mb-4">No downloads available yet.</p>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="{{route('customer.update',$userId->id)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="username">Full name </label>
                                            <input type="text" id="username" name="username" placeholder="{{$userId->name}}"
                                                   class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email_1">Email address </label>
                                    <input type="email" id="email" name="email"
                                           class="form-control form-control-md" placeholder="{{$userId->email}}">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email_1">Email address </label>
                                    <input type="text" id="mobile" name="mobile"
                                           class="form-control form-control-md" placeholder="{{$userId->mobile}}">
                                </div>

                                <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                <div class="form-group">
                                    <label class="text-dark" for="cur-password">Current Password </label>
                                    <input type="password" class="form-control form-control-md"
                                           id="cur-password" name="cur_password">
                                    @if(session('warning'))
                                        <span class="text-danger">{{session('warning')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new-password">New Password </label>
                                    <input type="password" class="form-control form-control-md"
                                           id="new-password" name="new_password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Confirm Password</label>
                                    <input type="password" class="form-control form-control-md"
                                           id="conf-password" name="conf_password">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection
