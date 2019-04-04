@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/translations') }}">Translation</a> :
@endsection
@section("contentheader_description", $translation->$view_col)
@section("section", "Translations")
@section("section_url", url(config('laraadmin.adminRoute') . '/translations'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Translations Edit : ".$translation->$view_col)

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
				{!! Form::model($translation, ['route' => [config('laraadmin.adminRoute') . '.translations.update', $translation->id ], 'method'=>'PUT', 'id' => 'translation-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'block_id')
					@la_input($module, 'story_id')
					@la_input($module, 'theme_id')
					@la_input($module, 'locale')
					@la_input($module, 'media_type')
					@la_input($module, 'audio_path')
					@la_input($module, 'video_path')
					@la_input($module, 'position')
					@la_input($module, 'video_loop')
					@la_input($module, 'name')
					@la_input($module, 'title')
					@la_input($module, 'source')
					@la_input($module, 'permalink_staging')
					@la_input($module, 'media_author')
					@la_input($module, 'edition')
					@la_input($module, 'caption')
					@la_input($module, 'sub_caption')
					@la_input($module, 'content')
					@la_input($module, 'description')
					@la_input($module, 'about')
					@la_input($module, 'text')
					@la_input($module, 'dataset_url')
					@la_input($module, 'dynamic_url')
					@la_input($module, 'dynamic_code')
					@la_input($module, 'url')
					@la_input($module, 'code')
					@la_input($module, 'shortened_url')
					@la_input($module, 'permalink')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/translations') }}">Cancel</a></button>
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
	$("#translation-edit-form").validate({
		
	});
});
</script>
@endpush
