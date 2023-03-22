@extends('admin.layouts.master')

@section('content')

    <!-- content @s -->
    <div role="main" class="main">
        <section role="main" class="content-body card-margin">

            <!-- start: page -->
            <div class="row">
                <div class="col-lg-8">
                    <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                        </div>

                                        <h2 class="card-title">Product</h2>
                                    </header>
                                    <div class="card-body"><form action="{{route('admin.updateCustomer', encrypt($user->id))}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{old('name', isset($user)?$user->name:null)}}" placeholder="Enter User Name">
                                            @error('name')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{old('email', isset($user)?$user->email:null)}}" placeholder="Enter User Email">
                                            @error('email')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">phone No</label>
                                            <input type="text" name="phone" class="form-control form-control-lg" id="phone" value="{{old('phone', isset($user)?$user->phone:null)}}" placeholder="Enter Your Valid phone No">
                                            @error('phone')<i class="text-danger">{{$message}}</i>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Select Country</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" id="default-06" name="country">
                                                        <option selected="" disabled="" >Select Country</option>
                                                        <option  value="Bangladesh">Bangladesh</option>
                                                        <option  value="India">India</option>
                                                        <option  value="Pakistan">Pakistan</option>
                                                    </select>
                                                    @error('country')<i class="text-danger">{{$message}}</i>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Select City</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" id="default-06" name="city">
                                                        <option selected="" disabled="" >Select City</option>
                                                        <option  value="Dhaka">Dhaka</option>
                                                        <option  value="Chittagong">Chittagong</option>
                                                        <option  value="Khulna">Khulna</option>
                                                        <option  value="Sylhet">Sylhet</option>
                                                        <option  value="Rajshahi">Rajshahi</option>
                                                        <option  value="Mymensingh">Mymensingh</option>
                                                        <option  value="Barisal">Barisal</option>
                                                        <option  value="Rangpur">Rangpur</option>
                                                        <option  value="Comilla">Comilla</option>
                                                        <option  value="Narayanganj">Narayanganj</option>
                                                        <option  value="Gazipur">Gazipur</option>
                                                    </select>
                                                    @error('city')<i class="text-danger">{{$message}}</i>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Select Role</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" id="default-06" name="role_as">
                                                        <option selected="" disabled="" >Select Role</option>
                                                        <option  value="vendor">Seller</option>
                                                        <option  value="customer">Customer</option>
                                                    </select>
                                                    @error('role_as')<i class="text-danger">{{$message}}</i>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-10">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="product_status" class="form-label">User Status</label>
                                                        <div class="form-check">
                                                            <input type="radio" name="status" class="form-check-input" @if(old('status',isset($user)?$user->product_status:null)  == 'Active') checked @endif value="Active" id="Active">
                                                            <label  for="active">Active</label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input type="radio" name="status" class="form-check-input" @if(old('status',isset($user)?$user->product_status:null)  == 'Inactive') checked @endif value="Inactive" id="Inactive">
                                                            <label for="inactive">Inactive</label>
                                                        </div>
                                                        @error('status')<i class="text-danger">{{ $message }}</i>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter User password">
                                                @error('password')<i class="text-danger">{{$message}}</i>@enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="password">Confirm Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-md btn-primary btn-block">Save</button>
                                        </div>
                                    </form>
                                    </div>
                    </section>
                </div>
            </div><!-- .nk-block -->
        </section><!-- .components-preview -->
    </div>

@endsection
