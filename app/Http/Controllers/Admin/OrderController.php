<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index(Request $request){

        $data['title'] = 'Oder List';
        $order = new Order();
        $append =[];
        if ( $request->has('client_information') && $request->client_information != null){
            $order = $order->where(function ($query) use ($request){
                $query->where('full_name', 'like', '%' . $request->client_information . '%')
                    ->orWhere('phone', 'like', '%' . $request->client_information . '%')
                    ->orWhere('user_email', 'like', '%' . $request->client_information . '%');
            });
            $append['client_information'] = $request->client_information;
        }
        if($request->has('order_id') && $request->order_id != null){
            $order = $order->where('order_id','like','%'.$request->order_id.'%');

            $append['order_id'] = $request->order_id;
        }

        if($request->has('status') && $request->status != null){
            $order = $order->where('status',$request->status);

            $append['status'] = $request->status;
        }
        $order = $order->orderBy('id','desc')->paginate(10);
        $data['orders'] = $order->appends($append);
        return view('admin.order.orderList',$data);

    }

    public function show ($id){
        $data['title'] = 'Order Details';
        $d_id = decrypt($id);
//        $data['orderDetails'] = OrderDetails::with('brandCommission')->get();
        $data['order'] = Order::find($d_id);
        return view('admin.order.orderDetails',$data);
    }

    public function change_status($order_id,$order_status){
        $order = Order::findOrFail($order_id);
        $order->status = $order_status;
        $order->save();
        if ($order_status == Order::STATUS_SHIPPED){
            Mail::to($order->email)->send(new OrderShipped($order));

        }
        if($order_status == Order::STATUS_CANCELED){
            Mail::to($order->email)->send(new OrderCanceled($order));
        }
        Alert::success('Success', 'Order Status Changed Successfully');
        return redirect()->back();

    }
    public function export($query){
        $filename = 'orders.xlsx';
        if ($query == Order::STATUS_PENDING){
            $filename = 'Pending orders.xlsx';
        }
        return Excel::download(new OrdersExport($query),$filename);

    }
    public function invoice($id){
        $order_id = Crypt::decryptString($id);
        $data['invoices'] = Order::with('order_details')->find($order_id);
        return view('admin.order.invoice',$data);
    }

    public function invoicePdf($id){
        $order_id = Crypt::decryptString($id);
        $invoice['invoices'] = Order::with('order_details')->find($order_id);
        $data = [
            'orders' => $invoice,
        ];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.order.invoicePdf', $data);


        return $pdf->download('multi-vendor-Ecommerce.pdf');
        return view('admin.order.invoicePdf',$invoice);
    }

    public function invoicePrint($id){
        $order_id = Crypt::decryptString($id);
        $data['invoices'] = Order::with('order_details')->find($order_id);
        return view('admin.order.invoicePrint',$data);
    }

    public function dailyReport(Request $request){
        $data['title'] = 'Daily Report';

        if ($request->daily_report != null){
            $order = new Order();
            $append =[];
            if ( $request->has('daily_report') && $request->daily_report != null){
                $order = $order->where(function ($query) use ($request){
                    $query->where('order_date', 'like', '%' . $request->daily_report . '%');
                });
                $append['daily_report'] = $request->daily_report;
            }
            $order = $order->orderBy('id','desc')->paginate(10);
            $data['orders'] = $order->appends($append);
        }
        else{
            $date = date('d/m/Y');
            $data['orders'] = Order::where('order_date',$date)->orderBy('id','desc')->paginate(10);
        }

        return view('admin.sales_report.daily',$data);
    }
    public function monthlyReport(Request $request){
        $data['title'] = 'Monthly Report';

        if ($request->monthly_report != null){
            $order = new Order();
            $append =[];
            if ( $request->has('monthly_report') && $request->monthly_report != null){
                $order = $order->where(function ($query) use ($request){
                    $query->where('order_month', 'like', '%' . $request->monthly_report . '%');
                });
                $append['monthly_report'] = $request->monthly_report;
            }
            if($request->has('yearly_report') && $request->yearly_report != null){
                $order = $order->where('order_year','like','%'.$request->yearly_report.'%');

                $append['yearly_report'] = $request->yearly_report;
            }
            $order = $order->orderBy('id','desc')->paginate(10);
            $data['orders'] = $order->appends($append);
        }
        else{
            $date = date('F');
            $data['orders'] = Order::where('order_month',$date)->orderBy('id','desc')->paginate(10);
        }

        return view('admin.sales_report.monthly',$data);

    }
    public function yearlyReport(Request $request){
        if ($request->yearly_report != null){
            $order = new Order();
            $append =[];
            if($request->has('yearly_report') && $request->yearly_report != null){
                $order = $order->where('order_year','like','%'.$request->yearly_report.'%');

                $append['yearly_report'] = $request->yearly_report;
            }
            $order = $order->orderBy('id','desc')->paginate(10);
            $data['orders'] = $order->appends($append);
        }
        else{
            $date = date('Y');
            $data['orders'] = Order::where('order_year',$date)->orderBy('id','desc')->paginate(10);

        }

        return view('admin.sales_report.yearly',$data);
    }

    public function salesDetails($id){
        $data['title'] = 'Order Details';
        $d_id = decrypt($id);
//        $data['orderDetails'] = OrderDetails::with('brandCommission')->get();
        $data['order'] = Order::find($d_id);
        return view('admin.sales_report.orderDetails',$data);
    }


}
