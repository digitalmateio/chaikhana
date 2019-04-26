@php
	$translation = $block->getTranslationBylang();
@endphp

	<div class="container-fluid story-3 text-left single-theme">
			<div class="row img-text story-one-image-with-text">

				<div class="col-md-10 mx-auto">
					<div class="row">
						
						<div class="col-md-7 text-left col-11">
							@php
								$images = optional($translation)->image;
								$image = optional($images)->thumbnails[0];
							@endphp
							<img src="{{ $image }}" class="img-fluid">
						</div>
						<div class="col-md-4 align-middle grey-right-div margin-10 col-11">
							<div class="vertical-center">
								<p class="story2-main-text grey-right-text align-middle pt-5 text-30 single-story-one-image-right-text">

								{!! $translation->description !!}
								
								</p>
							</div>
						</div>

					</div>
				</div>

			</div>

		</div>

