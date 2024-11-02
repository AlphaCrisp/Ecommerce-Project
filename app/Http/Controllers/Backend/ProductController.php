<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;


class ProductController extends Controller
{
    public function AddProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        
        
        return view('backend.product.product_add',compact('brands','categories'));
    }

    public function StoreProduct(Request $request){
        
        
            $image = $request->file('product_thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
            $save_url = 'upload/products/thumbnail/'.$name_gen;
    
          $product_id = Product::insertGetId([
              'brand_id' => $request->brand_id,
              'category_id' => $request->category_id,
              'subcategory_id' => $request->subcategory_id,
              'product_name_en' => $request->product_name_en,
              'product_name_ind' => $request->product_name_ind,
              'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
              'product_slug_ind' => str_replace(' ', '-', $request->product_name_ind),
              'product_code' => $request->product_code,
    
              'product_qty' => $request->product_qty,
              'product_tags_en' => $request->product_tags_en,
              'product_tags_ind' => $request->product_tags_ind,
             
              'product_weight' => $request->product_weight,
    
              'selling_price' => $request->selling_price,
              'discount_price' => $request->discount_price,
              'short_desc_en' => $request->short_desc_en,
              'short_desc_ind' => $request->short_desc_ind,
              'long_desc_en' => $request->long_desc_en,
              'long_desc_ind' => $request->long_desc_ind,
    
              'hot_deals' => $request->hot_deals,
              'featured' => $request->featured,
              'special_offer' => $request->special_offer,
              
    
              'product_thumbnail' => $save_url,
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
    
          
    
          ////////// Een Multiple Image Upload Start ///////////
    
    
           $notification = array(
                'message' => 'Product Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
    
        }

    }//end method


    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function EditProduct($id){

		$multiImgs = MultiImg::where('product_id',$id)->get();

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		
		$products = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','products','multiImgs'));

	}

    public function ProductDataUpdate(Request $request){

		$product_id = $request->id;

         Product::findOrFail($product_id)->update([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_ind' => $request->product_name_ind,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_ind' => str_replace(' ', '-', $request->product_name_ind),
      	'product_code' => $request->product_code,
    
        'product_qty' => $request->product_qty,
        'product_tags_en' => $request->product_tags_en,
        'product_tags_ind' => $request->product_tags_ind,
        
        'product_weight' => $request->product_weight,
        
        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'short_desc_en' => $request->short_desc_en,
        'short_desc_ind' => $request->short_desc_ind,
        'long_desc_en' => $request->long_desc_en,
        'long_desc_ind' => $request->long_desc_ind,

        'hot_deals' => $request->hot_deals,
        'featured' => $request->featured,
        'special_offer' => $request->special_offer,
                    
      	'status' => 1,
      	'created_at' => Carbon::now(),   

      ]);

      $notification = array(
        'message' => 'Product Updated Without Image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('manage-product')->with($notification);
    }

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
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	} // end mehtod 

    public function ThumbnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);
   
       $image = $request->file('product_thumbnail');
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
           $save_url = 'upload/products/thumbnail/'.$name_gen;
   
           Product::findOrFail($pro_id)->update([
               'product_thumbnail' => $save_url,
               'updated_at' => Carbon::now(),
   
           ]);
   
            $notification = array(
               'message' => 'Product Image Thumbnail Updated Successfully',
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
           'message' => 'Product Image Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    } // end method 



    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Product Inactive',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }


 public function ProductActive($id){
     Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
           'message' => 'Product Active',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
        
    }



    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
           'message' => 'Product Deleted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }// end method 



 // product Stock 
public function ProductStock(){

   $products = Product::latest()->get();
   return view('backend.product.product_stock',compact('products'));
 }

 public function ViewProduct($id){

    $multiImgs = MultiImg::where('product_id',$id)->get();

    $categories = Category::latest()->get();
    $brands = Brand::latest()->get();
    $subcategory = SubCategory::latest()->get();
    
    $products = Product::findOrFail($id);
    return view('backend.product.product_edit',compact('categories','brands','subcategory','products','multiImgs'));

}
}
