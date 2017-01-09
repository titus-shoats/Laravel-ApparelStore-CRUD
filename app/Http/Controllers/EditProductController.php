<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Taxonomies;
use Storage;
use File;

class EditProductController extends Controller
{
   
    /***
      Displays edit form
      @returns edit form view.
    **/
    public function edit(Product $product){

        
        return view('/admin/edit/index',compact('product'));
    }


     /***
      Process HTTP PATCH Request
      @$request Request Object
      @$request Product Table 
      @returns back to edit form view
      .
    **/
     public function update(Request $request,Product $product){
         
         $this->validate($request,
          [
          'product_name'=>'required',
          'product_price'=>'required|regex:/[\d]*\.[\d]{2}/',
          'product_description'=>'required',
          'product_size'=>'required',
          'product_image_upload'=>'required|mimes:jpeg',
          'product_category'=>'required',
          'product_subcategory'=>'required'
          ]);

             $product_size = array();
            foreach ($request->product_size as $key => $value) {
      	          array_push($product_size,$value);
      	
               }
       
     
            Storage::disk('product_image_uploads')->delete($product->product_image);
           
            $product_image_path = $request->file('product_image_upload')
            ->store('product_image_uploads','product_image_uploads');


           $product->update([
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_description'=>$request->product_description,
            'product_size'=>serialize($product_size),
            'product_image'=>$product_image_path]);

          
           
          
           /*****Go the produc table, 
           Get the product based off its product_id,
            and then update this products taxonomy
           *****/ 
           $taxonomies = Product::find($product->product_id);
           $taxonomies->addTaxonomiesToProduct->product_category= $request->product_category;
           $taxonomies->addTaxonomiesToProduct->product_subcategory= $request->product_subcategory;
           $taxonomies->push();

           return back(); 

    }


  /***
      Delete Product
      @$request Product Table 
      @returns back to view all products
      .
    **/
   
    public function delete(Product $product){

    	
    	$products = Product::find($product->product_id);
    	$products->delete();
    	return back();

    }
}
