<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;

use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

use League\Flysystem\File;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{
    
	public function AddProduct(){
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories','brands'));

	}


	public function StoreProduct(Request $request){

 
        $image = $request->product_thambnail;
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

      $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name' => $request->product_name,
      	'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_weight' => $request->product_weight,
      	'product_tags' => $request->product_tags,
      	'product_size' => $request->product_size,
      	'product_color' => $request->product_color,

      	'product_price' => $request->product_price,
      	'product_discount' => $request->product_discount,
      	'product_short_desc' => $request->product_short_desc,
      	'product_long_desc' => $request->product_long_desc,

      	'product_promo' => $request->product_promo,
      	'new_product' => $request->new_product,
      	'new_arrival' => $request->new_arrival,
      	'best_seller' => $request->best_seller,

      	'product_thambnail' => $save_url,
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);


      ////////// Multiple Image Upload Start ///////////

      $images = $request->file('multi_img');
      foreach ($images as $img) {
      	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::insert([

    		'product_id' => $product_id,
    		'photo_name' => $uploadPath,
    		'created_at' => Carbon::now(), 

    	]);

      }

      ////////// Een Multiple Image Upload Start ///////////


       $notification = array(
			'message' => 'Produk Berhasil Ditambah',
			'alert-type' => 'success'
		);

		return redirect()->route('manage.product')->with($notification);


	} // end method



	public function ManageProduct(){

		$products = Product::latest()->get();
		return view('backend.product.product_view',compact('products'));
	}


	public function EditProduct($id){

		$multiImgs = MultiImg::where('product_id',$id)->get();

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$subsubcategory = SubSubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','products','multiImgs'));

	}


	public function ProductDataUpdate(Request $request){

		$product_id = $request->id;

         Product::findOrFail($product_id)->update([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name' => $request->product_name,
      	'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_weight' => $request->product_weight,
      	'product_tags' => $request->product_tags,
      	'product_size' => $request->product_size,
      	'product_color' => $request->product_color,

      	'product_price' => $request->product_price,
      	'product_discount' => $request->product_discount,
      	'product_short_desc' => $request->product_short_desc,
      	'product_long_desc' => $request->product_long_desc,

      	'product_promo' => $request->product_promo,
      	'new_product' => $request->new_product,
      	'new_arrival' => $request->new_arrival, 
				'best_seller' => $request->best_seller,     	 
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);

          $notification = array(
			'message' => 'Product Berhasil Diperbarui Tanpa Gambar',
			'alert-type' => 'success'
		);

		return redirect()->route('manage.product')->with($notification);


	} // end method 


/// Multiple Image Update
	public function MultiImageUpdate(Request $request){
		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImg::findOrFail($id);
	    unlink($imgDel->photo_name);
	     
    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
    	$uploadPath = 'upload/products/multi-image/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);

	 } // end foreach

       $notification = array(
			'message' => 'Produk Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end mehtod 


 /// Product Main Thambnail Update /// 
 public function ThambnailImageUpdate(Request $request){
 	$pro_id = $request->id;
 	$oldImage = $request->old_img;
 	unlink($oldImage);

    $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

    	Product::findOrFail($pro_id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);

         $notification = array(
			'message' => 'Produk Thumbnail Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

     } // end method


 //// Multi Image Delete ////
     public function MultiImageDelete($id){
     	$oldimg = MultiImg::findOrFail($id);
     	unlink($oldimg->photo_name);
     	MultiImg::findOrFail($id)->delete();

     	$notification = array(
			'message' => 'Produk Galeri Berhasil Di Hapus',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     } // end method 



     public function ProductInactive($id){
     	Product::findOrFail($id)->update(['status' => 0]);
     	$notification = array(
			'message' => 'Produk Non Aktif',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }


  public function ProductActive($id){
  	Product::findOrFail($id)->update(['status' => 1]);
     	$notification = array(
			'message' => 'Produk Aktif',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     	
     }



     public function ProductDelete($id){
     	$product = Product::findOrFail($id);
     	unlink($product->product_thambnail);
     	Product::findOrFail($id)->delete();

     	$images = MultiImg::where('product_id',$id)->get();
     	foreach ($images as $img) {
     		unlink($img->photo_name);
     		MultiImg::where('product_id',$id)->delete();
     	}

     	$notification = array(
			'message' => 'Produk Berhasil Di Hapus',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     }// end method 



  // product Stock 
	public function ProductStock(){

			$products = Product::latest()->get();
			return view('backend.product.product_stock',compact('products'));
		}

		public function ExportExcel()
    {
      return Excel::download(new ProductExport(), 'product.xlsx');
    }
		
		public function ImportExcel(Request $request)
    {
			$file = $request->file('file');
			
			// membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new ProductImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

				// $file  = $request->file('file');
				// $name_file = $file->getClientOriginalName();
				// $file->move('DataProduk', $name_file);

				// Excel::import(new ProductImport, public_path('/DataProduk'.$name_file));
				return redirect()->back();
    }

		public function CetakPDF()
		{
    	$products = Product::latest()->get();
			return view('backend.product.product_pdf', compact('products'));
    
		}
		
	}
	