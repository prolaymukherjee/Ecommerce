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
					<a href="#">Add Categroy</a>
				</li>
			</ul>


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add CateGroy</h2>
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







					<form class="form-horizontal" action="{{url('/save-delivery')}}" method="post"
					 enctype="multipart/form-data">


						{{ csrf_field() }}

						  

         
							<div class="control-group">
							  <label class="control-label" for="fileInput">Delivery man image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="delivery_man_image" id="fileInput" type="file">
							  </div>
							</div> 



						




							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Delivery Man</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>  





@endsection