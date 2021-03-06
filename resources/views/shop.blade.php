@extends('layouts.home')


@section('content')


	<style>
		.modalre {
			padding: 0 0 20px 0;
		}
		.mapclose button {
			border-radius: 50%;
			border: none;
			color: green;
			background: white;
			margin-top: 20px;
			padding: 0 10px 6px;
			font-size: 150%;
			cursor: pointer;
		}
		.mapclose {
			pointer-events: all;
		}
		.nobord {
			border: none;
		}
		.nomarg {
			margin: 0 !important;
		}
		.backgr {
			background-size: cover !important;
			padding-top: 5%;
			padding-bottom: 10%;
			background-repeat: no-repeat;
		}

	</style>
	<div class="container-fluid story-page backgr shop-page-head-cover" style="background: url({{ $pageHeader->image[0] }});">
	<br>
		<div class="row">
			<div class="col-md-10 mx-auto mt-5">
				<div class="centered shop-page-head-info">
					<h1>{{ $pageHeader->TextTrans('title') }}</h1>
					<div class="row"> 
						<div class="col-md-6 mx-auto mt-5 mb-5">
							<p>{{ $pageHeader->TextTrans('description') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container story-3 text-center shop coverimg">
		<br>
		<div class="row uppercase nomarg">
			<div class="col-md-6 text-left col-8">
				<h1 class="shop-header stories-header">photos</h1>
			</div>
				<div class="col-md-2 text-right editions-tags shop-tags destop-filter col-4">
					<p>
					  <a class="collapsed" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
					   tags   <img src="{{ asset('assets/img/left-arrow (1).png') }}" class="filter-arrow">
					  </a>
					</p>
					<div class="collapse shop-tags" id="collapseExample2" style="">
					  <div class="card card-body ">
					   	
						<ul class="list-inline">
							@foreach($AllTags as $tag)
								<li class="list-inline-item">
									<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/shop/tag/{{ $tag->id }}">
										{{ $tag->TextTrans('title') }}
									</a>
								</li>
							@endforeach
						</ul>

					  </div>
					</div>
				</div>
			<div class="col-md-4 text-left shop-search not-diplay">

				<div class="input-group">
					<input type="text" class="form-control searchphotos" id="search" placeholder="Search photos here...">
					<div class="input-group-append">
						<button class="btn btn-secondary shopsearch" type="button">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>

			</div>
		</div>
		<br>

		<div class="row nomarg shop-row shop-all-list">



			@foreach($shops as $shop)

				<div class="col-md-4" {{ $shops->last()->id==$shop->id ? 'id='.$shop->id.'':'' }}>
					<div class="text-left">
						<div class="all-shop-one-image">
							<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/shop/{{ $shop->id }}">
								<img src="{{ $shop->image['300x300'] }}" class="img-fluid">
							</a>
						</div>
						<div class="all-shop-title-info">
							<h2>{{ str_limit($shop->TextTrans('title'), 50) }}</h2>
							<p>{{ str_limit(strip_tags($shop->TextTrans('description')), 70) }}</p>
						</div>
					</div>
				</div>

			@endforeach

		</div>

		<div class="row">

            <div id="remove-row" class="col-md-12 mb-5">
                <button id="btn-more" data-id="{{ $shops->last()->id }}" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                    <p class="loadmore-text">Load more</p>
                </button>
            </div>

		</div>
	</div>



	<!-- Map Area Start -->
	<div class="google-map-area">
		<!--  Map Section -->
		<div id="contacts" class="map-area">
			<div id="googleMap" style="width:100%;height:420px;"></div>
		</div>
	</div>
	<div class="container story-3 text-center shop ">
		<div class="row stories-filter uppercase mt-5">
			<div class="col-md-12 text-center col-8">
				<h1 class="shop-header stories-header">now # {{ $singleTag->TextTrans('title') }}</h1>
			</div>
		</div>
		<div class="row nomarg shop-row mb-5">


			@foreach($tagShop as $forTags)

				<div class="col-md-4">
					<div class="text-left">
						<div class="all-shop-one-image">
							<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/shop/{{ $forTags->id }}">
								<img src="{{ $forTags->image['300x300'] }}" class="img-fluid">
							</a>
						</div>
						<div class="all-shop-title-info">
							<h2>{{ str_limit($forTags->TextTrans('title'), 50) }}</h2>
							<p>{{ str_limit(strip_tags($forTags->TextTrans('description')), 70) }}</p>
						</div>
					</div>
				</div>

			@endforeach


		</div>
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script>

		/* navbars asworebs */
		$(document).ready(function() {
			$(".collapse").on('show.bs.collapse', function() {
				$(".collapse").collapse('hide');
			});
		});
		/* navbars asworebs */
		function init() {
			var mapOptions = {
				zoom: 7,
				minZoom: 3,
				maxZoom: 18,
				scrollwheel: false,
				scaleControl: true,
				backgroundColor: "#2B2B2B",
				center: new google.maps.LatLng(41.9098312, 43.2330323),
				styles: [{
					"featureType": "all",
					"elementType": "labels.text.fill",
					"stylers": [{
						"saturation": 36
					}, {
						"color": "#000000"
					}, {
						"lightness": 40
					}]
				}, {
					"featureType": "all",
					"elementType": "labels.text.stroke",
					"stylers": [{
						"visibility": "on"
					}, {
						"color": "#000000"
					}, {
						"lightness": 16
					}]
				}, {
					"featureType": "all",
					"elementType": "labels.icon",
					"stylers": [{
						"visibility": "off"
					}]
				}, {
					"featureType": "administrative",
					"elementType": "geometry.fill",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 20
					}]
				}, {
					"featureType": "administrative",
					"elementType": "geometry.stroke",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 17
					}, {
						"weight": 1.2
					}]
				}, {
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 20
					}]
				}, {
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 21
					}]
				}, {
					"featureType": "road.highway",
					"elementType": "geometry.fill",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 17
					}]
				}, {
					"featureType": "road.highway",
					"elementType": "geometry.stroke",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 29
					}, {
						"weight": 0.2
					}]
				}, {
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 18
					}]
				}, {
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 16
					}]
				}, {
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 19
					}]
				}, {
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [{
						"color": "#000000"
					}, {
						"lightness": 17
					}]
				}]
			};
			var mapElement = document.getElementById("googleMap");
			var map = new google.maps.Map(mapElement, mapOptions);
			var strictBounds = new google.maps.LatLngBounds(
				new google.maps.LatLng(-73, -52),
				new google.maps.LatLng(81.25, 54)
			);
			google.maps.event.addListener(map, "dragend", function() {
				if (strictBounds.contains(map.getCenter())) return;

				var c = map.getCenter(),
					x = c.lng(),
					y = c.lat(),
					maxX = strictBounds.getNorthEast().lng(),
					maxY = strictBounds.getNorthEast().lat(),
					minX = strictBounds.getSouthWest().lng(),
					minY = strictBounds.getSouthWest().lat();

				if (x < minX) x = minX;
				if (x > maxX) x = maxX;
				if (y < minY) y = minY;
				if (y > maxY) y = maxY;

				map.setCenter(new google.maps.LatLng(y, x));
			});
			google.maps.event.addListener(map, "zoom_changed", function() {
				if (map.getZoom() <= 3) {
					$("[title='Zoom out']")[0].style.opacity = 0.5;
					$("[title='Zoom out']")[0].style.cursor = "default";
				} else if (map.getZoom() >= 18) {
					$("[title='Zoom in']")[0].style.opacity = 0.5;
					$("[title='Zoom in']")[0].style.cursor = "default";
				} else {
					$("[title='Zoom out']")[0].style.opacity = 1;
					$("[title='Zoom out']")[0].style.cursor = "pointer";
					$("[title='Zoom in']")[0].style.opacity = 1;
					$("[title='Zoom in']")[0].style.cursor = "pointer";
				}
			});
			var loc1 = new google.maps.Marker({
				position: new google.maps.LatLng(41.716096, 44.774754),
				map: map,
				icon: "{{ asset('assets/img/1.png') }}"
			});
			var myInfoWindow1 = new google.maps.InfoWindow({
				content:'<div>'+
							'<div class="text-left agency-mpdal-body modalre">'+
								'<img src="{{ asset('assets/img/story6.png') }}" class="img-fluid">'+
								'<div class="row modal-row">'+
									'<div class="col-sm-6"><button type="button" class="btn shop-button">STORY</button></div>'+
									'<div class="col-sm-6"><button type="button" class="btn shop-button"> BUY </button></div>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<center class="mapclose"><button type="button" data-dismiss="modal">×</button></center>'
			});
			loc1.addListener("click", function() {
				myInfoWindow1.open(map, loc1);
			});/*
			loc1.addListener("click", function() {
				$("#modal1").modal({
					show: true
				});
			});*/

			var loc2 = new google.maps.Marker({
				position: new google.maps.LatLng(41.64619985104113, 41.640790700912476),
				map: map,
				icon: "{{ asset('assets/img/1.png') }}"
			});
			var myInfoWindow2 = new google.maps.InfoWindow({
				content:'<div>'+
							'<div class="text-left agency-mpdal-body modalre">'+
								'<img src="{{ asset('assets/img/story6.png') }}" class="img-fluid">'+
								'<div class="row modal-row">'+
									'<div class="col-sm-6"><button type="button" class="btn shop-button">STORY</button></div>'+
									'<div class="col-sm-6"><button type="button" class="btn shop-button"> BUY </button></div>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<center class="mapclose"><button type="button" data-dismiss="modal">×</button></center>'
			});
			loc2.addListener("click", function() {
				myInfoWindow2.open(map, loc2);
			});/*
			loc2.addListener("click", function() {
				$("#modal1").modal({
					show: true
				});
			});*/
		}
		google.maps.event.addDomListener(window, "load", init);
	</script>
	<!-- Modal -->
	<div class="modal fade" id="modal1" role="dialog">
		<div class="modal-dialog shop-modal">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body text-left agency-mpdal-body modalre">
					<img src="img/story6.png" class="img-fluid">
					<div class="row modal-row">
						<div class="col-sm-6"><button type="button" class="btn shop-button">STORY</button></div>
						<div class="col-sm-6"><button type="button" class="btn shop-button"> BUY </button></div>
					</div>

				</div>
			</div>
			<center class="mapclose"><button type="button" data-dismiss="modal">×</button></center>
		</div>
	</div>
	<!-- Map Area End -->



