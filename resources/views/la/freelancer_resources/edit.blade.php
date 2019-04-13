@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_resources') }}">Freelancer resource</a> :
@endsection
@section("contentheader_description", $freelancer_resource->$view_col)
@section("section", "Freelancer resources")
@section("section_url", url(config('laraadmin.adminRoute') . '/freelancer_resources'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Freelancer resources Edit : ".$freelancer_resource->$view_col)

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
				{!! Form::model($freelancer_resource, ['route' => [config('laraadmin.adminRoute') . '.freelancer_resources.update', $freelancer_resource->id ], 'method'=>'PUT', 'id' => 'freelancer_resource-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'type')
					@la_input($module, 'skills')
					@la_input($module, 'languages')
					@la_input($module, 'equipments')
					@la_input($module, 'city')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_resources') }}">Cancel</a></button>
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
	$("#freelancer_resource-edit-form").validate({
		
	});
});
</script>
@endpush
