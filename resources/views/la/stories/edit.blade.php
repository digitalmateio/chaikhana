@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/stories') }}">Story</a> :
@endsection
@section("contentheader_description", $story->$view_col)
@section("section", "Stories")
@section("section_url", url(config('laraadmin.adminRoute') . '/stories'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Stories Edit : ".$story->$view_col)

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
				{!! Form::model($story, ['route' => [config('laraadmin.adminRoute') . '.stories.update', $story->id ], 'method'=>'PUT', 'id' => 'story-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'user_id')
					@la_input($module, 'latitude')
					@la_input($module, 'longitude')
					@la_input($module, 'impressions_count')
					@la_input($module, 'staff_pick')
					@la_input($module, 'publish_home_page')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/stories') }}">Cancel</a></button>
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
	$("#story-edit-form").validate({
		
	});
});
</script>
@endpush
