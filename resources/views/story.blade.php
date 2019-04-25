@extends('layouts.home')


@section('content')

 {{-- 
dd( $story->cover[0] )

$story->cover 
{{ $story->thumbnail[0] }}
{{ $story->thumbnail_preview }}
{{ $story->cover }}


{!! $story->TextTrans('title') !!}
{!! $story->TextTrans('about') !!}
{!! $story->TextTrans('media_author') !!} 
--}}


@php

    $edition = $story->edition;
    $tags = $story->tags;
    $authors = $story->authors;
    $blocks = $story->blocks;


    if(!empty($story->block_sort_oder))
    {
        $order = json_decode($story->block_sort_oder);
        $blocksSorted = $blocks->sortBy(function($model) use ($order){
            return array_search($model->getKey(), $order);
        });
        
    }else{
    
      $blocksSorted = $blocks;
    
    }

@endphp

         

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
        @case(6) @php  dump( $translations ) @endphp
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










<a href="{{ $story->link }}">work with freelancer</button>



		<div class="container-fluid story-page single-storty-head-image">
			<div class="row">
				<div class="col-md-12">
					<div class="single-story-head-info">
						<img src="{{ optional($story)->cover[0] ?? ''}}" class="story-slider-3">
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
					<h1 class="story2-header font-50 single-story-head-title">{!! $story->TextTrans('title') !!}</h1>
				</div>
				<div class="col-md-10 text-left col-10 mx-auto">
					<p class="story2-main-text text-30 single-story-head-text">{!! $story->TextTrans('about') !!}
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


		

		<div class="container-fluid story-3 text-center single-theme padding-top-reset">
			<br>
			<div class="row">
				<div class="col-md-10 text-center col-10 mt-3 mx-auto">
					<p class="description text-26 single-story-paralax-sustr">
						Ziti angel hair basil cavatelli lasagna rotelle carbonara vermicelli. Cavatelli angel
					</p>
				</div>
				<div class="col-md-10 text-left col-10 mx-auto">
					<p class="story2-main-text text-30 mt-5 single-story-paralax-text">
						Khodaivandy and her sister, Shahrzad, 27, are part of the wave of young Georgians from Iran who moved to Tbilisi to attend the Tbilisi State Medical University. For Khodaivandy, the decision to move to Georgia was easy. Her late mother was ethnically Georgian and she grew up hearing the language. “My mother had always wanted to move to Georgia. Few years ago, our family vacationed in Batumi and it felt so heartwarming so see her speaking the Fereydunshahr-style Georgian language with the locals. It was an experience that made a significant contribution to making us feel that we were at home," Khodaivandy says. Khodaivandy says they felt very welcome when they arrived, in part due to Georgians' attitudes toward the Fereydunshahr Georgians. The group is respected for retaining its Georgian identity and language despite living in Iran for so long. Negar enrolled to a special class designed for those students who come from Iran and are of full or partial Georgian ancestry. Over the past four centuries, the Georgian language didn’t evolve for the Fereydunshahr Georgians, and the community adopted some Persian words. So, Georgian-Iranians can struggle to communicate. The classes offer a chance to improve their language skills. A strong command of the language is crucial for Georgian-Iranians as they seek to integrate into Georgian society. The community is well-aware of all the successful "returnees," who have built their careers in Georgia; however, nevertheless, there are stories of people who have moved back to Iran due to the challenges of adapting to life in Georgia. That includes those who moved back to Iran due to their language abilities.

					</p>
				</div>
				<div>

				</div>
			</div>
			<br>
		</div>
		<div class="container-fluid story-3 text-center single-theme img-3">
			<br>
			<div class="row">

				<div class="col-md-10 mx-auto text-left padding-right margin-bottom hover15">
					<img src="https://www.chai-khana.org/system/places/images/787/fullscreen/21312__0m4a4692e-sh1.jpg?1553175521">
					<br>
					<br>
				</div>
				<div class="col-md-10 mx-auto story-treeimage">
					<div class="row">

						<div class="col-md-6 text-left col-6 padding-right hover15">
							<img src="https://www.chai-khana.org/system/places/images/787/fullscreen/21321__0m4a4635e-sh1.jpg?1553176275">
						</div>
						<div class="col-md-6 text-left col-6 padding-left hover15">
							<img src="https://www.chai-khana.org/system/places/images/787/fullscreen/21318__0m4a4702e-sh1.jpg?1553176199">
						</div>

					</div>
				</div>

			</div>
			<br>
		</div>
		<div class="container-fluid story-3 text-center single-theme padding-top-reset">
			<div class="row">
				<div class="col-md-10 text-center col-10 mx-auto">
					<p class="description text-26 mt-3 single-story-treeimage-substr">Even in Georgia, Negar is frequently told to wear a veil. But she believes that true religion lies in being a kind person.</p>
				</div>
				<div class="col-md-10 text-left padding-20 col-10 mx-auto">
					<p class="story2-main-text text-30 mt-4 single-story-treeimage-text">
						For Khodaivandy, it has been hard to make Georgian friends and fully integrate into Georgian society. While her language skills have improved, and she feels at home in the capital, Tbilisi, most of her friends are from Iran or are foreigners studying at the medical university.
					</p>
				</div>
				<div>

				</div>
			</div>
			<br>
		</div>

		<div class="container-fluid story-3 text-left single-theme">
			<div class="row img-text story-one-image-with-text">

				<div class="col-md-10 mx-auto">
					<div class="row">
						
						<div class="col-md-7 text-left col-11">
							<img src="https://www.chai-khana.org/system/places/images/787/fullscreen/21320__0m4a4440e-sh1.jpg?1553176241" class="img-fluid">
						</div>
						<div class="col-md-4 align-middle grey-right-div margin-10 col-11">
							<div class="vertical-center">
								<p class="story2-main-text grey-right-text align-middle pt-5 text-30 single-story-one-image-right-text">
									Part of the challenge maybe her religion. Generally speaking, the majority of Georgians are Georgian Orthodox and for some people, in the country's violent past, Islam and Iran are associated with long years of occupation and brutality.
								</p>
							</div>
						</div>

					</div>
				</div>

			</div>
			<div class="row  margin-20">
				<div class="col-md-10 col-10 mx-auto">
					<p class="story2-main-text  text-30 single-story-one-image-bottom-txt">That means at times, Georgian-Iranians feel more like "outsiders" than "insiders" in Georgian society. For Khodaivandy, the focus on religion can feel forced. A person's cultural identity should be tied to language and traditions, she says, not religion. “My family is Muslim, however, my mother’s ancestors were Christian when they arrived in Persia,” she noted.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-10 mx-auto">
					<p class="story2-main-text text-30 single-story-one-image-bottom-txt">
						“Religion shall not define a person... It is not inscribed on our foreheads what religion we adhere to. Striving to be a better human was the core messages that echo throughout our family values. Speaking Georgian with my maternal grandparents and listening to their stories built my Georgian spirit. In fact, such storytelling makes Iran’s Georgians hold on to their roots,” she said, adding that people’s will to remain Georgian is what matters, not their faith.
					</p>
				</div>
			</div>
		</div>
		<br>
		<div class="parallax single-story-bottom-paralax">
			<p class="paral text-center">
				And, despite the challenges she has faced building a life in Tbilisi, Khodaivandy says she feels at home in her ancestral motherland. 
			</p>
		</div>

		<div class="container-fluid story-3 text-left single-theme whitebg">
			<!-- 		<div class="row">
				<div class="col-md-12">
					<img src="img/storyvideo.png" class="story-slider-3">
				</div>
			</div> -->
			<div class="row">
				<div class="col-md-10 col-10 mx-auto">
					<p class="story2-main-text margin-20 text-30 single-story-map-top-txt">
						“My whole family is in Iran, including my sister, who is already a citizen of Georgia. However, I am not alone. I know that my mother’s soul is here, where she had always wanted to be And, despite the challenges she has faced building a life in Tbilisi, Khodaivandy says she feels at home in her ancestral motherland. ”.
					</p>					
					<p class="story2-main-text margin-20 text-30 single-story-map-top-txt mt-5">
						“My whole family is in Iran, including my sister, who is already a citizen of Georgia. However, I am not alone. I know that my mother’s soul is here, where she had always wanted to be”.
					</p>
				</div>
			</div>

			<br>
			<div class="row">

				<div class="col-md-10 mx-auto single-story-map-txt-block">
					<div class="row">
						<div class="col-md-6 text-center">
							<img src="{{ asset('assets/img/map.png') }}" class="img-fluid map text-center">
						</div>
						<div class="col-md-5 margin-10 col-11">
							<p class="story2-main-text grey-right-text text-30 single-story-map-right-txt pt-5">
								Tuition at Tbilisi State Medical University is quite high for international students. Negar finds it difficult to raise enough funds for her studies, especially since she does not qualify for any scholarships.
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<br>
		<br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 image-360">

					<iframe height="400" allowfullscreen style="width:100%;border-style:none;" src="https://cdn.pannellum.org/2.4/pannellum.htm#panorama=https://pannellum.org/images/alma.jpg">
					</iframe>

				</div>
			</div>
		</div>
		<div class="container-fluid story-3 text-center single-theme padding-top-reset">
			<br>
			<div class="row">
				<div class="col-md-10 text-center col-10 mx-auto">
					<p class="description text-26 single-story-360-image-bottom-substr">Despite of all her struggles and difficulties, Negar is optimistic about her future thanks to her own strong desire to create a life for herself in Georgia and her family’s continued support.</p>
				</div>
				<div class="col-md-10 text-left padding-20 col-10 mx-auto">
					<p class="story2-main-text text-30 single-story-360-image-bottom-txt">Negar is familiar with the Georgian language due to the fact her late mother was ethnically Georgian and used to speak to her in Georgian when she was a child. But despite her desire to communicate in Georgian, she struggles to learn the language fluently. In Georgia, as elsewhere, a strong command of the language is essential to fully integrate into the community</p>
				</div>
				<div>

				</div>
			</div>
			<br>
		</div>
		<div class="container-full youtube-container">
			<div class="story-video-title col-md-12 text-center">
				<h2 class="text-26">
					video title
				</h2>
			</div>
			<div class="container-youtube">
				<iframe src="//www.youtube.com/embed/yCOY82UdFrw" frameborder="0" allowfullscreen class="video"></iframe>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 mx-auto mt-5">
					<div class="adban text-center single-story-banner">
						Ad banner
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
							<p class="grey-text text-30 single-story-author">AUTHOR</p>
							<h1 class="font-80 single-story-title">
								@foreach($authors as $author)
								    {{ $author->TextTrans('name') }}
								@endforeach
							</h1>
							@if(!empty($story->TextTrans('media_author')))
								<p class="grey-text text-30 single-story-author">MEDIA AUTHOR</p>
								<h1 class="font-80 single-story-title">
									{!! $story->TextTrans('media_author') !!}
								</h1>
							@endif
							<button class="button btn btn-success work single-story-work-button">Work with freelancer</button>
							<br>
							<br>
							<p class="grey-text text-30 single-story-comments">COMMENTS</p>
							<p class="text-30 single-story-levae-comments">Leave your comment</p>
						</div>
						<div class="col-md-4 col-11">
							<p class="grey-text text-30 single-story-edition">EDITION</p>
							<h1 class="font-80 single-story-edition-title">
								{{ $edition->TextTrans('name')  }}
							</h1>
							<p class="grey-text text-30 single-story-tags-title">TAGS</p>
							<p class="text-20 single-story-tags-txt">
								@foreach($tags as $tag)
								    {{ $tag->TextTrans('title') }}
								@endforeach
							</p>
							<br>
							<span class=" grey-text text-30 single-story-date">DATE</span>
							<span class="pull-right grey-text text-30 single-story-view">VIEWS</span>
							<br>
							<span class=" text-30 single-story-date-txt">{{ date("j F, Y", strtotime($story->created_at)) }}</span>
							<span class="pull-right text-30 single-story-view-txt">{{ $story->impressions_count }}</span>
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