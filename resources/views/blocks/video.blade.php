
@foreach( $translations as $translation )
	@foreach($fields as $field)
		@if($field == 'video')
			@php  
				$video = $translation->{$field};
			@endphp
	  		<video controls width="300">
			    <source src="{{ optional($video)->url }}" type="video/{{ optional($video)->extension }}">
			    Sorry, your browser doesn't support embedded videos.
			</video>
		@endif

	@endforeach			
	
@endforeach