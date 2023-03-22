
@extends('front.layouts.master')
@section('content')
    <!-- Start of Main -->
    <main class="main">
    </nav> <section class="faq-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs faq-page__links ">
                        <li class="nav-item">
                            <a data-toggle="tab" href="#profile" class="nav-link active">Details</a>
                        </li>
                    </ul><!-- /.faq-page__links nav nav-tabs -->
                </div><!-- /.col-lg-3 -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane show active animated fadeInRight" id="profile">
                            <div class="accrodion-grp" data-grp-name="faq-page__accrodion">
                                <div class="accrodion active">
                                    <div class="accrodion-content">
                                        <div class="inner"><div class="col-xl-12">

                                            <div class="card card-modern">
                                                <div class="card-header">
                                                    <h2 class="card-title">Addresses</h2>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-xl-auto mr-xl-4 pr-xl-5 mb-4 mb-xl-0">
                                                            <h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">Order Details</h3>
                                                            <ul class="list list-unstyled list-item-bottom-space-0">
                                                                <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Order Id</span>
                                                                            <span class="profile-ud-value">{{$order->order_id}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Total amount</span>
                                                                            <span class="profile-ud-value">{{ number_format($order->grand_total,2) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Status</span>
                                                                            <span class="profile-ud-value">{{$order->status}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .profile-ud-list -->
                                                            </ul>
                                                        </div>
                                                        <div class="col-xl-auto pl-xl-4">
                                                            <h3 class="font-weight-bold text-color-dark text-4 line-height-1 mt-0 mb-3">Customer Details</h3>
                                                            <ul class="list list-unstyled list-item-bottom-space-0">
                                                                <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Customer Name</span>
                                                                            <span class="profile-ud-value">{{$order->full_name}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Address</span>
                                                                            <span class="profile-ud-value">{{$order->address}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Email</span>
                                                                            <span class="profile-ud-value">{{$order->user_email}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Phone no</span>
                                                                            <span class="profile-ud-value">{{$order->phone}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .profile-ud-list -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="content-header" >
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body table-responsive p-15">
                                                                <table class="table table-hover text-nowrap">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Product name</th>
                                                                        <th>Price</th>
                                                                        <th>Quantity</th>
                                                                        <th>Sub total</th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($order->order_details as $key=>$order_deatail)
                                                                        <?php $totalProPrice = $order_deatail->product_price * $order_deatail->product_qty ?>
                                                                        <tr>
                                                                            <td>{{$order_deatail->product_name}}</td>
                                                                            <td>$ {{ number_format( $order_deatail->product_price)}}</td>
                                                                            <td>{{$order_deatail->product_qty}}</td>
                                                                            <td>$ {{ number_format( $order_deatail->product_price * $order_deatail->product_qty)}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div><!-- /.container-fluid -->
                                        </div>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- /#manage.tab-pane show active animated fadeInRight -->
                    </div><!-- /.tab-content -->
                </div><!-- /.col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.faq-page -->
    <!-- End of PageContent -->
</main>
<!-- End of Main -->
@endsection
