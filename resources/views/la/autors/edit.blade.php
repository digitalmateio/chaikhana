@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/autors') }}">Autor</a> :
@endsection
@section("contentheader_description", $autor->$view_col)
@section("section", "Autors")
@section("section_url", url(config('laraadmin.adminRoute') . '/autors'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Autors Edit : ".$autor->$view_col)

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
				{!! Form::model($autor, ['route' => [config('laraadmin.adminRoute') . '.autors.update', $autor->id ], 'method'=>'PUT', 'id' => 'autor-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name_en')
					@la_input($module, 'name_ka')
					@la_input($module, 'name_hy')
					@la_input($module, 'name_az')
					@la_input($module, 'name_ru')
					@la_input($module, 'about_en')
					@la_input($module, 'about_ka')
					@la_input($module, 'about_hy')
					@la_input($module, 'about_az')
					@la_input($module, 'about_ru')
					@la_input($module, 'permalink')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/autors') }}">Cancel</a></button>
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
	$("#autor-edit-form").validate({
		
	});
});
</script>
@endpush
