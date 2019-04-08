@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/section_translations') }}">Section translation</a> :
@endsection
@section("contentheader_description", $section_translation->$view_col)
@section("section", "Section translations")
@section("section_url", url(config('laraadmin.adminRoute') . '/section_translations'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Section translations Edit : ".$section_translation->$view_col)

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
				{!! Form::model($section_translation, ['route' => [config('laraadmin.adminRoute') . '.section_translations.update', $section_translation->id ], 'method'=>'PUT', 'id' => 'section_translation-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'section_id')
					@la_input($module, 'locale')
					@la_input($module, 'title')
					@la_input($module, 'story_id')
					@la_input($module, 'asset_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/section_translations') }}">Cancel</a></button>
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
	$("#section_translation-edit-form").validate({
		
	});
});
</script>
@endpush
