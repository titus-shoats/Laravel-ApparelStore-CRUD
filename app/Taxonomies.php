<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomies extends Model
{

     /***
      Protects against security - which column can be accessible
      @$fillable - columns that can be accessible
      @$primaryKey - custom primarykey
      @$incrementing - refuse to autoincrement

    **/
     protected  $fillable = array('product_category','product_subcategory');
     protected $primaryKey = 'product_id'; // or null

     public $incrementing = false;


   /***Any given taxonomie can belong to a Product ***/

	public function product(){
    return $this->belongsTo(Product::class);
	}
   
}
