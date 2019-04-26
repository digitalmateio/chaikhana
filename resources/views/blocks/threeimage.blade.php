@php 
	$translation = $block->getTranslationBylang();
	//$translation->top_image;
	//$translation->right_image;
	//$translation->left_image;

@endphp
	<div class="container-fluid story-3 text-center single-theme img-3">
			<br>
			<div class="row">

				<div class="col-md-10 mx-auto text-left padding-right margin-bottom hover15">
					<img src="{{ $translation->top_image }}">
					<br>
					<br>
				</div>
				<div class="col-md-10 mx-auto story-treeimage">
					<div class="row">

						<div class="col-md-6 text-left col-6 padding-right hover15">
							<img src="{{ $translation->right_image }}">
						</div>
						<div class="col-md-6 text-left col-6 padding-left hover15">
							<img src="{{ $translation->left_image }}">
						</div>
					</div>
				</div>

			</div>
			<br>
		</div>