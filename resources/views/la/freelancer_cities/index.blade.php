@extends("la.layouts.app")

@section("contentheader_title", "Freelancer cities")
@section("contentheader_description", "Freelancer cities listing")
@section("section", "Freelancer cities")
@section("sub_section", "Listing")
@section("htmlheader_title", "Freelancer cities Listing")

@section("headerElems")
@la_access("Freelancer_cities", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Freelancer city</button>
@endla_access
@endsection

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
<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Freelancer_cities", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Freelancer city</h4>
			</div>
			{!! Form::open(['action' => 'LA\Freelancer_citiesController@store', 'id' => 'freelancer_city-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
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
					 <div id='map_canvas'></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/freelancer_city_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#freelancer_city-add-form").validate({
		
	});
});

</script>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
          var map = new google.maps.Map(document.getElementById('map_canvas'), {
          zoom: 8,
          center: new google.maps.LatLng(35.137879, -82.836914),
          mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      var myMarker = new google.maps.Marker({
          position: new google.maps.LatLng(41.926, 44.028),
          // position: new google.maps.LatLng(47.651968, 9.478485),
          draggable: true
      });

 google.maps.event.addListener(map, 'click', function(e) {
     myMarker.setPosition(e.latLng);
//            document.getElementById('latitude').value =  e.latLng.lat().toFixed(8);
//          document.getElementById('longitude').value =  e.latLng.lng().toFixed(8);
         $('[name=latitude]').val( e.latLng.lat().toFixed(8) );
          $('[name=longitude]').val( e.latLng.lng().toFixed(8) );

  });


// try to cklick on map
// google.maps.event.addListener(myMarker, 'dblclick', function(event) {
//   alert('ckliked');
//         myMarker.setPosition(event.latLng);
//         console.log('daeklicka');
//         console.log(event.latLng);
// // chaemata
//          document.getElementById('latitude').value =  event.latLng.lat().toFixed(8);
//           document.getElementById('longitude').value =  event.latLng.lng().toFixed(8);
// });


      google.maps.event.addListener(myMarker, 'dragend', function (evt) {
          $('[name=latitude]').val(evt.latLng.lat().toFixed(8));
          $('[name=longitude]').val(evt.latLng.lng().toFixed(8));
//        document.getElementById('latitude').value  =  evt.latLng.lat().toFixed(8);
//        document.getElementById('longitude').value =  evt.latLng.lng().toFixed(8);
      });

      // google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
      //     console.log('draging = '+evt.latLng.lat().toFixed(8));
      //     // document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
      // });

      map.setCenter(myMarker.position);
      myMarker.setMap(map);
    
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/photo_shop_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#photo_shop-add-form").validate({
		
	});
});
</script>
@endpush
