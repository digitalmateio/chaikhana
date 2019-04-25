@extends('layouts.home')


@section('content')


<style>
		.ptype {
			border: 1px solid silver;
			padding: 5px;
			margin: 5px;
			color: silver;
			cursor: pointer;
		}
		.pradio {
			display: none;
		}
		.paper {
			padding-left: 30px;
			padding-right: 30px;
		}
		.quant {
			text-align: center;
			width: 100px;
			border: 1px solid silver;
		}
		.ships {
			border: 1px solid silver;
			padding: 5px;
		}
		.buynow {
			position: unset;
			width: 150px;
		}
		.hand {
			cursor: pointer;
		}
		.stinp {
			background: #F2f2f2;
			box-shadow: none !important; 
			border:none !important;
			padding: 6px;
		}
		@media only screen and (max-width: 1567px) {
		.shop-check{
			width: 68px !important;
			font-size: 17px;
		}
		.ptype{
			font-size: 17px;
		}
	}
	@media only screen and (max-width: 1067px) {
#nextid{
	    width: 45px;
    margin-left: 16px;
}
}
.fillinfo{

	    border: none;
    border-radius: 0px;
	}
	.agency-modal-close{
		background-color: #015C13;
	}
	.fillinfo-header{
		border-bottom: none;
	}
	.shop-single{
		margin-top: 200px;
	}
	</style>

	<!-- Second Container -->

	@php

	// dd($photo);

	@endphp
	<!-- Third Container (Grid) -->
	<div class="container-fluid story-3 text-center single-theme shop-single">
		<div class="row">
			<div class="col-md-6">
				<img src="{{ $photo->image[0] }}" id="prev">
			</div>
			<div class="col-md-6">
				<div class="row shop-single-right text-left">
					<div class="col-md-12">
						<h4>{{ $photo->TextTrans('title') }}</h4>
						<p class="grey-text price" data-photo-id="{{ $photo->id }}" data-price="{{ $photo->price }}">{{ $photo->price }}</p>
						<p class="grey-text">{!! $photo->TextTrans('description') !!}</p>
						<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/story/{{ $photo->story_id }}" class="green-text">
							visit story
						</a>
						<hr>
					</div>

	   {!! Form::open(['route' => 'buyNow']) !!}
			{{ csrf_field() }}
				
				{{ Form::hidden('fotoid', $photo->id) }}

					<div class="col-md-12">
						<p class="grey-text">Photo resolution</p>
						<label class="ptype " for="p1" id="dd1" onclick="this.style.background = '#015C13'; $('#dd2')[0].style.background = 'white'">Medium</label>
						<input type="radio" name="photoresolution" id="p1" value="medium" class="pradio" >
						<label class="ptype " for="p2" id="dd2" onclick="this.style.background = '#015C13'; $('#dd1')[0].style.background = 'white'">Large</label>
						<input type="radio" name="photoresolution" id="p2" value="large" class="pradio">
					</div>
					<div class="col-md-9">
						<br>
						<p class="grey-text">SIZE</p>
					
						@foreach($Photo_sizes as $size)
							<label class="ptype paper shop-check size" data-id="{{ $size->id }}" for="{{ $size->id }}" id="{{ $size->id }}">{{ $size->title }}</label>
							<input type="radio" name="size" id="{{ $size->id }}" value="{{ $size->id }}" class="pradio"  >
						@endforeach

					</div>
					<div class="col-md-3">
						<br>
						<div class="hand" onclick="gonext()">
							@if(empty($next))
								<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/shop/{{ $next[0]->image['128x128'] }}">
									NEXT PHOTO
									<img src="{{ $next[0]->image['128x128'] }}" id="nextid">
								</a>
							@endif
						</div>
					</div>
					<div class="col-md-12">
						<br>
						<p class="grey-text">QUANTITY</p>
						<input type="number" name="quantity" value="1" class="quant shop-check quantity" min="1">
					</div>
					<div class="col-md-12">
						<br>
						<p class="grey-text">SHIPPING</p>
						<select name="country" class="ships grey-text shop-check shipping-country">
							<option value="0">Select Country</option>
							@foreach($Shopping_countrys as $country)
								<option  value="{{ $country->id }}">{{ $country->TextTrans('title') }}</option>
							@endforeach
						</select>
					</div>

						<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content fillinfo">
								<div class="modal-header agency-modal-header">
									<h4 class="modal-title fillinfo-header">Fill Info</h4>
									<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body text-left agency-mpdal-body">
									<div class="row modal-row">
										<div class="container agency-locationbtn-modal text-center">
											<input type="email" name="email" placeholder="Email" class="stinp">
											<br>
											<br>
											<input type="text" name="address" placeholder="Address" class="stinp">
										</div>
									</div>
									<div class="row modal-row">
										<button type="submit" class="btn btn-primary btn-sm footersearchbtn buynow">Go to Payment</button>
									
									</div>

								</div>
							</div>

						</div>
					</div>

					<div class="col-md-12">
						<br>
						<br>
						<button type="button" class="btn btn-primary btn-sm footersearchbtn buynow" onclick="$('#myModal').modal({show: true});">BUY NOW</button>
						<a href="#" class="btn btn-link btn-sm">Refund Policy</a>
					</div>



					{!! Form::close() !!}

				</div>
			</div>
		</div>
		<br>
		<br>

	

		<br>
		<div class="row">
			<div class="col-md-12">
				<h5 class="text-left">PHOTO LOCATION</h5>
			</div>

			<div class="col-md-12">

				{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> --}}
				{{-- <div id="map_div" style="height: 600px;"></div> --}}



			</div>

		</div>
		





					

		<!-- Modal -->
		<div class="modal fade" id="mModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header agency-modal-header ">
						<h4 class="modal-title">Tbilisi</h4>
						<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>

					</div>
					<div class="modal-body text-left agency-mpdal-body">
						<p>TYPE OF FREELANCER.</p>
						<div class="row modal-row">
							<div class="col-md-12 agency-locationbtn-modal">

								<button class="button btn">Journalist</button>
								<button class="button btn">Photographer</button>
								<button class="button btn">Videographer</button>
							</div>
							<div class="col-md-12">
								<p>Languages</p>
								<label class="checkcontainer">French
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">English
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Georgian
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p>Skills</p>
								<label class="checkcontainer">Creativity
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Imagination
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Editing
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p>Equipment</p>
								<span>Camera,</span> <span>Lens,</span> <span>Flash,</span><span>Drone,</span>
							</div>
							<button type="button" class="btn hire-freelancer" data-dismiss="modal" onclick="$('#myModal2').modal({show: true});">Hire Freelancer</button>
						</div>

					</div>
				</div>

			</div>
		</div>

		<div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header agency-modal-header ">
						<h4 class="modal-title">HIRE</h4>
						<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>

					</div>
					<div class="modal-body text-left agency-mpdal-body">
						<p>DURATION</p>
						<div class="row modal-row">
							<div class="col-md-12 agency-locationbtn-modal">

								<button class="button btn">Journalist</button>
								<button class="button btn">Photographer</button>
								<button class="button btn">Videographer</button>
							</div>
							<div class="col-md-12">
								<p>YOUR E-MAIL</p>
								<label class="checkcontainer">French
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">English
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Georgian
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p>BUDGET RANGE</p>
								<label class="checkcontainer">Creativity
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Imagination
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Editing
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p>TELL US MORE ON YOUR REQUEST</p>
								<span>Camera,</span> <span>Lens,</span> <span>Flash,</span><span>Drone,</span>
							</div>
							<button type="button" class="btn hire-freelancer" onclick="$('#myModal3').modal({show: true});">SEND</button>
						</div>

					</div>
				</div>

			</div>
		</div>

		<div class="modal fade" id="myModal3" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header agency-modal-header ">
						<h4 class="modal-title">JOIN US</h4>
						<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>

					</div>
					<div class="modal-body text-left agency-mpdal-body">
						<p>DURATION</p>
						<div class="row modal-row">
							<div class="col-md-12 agency-locationbtn-modal">

								<button class="button btn">Journalist</button>
								<button class="button btn">Photographer</button>
								<button class="button btn">Videographer</button>
							</div>
							<div class="col-md-12">
								<p>YOUR E-MAIL</p>
								<label class="checkcontainer">French
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">English
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Georgian
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p>BUDGET RANGE</p>
								<label class="checkcontainer">Creativity
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Imagination
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer">Editing
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<button type="button" class="btn hire-freelancer">SEND</button>
						</div>

					</div>
				</div>

			</div>
		</div>
		<!-- Map Area End -->

		<br>
		<br>
		
		<div class="row">
			<div class="col-md-12">
				<h5 class="text-left">OTHER PHOTOS</h5>
			</div>
			<div class="col-md-4 ">
				<div class="border-inside">
					<img src="img/story4.png" class="img-fluid">
					<p>PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI RAVIOLI</p>
					<div class="row stories-block">
						<div class="col-md-12">
							<span class="stories-text-title">Caucasus</span>
							<img src="img/camera.png" class="stories-img-camera">
						</div>
						<div class="col-md-12">
							<span class="stories-text-title grey-thin-txt">23 February,2018</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="border-inside">
					<img src="img/story5.png" class="img-fluid">
					<p>PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI RAVIOLI</p>
					<div class="row stories-block">
						<div class="col-md-12">
							<span class="stories-text-title">Caucasus</span>
							<img src="img/camera.png" class="stories-img-camera">
						</div>
						<div class="col-md-12">
							<span class="stories-text-title grey-thin-txt">23 February,2018</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="border-inside">
					<img src="img/story6.png" class="img-fluid">
					<p>PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI RAVIOLI</p>
					<div class="row stories-block">
						<div class="col-md-12">
							<span class="stories-text-title">Caucasus</span>
							<img src="img/camera.png" class="stories-img-camera">
						</div>
						<div class="col-md-12">
							<span class="stories-text-title grey-thin-txt">23 February,2018</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>

	</div>



					<script>


					    $('.size').click(function(e){
					 
						    $('[name="country"]').val( $('[name="country"] option:eq(1)').val() ).change();

							var imageSize = $(this).attr('data-id');
							var country = $('.shipping-country').val();
							var quantity = $('.quantity').val();
							var fotoid = $('.price').attr('data-photo-id');

							$.ajaxSetup({
									headers: {
									  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});

						        $.ajax({
						           type:"POST",
						           url:"{{ route('getImagePrice') }}",
						           data : { 
						           	fotoid : fotoid ,
						           	size   : imageSize ,
						           	country:country,
						           	quantity:quantity,
						           },
						           success : function(data){
						              $('.price').text(data.price);
						           },

						            error : function(data){
						                if(typeof data === 'object'){
						                }
						            },
						       beforeSend : function(data){},
						         complete : function(data){
						         }
						      });

						});

					    $('.shipping-country').change(function(e) {
					    	
					        $("input:radio[name=size]:first").attr('checked', true);
					    	
						    var imageSize = $('.size').attr('data-id');
							var country   = e.target.value;
							var quantity  = $('.quantity').val();
							var fotoid    = $('.price').attr('data-photo-id');

								$.ajaxSetup({
									headers: {
									  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});

						        $.ajax({
						           type:"POST",
						           url:"{{ route('getImagePrice') }}",
						           data : { 
						           	fotoid : fotoid ,
						           	size : imageSize ,
						           	country:country,
						           	quantity:quantity,
						           },
						           success : function(data){
						              $('.price').text(data.price);
						           },

						            error : function(data){
						                if(typeof data === 'object'){
						                }
						            },
						       beforeSend : function(data){},
						         complete : function(data){
						         }
						      });

						}); 

						$('.quantity').change(function(e) {
					
							var imageSize = $('.size').attr('data-id');
							var country   = $('.shipping-country').val();
							var quantity  = e.target.value;
							var fotoid    = $('.price').attr('data-photo-id');

								$.ajaxSetup({
									headers: {
									  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});

						        $.ajax({
						           type:"POST",
						           url:"{{ route('getImagePrice') }}",
						           data : { 
						           	fotoid : fotoid ,
						           	size : imageSize ,
						           	country:country,
						           	quantity:quantity,
						           },
						           success : function(data){
						              $('.price').text(data.price);
						           },

						            error : function(data){
						                if(typeof data === 'object'){
						                }
						            },
						       beforeSend : function(data){},
						         complete : function(data){
						         }
						      });
						});

						
					</script>




@endsection