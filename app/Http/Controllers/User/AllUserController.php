<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
 
use App\Mail\OrderMail;
use PDF;
use DB;

class AllUserController extends Controller
{
    public function MyOrders(){

    	$orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('frontend.user.order.order_view',compact('orders'));

    } // end mehtod 



    public function OrderDetails($order_id){

    	$order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('frontend.user.order.order_details', compact('order','orderItem'));

    } // end mehtod 

    public function UserShippedToDelivered($order_id){

        $product = OrderItem::where('order_id',$order_id)->get();
        foreach ($product as $item) {
            Product::where('id',$item->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        } 
    
         Order::findOrFail($order_id)->update(['status' => 'selesai']);
   
         $notification = array(
               'message' => 'Pesanan Sudah Diterima',
               'alert-type' => 'success'
           );
   
           return redirect()->route('dashboard')->with($notification);
   
   
       } // end method



    public function InvoiceDownload($order_id){
       $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	// return view('frontend.user.order.order_invoice',compact('order','orderItem'));
		$pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');



    } // end mehtod 


    public function ReturnOrder(Request $request,$order_id){

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);


      $notification = array(
            'message' => 'Permintaan Pengembalian Berhasil Terkirim',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);

    } // end method 



    public function ReturnOrderList(){

        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_order_view',compact('orders'));

    } // end method 


    public function CancelOrder(Request $request,$order_id){
        Order::findOrFail($order_id)->update([
            'cancel_date' => Carbon::now()->format('d F Y'),
            'cancel_reason' => $request->cancel_reason,
            'cancel_order' => 1,
        ]);

        $notification = array(
            'message' => 'Permintaan Pembatalan Berhasil Terkirim',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    }

    public function CancelOrders(){

        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_order_view',compact('orders'));

    } // end method 



    ///////////// Order Traking ///////

    public function OrderTraking(Request $request){

        $invoice = $request->code;

        $track = Order::where('invoice_no',$invoice)->first();

        if ($track) {
            
            // echo "<pre>";
            // print_r($track);

        return view('frontend.traking.track_order',compact('track'));

        }else{

            $notification = array(
            'message' => 'Kode Invoice Tidak Benar',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

        }

    } // end mehtod 




}
 