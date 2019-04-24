@extends('layouts.home')




@section('content')





<!-- Third Container (Grid) -->
	<div class="container-fluid text-center single-theme agency">


		<div class="row first-row-agency">

			<div class="col-md-11 mx-auto">
				<div class="row">
					

					<div class="col-md-5 text-left agency-top-text-info">	
						<h5 class="font-80 agency-header">{{ $topHeadAboutTop->TextTrans('title') }}</h5>
						<p class="agency-main-text font-24">{{ $topHeadAboutTop->TextTrans('description') }}</p>
						<div class="join-btn">
							<button class="btn button agency-btn text-22">find freelancer</button>
						</div>
					</div>
					<div class="col-md-7">
						<div class="agency-round-image">
							<div class="one-round-image left" style="background: url('{{ $topHeadAboutTop->left_image['300x300'] }}');">
							</div>
							<div class="one-round-image right" style="background: url('{{ $topHeadAboutTop->right_image['300x300'] }}');">
							</div>
							<div class="one-round-image bottom" style="background: url('{{ $topHeadAboutTop->bottom_image['300x300'] }}');">
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>


    <div id="map_wrapper_div">
    	<div class="col-md-11 mx-auto">

			<div class="d-flex agency-type-filter">
			  <ul class="list-inline justify-content-left agency-type-filter-list">
			  	@foreach($types as $type)
			    	<li class="list-inline-item" data-id="{{ $type->id }}">{{ $type->TextTrans('title') }}</li>
			    @endforeach   
			  </ul>
			</div>

			<div class="modal-block">
    			<!-- Freelancer Info --> 
    		</div>

    	</div>



        <div id="map_tuts"></div>


    </div>



	<div class="container-fluid text-center single-theme agency">
		<!-- Modal -->
		<div class="modal" id="myModal" role="dialog">
			<div class="modal-dialog pull-right agency-modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header agency-modal-header ">
						<h4 class="modal-title font-50 uppercase">Tbilisi</h4>
						<button type="button" class="close agency-modal-close" data-dismiss="modal">&times;</button>

					</div>
					<div class="modal-body text-left agency-mpdal-body">
						<p class="freelancer-type text-22 uppercase">TYPE OF FREELANCER.</p>
						<div class="row modal-row">
							<div class="col-md-12 agency-locationbtn-modal">

								<button class="button btn text-14 uppercase">Journalist</button>
								<button class="button btn text-14 uppercase">Photographer</button>
								<button class="button btn text-14 uppercase">Videographer</button>
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
							<button type="button" class="btn hire-freelancer text-18 uppercase"  onclick="$('#myModal2').modal({show: true});">Hire Freelancer</button>
						</div>

					</div>
				</div>

			</div>
		</div>

		<div class="modal " id="myModal2" role="dialog">
			<div class="modal-dialog agency-modal-dialog">

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

		<div class="modal " id="myModal3" role="dialog">
			<div class="modal-dialog agency-modal-dialog">

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
				<h1 class="font-65 mb-5">{{ $topHeadAboutBottom->TextTrans('title') }}</h1>
				<p class="font-24">{{ $topHeadAboutBottom->TextTrans('description') }}</p>
			</div>
			<div class="join-btn mx-auto">
				<button class="agency-join-btn text-22">Start Here</button>
			</div>
		</div>
	</div>




<script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
<script>

jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});


var map;
var markers = []; // Create a marker array to hold your markers
var beaches = [];

function setMarkers(locations) {

    for (var i = 0; i < locations.length; i++) {
        var beach = locations[i];
        var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            animation: google.maps.Animation.DROP,
            title: beach[0],
            cityID: beach[3],
            typeID: beach[4]
        });
        
        // Push marker to markers array
        markers.push(marker);

        google.maps.event.addListener(marker, "click", function() {
		   		
		   		var marker = this;
	            // alert('ID is : '+ this.cityID +' - '+this.title +' - '+ this.typeID);

				$.ajax({
				  	url : '{{ URL::to('/').'/'.App::getLocale('locale').'/agencyTypeFull' }}',
				  	method : "POST",
				  	data : {
				    	city_id: this.cityID,
				    	type_id: this.typeID,
				    	_token : $('meta[name="csrf-token"]').attr('content')
				  	},
				  	dataType : "json",
				  	success : function (data)
				  	{
						if(data != ''){
							console.log(data);
				      	}else{
				      		console.log(data);
				      	}
				  	}
				});
		});


    }

}

function reloadMarkers(){
 
    // Loop through markers and set map to null for each
    for (var i=0; i<markers.length; i++) {
        markers[i].setMap(null);
    }
    // Reset the markers array
    markers = [];
    // Call set markers to re-add markers
    setMarkers(beaches);
}

function initialize() {
    
    var mapOptions = {
        zoom: 7,
        center: new google.maps.LatLng(41.7378494,44.9704544),
        mapTypeId: google.maps.MapTypeId.SATELLITE
    }
    
    map = new google.maps.Map(document.getElementById('map_tuts'), mapOptions);

    setMarkers(beaches);

}


    


$(".agency-type-filter-list li").on('click', function() {


	$.ajax({
	  	url : '{{ URL::to('/').'/'.App::getLocale('locale').'/agencyType' }}',
	  	method : "POST",
	  	data : {
	    	id: $(this).attr("data-id"),
	    	_token : $('meta[name="csrf-token"]').attr('content')
	  	},
	  	dataType : "json",
	  	success : function (data)
	  	{
	      	if(data != ''){

				// var CityArr = JSON.parse(data);
				

				console.log(data);
				beaches = [];

				for (var i = 0; i < data.length; i++) {
				    beaches.push(data[i])
				}
				reloadMarkers();

				// console.log(markers);
				// console.log(beaches);

				// console.log(markers);

	      		// console.log();
	          // $('#remove-row').remove();
	          // $('.contributor-row .col-md-4').remove();
	          // $('.contributor-row').append(data);
	      	}else{
	      		console.log(data);
	          // $('#btn-more').html("No Data");
	      	}
	  	}
	});


});




// =================================



</script> 


<script type="text/javascript">
	$('#myModal3').on('hidden.bs.modal', function () {
	  $('.overlay1').eq(0).toggle();
	})
</script>


@endsection