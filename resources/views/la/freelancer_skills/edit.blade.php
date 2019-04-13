@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_skills') }}">Freelancer skill</a> :
@endsection
@section("contentheader_description", $freelancer_skill->$view_col)
@section("section", "Freelancer skills")
@section("section_url", url(config('laraadmin.adminRoute') . '/freelancer_skills'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Freelancer skills Edit : ".$freelancer_skill->$view_col)

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
				{!! Form::model($freelancer_skill, ['route' => [config('laraadmin.adminRoute') . '.freelancer_skills.update', $freelancer_skill->id ], 'method'=>'PUT', 'id' => 'freelancer_skill-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_hy')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_skills') }}">Cancel</a></button>
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
	$("#freelancer_skill-edit-form").validate({
		
	});
});
</script>
@endpush
