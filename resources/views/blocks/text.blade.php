
	<div class="container-fluid story-3 text-center single-theme padding-top-reset">
			<br>
			<div class="row">
@foreach( $translations as $translation )
	@foreach($fields as $field)
				@if( $field == 'title')
				<div class="col-md-10 text-center col-10 mt-3 mx-auto">
					<p class="description text-26 single-story-paralax-sustr">
						{{ $translation->{$field}  }}
					</p>
				</div>
				@endif

				@if( $field == 'text' )
				<div class="col-md-10 text-left col-10 mx-auto">
					<p class="story2-main-text text-30 mt-5 single-story-paralax-text">
				 	{!! $translation->{$field}  !!}
					</p>
				</div>
				@endif
	@endforeach			
@endforeach
			</div>
			<br>
		</div>
