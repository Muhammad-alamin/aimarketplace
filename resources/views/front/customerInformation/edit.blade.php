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
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" >
                        <li class="link-item">
                            <a href="{{route('customer.dashboard',$userId->id)}}" >Dashboard</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.create')}}" >Orders</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.edit',encrypt($userId->id))}}" >Account details</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.create')}}">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('customer.create')}}">Logout</a>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="" id="">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="{{route('customer.update',encrypt($userId->id))}}" method="post">
                                @method('put')
                                @csrf
                                <br>
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="username">Full name </label>
                                                <input type="text" id="username" name="username" value="{{old('name', isset($userId)?$userId->name:null)}}"
                                                       class="form-control form-control-md">
                                                @error('username')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                        </div>


                                    <div class="form-group mb-6">
                                        <label for="email_1">Email address </label>
                                        <input type="email" id="email" name="email"
                                               class="form-control form-control-md" value="{{old('email', isset($userId)?$userId->email:null)}}">
                                        @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="email_1">Mobile Number</label>
                                        <input type="text" id="mobile" name="mobile"
                                               class="form-control form-control-md" value="{{old('mobile', isset($userId)?$userId->mobile:null)}}">
                                        @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
                                    </div>

                                    <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                    <div class="form-group">
                                        <label class="text-dark" for="cur-password">Current Password </label>
                                        <input type="password" class="form-control form-control-md"
                                               id="cur-password" name="cur_password">
                                        @if(session('warning'))
                                            <span class="text-danger" style="color: red">{{session('warning')}}</span>
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
                                        @if(session('danger'))
                                            <span class="text-danger" style="color: red">{{session('danger')}}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                                </div>
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
