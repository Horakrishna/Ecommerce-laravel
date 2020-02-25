<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coustomer;
use App\Sheping;
use App\Order;
use App\OrderDetail;
use App\Payment;
use DB;
class OrderController extends Controller
{
    public function manageOrderInfo(){
    	$orders =DB::table('orders')
    				->join('coustomers','orders.coustomer_id', '=','coustomers.id')
    				->select('orders.*','coustomers.first_name','coustomers.last_name')
    				->get();

    				//return $orders;
    	return view('admin.order.manage-order',['orders'=>$orders ]);
    }

    public function viewOrderInfo($id){

        $order        = Order::find($id);
        $coustomer    = Coustomer::find($order->coustomer_id);
        $sheping      = Sheping::find($order->shiping_id);
        $orderDetail = OrderDetail::where('order_id',$order->id);
        return  $orderDetail;
    	return view('admin.order.view-order',[

            'order'         =>$order,
            'coustomer'     =>$coustomer,
            'sheping'       =>$sheping,
            'orderDetail'   =>$orderDetail,
        ]);
    }

    public function invoiceOrderInfo($id) {
        $order        = Order::find($id);
        $coustomer    = Coustomer::find($order->coustomer_id);
        $sheping      = Sheping::find($order->shiping_id);
        $orderDetails = OrderDetail::where('order_id',$order->id);

        return view('admin.order.invoice-order',[

            'order'         =>$order,
            'coustomer'     =>$coustomer,
            'sheping'       =>$sheping,
            'orderDetails'  =>$orderDetails,
            
        ]);
    }
}
