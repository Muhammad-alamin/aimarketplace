@extends('admin.layouts.master')

@section('content')


    <!-- content @s -->
    <div class="nk-content ">

        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Order List</h4>
                                    <div class="nk-block-des">
                                    </div>
                                </div>
                            </div>
                            <!-- /.content-header -->
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" value="{{request('client_information')}}" name="client_information" placeholder="Search by customer information" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" value="{{request('order_id')}}" id="order_id" name="order_id" placeholder="Search by Order id" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="status" class="form-control">
                                                        <option value="" >Select by status</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_PENDING? 'selected':null)}} value="{{\App\Model\Order::STATUS_PENDING}}" >{{\App\Model\Order::STATUS_PENDING}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_PROCESSING?'selected':null)}}value="{{\App\Model\Order::STATUS_PROCESSING}}" >{{\App\Model\Order::STATUS_PROCESSING}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_SHIPPED?'selected':null)}} value="{{\App\Model\Order::STATUS_SHIPPED}}" >{{\App\Model\Order::STATUS_SHIPPED}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_DELIVERED?'selected':null)}} value="{{\App\Model\Order::STATUS_DELIVERED}}" >{{\App\Model\Order::STATUS_DELIVERED}}</option>
                                                        <option {{(request('status')==\App\Model\Order::STATUS_CANCELED?'selected':null)}} value="{{\App\Model\Order::STATUS_CANCELED}}" >{{\App\Model\Order::STATUS_CANCELED}}</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="form-control col-md-2 btn btn-primary">Search</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Id</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Order Id</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Customer Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Customer Address</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Phone No</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Order Status</span></th>
                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Total Amount</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Details</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key=>$order)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$orders->firstItem() + $key}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$order->order_id}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$order->full_name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$order->address}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$order->phone}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{$order->status}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{number_format( $order->grand_total,2)}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <div>
                                                        <a href="{{route('admin.order.show',$order->id)}}" class=" btn btn-gray btn btn-xs"><em class=" note-icon"></em>Details</a>
                                                    </div>
                                                </td>
                                            </tr><!-- .nk-tb-item  -->
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
