@extends("la.layouts.app")

@section("contentheader_title", "Blocks")
@section("contentheader_description", "Blocks listing")
@section("section", "Blocks")
@section("sub_section", "Listing")
@section("htmlheader_title", "Blocks Listing")

@section("headerElems")
@la_access("Blocks", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Block</button>
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

@la_access("Blocks", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Block</h4>
			</div>
			{!! Form::open(['action' => 'LA\BlocksController@store', 'id' => 'block-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'section_id')
					@la_input($module, 'story_id	')
					@la_input($module, 'asset_type_id')
					@la_input($module, 'position')
					@la_input($module, 'dimension')
					@la_input($module, 'subtype')
					@la_input($module, 'dynamic_width')
					@la_input($module, 'dynamic_height')
					@la_input($module, 'dynamic_render')
					@la_input($module, 'media_type')
					@la_input($module, 'infobox_type')
					@la_input($module, 'caption_align	')
					@la_input($module, 'video_loop')
					@la_input($module, 'url')
					@la_input($module, 'code')
					@la_input($module, 'fullscreen')
					@la_input($module, 'loop')
					@la_input($module, 'info')
					--}}
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/block_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#block-add-form").validate({
		
	});
});
</script>
@endpush
