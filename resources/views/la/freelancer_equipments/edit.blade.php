@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_equipments') }}">Freelancer equipment</a> :
@endsection
@section("contentheader_description", $freelancer_equipment->$view_col)
@section("section", "Freelancer equipments")
@section("section_url", url(config('laraadmin.adminRoute') . '/freelancer_equipments'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Freelancer equipments Edit : ".$freelancer_equipment->$view_col)

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
				{!! Form::model($freelancer_equipment, ['route' => [config('laraadmin.adminRoute') . '.freelancer_equipments.update', $freelancer_equipment->id ], 'method'=>'PUT', 'id' => 'freelancer_equipment-edit-form']) !!}
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
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_equipments') }}">Cancel</a></button>
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
	$("#freelancer_equipment-edit-form").validate({
		
	});
});
</script>
@endpush
