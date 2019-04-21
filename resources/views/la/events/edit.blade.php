@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/events') }}">Event</a> :
@endsection
@section("contentheader_description", $event->$view_col)
@section("section", "Events")
@section("section_url", url(config('laraadmin.adminRoute') . '/events'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Events Edit : ".$event->$view_col)

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
				{!! Form::model($event, ['route' => [config('laraadmin.adminRoute') . '.events.update', $event->id ], 'method'=>'PUT', 'id' => 'event-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'cover')
					@la_input($module, 'title_en')
					@la_input($module, 'title_az')
					@la_input($module, 'title_hy')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_ru')
					@la_input($module, 'about_en')
					@la_input($module, 'about_ka')
					@la_input($module, 'about_hy')
					@la_input($module, 'about_az')
					@la_input($module, 'about_ru')
					@la_input($module, 'ad_banner')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/events') }}">Cancel</a></button>
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
	$("#event-edit-form").validate({
		
	});
});
</script>
@endpush
