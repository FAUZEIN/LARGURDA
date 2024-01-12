<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

use App\Models\ShipDivision;
 
class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

         if (Session::has('coupon')) {
           Session::forget('coupon');
        }
          
    	$product = Product::findOrFail($id);

    	if ($product->product_discount == NULL) {
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->product_price,
    			'weight' => $request->product_weight, 
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			], 
    		]);

    		return response()->json(['success' => 'Produk Berhasil Ditambah Ke Keranjang']);
    		 
    	}else{

    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->product_discount,
    			'weight' => $request->product_weight, 
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Produk Berhasil Ditambah Ke Keranjang']);
    	}

    } // end mehtod 


    // Mini Cart Section
    public function AddMiniCart(){

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => round($cartTotal),

    	));
    } // end method 


/// remove mini cart 
    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Produk Berhasil Di Hapus Dari Keranjang']);

    } // end mehtod 


    // add to wishlist mehtod 

    public function AddToWishlist(Request $request, $product_id){

        if (Auth::check()) {

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Produk Berhasil Ditambah Ke Wishlist']);

            }else{

                return response()->json(['error' => 'Produk Sudah Ditambahkan']);

            }            
            
        }else{

            return response()->json(['error' => 'Kamu Harus Login Terlebih Dahulu']);

        }

    } // end method 




    public function CouponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
 
            return response()->json(array(
                'validity' => true,
                'success' => 'Kupon Berhasil Digunakan'
            ));
            
        }else{
            return response()->json(['error' => 'Kupon Tidak Benar']);
        }

    } // end method 


    public function CouponCalculation(){

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    } // end method 


 // Remove Coupon 
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Kupon Berhasil Dihapus']);
    }



 // Checkout Method 
    public function CheckoutCreate(){

        if (Auth::check()) {
            if (Cart::total() > 0) {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));
                
            }else{

            $notification = array(
            'message' => 'Belanja Minimal Satu Produk',
            'alert-type' => 'error'
        );

        return redirect()->to('/')->with($notification);

            }

            
        }else{

             $notification = array(
            'message' => 'Kamu Harus Login Terlebih Dahulu',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification);

        }

    } // end method 


}
 