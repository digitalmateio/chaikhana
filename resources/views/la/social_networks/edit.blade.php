@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/social_networks') }}">Social Network</a> :
@endsection
@section("contentheader_description", $social_network->$view_col)
@section("section", "Social Networks")
@section("section_url", url(config('laraadmin.adminRoute') . '/social_networks'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Social Networks Edit : ".$social_network->$view_col)

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
				{!! Form::model($social_network, ['route' => [config('laraadmin.adminRoute') . '.social_networks.update', $social_network->id ], 'method'=>'PUT', 'id' => 'social_network-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'link')
					@la_input($module, 'icon')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/social_networks') }}">Cancel</a></button>
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
	$("#social_network-edit-form").validate({
		
	});
});
</script>
@endpush
