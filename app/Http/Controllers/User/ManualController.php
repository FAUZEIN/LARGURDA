<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OrderMail;

use Intervention\Image\Facades\Image;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 

class ManualController extends Controller
{
    public function ManualOrder(Request $request){
    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}

	    // dd($charge);

        $image = $request->file('bukti_pembayaran');
    	$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    	Image::make($image)->resize(500,637)->save('upload/orders/'.$name_gen);
    	$save_url = 'upload/orders/'.$name_gen;

        $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_id' => $request->state_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'post_code' => $request->post_code,
                'address' => $request->address,
       
                'payment_type' => 'Transfer Bank Manual',
                'payment_method' => 'Transfer Bank Manual',
                'bukti_pembayaran' => $save_url,
                 
                'currency' =>  'Rp',
                'amount' => $total_amount,
       
                'order_number' => mt_rand(10000000,99999999),
                'invoice_no' => 'ESZ'.mt_rand(10000000,99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'status' => 'ditunda',
                'created_at' => Carbon::now(),	 
       
        ]);

        //  Start Send Email 
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        //  End Send Email

        // syntak insert data ke tabel order item
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'weight' => $cart->weight,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        //  Email Notification 
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
            'alert-type' => 'success'
        );

		return redirect()->route('dashboard')->with($notification);
    }
}
