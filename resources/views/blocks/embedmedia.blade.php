@php
	$translation = $block->getTranslationBylang();
@endphp

@foreach($fields as $field)
	{!!  $translation->{ $field } !!}
@endforeach