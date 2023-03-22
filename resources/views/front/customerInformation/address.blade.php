
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
                            <a href="{{route('customer.orders')}}" class="">Orders</a>
                        </li>
                        <li class="link-item">
                            <a class="" href="">Account details</a>
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

                    <div class="tab-pane" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                            </div>
                        </div>
                        <p>The following addresses will be used on the checkout page
                            by default.</p>
                        <div class="row">
                            <div class="col-sm-12 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                            <tr>
                                                <th>Name:</th>
                                                <td>{{$address->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td>{{$address->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mobile:</th>
                                                <td>{{$address->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td>{{$address->address}}</td>
                                            </tr>
                                            <tr>
                                                <th>Country:</th>
                                                <td>{{$address->country}}</td>
                                            </tr>
                                            <tr>
                                                <th>City:</th>
                                                <td>{{$address->city}}</td>
                                            </tr>
                                            <tr>
                                                <th>State:</th>
                                                <td>{{$address->state}}</td>
                                            </tr>
                                            <tr>
                                                <th>Zip Code:</th>
                                                <td>{{$address->zip}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="{{route('customer.edit.address',\Illuminate\Support\Facades\Crypt::encryptString($address->id))}}"
                                       class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                        your billing address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection
