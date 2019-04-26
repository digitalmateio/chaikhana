@php
	$translation = $block->getTranslationBylang();
@endphp
	<div class="container-full youtube-container">
			<div class="story-video-title col-md-12 text-center">
				<h2 class="text-26">
				{{	$translation->title }}
				</h2>
			</div>
			<div class="container-youtube">
				<iframe src="{{ $translation->url }}" frameborder="0" allowfullscreen class="video"></iframe>
			</div>
		</div>