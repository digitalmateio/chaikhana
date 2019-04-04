@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/logos') }}">Logo</a> :
@endsection
@section("contentheader_description", $logo->$view_col)
@section("section", "Logos")
@section("section_url", url(config('laraadmin.adminRoute') . '/logos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Logos Edit : ".$logo->$view_col)

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
				{!! Form::model($logo, ['route' => [config('laraadmin.adminRoute') . '.logos.update', $logo->id ], 'method'=>'PUT', 'id' => 'logo-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'image')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/logos') }}">Cancel</a></button>
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
	$("#logo-edit-form").validate({
		
	});
});
</script>
@endpush
