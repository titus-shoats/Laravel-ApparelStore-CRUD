<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Taxonomies;
use App\Http\ProductImageUploadController;
use Storage;
use File;
use App\Http\Controllers\Controller;



class AddProductController extends Controller
{
    /***
      Displays add product form
      @returns form view.
    **/
    public function add(){
        
      return view('/admin/add/index');
    }

    /***
      POST Request 
      Gets request data from add product form, and adds it to database.
      @param Request $request - HTTP Request Object;
      @return successfully added view.
    **/
   
     public function added(Request $request){
        $this->validate($request,
          [
          'product_name'=>'required',
          'product_price'=>'required|regex:/[\d]*\.[\d]{2}/',
          'product_description'=>'required',
          'product_size'=>'required',
          'product_image_upload'=>'required|mimes:jpeg,png',
          'product_category'=>'required',
          'product_subcategory'=>'required'
          ]);

      
      $add_product = new Product;
      $product_size = array();
      foreach ($request->product_size as $key => $value) {
      	array_push($product_size,$value);
      	
      }
       

      $product_image_path = $request->file('product_image_upload')
      ->store('product_image_uploads','product_image_uploads');
        

       $add_product->addProduct(
        $request->product_name,
        $request->product_price,
        $request->product_description,
        serialize($product_size),
        $product_image_path

        );
       $add_product->save();
      
     
     /*****
     Add taxonomy relationship to database
     Get the last result/product, and add a taxonomy relationship thats attach
     to this result/product
     *****/
       
        $add_tax = Product::all()->last();
          
        $add_tax->addTaxonomiesToProduct()->create(

           [
        	'product_category'=>$request->product_category,
        	'product_subcategory'=>$request->product_subcategory
        ]
        
        );


     return back();
    }





}
