@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/agency_main_pages') }}">Agency main page</a> :
@endsection
@section("contentheader_description", $agency_main_page->$view_col)
@section("section", "Agency main pages")
@section("section_url", url(config('laraadmin.adminRoute') . '/agency_main_pages'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Agency main pages Edit : ".$agency_main_page->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($agency_main_page, ['route' => [config('laraadmin.adminRoute') . '.agency_main_pages.update', $agency_main_page->id ], 'method'=>'PUT', 'id' => 'agency_main_page-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_hy')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					@la_input($module, 'description_en')
					@la_input($module, 'description_ka')
					@la_input($module, 'description_hy')
					@la_input($module, 'description_az')
					@la_input($module, 'description_ru')
					@la_input($module, 'left_image')
					@la_input($module, 'right_image')
					@la_input($module, 'bottom_image')
					@la_input($module, 'position')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/agency_main_pages') }}">Cancel</a></button>
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
	$("#agency_main_page-edit-form").validate({
		
	});
});
</script>
@endpush
