
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

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">

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
                            @foreach($orders as $order)
                            <tr>
                                <td class="order-id">{{$order->order_id}}</td>
                                <td class="order-date">{{$order->order_date}}</td>
                                <td class="order-status">{{$order->status}}</td>
                                <td class="order-total">
                                    <span class="order-price">{{$order->grand_total}}</span>
                                </td>
                                <td class="order-action">
                                    <a href="{{route('customer.orders.details', \Illuminate\Support\Facades\Crypt::encryptString($order->id))}}"
                                       class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{route('Home')}}" class="btn btn-dark btn-rounded btn-icon-right">Go
                            Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

@endsection
