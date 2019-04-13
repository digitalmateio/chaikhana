@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/editions') }}">Edition</a> :
@endsection
@section("contentheader_description", $edition->$view_col)
@section("section", "Editions")
@section("section_url", url(config('laraadmin.adminRoute') . '/editions'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Editions Edit : ".$edition->$view_col)

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
				{!! Form::model($edition, ['route' => [config('laraadmin.adminRoute') . '.editions.update', $edition->id ], 'method'=>'PUT', 'id' => 'edition-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name_en')
					@la_input($module, 'name_ka')
					@la_input($module, 'name_hy')
					@la_input($module, 'name_az')
					@la_input($module, 'name_ru')
					@la_input($module, 'edition_en')
					@la_input($module, 'edition_ka')
					@la_input($module, 'edition_hy')
					@la_input($module, 'edition_az')
					@la_input($module, 'edition_ru')
					@la_input($module, 'description_en')
					@la_input($module, 'description_ka')
					@la_input($module, 'description_hy')
					@la_input($module, 'description_az')
					@la_input($module, 'description_ru')
					@la_input($module, 'permalink_en')
					@la_input($module, 'permalink_ka')
					@la_input($module, 'permalink_hy')
					@la_input($module, 'permalink_az')
					@la_input($module, 'permalink_ru')
					@la_input($module, 'stories_count')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/editions') }}">Cancel</a></button>
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
	$("#edition-edit-form").validate({
		
	});
});
</script>
@endpush
