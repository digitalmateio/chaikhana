@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/photo_shop_orders') }}">Photo shop order</a> :
@endsection
@section("contentheader_description", $photo_shop_order->$view_col)
@section("section", "Photo shop orders")
@section("section_url", url(config('laraadmin.adminRoute') . '/photo_shop_orders'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Photo shop orders Edit : ".$photo_shop_order->$view_col)

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
				{!! Form::model($photo_shop_order, ['route' => [config('laraadmin.adminRoute') . '.photo_shop_orders.update', $photo_shop_order->id ], 'method'=>'PUT', 'id' => 'photo_shop_order-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'photo')
					@la_input($module, 'quantity')
					@la_input($module, 'address')
					@la_input($module, 'email')
					@la_input($module, 'shipping_country')
					@la_input($module, 'size')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/photo_shop_orders') }}">Cancel</a></button>
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
	$("#photo_shop_order-edit-form").validate({
		
	});
});
</script>
@endpush
