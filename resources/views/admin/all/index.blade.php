@extends('layout')

@section('content')
  <div class="row">

      <div class="table_container">
      	<h2>Edit Products</h2>
      	<div>
      		<a class="btn btn-primary" href="http://localhost:8000/admin/add">Add New Product</a>
      	</div>

               


  	    	<table class="table  table-responsive">
				   <thead>
				   	  <tr>
				   	  	  <th>Product ID</th>
				   	  	  <th>Product Name</th>
				   	  	  <th>Product Price</th>
				   	  	  <th>Product Desc</th>
				   	  	  <th>Size</th>
				   	  	  <th>Product Image</th>
				   	  	   <th>Created Time</th>
				   	  	   <th>Updated Time</th>
				   	  	  <th> Category</th>
				   	  	  <th>Subcategory</th>
				   	  	  <th>Edit</th>
				   	  	  <th>Delete</th>
				   	  </tr>
				   </thead>

				   <tbody>
				   	 


                        @foreach(json_decode($product) as $products)
                         <tr>
	                         @foreach($products as $key=>$value)



	                             
	                             @if(is_object($value))

	                                
                                      
                                                
                                       <td>{{$value->product_category}}</td>
                                       <td>{{$value->product_subcategory}}</td>
                                       <td>
						                   <a class="btn btn-primary" href="/admin/{{$value->product_id}}/edit">Edit</a>
						                </td>
						                <td>
						                   <a class="btn btn-primary" href="/admin/{{$value->product_id}}/delete">Delete</a>
						                </td>  

                                     

	                                   
		                             @elseif(!is_object($value))
		                              
			                                @if($key==="product_id")
		                                            
		                                        <td>
		                                          {{$value}}
		                                       </td>
		                                      

			                               @endif
	                                     
			                                @if($key==="product_name")
		                                            
		                                        <td>
		                                          {{$value}}
		                                       </td>
		                                      

			                               @endif

			                                @if($key==="product_price")
		                                            
		                                        <td>
		                                          <span>${{number_format($value,2)}}</span>
		                                       </td>
		                                      

			                               @endif




			                               @if($key==="product_description")
		                                            
		                                        <td>
		                                          {{$value}}
		                                       </td>
		                                      

			                               @endif



			                                @if($key==="product_image")
			                                   
			                                
		                                        <td>
		                                        <img class="product_image_admin" src="{{ url('/') }}/{{$value}}" alt="" />

		                                       </td>
		                                      

			                               @endif

			                               @if($key==="created_at")
		                                            
		                                        <td>
		                                          {{$value}}
		                                       </td>
		                                      

			                               @endif


                                           
			                               @if($key==="updated_at")
		                                            
		                                        <td>
		                                          {{$value}}
		                                       </td>
		                                      

			                               @endif


			                               @if($key==="product_size")
		                                           
		                                        <td>
		                                        
		                                         @foreach(unserialize($value) as $sizes)
		                                                 {{$sizes}}
		                                         @endforeach 
		                                       </td>
		                                      

			                               @endif
			                                

                                       

                           	
		                             @else

	                           @endif

	                       @endforeach
	                      
                         </tr>
                       @endforeach
				   </tbody>
					
	</table>
      </div>
  	      
  	    
  </div>
	


@stop