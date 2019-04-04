@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/shop_tags') }}">Shop tag</a> :
@endsection
@section("contentheader_description", $shop_tag->$view_col)
@section("section", "Shop tags")
@section("section_url", url(config('laraadmin.adminRoute') . '/shop_tags'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Shop tags Edit : ".$shop_tag->$view_col)

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
				{!! Form::model($shop_tag, ['route' => [config('laraadmin.adminRoute') . '.shop_tags.update', $shop_tag->id ], 'method'=>'PUT', 'id' => 'shop_tag-edit-form']) !!}
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
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/shop_tags') }}">Cancel</a></button>
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
	$("#shop_tag-edit-form").validate({
		
	});
});
</script>
@endpush
