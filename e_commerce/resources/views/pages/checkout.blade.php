@extends('welcome')
@section('content')


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
			

			

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-8 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form method="post" action="{{url('/shipping')}}">
									{{ csrf_field() }}
									<input type="text" placeholder="Email" name="name">
									<input type="text" placeholder="First Name" name="f_name">
									<input type="text" placeholder="Last Name" name="l_name">
									<input type="text" placeholder="Address" name="address">
									<input type="text" placeholder="phone" name="phone">
									<input type="text" placeholder="city" name="city">
									<button type="submit" class="btn btn-default">sumbit</button>
								</form>
							</div>
						
						</div>
					</div>
										
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>

				
			</div>




	
		</div>
	</section>



@endsection