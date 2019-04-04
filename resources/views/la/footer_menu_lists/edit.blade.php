@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/footer_menu_lists') }}">Footer menu list</a> :
@endsection
@section("contentheader_description", $footer_menu_list->$view_col)
@section("section", "Footer menu lists")
@section("section_url", url(config('laraadmin.adminRoute') . '/footer_menu_lists'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Footer menu lists Edit : ".$footer_menu_list->$view_col)

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
				{!! Form::model($footer_menu_list, ['route' => [config('laraadmin.adminRoute') . '.footer_menu_lists.update', $footer_menu_list->id ], 'method'=>'PUT', 'id' => 'footer_menu_list-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_ny')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ru')
					@la_input($module, 'link')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/footer_menu_lists') }}">Cancel</a></button>
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
	$("#footer_menu_list-edit-form").validate({
		
	});
});
</script>
@endpush
