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

	<!-- Third Container (Grid) -->
	<div class="container-fluid story-3 text-center single-theme shop-single">
		<div class="row">
			<div class="col-md-6">
				<img src="img/story8.png" id="prev">
			</div>
			<div class="col-md-6">
				<div class="row shop-single-right text-left">
					<div class="col-md-12">
						<h4>PASTA DELICIOUS TORTELLINI</h4>
						<p class="grey-text">$45</p>
						<p class="grey-text">Spaghettini pasta pastina delicious lasagna linguini sauce, basil spaghettini spaghettini penne sauce tripoline pastina. Cheesy macaroni sorprese sauce tomatoes al dente spaghetti, basil capellini angel hair cheesy fiorentine ditalini delicious. Sauce angel hair angel hair delicious al dente angel hair angel hair.</p>
						<a href="#" class="green-text">visit story</a>
						<hr>
					</div>
					<div class="col-md-12">
						<p class="grey-text"> print type</p>
						<label class="ptype " for="p1" id="dd1" onclick="this.style.background = '#015C13'; $('#dd2')[0].style.background = 'white'">ACRYLIC</label>
						<input type="radio" name="print" id="p1" value="p1" class="pradio">
						<label class="ptype " for="p2" id="dd2" onclick="this.style.background = '#015C13'; $('#dd1')[0].style.background = 'white'">DRY-METH</label>
						<input type="radio" name="print" id="p2" value="p2" class="pradio">
					</div>
					<div class="col-md-9">
						<br>
						<p class="grey-text">SIZE</p>
						<label class="ptype paper shop-check" for="a1" id="aa1" onclick="$('.paper').css('background', 'white'); this.style.background = '#015C13';">A1</label>
						<input type="radio" name="page" id="a1" value="a1" class="pradio">

						<label class="ptype paper shop-check" for="a2" id="aa2" onclick="$('.paper').css('background', 'white'); this.style.background = '#015C13';">A2</label>
						<input type="radio" name="page" id="a2" value="a2" class="pradio">

						<label class="ptype paper shop-check" for="a3" id="aa3" onclick="$('.paper').css('background', 'white'); this.style.background = '#015C13';">A3</label>
						<input type="radio" name="page" id="a3" value="a3" class="pradio">

						<label class="ptype paper shop-check" for="a4" id="aa4" onclick="$('.paper').css('background', 'white'); this.style.background = '#015C13';">A4</label>
						<input type="radio" name="page" id="a4" value="a4" class="pradio">

						<br>

						<label class="ptype paper shop-check" for="a5" id="aa5" onclick="$('.paper').css('background', 'white'); this.style.background = '#015C13';">A5</label>
						<input type="radio" name="page" id="a5" value="a5" class="pradio">

						<label class="ptype paper shop-check" for="a6" id="aa6" onclick="$('.paper').css('background', 'white'); this.style.background = '#015C13';">A6</label>
						<input type="radio" name="page" id="a6" value="a6" class="pradio">

						<label class="ptype paper shop-check" for="a7" id="aa7" onclick="$('.paper').css('background', 'white'); this.style.background = '#015C13';">A7</label>
						<input type="radio" name="page" id="a7" value="a7" class="pradio">
					</div>
					<div class="col-md-3">
						<br>
						<div class="hand" onclick="gonext()">
							NEXT PHOTO
							<img src="img/shop-next.png" id="nextid">
						</div>
					</div>
					<div class="col-md-12">
						<br>
						<p class="grey-text">QUANTITY</p>
						<input type="number" value="2" class="quant shop-check">
					</div>
					<div class="col-md-12">
						<br>
						<p class="grey-text">SHIPPING</p>
						<select class="ships grey-text shop-check">
							<option >GEORGIA</option>
							<option>LOC 2</option>
							<option>LOC 3</option>
						</select>
					</div>
					<div class="col-md-12">
						<br>
						<br>
						<button type="submit" class="btn btn-primary btn-sm footersearchbtn buynow" onclick="$('#myModal').modal({show: true});">BUY NOW</button>
						<button type="submit" class="btn btn-link btn-sm">Refund Policy</button>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>

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
							<div class="col-md-12 text-center"><a href="payment.html" class="btn hire-freelancer">Go to Payment</a></div>
						</div>

					</div>
				</div>

			</div>
		</div>

		<br>
		<div class="row">
			<div class="col-md-12">
				<h5 class="text-left">PHOTO LOCATION</h5>
			</div>
			<div class="col-md-12">
					<div class="google-map-area">
			<!--  Map Section -->
			<div id="contacts" class="map-area">
				<div id="googleMap" style="width:100%;height:420px;"></div>
				<!-- <div class="map-content">
					<div class="map-right">
						<ul class="breadcrumb">
							<li class="breadcrumb-item">JOURNALIST</li>
							<li class="breadcrumb-item">PHOTOGRAPHER</li>
							<li class="breadcrumb-item">VIDEOGRAPHER</li>
						</ul>
					</div>
				</div> -->
			</div>
		</div>
			</div>
		</div>
		
		<!-- Map Area Start -->
	
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk"></script>
		<script>
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
					icon: "circle3.png"
				});
				loc1.addListener("click", function() {
					$("#mModal").modal({
						show: true
					});
				});
			}
			google.maps.event.addDomListener(window, "load", init);
		</script>
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
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="">
					<img src="img/loadmore.png" class="loadmore">
					<p class="loadmore-text">Load more</p>
				</a>
			</div>
		</div>
	</div>


<script>
	function gonext() {
		var newp = $("#nextid")[0].src;
		var oldp = $("#prev")[0].src;
		$("#nextid")[0].src = oldp;
		$("#prev")[0].src = newp;
	}
</script>


@endsection