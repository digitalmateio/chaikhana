@extends('layouts.home')


@section('content')


@php

    $edition = $event->edition;
    $tags = $event->tags;
    $authors = $event->authors;
    $blocks = $event->blocks;


    if(!empty($event->block_sort_oder))
    {
        $order = json_decode($event->block_sort_oder);
        $blocksSorted = $blocks->sortBy(function($model) use ($order){
            return array_search($model->getKey(), $order);
        });
        
    }else{
    
      $blocksSorted = $blocks;
    
    }

@endphp

         



		<div class="container-fluid story-page single-storty-head-image">
			<div class="row">
				<div class="col-md-12">
					<div class="single-story-head-info">
						<img src="{{ optional($event)->cover[0] ?? ''}}" class="story-slider-3">
						<span class="shadow-story-head-image"><!-- --></span>
					</div>
				</div>
			</div>
		</div>


		<!-- Third Container (Grid) -->
		<div class="container-fluid story-3 text-center single-theme">
			<div class="row">

				<div class="col-md-11 text-center col-11 mt-3 mx-auto">
					<p class="description text-26 single-story-head-image-sustr">
						Ziti angel hair basil cavatelli lasagna rotelle carbonara vermicelli. Cavatelli angel
					</p>
				</div>

				<div class="col-md-10 col-10 text-left mx-auto mt-4">
					<h1 class="story2-header font-50 single-story-head-title">{!! $event->TextTrans('title') !!}</h1>
				</div>
				<div class="col-md-10 text-left col-10 mx-auto">
					<p class="story2-main-text text-30 single-story-head-text">{!! $event->TextTrans('about') !!}
					</p>
				</div>
				<div class="col-md-1 story2-main-text  fixed-div-right col-1">
					<button class="circ"><i class="fa fa-calendar"></i></button>
					<p class="social-text">27 NOV</p>
					<button class="circ"><i class="fa fa-eye"></i></button>
					<p class="social-text">30349</p>
					<button class="circ languagecircle"><a class="social-text">EN</a></button>
					<br>
					<i class="fa fa-facebook-square social-icons"></i>
					<br>
					<i class="fa fa-twitter social-icons"></i>
				</div>
			</div>
			<br>
			<br>
		</div>


		
@foreach($blocksSorted as $block)
   
    @foreach($block_types as $blocktype)
        @if( $blocktype->id == $block->asset_type_id  )   
            @php                 
                $fields = json_decode($blocktype->fields) 
            @endphp
        @endif
    @endforeach
    
    @php 
        $translations = $block->translations ;
    // dump( $block->asset_type_id );
    // continue;
    @endphp




     @switch( $block->asset_type_id )

        @case(3)
            @include('blocks.text', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(4)
            @include('blocks.photo', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(5)
            @include('blocks.video', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(6) 
            @include('blocks.slideshow', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(7)
            @include('blocks.imagedesc', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(8)
            @include('blocks.360', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(12)
            @include('blocks.embedmedia', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(13)
            @include('blocks.youtube', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(14)
            @include('blocks.paralax', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break        
        @case(15)
            @include('blocks.threeimage', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
        @break

    @endswitch
  
@endforeach



	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 mx-auto mt-5">
					<div class="adban text-center single-story-banner">
						{!! $event->ad_banner !!}
					</div>
				</div>
			</div>
		</div>
	

	

		<br>
		<div class="container-fluid text-left single-theme single-story-bottom-info">
			<div class="row">

				<div class="col-md-10 mx-auto">
					<div class="row">
						
						<div class="col-md-7 col-11">
							
							<p class="grey-text text-30 single-story-comments">COMMENTS</p>
							<p class="text-30 single-story-levae-comments">Leave your comment</p>
						</div>
					
					</div>
				</div>

			</div>
		</div>
		<br>
		
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=2261784814058026&autoLogAppEvents=1"></script>

		<div class="container-fluid text-left single-theme single-story-bottom-info">
			<div class="row">
				<div class="col-md-10 mx-auto">

					<div class="adban text-center  facebook-comment font-28">
						<div class="fb-comments" data-href="https://chaikhana.digitalmate.io/story1.php" data-numposts="5" data-width="100%"></div>
					</div>

				</div>	
			</div>
		</div>






		<br>
		<center class="">
			<h1 class="font-50">Next story</h1></center>
		<div class="container-fluid ">
			<div class="row">
				<div class="col-md-12">
					<a href="">
						<img src="{{ asset('assets/img/click-story.png') }}" class="clickable-story scroll_To_Top">
					</a>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			var status = 0;
			var storyAudio = $("#storyAudio")[0];
			$(".photo-with-music ")
				.mouseenter(function() {
					// beepThree.pause();
					if (status == 0) {
						// storyAudio.play();
						status = 1;
					}

				});

			function playmusic() {
				var x = document.getElementById("storyAudio");
				if (x.paused == true) {
					// x.play();
				} else
					x.pause();
			}

			/* slider */

			const $slider = $("#storyslider");
			$slider
				.on('init', () => {
					mouseWheel($slider)
				})
				.slick({
					dots: true,
					horizontal: true,
					vertical: false,
					infinite: false,
				})

			function mouseWheel($slider) {
				$("#storyslider").on('wheel', {
					$slider: $slider
				}, mouseWheelHandler)
			}

			function mouseWheelHandler(event) {
				var storysliderelement = $(".parallax-slider div.slick-active")[0];
				var storysliderelement1 = $(".parallax-slider div.first-element")[0];
				var storysliderelement2 = $(".parallax-slider div.last-element")[0];

				const $slider = event.data.$slider
				const delta = event.originalEvent.deltaY

				if (delta > 0) {
					if (storysliderelement != storysliderelement1) {
						event.preventDefault();
						$slider.slick('slickPrev')
					}

				} else {
					if (storysliderelement != storysliderelement2) {
						event.preventDefault();
						$slider.slick('slickNext')
					}

				}
			}

					$(document).ready(function(){
	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) 
		{
			$('.scroll_To_Top').fadeIn();
		} 
		else 
		{
			$('.scroll_To_Top').fadeOut();
		}
	});
	

	$('.scroll_To_Top').click(function(){
		$('html, body').animate({scrollTop : 0},2000);
		return false;
	});
	
});
</script>



@endsection