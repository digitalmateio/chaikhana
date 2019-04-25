
<div class="container-full parallax-slider single-story-paralax-slider">

			<div id="demo" class="carousel slide" data-ride="carousel" data-interval="false">
				<div class="carousel-inner photo-with-music" id="storyslider">
			@foreach($translations as $translate)
      			@foreach($fields as $field)
      				@if($field == 'images')
      				{{ $translate->{$field} }}
					<div class="carousel-item @if($loop->first) active first-element @endif ">
						<img src="{{ asset('assets/img/hiking-fb-cover.jpg') }}" alt="Los Angeles" width="1100" height="500">
					</div>
					@endif
				@endforeach
			@endforeach
				<!-- 	<div class="carousel-item">
						<img src="{{ asset('assets/img/hiking-fb-cover.jpg') }}" alt="Chicago" width="1100" height="500">
					</div>
					<div class="carousel-item ">
						<img src="{{ asset('assets/img/hiking-fb-cover.jpg') }}" alt="New York" width="1100" height="500">
					</div>
					<div class="carousel-item ">
						<img src="{{ asset('assets/img/hiking-fb-cover.jpg') }}" alt="New York" width="1100" height="500">
					</div>
					<div class="carousel-item last-element">
						<img src="{{ asset('assets/img/hiking-fb-cover.jpg') }}" alt="New York" width="1100" height="500">
					</div> -->
				</div>
				<button class="circ textovr dollar ">$</button>
				<span class="textovr ">See buying options</span>

				<span class="soff ">Sound Off</span>
				<button class="circ textr" onclick="playmusic()"><i class="fa fa-volume-up"></i></button>

				<audio id="storyAudio">
				  <source src="assets/music.mp3" type="audio/mpeg">
				  Your browser does not support the audio element.
				</audio>

			</div>
		</div><!-- parallax-slider end -->
<style>
	#storyslider img {
		width: 100vw !important;
	}
	.carousel-caption {
		left: 24%;
		right: auto;
	}
</style>
  {{--    
@foreach($translations as $translate)
       @foreach($fields as $field)
          @php  
              // dump( $translate );
              // dump( $translate->{$field} );
              
          @endphp
          <hr>
           {!! $translate->{$field}  !!}
           
       @endforeach
@endforeach
--}}   