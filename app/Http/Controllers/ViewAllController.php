<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ViewAllController extends Controller
{
    /***
      View all products
      @returns view all products
      .
    **/

    public function all(){

        $product = Product::with('addTaxonomiesToProduct')->get();

      //  return "<pre/>" .  json_encode($product,JSON_PRETTY_PRINT). "<pre/>";

        

    	return view('/admin/all/index',compact('product'));
    }
}
