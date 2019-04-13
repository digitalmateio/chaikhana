@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_type_cities') }}">Freelancer type city</a> :
@endsection
@section("contentheader_description", $freelancer_type_city->$view_col)
@section("section", "Freelancer type cities")
@section("section_url", url(config('laraadmin.adminRoute') . '/freelancer_type_cities'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Freelancer type cities Edit : ".$freelancer_type_city->$view_col)

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
				{!! Form::model($freelancer_type_city, ['route' => [config('laraadmin.adminRoute') . '.freelancer_type_cities.update', $freelancer_type_city->id ], 'method'=>'PUT', 'id' => 'freelancer_type_city-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'freelancer_type')
					@la_input($module, 'freelancer_city')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/freelancer_type_cities') }}">Cancel</a></button>
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
	$("#freelancer_type_city-edit-form").validate({
		
	});
});
</script>
@endpush
