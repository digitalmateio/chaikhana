@extends('layouts.home')




@section('content')





<!-- Third Container (Grid) -->
	<div class="container-fluid text-center single-theme agency">


		<div class="row first-row-agency">

			@if(session()->has('alert'))
				<div class="col-md-12">
					<div class="alert alert-success" role="alert">
					  {{ session()->get('alert') }}
					</div>
				</div>
			@endif


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

		<form action="{{ route('inserData') }}" method="POST">
			
			{{ csrf_field() }}
			<div class="modal-block modal-block-inser-data">
    			<!-- Freelancer Info --> 
    		</div>
    		<div class="modal-block modal-block-hire-freelancer">

				<div class="map-modal-block">
                    <h2>Hire</h2>
                    <button type="button" onclick="closeHireFreelancer()"><i class="fas fa-times"></i></button>
                </div>
                <div class="map-modal">
                    <h4 class="type">duration</h4>
                    <ul class="list-inline hire-agency-duration">
                        <li class="list-inline-item active">
                        	<input type="text" name="date_from" class="form-control" id="datepickerFrom" autocomplete="off">
                    	</li>  
                    	<li class="to-line-agency-line">TO</li>                      
                    	<li class="list-inline-item active">
                        	<input type="text" name="date_to" class="form-control" id="datepickerTo" autocomplete="off">
                    	</li>
                    </ul>
                    <h4 class="language">Your E-mail</h4>
      				<input type="text" class="form-control email-input" name="email" autocomplete="off" placeholder="ex: chrisbrownofficial@gmail.com">

                    <h4 class="language">Budget Range</h4>

                    <ul class="list-inline hire-agency-duration hire-budget">
                        <li class="list-inline-item">
                        	<input type="text" class="form-control budget-input from" autocomplete="off" name="budget_from" placeholder="Ex: 144$">
                    	</li>  
                    	<li class="to-line-agency-line">TO</li>                   
                    	<li class="list-inline-item">
                        	<input type="text" class="form-control budget-input to" autocomplete="off" name="budget_to" placeholder="Ex: 500$">
                    	</li>
                    </ul>

                    <h4 class="skills">TELL US MORE ABOUT YOUR REQUEST</h4>
                    <textarea class="form-control budget-input to" name="textarea" placeholder="Add your comment here..."></textarea>
                    <small id="passwordHelpBlock" class="form-text text-muted mb-5">
					  We wil connect you to your media professional in 24hrs
					</small>
                    <input type="submit" name="sendBtn" value="SEND" class="hire-freelancer">   
                </div>
    		</div>

    	</form>


    	</div>

        <div id="map_tuts"></div>


    </div>



	<div class="container-fluid text-center single-theme agency">

		<!-- Map Area End -->

		<div class="row agency-join join-row">
			<div class="col-md-8 text-left">
				<h1 class="font-65 mb-5">{{ $topHeadAboutBottom->TextTrans('title') }}</h1>
				<p class="font-24">{{ $topHeadAboutBottom->TextTrans('description') }}</p>
			</div>
			<div class="join-btn mx-auto">
				<button type="button" class="btn btn-primary agency-join-btn text-22" data-toggle="modal" data-target="#exampleModal">Start Here</button>
			</div>
		</div>
	</div>


<!-- Modal -->
<div class="modal fade join-us-modal bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body join-us-modal-body">
      	<h3 class="mb-5">Join Us</h3>
        <form action="{{ route('indertFr') }}" method="post">
        	
        	{{ csrf_field() }}
			<div class="row mb-4">
			    <div class="col">
			      <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off">
			    </div>
			    <div class="col">
			      <input type="text" class="form-control" name="email" placeholder="Email" autocomplete="off">
			    </div>
			</div>			
			<div class="row mb-4">
			    <div class="col">
			      <input type="text" class="form-control" name="address" placeholder="Address" autocomplete="off">
			    </div>
			    <div class="col">
			      <input type="text" class="form-control" name="subject" placeholder="Subject" autocomplete="off">
			    </div>
			</div>
			<div class="row mb-4">
				<div class="col">
				    <textarea class="form-control" name="textarea" placeholder="Tell us more ex: your location, skills, experience"></textarea>
			  	</div>
			</div>

			<input type="submit" name="send_btn" value="send">

        </form>
      </div>
    </div>
  </div>
</div>

{{-- <script src="https://maps.googleapis.com/maps/api/js?v=3"></script> --}}
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
				  	dataType : "text",
				  	success : function (data)
				  	{
						if(data != ''){
							// console.log(data);
							$('.modal-block-inser-data').show();
							$(".modal-block-inser-data").html(data);
				      	}else{
				      		// console.log(data);
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
				

				// console.log(data);
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

$('#datepickerFrom').datepicker({
    uiLibrary: 'bootstrap4'
});
$('#datepickerTo').datepicker({
    uiLibrary: 'bootstrap4'
});

function closeHireFreelancer(){
	$('.modal-block').hide();
}

function hireFunction(){
	// alert(1);
	$('.modal-block').hide();
	$('.modal-block-hire-freelancer').show();
}

// =================================



</script> 


<script type="text/javascript">
	$('#myModal3').on('hidden.bs.modal', function () {
	  $('.overlay1').eq(0).toggle();
	})
</script>


@endsection