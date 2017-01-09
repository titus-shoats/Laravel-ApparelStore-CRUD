<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

	/****
	   Create properties
     @product_name
     @product_price	****/

   

    /*****
     @Array
     Makes columns available for protection
    ****/
    protected $fillable = array('product_category','product_subcategory','product_name','product_price','product_id','product_description','product_image','product_size');


    protected $primaryKey = 'product_id'; // or null

    public $incrementing = false;

    /****
    @A product can a taxonomies ie: (categories,and subcategories)
    @Adds a taxonomy to a product
    ***/
    public function addTaxonomiesToProduct(){

    

        return $this->hasOne('App\Taxonomies','product_id','product_id');       

    }

     
 

     /***
     Adds Products To Table
     @param $product_name -  http request product_name
     @param $product_price   http request product_price
     @return Adds Products To Table 
     **/
    public function addProduct($request_product_name,$request_product_price,$request_product_description,$request_product_size,$request_product_image){


         
       $this->product_name = $request_product_name;
       $this->product_price = $request_product_price;
       $this->product_description = $request_product_description;
       $this->product_size = $request_product_size;
       $this->product_image = $request_product_image;
       $this->product_id = uniqid() . rand();
      // $this->product_image_name = $request_product_description;



       
    

      

    }

    /******
    Find a way to insert multiple new product along with taxonomy relationships all at once
    *****/



    /***
    Product can belong to several categories
    We need to always write and draw our tables and relationships first.
    A product can have multiple subcategories, a categories and not just 1. 
    This is why we need to have sepearate tables with relationships

   {
    product_name : Shoe 1 
    product_price: 40:00
    product_description:xxx,
    product_id: 1234,

    taxonomies:[
       {
       	product_id:1234
	    product_category:Women Shoes,
	    product_subcategory:Diellteo
       },
       {
	    product_id:1234
	    product_category:Women Sneakers,
	    product_subcategory:Boots
       }
    ],

    size:{
      0:40,
      1:41,
      2:41M,
      3:42
    }

    }

    **/
}