<script type="text/javascript">
	
	$(document).ready(function(){
	   $(document).on('click','#btn-more',function(){
	    $("#btn-more").html("<img src='http://demo.itsolutionstuff.com/plugin/loader.gif' style='width: 50px !important'> Loading....");
	      	$.ajax({
	          url : '{{ URL::to('/').'/'.App::getLocale('locale').'/shop' }}',
	          method : "POST",
	          data : {
	            id: $('.shop-all-list .col-md-4').last().attr('id'),
	            _token : $('meta[name="csrf-token"]').attr('content')
	          },
	          dataType : "text",
	          success : function (data)
	          {
	              if(data != '') 
	              {
	                  $('#remove-row').remove();
	                  $('.shop-all-list').append(data);
	              }
	              else
	              {
	                  $('#btn-more').html("No Data");
	              }
	          }
	      });
	   });  
	});

	$(document).ready(function(){
	  $('#search').keyup(function(e){

	      $(".contributor-row").html('<div id="remove-row" class="col-md-12 mt-5 mb-5"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="width: 50px !important"> Loading....</div>');

	      $.ajax({
	          url : '{{ URL::to('/').'/'.App::getLocale('locale').'/searchshop' }}',
	          method : "POST",
	          data : {
	            search: $(this).val(),
	            _token : $('meta[name="csrf-token"]').attr('content')
	          },
	          dataType : "text",
	          success : function (data)
	          {
	              if(data != '') 
	              {
	                  $('#remove-row').remove();
	                  $('.shop-all-list .col-md-4').remove();
	                  $('.shop-all-list').append(data);
	              }
	              else
	              {
	                  $('#btn-more').html("No Data");
	              }
	          }
	      });
	   });  
	});


</script>

@endsection