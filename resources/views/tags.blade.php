@extends('layouts.home')


@section('content')


    <div class="container-fluid story-3 text-center single-theme storynam-page">
       <div class="row stories-filter uppercase">
          <div class="col-md-6 text-left" id="r">
              <h1 class="stories-header font-58">{{ $tags->TextTrans('title') }}</h1>
              <div class="card-header" id="heading-1-1">
                  <h5 class="mb-0 text-18">
                      <input type="image" class="collapsed" onclick="$('#stage-1').toggle()" src="{{ asset('assets/img/filter-results-button.png') }}">
                      <a onclick="$('#stage-1').toggle()">
                       filter
                      </a>
                    </h5>
              </div>
          </div>
          <div class="col-md-3 text-left destop-filter" id="filter1">
              <a class="text-18">sort by</a>
              <div class="text-14">
                  <a href="#">recent</a> <a href="#">views</a> <a href="#">likes</a>
              </div>
          </div>
          <div class="col-md-3 text-left destop-filter" id="filter2">
              <a class="text-18">types  </a>
              <div class="text-14">
                  <a href="#">photo</a> <a href="#">video</a> <a href="#">talk show</a>
              </div>
          </div>

                <div class="col-sm-12 col-12 mobile-filter">
                    <div class="accordion" id="accordion2">
                        <!--ACCORDION ITEM TWO-->
                        <div class="card-body">
                            <div id="parent-1">
                                <div class="card">
                                    <div id="stage-1" class="collapse" data-parent="#parent-1" aria-labelledby="heading-1-1" style="">
                                        <div class="card-body">
                                            <div id="child-1">
                                                <div class="card">
                                                    <div class="card-header" id="heading-1-1-1">
                                                        <h5 class="mb-0 text-18">
                                                          <a onclick="tog('#sort-by')">
                                                             SORT BY <img src="{{ asset('assets/img/left-arrow (1).png') }}" class="filter-arrow">
                                                          </a>
                                                        </h5>
                                                    </div>
                                                    <div id="sort-by" class="collapse" data-parent="#child-1" aria-labelledby="heading-1-1-1">
                                                        <div class="card-body text-14">
                                                            <a href="">RECENT</a>
                                                            <a href="">VIEWS</a>
                                                            <a href="">LIKES</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="heading-1-1-2">
                                                        <h5 class="mb-0 text-18">
                                                          <a onclick="tog('#types-by')">
                                                            TYPES <img src="{{ asset('assets/img/left-arrow (1).png') }}" class="filter-arrow">
                                                          </a>
                                                        </h5>
                                                    </div>
                                                    <div id="types-by" class="collapse" data-parent="#child-1" aria-labelledby="heading-1-1-2">
                                                        <div class="card-body text-14">
                                                            <a href="">PHOTO</a>
                                                            <a href="">VIDEO</a>
                                                            <a href="">TALK SHOW</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="heading-1-1-3">
                                                        <h5 class="mb-0 text-14">
                                                          <a onclick="tog('#editions-by')">
                                                           editions <img src="{{ asset('assets/img/left-arrow (1).png') }}" class="filter-arrow">
                                                          </a>
                                                        </h5>
                                                    </div>
                                                    <div id="editions-by" class="collapse" data-parent="#child-1" aria-labelledby="heading-1-1-3">
                                                        <div class="card-body text-14">
                                                            <a href="">millenials</a>
                                                            <a href="">migrations</a>
                                                            <a href="">something</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="heading-1-1-4">
                                                        <h5 class="mb-0 text-18">
                                                          <a onclick="tog('#tags-by')">
                                                           tags <img src="{{ asset('assets/img/left-arrow (1).png') }}" class="filter-arrow">
                                                          </a>
                                                        </h5>
                                                    </div>
                                                    <div id="tags-by" class="collapse" data-parent="#child-1" aria-labelledby="heading-1-1-4">
                                                        <div class="card-body text-14">
                                                            <a href="">millenials</a>
                                                            <a href="">migrations</a>
                                                            <a href="">something</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function tog(e) {
                                                        $(e).toggle();
                                                        //setTimeout(function(){ $('#stage-1').eq(0).addClass('show'); }, 5);
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Mobile filters end -->
        </div>
        <div class="row stories-filter uppercase ">
            <div class="col-md-2 text-right editions-tags destop-filter offset-8">
                <p>
                    <a class="text-18" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                 editions  <img src="{{ asset('assets/img/left-arrow (1).png') }}" class="filter-arrow">
                </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body  text-14">
                        MOUNTAINS VIDEO TEENS
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-left editions-tags destop-filter">
                <p>
                    <a class="text-18" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                 tags   <img src="{{ asset('assets/img/left-arrow (1).png') }}" class="filter-arrow">
                </a>
                </p>
                <div class="collapse" id="collapseExample2">
                    <div class="card card-body text-14">
                        MOUNTAINS VIDEO TEENS
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ $tags->image[0] }}">
            </div>
        </div>
        <br>
        <div class="row text-left">
            <div class="col-md-12 text-center">
                <p class="theme-single-text grey-article-header">Showing all articles tagged in Feminism</p>
            </div>
        </div>
        <br>
        <div class="row ">
                <div class="col-md-4 story3-col-bg text-left col-12 trans  animated slideInUp delay-1s hoverable flex-grid-4">
                    <div class="">
                        <img src="{{ asset('assets/img/themesingle1.png') }}" class="img-fluid flex-img" width="536" height="360">
                        <div>
                            <h2 class="text-30">A New Generation of Musicians is Changing Baku’s Music Scene</h2>
                            <br>
                            <div><span class="">Millennials</span>
                                <img src="{{ asset('assets/img/play-button.png') }}" class="playbtn text-right hand">
                                <p class="little grey-text">February / March 2018</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 story3-col-bg col-12 trans  hoverable flex-grid-4 flex-grid-4middle">
                    <div class="animated slideInUp delay-1s ">
                        <img src="{{ asset('assets/img/themesingle3.png') }}" class="img-fluid flex-img " height="360">
                        <div class="white-bg-story text-left">
                            <h2 class="text-30">From Orphans to Community Builders</h2>
                            <br>
                            <div> <span>Millennials</span>
                                <img src="{{ asset('assets/img/camera.png') }}" class="stories-img-camera">
                                <p class="little grey-text">February / March 2018</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 story3-col-bg text-left col-12 trans  hoverable flex-grid-4">
                    <div class="animated slideInUp delay-1s ">
                        <img src="{{ asset('assets/img/themesingle2.png') }}" class="img-fluid flex-img" width="536" height="360">
                        <div>
                            <h2 class="text-30">To Know the Unknown</h2>
                            <br>
                            <div> <span>Millennials</span>
                                <img src="{{ asset('assets/img/play-button.png') }}" class="playbtn text-right hand">
                                <p class="little grey-text">February / March 2018</p>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        <div class="row ">
                <div class="col-md-4 story3-col-bg text-left col-12 trans  animated slideInUp delay-1s hoverable flex-grid-4">
                    <div class="">
                        <img src="{{ asset('assets/img/themesingle1.png') }}" class="img-fluid flex-img" width="536" height="360">
                        <div>
                            <h2 class="text-30">A New Generation of Musicians is Changing Baku’s Music Scene</h2>
                            <br>
                            <div><span class="">Millennials</span>
                                <img src="{{ asset('assets/img/play-button.png') }}" class="playbtn text-right hand">
                                <p class="little grey-text">February / March 2018</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 story3-col-bg col-12 trans  hoverable flex-grid-4 flex-grid-4middle">
                    <div class="animated slideInUp delay-1s ">
                        <img src="{{ asset('assets/img/themesingle3.png') }}" class="img-fluid flex-img " height="360">
                        <div class="white-bg-story text-left">
                            <h2 class="text-30">From Orphans to Community Builders</h2>
                            <br>
                            <div> <span>Millennials</span>
                                <img src="{{ asset('assets/img/camera.png') }}" class="stories-img-camera">
                                <p class="little grey-text">February / March 2018</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 story3-col-bg text-left col-12 trans  hoverable flex-grid-4">
                    <div class="animated slideInUp delay-1s ">
                        <img src="{{ asset('assets/img/themesingle2.png') }}" class="img-fluid flex-img" width="536" height="360">
                        <div>
                            <h2 class="text-30">To Know the Unknown</h2>
                            <br>
                            <div> <span>Millennials</span>
                                <img src="{{ asset('assets/img/play-button.png') }}" class="playbtn text-right hand">
                                <p class="little grey-text">February / March 2018</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

 
        <div class="row  loadmore-row">
            <div class="col-md-12 text-center">
                <a href="">
                    <img src="{{ asset('assets/img/loadmore.png') }}" class="loadmore">
                    <p class="loadmore-text">Load more</p>
                </a>
            </div>
        </div>
    </div>



<script type="text/javascript">
  if ($(window).width() < 767) {
    $('#r').addClass('col-md-12');
     $('#r').removeClass('col-md-6');
} else {
    $('#r').addClass('col-md-6');
}

  if ($(window).width() < 967 &&  $(window).width() >  767) {
    $('#r').addClass('col-md-3');
     $('#r').removeClass('col-md-6');
} else {
    $('#r').addClass('col-md-6');
}


  if ($(window).width() < 967 && $(window).width() >  767) {
    $('#filter1').addClass('col-md-5');
     $('#filter1').removeClass('col-md-3');
} else {
    $('#filter1').addClass('col-md-3');
}
  if ($(window).width() < 967 && $(window).width() >  767) {
    $('#filter2').addClass('col-md-4');
     $('#filter2').removeClass('col-md-3');
} else {
    $('#filter2').addClass('col-md-3');
}
</script>




@endsection