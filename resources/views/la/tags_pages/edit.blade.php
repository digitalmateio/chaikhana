@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/tags_pages') }}">Tags page</a> :
@endsection
@section("contentheader_description", $tags_page->$view_col)
@section("section", "Tags pages")
@section("section_url", url(config('laraadmin.adminRoute') . '/tags_pages'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Tags pages Edit : ".$tags_page->$view_col)

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
				{!! Form::model($tags_page, ['route' => [config('laraadmin.adminRoute') . '.tags_pages.update', $tags_page->id ], 'method'=>'PUT', 'id' => 'tags_page-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_hy')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					@la_input($module, 'image')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/tags_pages') }}">Cancel</a></button>
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
	$("#tags_page-edit-form").validate({
		
	});
});
</script>
@endpush
