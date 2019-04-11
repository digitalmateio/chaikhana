@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url()->previous() }}">Back</a> :
@endsection

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
			<div class="col-md-12 ">
			 {!! Form::model($block, ['route' => ['blockSave', $block->id ],'id' => 'block-edit-form']) !!}
			 
			 	{{-- @la_form($module) --}}
			 	@la_form($module)
				{{-- dd($block) --}}
          
          {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!}
           
            {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#block-edit-form").validate({
		
	});
});
</script>
@endpush
