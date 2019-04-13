@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/vacancies') }}">Vacancy</a> :
@endsection
@section("contentheader_description", $vacancy->$view_col)
@section("section", "Vacancies")
@section("section_url", url(config('laraadmin.adminRoute') . '/vacancies'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Vacancies Edit : ".$vacancy->$view_col)

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
				{!! Form::model($vacancy, ['route' => [config('laraadmin.adminRoute') . '.vacancies.update', $vacancy->id ], 'method'=>'PUT', 'id' => 'vacancy-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_ny')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					@la_input($module, 'mainduties_en')
					@la_input($module, 'mainduties_ka')
					@la_input($module, 'mainduties_ny')
					@la_input($module, 'mainduties_az')
					@la_input($module, 'mainduties_ru')
					@la_input($module, 'experiencedesired_en')
					@la_input($module, 'experiencedesired_ka')
					@la_input($module, 'experiencedesired_ny')
					@la_input($module, 'experiencedesired_az')
					@la_input($module, 'experiencedesired_ru')
					@la_input($module, 'requirements_en')
					@la_input($module, 'requirements_ka')
					@la_input($module, 'requirements_ny')
					@la_input($module, 'requirements_az')
					@la_input($module, 'requirements_ru')
					@la_input($module, 'deadline')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/vacancies') }}">Cancel</a></button>
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
	$("#vacancy-edit-form").validate({
		
	});
});
</script>
@endpush
