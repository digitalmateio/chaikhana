@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_cities') }}">Freelancer city</a> :
@endsection
@section("contentheader_description", $freelancer_city->$view_col)
@section("section", "Freelancer cities")
@section("section_url", url(config('laraadmin.adminRoute') . '/freelancer_cities'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Freelancer cities Edit : ".$freelancer_city->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style media="screen">
#map-label {
  margin-right: 16px;
}
  #map_canvas {
      width: 540px;
      height: 300px;
  }

</style>
<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($freelancer_city, ['route' => [config('laraadmin.adminRoute') . '.freelancer_cities.update', $freelancer_city->id ], 'method'=>'PUT', 'id' => 'freelancer_city-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_hy')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					@la_input($module, 'latitude')
					@la_input($module, 'longitude')
					--}}
                    <br>
                      <div id='map_canvas'></div>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_cities') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#freelancer_city-edit-form").validate({
		
	});
});
</script>


<script src="https://maps.google.com/maps/api/js?sensor=true"></script> 
<script>
$( document ).ready(function() {

  var latitude =  $('[name=latitude]').val();
  var longitude = $('[name=longitude]').val();

      var map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: 8,
          // center: new google.maps.LatLng(latitude, longitude),
          center: new google.maps.LatLng(35.137879, -82.836914),
          mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      var myMarker = new google.maps.Marker({
          position: new google.maps.LatLng(latitude,longitude),
          // position: new google.maps.LatLng(41.926, 44.028),
          // position: new google.maps.LatLng(47.651968, 9.478485),
          draggable: true
      });

  google.maps.event.addListener(map, 'click', function(e) {
     myMarker.setPosition(e.latLng);
        $('[name=latitude]').val( e.latLng.lat().toFixed(8) );
          $('[name=longitude]').val( e.latLng.lng().toFixed(8) );

//            document.getElementById('latitude').value =  e.latLng.lat().toFixed(8);
//          document.getElementById('longitude').value =  e.latLng.lng().toFixed(8); 
  });

      google.maps.event.addListener(myMarker, 'dragend', function (evt) {
            $('[name=latitude]').val( e.latLng.lat().toFixed(8) );
          $('[name=longitude]').val( e.latLng.lng().toFixed(8) );

//        document.getElementById('latitude').value =  evt.latLng.lat().toFixed(8);
//        document.getElementById('longitude').value =  evt.latLng.lng().toFixed(8);
          document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
      });

      // google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
      //     document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
      // });

      map.setCenter(myMarker.position);
      myMarker.setMap(map);
});
$(function () {
	$("#photo_shop-edit-form").validate({
		
	});
});
</script>
@endpush
