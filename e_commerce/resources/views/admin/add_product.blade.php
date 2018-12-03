@extends('admin_layout')
@section('admin_content')





			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add product</a>
				</li>
			</ul>


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add product</h2>
					</div>
				</div>
			</div>


			    <p>
                  <?php
                    $message=Session::get('message');
                  
                    if ($message) {
                        echo $message;
                        Session::put('message','null');
                    }
                    ?> 
                    </p>







					<form class="form-horizontal" action="{{url('/save-product')}}" method="post"
                     enctype="multipart/form-data">


						{{ csrf_field() }}

						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" >
							  </div>
							</div>


							  <div class="control-group">
								<label class="control-label" for="selectError3">product categroy</label>
								<div class="controls">
								  <select id="selectError3" name="categroy_id">



								  	 <?php
                                         $publice_categroy = DB::table('tbl_categroy')
                                            ->where('publication_status',1)
                                            ->get();
                                         foreach ($publice_categroy as $v_categroy){?>


									<option value="{{$v_categroy->categroy_id}}">
									   {{$v_categroy->categroy_name}}</option>

									<?php  } ?> 

								  </select>
								</div>
							  </div>


							 <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture name</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id">


								  	<?php
                                      $publice_manufacture = DB::table('tbl_manufacture')
                                            ->where('publication_status',1)
                                            ->get();

                                   foreach ($publice_manufacture as $v_manufacture){?>

									<option value="{{$v_manufacture->manufacture_id}}">
									{{$v_manufacture->manufacture_name}}</option>
									<?php  } ?> 
								  </select>
								</div>
							  </div>



         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product short Description
							  </label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description"
								 rows="3"></textarea>
							  </div>
							</div>



							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product long Description
							  </label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description"
								 rows="3"></textarea>
							  </div>
							</div>



							<div class="control-group">
							  <label class="control-label" for="date01">product price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" >
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="fileInput">image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div> 



							<div class="control-group">
							  <label class="control-label" for="date01">product size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" >
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="date01">product color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" >
							  </div>
							</div>



							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">publication status
							  </label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>  





@endsection