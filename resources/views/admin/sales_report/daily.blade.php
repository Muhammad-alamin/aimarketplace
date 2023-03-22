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
                                    <div class="col-md-10 mb-2">
                                        <input type="text" class="form-control" name="daily_report" id="daily_report" value="{{request('daily_report')}}" placeholder="Search by Date">
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
                                    <th>Order id</th>
                                    <th>Customer name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Status</span></th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key=>$order)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{$order->order_id}}<span class="dot dot-success d-md-none ml-1"></span></span>
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
                                        <td class="nk-tb-col tb-col-lg">
                                            <span class="tb-lead">{{number_format( $order->grand_total,2)}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                        </td>
                                        <td class="actions">
                                            <a href="{{route('admin.sales.details',encrypt($order->id))}}"><i class="fas fa-pencil-alt"></i></a>
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
