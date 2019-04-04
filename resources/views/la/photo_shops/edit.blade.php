@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/photo_shops') }}">Photo shop</a> :
@endsection
@section("contentheader_description", $photo_shop->$view_col)
@section("section", "Photo shops")
@section("section_url", url(config('laraadmin.adminRoute') . '/photo_shops'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Photo shops Edit : ".$photo_shop->$view_col)

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
				{!! Form::model($photo_shop, ['route' => [config('laraadmin.adminRoute') . '.photo_shops.update', $photo_shop->id ], 'method'=>'PUT', 'id' => 'photo_shop-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title_en')
					@la_input($module, 'title_ka')
					@la_input($module, 'title_az')
					@la_input($module, 'title_ny')
					@la_input($module, 'title_ru')
					@la_input($module, 'description_en')
					@la_input($module, 'description_ka')
					@la_input($module, 'description_az')
					@la_input($module, 'description_ny')
					@la_input($module, 'description_ru')
					@la_input($module, 'image')
					@la_input($module, 'quantity')
					@la_input($module, 'size')
					@la_input($module, 'price')
					@la_input($module, 'print_type')
					@la_input($module, 'latitude')
					@la_input($module, 'longitude')
					@la_input($module, 'tag')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/photo_shops') }}">Cancel</a></button>
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
	$("#photo_shop-edit-form").validate({
		
	});
});
</script>
@endpush
