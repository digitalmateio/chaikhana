@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/page_contents') }}">Page content</a> :
@endsection
@section("contentheader_description", $page_content->$view_col)
@section("section", "Page contents")
@section("section_url", url(config('laraadmin.adminRoute') . '/page_contents'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Page contents Edit : ".$page_content->$view_col)

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
				{!! Form::model($page_content, ['route' => [config('laraadmin.adminRoute') . '.page_contents.update', $page_content->id ], 'method'=>'PUT', 'id' => 'page_content-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_ny')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					@la_input($module, 'description_en')
					@la_input($module, 'description_ka')
					@la_input($module, 'description_ny')
					@la_input($module, 'description_az')
					@la_input($module, 'description_ru')
					@la_input($module, 'image')
					@la_input($module, 'position')
					@la_input($module, 'page')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/page_contents') }}">Cancel</a></button>
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
	$("#page_content-edit-form").validate({
		
	});
});
</script>
@endpush
