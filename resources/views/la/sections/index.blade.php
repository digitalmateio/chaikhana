@extends("la.layouts.app")

@section("contentheader_title", "Sections")
@section("contentheader_description", "Sections listing")
@section("section", "Sections")
@section("sub_section", "Listing")
@section("htmlheader_title", "Sections Listing")

@section("headerElems")
@la_access("Sections", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Section</button>
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

@la_access("Sections", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Section</h4>
			</div>
			{!! Form::open(['action' => 'LA\SectionsController@store', 'id' => 'section-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'section_id')
					@la_input($module, 'story_id')
					@la_input($module, 'asset_type_id')
					@la_input($module, 'position')
					@la_input($module, 'audio')
					@la_input($module, 'content_en')
					@la_input($module, 'description_en')
					@la_input($module, 'about_en')
					@la_input($module, 'text_en')
					@la_input($module, 'dynamic_code_en')
					@la_input($module, 'code_en')
					@la_input($module, 'content_az')
					@la_input($module, 'description_az')
					@la_input($module, 'about_az')
					@la_input($module, 'text_az')
					@la_input($module, 'dynamic_code_az')
					@la_input($module, 'code_az')
					@la_input($module, 'content_hy')
					@la_input($module, 'description_hy')
					@la_input($module, 'about_hy')
					@la_input($module, 'text_hy')
					@la_input($module, 'dynamic_code_hy')
					@la_input($module, 'code_hy')
					@la_input($module, 'content_ka')
					@la_input($module, 'description_ka')
					@la_input($module, 'about_ka')
					@la_input($module, 'text_ka')
					@la_input($module, 'dynamic_code_ka')
					@la_input($module, 'code_ka')
					@la_input($module, 'content_ru')
					@la_input($module, 'description_ru')
					@la_input($module, 'about_ru')
					@la_input($module, 'text_ru')
					@la_input($module, 'dynamic_code_ru')
					@la_input($module, 'code_ru')
					@la_input($module, 'name_en')
					@la_input($module, 'title_en')
					@la_input($module, 'source_en')
					@la_input($module, 'permalink_staging_en')
					@la_input($module, 'edition_en')
					@la_input($module, 'caption_en')
					@la_input($module, 'sub_caption_en')
					@la_input($module, 'dataset_url_en')
					@la_input($module, 'dynamic_url_en')
					@la_input($module, 'url_en')
					@la_input($module, 'name_az')
					@la_input($module, 'title_az')
					@la_input($module, 'source_az')
					@la_input($module, 'permalink_staging_az')
					@la_input($module, 'edition_az')
					@la_input($module, 'caption_az')
					@la_input($module, 'sub_caption_az')
					@la_input($module, 'dataset_url_az')
					@la_input($module, 'dynamic_url_az')
					@la_input($module, 'url_az')
					@la_input($module, 'name_hy')
					@la_input($module, 'title_hy')
					@la_input($module, 'source_hy')
					@la_input($module, 'permalink_staging_hy')
					@la_input($module, 'edition_hy')
					@la_input($module, 'caption_hy')
					@la_input($module, 'sub_caption_hy')
					@la_input($module, 'dataset_url_hy')
					@la_input($module, 'dynamic_url_hy')
					@la_input($module, 'url_hy')
					@la_input($module, 'name_ka')
					@la_input($module, 'title_ka')
					@la_input($module, 'source_ka')
					@la_input($module, 'permalink_staging_ka')
					@la_input($module, 'edition_ka')
					@la_input($module, 'caption_ka')
					@la_input($module, 'sub_caption_ka')
					@la_input($module, 'dataset_url_ka')
					@la_input($module, 'dynamic_url_ka')
					@la_input($module, 'url_ka')
					@la_input($module, 'name_ru')
					@la_input($module, 'title_ru')
					@la_input($module, 'source_ru')
					@la_input($module, 'permalink_staging_ru')
					@la_input($module, 'edition_ru')
					@la_input($module, 'caption_ru')
					@la_input($module, 'sub_caption_ru')
					@la_input($module, 'dataset_url_ru')
					@la_input($module, 'dynamic_url_ru')
					@la_input($module, 'url_ru')
					@la_input($module, 'is_public')
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/section_dt_ajax') }}",
//        ajax:  {
//            "url": "{{ url(config('laraadmin.adminRoute') . '/section_dt_ajax') }}",
//            "type": "POST"
//        },
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#section-add-form").validate({
		
	});
});
</script>
@endpush
