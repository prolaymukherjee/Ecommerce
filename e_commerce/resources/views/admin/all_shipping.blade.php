@extends('admin_layout')
@section('admin_content')






			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>f_Name</th>
								  <th>l_Name</th>
								  <th>Address</th>
								  <th>phone</th>
								  <th>city</th>
							  </tr>
						  </thead> 
						  @foreach($all_shipping_info as $v_shipping)
						  <tbody>
							<tr>
								<td>{{$v_shipping->id}}</td>
								<td class="center">{{$v_shipping->name}}</td>
								<td class="center">{{$v_shipping->f_name}}</td>
								<td class="center">{{$v_shipping->l_name}}</td>
								<td class="center">{{$v_shipping->address}}</td>
								<td class="center">{{$v_shipping->phone}}</td>
								<td class="center">{{$v_shipping->city}}</td>
								
								
						   @endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->













@endsection