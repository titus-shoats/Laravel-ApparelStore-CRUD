@extends('layout')

@section('content')


<div class="container">
           
           <div class="row">
                <div class="col-md-6 col-md-offset-3">
                 <h2>Add New Product</h2>
                  <div class="form-group">
              <form method="post" action="/admin/add/added" enctype="multipart/form-data">
                       {{ csrf_field() }}
                        
                          <br/>
                          <label>Product Name</label>
                          <br/>
                           @if(count($errors) > 0)
                            {{$errors->first('product_name')}}
                        @endif
                          <br/>
                        
                          <input class="form-control" type="text" name="product_name"/>

                          <br/>  
                          
                          <label>Product Price</label>
                          <br/>
                           @if(count($errors) > 0)
                            {{$errors->first('product_price')}}
                        @endif
                          <br/>
                           

                          <input  class="form-control" type="text" name="product_price"/>

                           <br/>   
                          <label>Product Description</label>
                          <br/>
                           @if(count($errors) > 0)
                            {{$errors->first('product_description')}}
                        @endif

                          <textarea class="form-control" name="product_description">
                            
                          </textarea>

                          <br/>   
                          <label>Product Size</label>
                           <br/>
                           @if(count($errors) > 0)
                            {{$errors->first('product_size')}}
                        @endif
                          <select class="form-control" name="product_size[]" multiple="multiple">
                              <optgroup label="Women Shoes">
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                               </optgroup>
                              

                              <optgroup label="Womens Outerwear"> 
                              <option value="XS">XS</option>
                              <option value="S">S</option>
                              <option value="M">M</option>
                              <option value="XL">XL</option>
                              </optgroup>
                              

                              <optgroup label="Men Shoes">
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                               </optgroup>
                             

                              <optgroup label="Mens Outerwear">
                              <option value="S">S</option>
                              <option value="M">M</option>
                              <option value="XL">XL</option>
                               </optgroup>
                              

                          </select>
                          

                          <br/>
                          <label for="product_image_upload">
                           <br/>
                      
                              Upload Product Image
                             
                          </label>
                          <br/>
                            @if(count($errors) > 0)
                            {{$errors->first('product_image_upload')}}
                        @endif
<input id="product_image_upload" name="product_image_upload" class="form-control" type="file" style=""/>
                          <br/>  
                          <br/> 
                          <label>Product Category</label>
                          <br/>
                            @if(count($errors) > 0)
                            {{$errors->first('product_category')}}
                        @endif
                          <select name="product_category" class="form-control" >
                            <option>Select Category</option>

                            <option value="Women Shoes" >Women Shoes </option>
                            <option value="Men Shoes" >Men Shoes </option>

                            <option value="Women Outerwear" >Women Outerwear </option>

                            <option value="Men Outerwear" >Men Outerwear </option>


                          </select>

                          <br/>   
                          <label>Product Subcategory</label>
                          <br/>
                            @if(count($errors) > 0)
                            {{$errors->first('product_subcategory')}}
                        @endif
                          

                          <select class="form-control" name="product_subcategory" >
                              <optgroup label="Women Shoes">y
                              <option>Select Subcategory</option>
                              <option value="Ankle Boots">Ankle Boots</option>
                              <option value="Decollette">Decollette</option>
                              <option value="Boots">Boots</option>
                              <option value="Sneakers">Sneakers</option>
                              
                               </optgroup>
                              

                              <optgroup label="Womens Outerwear"> 
                              <option value="Jackets">Jackets</option>
                              </optgroup>
                              

                              <optgroup label="Men Shoes">
                              <option value="Lace ups">Lace ups</option>
                               </optgroup>
                             

                              <optgroup label="Mens Outerwear">
                              <option value="Jackets">Jackets</option>
                               </optgroup>
                              

                          </select>
                          
                         

 
                           <br/>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
                </div>
           </div>
</div>
@stop