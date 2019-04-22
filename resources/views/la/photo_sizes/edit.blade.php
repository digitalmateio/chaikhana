@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/photo_sizes') }}">Photo size</a> :
@endsection
@section("contentheader_description", $photo_size->$view_col)
@section("section", "Photo sizes")
@section("section_url", url(config('laraadmin.adminRoute') . '/photo_sizes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Photo sizes Edit : ".$photo_size->$view_col)

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
				{!! Form::model($photo_size, ['route' => [config('laraadmin.adminRoute') . '.photo_sizes.update', $photo_size->id ], 'method'=>'PUT', 'id' => 'photo_size-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'price')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/photo_sizes') }}">Cancel</a></button>
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
	$("#photo_size-edit-form").validate({
		
	});
});
</script>
@endpush
