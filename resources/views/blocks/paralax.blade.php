@php
	$translation = $block->getTranslationBylang();
@endphp

		<div class="parallax single-story-bottom-paralax" style='  background-image: url("{{  $translation->image  }}");'>
			<p class="paral text-center">
				{!!  $translation->description !!}
			</p>
				
	
		</div>