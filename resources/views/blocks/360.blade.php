
@foreach( $translations as $translation )
	@foreach($fields as $field)
			
		@if($field == 'image')
	<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 image-360">
			@php  
				$images = $translation->{$field};
				$image = optional($images)->thumbnails[0];
			@endphp
					<img src="{{ $image }}" alt="">
	

				</div>
			</div>
		</div>
		@endif
	@endforeach			
	
@endforeach