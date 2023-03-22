@extends('admin.layouts.master')

@section('content')
<section role="main" class="content-body">
    <!-- start: page -->
        <div class="row">
            <div class="col">
                @if(session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session()->get('success')}}
                    </div>
                @endif
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        </div>

                        <h2 class="card-title">Project List</h2>
                    </header>

                    <div class="card">
                        <div class="card-body">
                            <form action="" method="">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <input type="text" value="{{request('client_information')}}" name="client_information" placeholder="Search by customer information" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <input type="text" value="{{request('order_id')}}" id="order_id" name="order_id" placeholder="Search by Order id" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <select name="status" class="form-control">
                                            <option value="" >Select by status</option>
                                            <option {{(request('status')==\App\Models\Order::STATUS_PENDING? 'selected':null)}} value="{{\App\Models\Order::STATUS_PENDING}}" >{{\App\Models\Order::STATUS_PENDING}}</option>
                                            <option {{(request('status')==\App\Models\Order::STATUS_PROCESSING?'selected':null)}}value="{{\App\Models\Order::STATUS_PROCESSING}}" >{{\App\Models\Order::STATUS_PROCESSING}}</option>
                                            <option {{(request('status')==\App\Models\Order::STATUS_SHIPPED?'selected':null)}} value="{{\App\Models\Order::STATUS_SHIPPED}}" >{{\App\Models\Order::STATUS_SHIPPED}}</option>
                                            <option {{(request('status')==\App\Models\Order::STATUS_DELIVERED?'selected':null)}} value="{{\App\Models\Order::STATUS_DELIVERED}}" >{{\App\Models\Order::STATUS_DELIVERED}}</option>
                                            <option {{(request('status')==\App\Models\Order::STATUS_CANCELED?'selected':null)}} value="{{\App\Models\Order::STATUS_CANCELED}}" >{{\App\Models\Order::STATUS_CANCELED}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-lg-2 mb-2">
                                        <button type="submit" class="form-control btn btn-primary text-center">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                            <thead>
                                <tr>
                                    <th>Order id</span></th>
                                    <th>Customer name</span></th>
                                     <th>Address</span></th>
                                     <th>Phone</span></th>
                                     <th>Status</span></th>
                                      <th>Price</span></th>
                                      <th>Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key=>$order)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">{{$order->order_id}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                        <span>{{$order->full_name}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$order->address}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                        <span>{{$order->phone}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$order->status}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead">৳ {{number_format( $order->grand_total)}}</span>
                                    </td>
                                    <td class="actions">
                                        <a href="{{route('admin.order.show',encrypt($order->id))}}" class=""><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr><!-- .nk-tb-item  -->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    <!-- end: page -->
</section>
@endsection
