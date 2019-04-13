@extends('layouts.home')




@section('content')



<!-- Third Container (Grid) -->
	<div class="container-fluid story-3 text-center single-theme agency">
<br>	<br><br>	<br>
		<div class="row first-row-agency">

			<div class="col-md-6 text-left">	
				<h5 class="font-80 agency-header">{{ $topHeadAboutTop->TextTrans('title') }}</h5>
				<p class="agency-main-text font-24">{{ $topHeadAboutTop->TextTrans('description') }}</p>
				<div class="join-btn">
					<button class="btn button agency-btn text-22">find freelancer</button>
				</div>

			</div>
			<div class="col-md-6">
				<div class="agency-round-image">
					<div class="one-round-image left">
						<img src="{{ $topHeadAboutTop->left_image['300x300'] }}" class="agency-img">
					</div>
					<div class="one-round-image right">
						<img src="{{ $topHeadAboutTop->right_image['300x300'] }}" class="agency-img">
					</div>
					<div class="one-round-image bottom">
						<img src="{{ $topHeadAboutTop->bottom_image['300x300'] }}" class="agency-img">
					</div>
				</div>
			</div>
		</div>
		<!-- Map Area Start -->
		<div class="google-map-area">
			<!--  Map Section -->
			<div id="contacts" class="map-area">
				<div id="googleMap" style="width:100%;height:420px;"></div>
				<div class="map-content">
					<div class="map-right">
						<ul class="breadcrumb">
							<li class="breadcrumb-item">JOURNALIST</li>
							<li class="breadcrumb-item">PHOTOGRAPHER</li>
							<li class="breadcrumb-item">VIDEOGRAPHER</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<script src="https://maps.googleapis.com/maps/api/js?key="></script>
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
					icon: "circle2.png"
				});
				loc1.addListener("click", function() {
					$("#myModal").modal({
						show: true
					});
				});

				var loc2 = new google.maps.Marker({
					position: new google.maps.LatLng(41.64619985104113, 41.640790700912476),
					map: map,
					icon: "circle3.png"
				});
				loc2.addListener("click", function() {
					$("#myModal").modal({
						show: true
					});
				});
			}
			google.maps.event.addDomListener(window, "load", init);
			//$(document).ready(function(){
				setTimeout(function() {
					$("[src='circle2.png']").eq(0).addClass("heartbeat");
					$("[src='circle3.png']").eq(0).addClass("heartbeat");
					console.log("is");
				}, 3000);
			//});
		</script>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header agency-modal-header ">
						<h4 class="modal-title font-50">Tbilisi</h4>
						<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>

					</div>
					<div class="modal-body text-left agency-mpdal-body">
						<p class="freelancer-type text-22">TYPE OF FREELANCER.</p>
						<div class="row modal-row">
							<div class="col-md-12 agency-locationbtn-modal">

								<button class="button btn text-18">Journalist</button>
								<button class="button btn text-18">Photographer</button>
								<button class="button btn text-18">Videographer</button>
							</div>
							<div class="col-md-12">
								<p class="text-28">Languages</p>
								<label class="checkcontainer text-18">French
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer text-18">English
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer text-18">Georgian
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p class="text-28">Skills</p>
								<label class="checkcontainer text-18">Creativity
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer text-18">Imagination
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
								<label class="checkcontainer text-18">Editing
									<input type="checkbox" checked="">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p class="text-28">Equipment</p>
								<span class="text-18">Camera,</span> <span class="text-18">Lens,</span> <span>Flash,</span><span class="text-18">Drone,</span>
							</div>
							<button type="button" class="btn hire-freelancer text-18" data-dismiss="modal" onclick="$('#myModal2').modal({show: true});">Hire Freelancer</button>
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
						<h4 class="modal-title ">HIRE</h4>
						<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body text-left agency-mpdal-body">
						<p class="text-18 duration">DURATION</p>
						<div class="row modal-row">
							<div class="col-md-12 agency-locationbtn-modal text-18">
								<input type="text" name="sd" placeholder="Start Date" class="
								hirebg">
								TO
								<input type="text" name="ed" placeholder="End Date" class="hirebg">
							</div>
							<div class="col-md-12">
								<p class="text-22">YOUR E-MAIL</p>
								<input type="email" name="email" class="form-control text-18 hirebg" placeholder="ex: chrisbrownofficial@gmail.com">
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p class="text-22">BUDGET RANGE</p>
								<input type="text" name="bfrom" placeholder="Ex: 100$" class="text-18 hirebg">
								TO
								<input type="text" name="bto" placeholder="Ex: 250$" class="text-18 hirebg">
							</div>
						</div>
						<div class="row modal-row">
							<div class="col-md-12">
								<p class="text-22">TELL US MORE ON YOUR REQUEST</p>
								<textarea class="form-control text-18 hirebg" placeholder="Add your comment here..."></textarea>
								<p class="text-16">We will connect you to your media professional in 24hrs</p>
							</div>
							<button type="button" class="btn hire-freelancer text-22" onclick="$('#myModal3').modal({show: true}); $('.overlay1').eq(0).toggle();">SEND</button>
						</div>

					</div>
				</div>

			</div>
		</div>
<div class="overlay1" onclick="$('.overlay1').eq(0).toggle()"></div>

		<div class="modal fade" id="myModal3" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header agency-modal-header ">
						<h4 class="modal-title">JOIN US</h4>
						<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>

					</div>
					<div class="modal-body text-left agency-mpdal-body">
						
						<div class="row modal-row">
							<div class="col-md-12 agency-locationbtn-modal text-18">
								<input type="text" name="sd" placeholder="Email" class="
								hirebg">
								
								<input type="text" name="ed" placeholder="Phone Number" class="hirebg">
							</div>
							<div class="col-md-12 agency-locationbtn-modal text-18">
								<input type="text" name="sd" placeholder="Location" class="
								hirebg">
								
								<input type="text" name="ed" placeholder="Location" class="hirebg">
							</div>
							<div class="col-md-12 agency-locationbtn-modal text-18">
								<textarea class="form-control text-18 hirebg" placeholder="Add your comment here..."></textarea>
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

		<div class="row agency-join join-row">
			<div class="col-md-8 text-left">
				<h1 class="font-65">{{ $topHeadAboutBottom->TextTrans('title') }}</h1>
				<p class="font-24">{{ $topHeadAboutBottom->TextTrans('description') }}</p>
			</div>
			<div class="join-btn">
				<button class="agency-join-btn text-22">Start Here</button>
			</div>
		</div>
	</div>





@endsection