@extends('layouts.home')




@section('content')


<!-- Second Container -->
        <div class="container-fluid authors-page author-single">
            <div class="row text-left ">
                <div class="col-md-6 text-right">
                    <img src="{{ asset('assets/img/author1.png') }}" class="img-fluid ">
                </div>
                <div class="col-md-6 authors-img-txt">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="author-header">
                                <h1 class="font-80">{{ $oneAuth->TextTrans('name') }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="stories-main-text font-24">{!! $oneAuth->TextTrans('about') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Third Container (Grid) -->
<div class="container-fluid story-3 text-center single-theme  single-author-fluid">
    <div class="row author-stories-row">
        <div class="col-md-12 text-center">
            <h1 class="font-50">My stories</h1>
        </div>
    </div>
   <div class="row "><!--  -->
      <div class="col-md-4 story3-col-bg text-left col-12 trans  animated slideInUp delay-1s hoverable flex-grid-4">
        <div class="">
          <img src="img/themesingle1.png" class="img-fluid flex-img" width="536" height="360">
          <div>
            <h2 class="text-30">A New Generation of Musicians is Changing Baku’s Music Scene</h2>
            <br>
            <div>
            <img src="img/play-button.png" class="playbtn text-right hand">
            <p class="little grey-text">February / March 2018</p></div>  
          </div>
        </div>
      </div>

      <div class="col-md-4 story3-col-bg col-12 trans  hoverable flex-grid-4 flex-grid-4middle">
        <div class="animated slideInUp delay-1s ">
          <img src="img/themesingle3.png" class="img-fluid flex-img " height="360">
          <div class="white-bg-story text-left">
            <h2 class="text-30">From Orphans to Community Builders</h2>
            <br>
            <div> 
            <img src="img/camera.png" class="stories-img-camera">
            <p class="little grey-text">February / March 2018</p></div>
          </div>
        </div>
      </div>

      <div class="col-md-4 story3-col-bg text-left col-12 trans  hoverable flex-grid-4">
        <div class="animated slideInUp delay-1s ">
          <img src="img/themesingle2.png" class="img-fluid flex-img" width="536" height="360">
          <div>
            <h2 class="text-30">To Know the Unknown</h2>
            <br>
            <div>
            <img src="img/play-button.png" class="playbtn text-right hand">
            <p class="little grey-text">February / March 2018</p></div>           
          </div>
        </div>
      </div>
    </div>
     <div class="row "><!--  -->
      <div class="col-md-4 story3-col-bg text-left col-12 trans  animated slideInUp delay-1s hoverable flex-grid-4">
        <div class="">
          <img src="img/themesingle1.png" class="img-fluid flex-img" width="536" height="360">
          <div>
            <h2 class="text-30">A New Generation of Musicians is Changing Baku’s Music Scene</h2>
            <br>
            <div>
            <img src="img/play-button.png" class="playbtn text-right hand">
            <p class="little grey-text">February / March 2018</p></div>  
          </div>
        </div>
      </div>

      <div class="col-md-4 story3-col-bg col-12 trans  hoverable flex-grid-4 flex-grid-4middle">
        <div class="animated slideInUp delay-1s ">
          <img src="img/themesingle3.png" class="img-fluid flex-img " height="360">
          <div class="white-bg-story text-left">
            <h2 class="text-30">From Orphans to Community Builders</h2>
            <br>
            <div> 
            <img src="img/camera.png" class="stories-img-camera">
            <p class="little grey-text">February / March 2018</p></div>
          </div>
        </div>
      </div>

      <div class="col-md-4 story3-col-bg text-left col-12 trans  hoverable flex-grid-4">
        <div class="animated slideInUp delay-1s ">
          <img src="img/themesingle2.png" class="img-fluid flex-img" width="536" height="360">
          <div>
            <h2 class="text-30">To Know the Unknown</h2>
            <br>
            <div>
            <img src="img/play-button.png" class="playbtn text-right hand">
            <p class="little grey-text">February / March 2018</p></div>           
          </div>
        </div>
      </div>
    </div>
            <!-- <br>
            <br>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="border-inside">
                        <img src="img/story4.png" class="img-fluid">
                        <p>PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI RAVIOLI</p>
                        <div class="row stories-block">
                            <div class="col-md-12">
                                <span class="stories-text-title">caucasus</span>
                                <img src="img/camera.png" class="stories-img-camera">
                            </div>
                            <div class="col-md-12">
                                <span class="stories-text-title">23 February,2018</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-inside">
                        <img src="img/story5.png" class="img-fluid">
                        <p>PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI RAVIOLI</p>
                        <div class="row stories-block">
                            <div class="col-md-12">
                                <span class="stories-text-title">caucasus</span>
                                <img src="img/camera.png" class="stories-img-camera">
                            </div>
                            <div class="col-md-12">
                                <span class="stories-text-title">23 February,2018</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-inside">
                        <img src="img/story6.png" class="img-fluid">
                        <p>PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI RAVIOLI</p>
                        <div class="row stories-block">
                            <div class="col-md-12">
                                <span class="stories-text-title">caucasus</span>
                                <img src="img/camera.png" class="stories-img-camera">
                            </div>
                            <div class="col-md-12">
                                <span class="stories-text-title">23 February,2018</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="">
                        <img src="img/loadmore.png" class="loadmore">
                        <p class="loadmore-text">Load more</p>
                    </a>
                </div>
            </div> -->
<!--  <div class="row  loadmore-row author-load">
            <div class="col-md-12 text-center">
                <a href="">
                    <img src="img/loadmore.png" class="loadmore">
                    <p class="loadmore-text">Load more</p>
                </a>
            </div>
</div>  -->          
</div>
<script type="text/javascript">
 $(document).ready(function() {
  
  var rowcount=0;
var staticdivauthor=     
 '<div class="row ">'+
      '<div class="col-md-4 story3-col-bg text-left col-12 trans  animated slideInUp delay-1s hoverable flex-grid-4">'+
        '<div class="">'+
          '<img src="img/themesingle1.png" class="img-fluid flex-img" width="536" height="360">'+
          '<div>'+
            '<h2 class="text-30">A New Generation of Musicians is Changing Baku’s Music Scene</h2>'+
            '<br>'+
            '<div>'+
            '<img src="img/play-button.png" class="playbtn text-right hand">'+
            '<p class="little grey-text">February / March 2018</p></div>'+
          '</div>'+
        '</div>'+
      '</div>'+
      '<div class="col-md-4 story3-col-bg col-12 trans  hoverable flex-grid-4 flex-grid-4middle">'+
        '<div class="animated slideInUp delay-1s">'+
          '<img src="img/themesingle3.png" class="img-fluid flex-img " height="360">'+
          '<div class="white-bg-story text-left">'+
            '<h2 class="text-30">From Orphans to Community Builders</h2>'+
            '<br>'+
            '<div>'+
            '<img src="img/camera.png" class="stories-img-camera">'+
            '<p class="little grey-text">February / March 2018</p></div>'+
          '</div>'+
        '</div>'+
      '</div>'+
      '<div class="col-md-4 story3-col-bg text-left col-12 trans  hoverable flex-grid-4">'+
        '<div class="animated slideInUp delay-1s ">'+
          '<img src="img/themesingle2.png" class="img-fluid flex-img" width="536" height="360">'+
          '<div>'+
            '<h2 class="text-30">To Know the Unknown</h2>'+
            '<br>'+
            '<div>'+
            '<img src="img/play-button.png" class="playbtn text-right hand">'+
            '<p class="little grey-text">February / March 2018</p></div>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>';
  // Each time the user scrolls
// win.scrollTop()-
  $(window).scroll(function() {
    if ( $(window).scrollTop() + 300 >= $(document).height() - $('footer').eq(0).height() ){

       $('.single-author-fluid').append(staticdivauthor);
    }
  });
});
</script>





@endsection