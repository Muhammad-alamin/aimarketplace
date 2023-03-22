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
                                    <div class="col-md-5 mb-2">
                                        <select class="form-control" name="monthly_report" id="monthly_report">
                                            <option selected="" disabled="" >Select Month</option>
                                                <option  value="January">January</option>
                                                <option  value="February">February</option>
                                                <option  value="March">March</option>
                                                <option  value="April">April</option>
                                                <option  value="May">May</option>
                                                <option  value="June">June</option>
                                                <option  value="July">July</option>
                                                <option  value="August">August</option>
                                                <option  value="September">September</option>
                                                <option  value="October">October</option>
                                                <option  value="November">November</option>
                                                <option  value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <select class="form-control" name="yearly_report" id="yearly_report">
                                            <option selected="" disabled="" >Select Year</option>
                                            <option  value="2017">2017</option>
                                            <option  value="2018">2018</option>
                                            <option  value="2019">2019</option>
                                            <option  value="2020">2020</option>
                                            <option  value="2021">2021</option>
                                            <option  value="2022">2022</option>
                                            <option  value="2023">2023</option>
                                            <option  value="2024">2024</option>
                                            <option  value="2025">2025</option>
                                            <option  value="2026">2026</option>
                                            <option  value="2027">2027</option>
                                            <option  value="2028">2028</option>
                                            <option  value="2029">2029</option>
                                            <option  value="2030">2030</option>
                                            <option  value="2031">2031</option>
                                            <option  value="2032">2032</option>
                                            <option  value="2033">2033</option>
                                            <option  value="2034">2034</option>
                                            <option  value="2035">2035</option>
                                            <option  value="2036">2036</option>
                                            <option  value="2037">2037</option>
                                            <option  value="2038">2038</option>
                                            <option  value="2039">2039</option>
                                            <option  value="2040">2040</option>
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
                                            <a href="{{route('vendor.order.show',encrypt($order->id))}}"><i class="fas fa-pencil-alt"></i></a>
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
