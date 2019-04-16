@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/sections') }}">Section</a> :
@endsection
@section("contentheader_description", $section->$view_col)
@section("section", "Sections")
@section("section_url", url(config('laraadmin.adminRoute') . '/sections'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Sections Edit : ".$section->$view_col)

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
				{!! Form::model($section, ['route' => [config('laraadmin.adminRoute') . '.sections.update', $section->id ], 'method'=>'PUT', 'id' => 'section-edit-form']) !!}
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
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/sections') }}">Cancel</a></button>
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
	$("#section-edit-form").validate({
		
	});
});
</script>
@endpush
