@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/print_types') }}">Print type</a> :
@endsection
@section("contentheader_description", $print_type->$view_col)
@section("section", "Print types")
@section("section_url", url(config('laraadmin.adminRoute') . '/print_types'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Print types Edit : ".$print_type->$view_col)

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
				{!! Form::model($print_type, ['route' => [config('laraadmin.adminRoute') . '.print_types.update', $print_type->id ], 'method'=>'PUT', 'id' => 'print_type-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_ny')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/print_types') }}">Cancel</a></button>
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
	$("#print_type-edit-form").validate({
		
	});
});
</script>
@endpush
