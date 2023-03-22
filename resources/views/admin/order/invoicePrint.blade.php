<html>

<!-- Mirrored from www.okler.net/previews/porto-admin/3.0.0/pages-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2023 16:22:30 GMT -->
<head>
		<title>Art Gallery - Invoice Print</title>
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.css') }}" />

		<!-- Invoice Print Style -->
		<link rel="stylesheet" href="{{ asset('admin/css/invoice-print.css') }}" />
	</head>
	<body>
		<div class="invoice">
			<header class="clearfix">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">INVOICE</h2>
                        <h4 class="h4 m-0 text-dark font-weight-bold">{{time()}}</h4>
                    </div>
                    <div class="col-sm-6 text-right mt-3 mb-3">
                        <div class="ib">
                            <img src="img/invoice-logo.png" alt="OKLER Themes">
                        </div>
                    </div>
                </div>
            </header>
            <div class="bill-info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bill-to">
                            <p class="h5 mb-1 text-dark font-weight-semibold">To:</p>
                            <address>
                                {{$invoices->full_name}}
                                <br>
                                {{$invoices->address}}
                                <br>
                                {{$invoices->phone}}
                                <br>
                                {{$invoices->email}}
                            </address>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bill-data text-right">
                            <p class="mb-0">
                                <span class="text-dark">Invoice Date:</span>
                                <span class="value">{{date('d-m-Y')}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-responsive-md invoice-items">
                <thead>
                    <tr class="text-dark">
                        <th>Product</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_amount = 0; ?>
                    @foreach($invoices->order_details as $invoice)
                        <tr>
                            <td>{{$invoice->product_name}}</td>

                            <td>{{$invoice->product_size}}</td>
                            <td>{{number_format($invoice->product_price)}}</td>
                            <td>{{$invoice->product_qty}}</td>
                            <td>{{number_format($invoice->product_price*$invoice->product_qty)}}</td>
                        </tr>
                        <?php $total_amount = $total_amount + ($invoice->product_price*$invoice->product_qty); ?>
                    @endforeach
                </tbody>
            </table>

            <div class="invoice-summary">
                <div class="row justify-content-end">
                    <div class="col-sm-4">
                        <table class="table h6 text-dark">
                            <tbody>
                                <tr class="b-top-0">
                                    <td colspan="2">Subtotal</td>
                                    <td class="text-left">${{number_format($total_amount)}}</td>
                                </tr>
                                <tr class="h5">
                                    <td colspan="2">Grand Total</td>
                                    <td class="text-left">${{number_format($total_amount)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>

		<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
			window.print();
		</script>
	</body>

<!-- Mirrored from www.okler.net/previews/porto-admin/3.0.0/pages-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2023 16:22:31 GMT -->
</html>
