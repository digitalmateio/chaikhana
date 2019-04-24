@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/resource_requests') }}">Resource request</a> :
@endsection
@section("contentheader_description", $resource_request->$view_col)
@section("section", "Resource requests")
@section("section_url", url(config('laraadmin.adminRoute') . '/resource_requests'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Resource requests Edit : ".$resource_request->$view_col)

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
				{!! Form::model($resource_request, ['route' => [config('laraadmin.adminRoute') . '.resource_requests.update', $resource_request->id ], 'method'=>'PUT', 'id' => 'resource_request-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'duration_from')
					@la_input($module, 'duration_ro')
					@la_input($module, 'email')
					@la_input($module, 'budget_range_from')
					@la_input($module, 'budget_range_to')
					@la_input($module, 'description')
					@la_input($module, 'type')
					@la_input($module, 'skills')
					@la_input($module, 'languages')
					@la_input($module, 'equipments')
					@la_input($module, 'city')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/resource_requests') }}">Cancel</a></button>
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
	$("#resource_request-edit-form").validate({
		
	});
});
</script>
@endpush
