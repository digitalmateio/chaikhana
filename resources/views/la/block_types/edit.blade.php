@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/block_types') }}">Block type</a> :
@endsection
@section("contentheader_description", $block_type->$view_col)
@section("section", "Block types")
@section("section_url", url(config('laraadmin.adminRoute') . '/block_types'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Block types Edit : ".$block_type->$view_col)

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
				{!! Form::model($block_type, ['route' => [config('laraadmin.adminRoute') . '.block_types.update', $block_type->id ], 'method'=>'PUT', 'id' => 'block_type-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'type')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/block_types') }}">Cancel</a></button>
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
	$("#block_type-edit-form").validate({
		
	});
});
</script>
@endpush
