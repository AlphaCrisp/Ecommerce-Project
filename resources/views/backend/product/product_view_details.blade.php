@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Product </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('product-update') }}" >
		 	@csrf
			<input type="hidden" name="id" value="{{ $products->id }}" >
					  <div class="row">
	<div class="col-12">	


		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-4">

	 <div class="form-group">
	<h5>Brand Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="brand_id" class="form-control" required=""readonly >
			<option value="" selected="" disabled="" readonly>Select</option>
			@foreach($brands as $brand)
 <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected': '' }} >{{ $brand->brand_name_en }}</option>	
			@endforeach
		</select>
		@error('brand_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
	<h5>Category Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control" required="" readonly >
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected': '' }} >{{ $category->category_name_en }}</option>	
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				 <div class="form-group">
	<h5>SubCategory Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control" required="" readonly >
			<option value="" selected="" disabled="">Select SubCategory</option>
			
			 @foreach($subcategory as $sub)
 <option value="{{ $sub->id }}" {{ $sub->id == $products->subcategory_id ? 'selected': '' }} >{{ $sub->subcategory_name_en }}</option>	
			@endforeach

		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 1st row  -->



<div class="row"> <!-- start 2nd row  -->
			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Name En <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_name_en" class="form-control" required="" value="{{ $products->product_name_en }}" readonly>
     @error('product_name_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
	
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Name Ind <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="product_name_ind" class="form-control" required=""  value="{{ $products->product_name_ind }}">
     @error('product_name_ind') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
				 
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Code <span class="text-danger">*</span></h5>
			<div class="controls">
  <input type="text" name="product_code" class="form-control" required="" value="{{ $products->product_code }}">
     @error('product_code') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
			
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 2nd row  -->



<div class="row"> <!-- start 3RD row  -->
			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Quantity <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_qty" class="form-control" required="" value="{{ $products->product_qty }}">
     @error('product_qty') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
	  
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Tags En <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en }}" data-role="tagsinput" required="">
     @error('product_tags_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Tags Ind <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_tags_ind" class="form-control" value="{{ $products->product_tags_ind }}" data-role="tagsinput" required="">
     @error('product_tags_ind') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
				 
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 3RD row  -->






<div class="row"> <!-- start 4th row  -->
			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Weight <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_weight" class="form-control" value="{{ $products->product_weight }}"  >
     @error('product_weight') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
	    
			</div> <!-- end col md 4 -->

			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Selling Price <span class="text-danger">*</span></h5>
			<div class="controls">
  <input type="text" name="selling_price" class="form-control" required="" value="Rp {{ $products->selling_price }}">
     @error('selling_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>

				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">
            <div class="form-group">
			<h5>Product Discount Price <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}">
     @error('discount_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 4th row  -->

		 

<div class="row"> <!-- start 5th row  -->
			<div class="col-md-6">
			<div class="form-group">
			<h5>Short Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea name="short_desc_en" id="textarea" class="form-control" required="" placeholder="Textarea text">
		{!!$products->short_desc_en!!}
	</textarea>     
	 		 </div>
		</div>
	   
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">
			<div class="form-group">
			<h5>Short Description Indonesia <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea name="short_desc_ind" id="textarea" class="form-control" required="" placeholder="Textarea text">
		{!! $products->short_desc_ind !!}
	</textarea>     
	 		 </div>
		</div>
				
				
			</div> <!-- end col md 6 -->

 
			
		</div> <!-- end 5th row  -->




<div class="row"> <!-- start 6th row  -->



	<div class="col-md-6">
	<div class="form-group">
			<h5>Long Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="long_desc_en" rows="10" cols="80" required="">
		{!! $products->long_desc_en !!}
						</textarea>  
	 		 </div>
		</div>
	   	
				 
				
			</div> <!-- end col md 6 -->


			<div class="col-md-6">
			<div class="form-group">
			<h5>Long Description Indonesia <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor2" name="long_desc_ind" rows="10" cols="80">
		{!! $products->long_desc_ind !!}
						</textarea>       
	 		 </div>
		</div>
	    
				
			</div> <!-- end col md 6 --> 
			
		</div> <!-- end 6th row  -->





<div class="row"> <!-- start 7th row  -->
			<div class="col-md-6">

	   
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">

	    
				 
				
			</div> <!-- end col md 6 -->		 
			
		</div> <!-- end 7th row  -->

		
		 
		 
	 
<div class="row"> <!-- start 8th row  -->
			<div class="col-md-6">
			<div class="form-group">
			 
			 <div class="controls">
				 <fieldset>
			  <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked': '' }}>
					 <label for="checkbox_2">Hot Deals</label>
				 </fieldset>
				 <fieldset>
					 <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked': '' }}>
					 <label for="checkbox_3">Featured</label>
				 </fieldset>
			 </div>
		 </div>
	   
				
			</div> <!-- end col md 6 -->

			<div class="col-md-6">
			<div class="form-group">
		 
		 <div class="controls">
			 <fieldset>
				 <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked': '' }}>
				 <label for="checkbox_4">Special Offer</label>
			 </fieldset>
			 
		 </div>
			 </div>
	    
				 
				
			</div> <!-- end col md 6 -->		 
			
		</div> <!-- end 8th row  -->

	 
	 <hr>
 



						 
						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->


		<!-- ///////////////// Start Multiple Image Update Area ///////// -->

 <section class="content">
 	<div class="row">

<div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
		 <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
				  </div>

			
		<form method="post" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
        @csrf
			<div class="row row-sm">
				@foreach($multiImgs as $img)
				<div class="col-md-3">

<div class="card">
  <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
  <div class="card-body">
    <h5 class="card-title">
<a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
     </h5>
    <p class="card-text"> 
    	<div class="form-group">
    		<label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
    		<input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
    	</div> 
    </p>
   
  </div>
</div> 		
				
				</div><!--  end col md 3		 -->	
				@endforeach

			</div>			

			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
		 </div>
<br><br>



		</form>		   





				</div>
			  </div>
 

 		
 	</div> <!-- // end row  -->
 	
 </section>
<!-- ///////////////// End Start Multiple Image Update Area ///////// -->



	<!-- ///////////////// Start Thambnail Image Update Area ///////// -->

 <section class="content">
 	<div class="row">

<div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
		 <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
				  </div>

			
		<form method="post" action="{{ route('update-product-thambnail') }}" enctype="multipart/form-data">
        @csrf

     <input type="hidden" name="id" value="{{ $products->id }}">
    <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">

			<div class="row row-sm">
				 
				<div class="col-md-3">

<div class="card">
  <img src="{{ asset($products->product_thumbnail) }}" class="card-img-top" style="height: 130px; width: 280px;">
  <div class="card-body">
     
    <p class="card-text"> 
    	<div class="form-group">
    		<label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
    <input type="file" name="product_thumbnail" class="form-control" onChange="mainThamUrl(this)"  >
     <img src="" id="mainThmb">
    	</div> 
    </p>
   
  </div>
</div> 		
				
				</div><!--  end col md 3		 -->	
				 

			</div>			

			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
		 </div>
<br><br>



		</form>		   





				</div>
			  </div>
 

 		
 	</div> <!-- // end row  -->
 	
 </section>
<!-- ///////////////// End Start Thambnail Image Update Area ///////// -->









	  </div>

 


 





@endsection