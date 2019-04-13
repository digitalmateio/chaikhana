@extends('layouts.home')


@section('content')



<div id="demo" class="carousel slide index-carousel" data-ride="carousel">

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active ">
        <div class="img-bg-index bg-index-1">
            
        </div>
    </div>
    <div class="carousel-item">
        <div class="img-bg-index bg-index-2">
            

        </div>
    </div>
    <div class="carousel-item">
        <div class="img-bg-index bg-index-3">
            
        </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev  index-slider-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next index-slider-next" href="#demo" data-slide="next" index-slider-prev>
    <span class="carousel-control-next-icon"></span>
  </a>

    <!-- Indicators -->
    <ul class="carousel-indicators onvideo index-slider">
        <li data-target="#demo" data-slide-to="0" class="active first-title">
            <div class="col-md-12 main-title ">
                    <span class="upper">Millennials</span>
                    <h3 class="carousel-h3">A Georgian girl from Iran</h3>
                </div>
        </li>
        <li data-target="#demo" data-slide-to="1" class="second-title">
            <div class="col-md-12 main-title ">
                <span>Masculinities</span>
                <h3 class="carousel-h3">It’s a Mountain Man’s World</h3>
            </div>
        </li>

        <li data-target="#demo" data-slide-to="2" class="third-title">
            <div class="col-md-12 main-title ">
                <span>Masculinities</span>
                <h3 class="carousel-h3">The Man From Truso</h3>
            </div>
        </li>
    </ul>


</div>



<div class="video-div">

        
        <img src="play.png" class="video-controls main-video" onclick="playpause1(this)" /> 
        <div class="menuoverlay" id="ovrdiv">
            <center class="search-center">
                <div class="container max800">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn sbtn" type="button" onclick="$('#ovrdiv')[0].style.display='none';">
                                <i class="fa fa-search"></i>
                            </button>  
                        </div>
                        <input type="search" class="form-control noborder" placeholder="Type here..">
                    </div>
                    <p class="grey-text text-left">6 results found in Stories</p>
                    <div class="row text-left">
                        <div class="col-md-4 col-6">
                            <div class="story3-col-bg border-1 hand">
                                <img src="img/story6.png" class="img-fluid">
                                <p class="font-15">PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI</p>
                                <span>Caucasus</span>
                                <img src="img/play-button.png" class="playbtn text-right">
                                <p class="little grey-text">23 February, 2018</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="story3-col-bg border-1 hand">
                                <img src="img/story5.png" class="img-fluid">
                                <p class="font-15">PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI</p>
                                <span>Caucasus</span>
                                <img src="img/play-button.png" class="playbtn text-right">
                                <p class="little grey-text">23 February, 2018</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="story3-col-bg border-1 hand">
                                <img src="img/story4.png" class="img-fluid">
                                <p class="font-15">PASTA DELICIOUS TORTELLINI DELICIOUS VERMICELLI</p>
                                <span>Caucasus</span>
                                <img src="img/play-button.png" class="playbtn text-right">
                                <p class="little grey-text">23 February, 2018</p>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <span class="grey-text hand">3 more results</span>
                        </div>
                    </div>
                    <br>
                    
                </div>
            </center>
        </div>
    </div>


    <div class="menuoverlay menuoverlay2 surveypopup container-fluid" id="ovrdiv2">
          
            <center class="search-center">
                <div class=" max800">
                    <div class="row question-row">
                        <div class="col-md-11 col-10">
                         <h4 class="text-30">What kind of design is the most comfortable for your dream house?</h4> 
                        </div>
                        <div class="col-md-1 col-2">
                            <button id="closesearch" class="hand" onclick="$('#ovrdiv2')[0].style.display='none';">X</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="radio">
                                <input type="radio" name="page" id="ans1" value="ans1" class="pradio">
                                    <label class="ptype2 paper text-20" for="ans1" id="aaa1 btn" onclick="//func()" >
                                    Minimalistic</label>
                            </div>                      
                        </div>
                        <div class="col-md-3">
                        <div class="radio">
                                <input type="radio" name="page" id="ans2" value="ans2" class="pradio">
                                    <label class="ptype2 paper text-20" for="ans2" id="aaa2 btn">
                                    Minimalistic</label>
                            </div> 
                            
                        </div>
                        <div class="col-md-3">
                            <div class="radio">
                                <input type="radio" name="page" id="ans3" value="ans3" class="pradio">
                                    <label class="ptype2 paper text-20" for="ans3" id="aaa3 btn">
                                    Minimalistic</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="radio">
                                <input type="radio" name="page" id="ans4" value="ans4" class="pradio">
                                    <label class="ptype2 paper text-20" for="ans4" id="aaa4 btn">
                                    Minimalistic</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="button btn sbmt text-22">SUBMIT</button>
                </div>
            </center>
    </div>

    <br>
    <!-- Second Container -->
    <div class="container-fluid bg-2 mt22">
        <br>
        <div class="row stories-row">
            <div class="col-md-7 text-right">
                <h3 class="greyheader animated fadeIn delay-1s text-30 " style="font-size: 30px;">fresh stories</h3>
            </div>
            <div class="col-md-5">
                <p class="check-calls hand text-18" onclick="$('#ovrdiv2')[0].style.display = 'table'">check for calls <img src="img/callcheck.png" class="text-right callicon"></p>

            </div>
        </div>
    </div>

    <!-- Third Container (Grid) -->
    <div class="container-fluid story-3 text-center pink-bg index-containers">

        <br>
        <div class="row "><!--  -->
            <div class="col-md-3 story3-col-bg text-left col-12 trans flex-grid-3 animated slideInUp delay-1s hoverable">
                <div class="">
                    <div class="fresh-stories-img-1">
                        
                    </div>
                <!--    <img src="https://www.chai-khana.org/system/places/thumbnail/786/thumbnail/11.jpg?1553104369" class="img-fluid flex-img" width="536" height="360"> -->
                    <div>
                        <h2>Azerbaijani Women Who Don’t Belong at “Home”</h2>
                        <br>
                        <span>Millennials</span>
                        <img src="img/play-button.png" class="playbtn text-right hand">
                        <p class="little grey-text">February / March 2018</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 story3-col-bg col-12 trans flex-grid-6 hoverable">
                <div class="animated slideInUp delay-1s ">
                    <div class="fresh-stories-img">
                        
                    </div>
                    <!-- <img src="https://www.chai-khana.org/system/places/thumbnail/786/thumbnail/11.jpg?1553104369" class="img-fluid flex-img " height="360"> -->
                    <div class="white-bg-story text-left">
                        <h2>Karabakh’s Frontline Artists</h2>
                        <br>
                        <span>Millennials</span>
                        <img src="img/play-button.png" class="playbtn text-right hand">
                        <p class="little grey-text">February / March 2018</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 story3-col-bg text-left col-12 trans flex-grid-3 hoverable">
                <div class="animated slideInUp delay-1s ">
                    <!-- <img src="https://www.chai-khana.org/system/places/thumbnail/782/thumbnail/cut-00-00-23-02-still002.png?1552141622" class="img-fluid flex-img" width="536" height="360"> -->
                    <div class="fresh-stories-img-3">
                        
                    </div>
                    <div>
                        <h2>A Few Acts</h2>
                        <br>
                        <span>Millennials</span>
                        <img src="img/play-button.png" class="playbtn text-right hand">
                        <p class="little grey-text">February / March 2018</p>
                    </div>
                </div>
            </div>
        </div>
    <div class="row "><!--  -->
            <div class="col-md-4 story3-col-bg text-left col-12 trans  animated slideInUp delay-1s hoverable flex-grid-4">
                <div class="">
                    <img src="https://www.chai-khana.org/system/places/thumbnail/784/thumbnail/unadjustednonraw-thumb-d07-2.jpg?1552496659" class="img-fluid flex-img" width="536" height="360">
                    <div>
                        <h2>A New Generation of Musicians is Changing Baku’s Music Scene</h2>
                        <br>
                        <span>Millennials</span>
                        <img src="img/play-button.png" class="playbtn text-right hand">
                        <p class="little grey-text">February / March 2018</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 story3-col-bg col-12 trans  hoverable flex-grid-4 flex-grid-4middle">
                <div class="animated slideInUp delay-1s ">
                    <img src="https://www.chai-khana.org/system/places/thumbnail/783/thumbnail/screenshot-2019-03-13-at-16-00-39.png?1552478344" class="img-fluid flex-img " height="360">
                    <div class="white-bg-story text-left">
                        <h2>From Orphans to Community Builders</h2>
                        <br>
                        <span>Millennials</span>
                        <img src="img/play-button.png" class="playbtn text-right hand">
                        <p class="little grey-text">February / March 2018</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 story3-col-bg text-left col-12 trans  hoverable flex-grid-4">
                <div class="animated slideInUp delay-1s ">
                    <img src="https://www.chai-khana.org/system/places/thumbnail/779/thumbnail/thumb-1.jpg?1551784994" class="img-fluid flex-img" width="536" height="360">
                    <div>
                        <h2>To Know the Unknown</h2>
                        <br>
                        <span>Millennials</span>
                        <img src="img/play-button.png" class="playbtn text-right hand">
                        <p class="little grey-text">February / March 2018</p>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12 text-center">
                <span class="hand explore-more font-24">EXPLORE MORE</span>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

    <div class="container-fluid story-4 text-center">
        <br>
        <div class="row padding-reset-1000">
            <div class="col-md-12 text-center">
                <h5 class="featured-videos grey-text text-30">
                    FEATURED VIDEOS
                </h5>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 featured-video-6 animated fadeIn delay-1s text-left col-sm-6 col-xs-6">
                <!-- <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div> -->
                <div>
                    <video loop id="video2" onmouseover="video2.play()" onmouseout="video2.pause()">
                        <source src="Featured Unknown.mp4" type="video/mp4" />
                    </video>
                    <img src="play.png" class="video-controls" onclick="playpause1(this)" />
                </div>
                <h2 class="text-30">To Know the Unknown.</h2>
                <span class="topics">Millennials</span>
                <span class="little grey-text">23 February, 2019</span>
            </div>
            <div class="col-md-6 featured-video-6 animated fadeIn delay-1s text-left col-sm-6 col-xs-6">
                <!--                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div> -->
                <div>
                    <video loop id="video3" onmouseover="video3.play()" onmouseout="video3.pause()">
                        <source src="Featured Videos - From Orphans to Community Builders.mp4" type="video/mp4" />
                    </video>
                    <img src="play.png" class="video-controls" onclick="playpause1(this)" />
                </div>
                <h2 class="text-30"> From Orphans to Community Builders</h2>
                <span class="topics">Millennials</span>
                <span class="little grey-text">2 January, 2019</span>
            </div>
        </div>
        <br>
        <br>
    </div>

    <div class="container-fluid story-5 text-left">
        <br>
        <div class="row">
            <div class="col-md-6 story-5-agency">
                <h1 class="font-80">Community  </h1>
                <h1 class="font-80">Agency</h1>
                <br>
                <a href="">
                    <button class="button btn">EXPLORE NOW →</button>
                </a>
                <p class="greenbo border-none text-22">Work with the people that make ChaiKhana reports possible in our community agency</p>
            </div>
            <div class="col-md-6 story-5-agency lightgrey-bg">
                <h1 class="font-80">Community  </h1>
                <h1 class="font-80">Shop</h1>
                <br>
                <a href="">
                    <button class="button btn">EXPLORE NOW →</button>
                </a>
                <p class="greenbo border-none text-22">Work with the people that make ChaiKhana reports possible in our community agency</p>
            </div>
        </div>
    </div>

    <div class="container-fluid story-6 text-center">
        <br>
        <br>
        <br>
        <!-- <img src="img"> -->
        <div class="row index-timeline">
            <div class="col-md-12">
                <h1 class="font-48"> EXPLORE EDITIONS</h1>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <p class="index-timeline-txt text-18">
                            Work with the people that make ChaiKhana reports possible in our community agency
                        </p>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </div>
        </div>
        <div class="row ">
            <div class="col-md-12 text-28">
                <p>
                    <a class="year onlyhand" onclick="years(this)" id="id18">2018</a>
                    <a class="onlyhand" onclick="years(this)" id="id17">2017</a>
                    <a class="onlyhand" onclick="years(this)" id="id16">2016</a>
                </p>
            </div>
        </div>
        <br>
        <div class="row editions-img responsive">
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <img src="img/MEMORY.png" class="hand" id="img1">
                <div class="edits text-left">
                    <h3>Journey</h3>
                    <p> January - March</p>

                    <p>2018</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <img src="img/Peacebuilders.png" class="hand" id="img2">
                <div class="edits text-left">
                    <h3>Religious Beliefs</h3>
                    <p>
                        April - June
                    </p>

                    <p>2018</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6 not-diplay">
                <img src="img/Religious-Beliefs.png" class="hand" id="img3">
                <div class="edits text-left">
                    <h3>Identify</h3>
                    <p>
                        July - September
                    </p>

                    <p>2018</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6  col-xs-6 col-6 not-diplay">
                <img src="img/Millenials.png" class="hand" id="img4">
                <div class="edits text-left">
                    <h3>Memory</h3>
                    <p>August - September</p>

                    <p>2018</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <img src="img/MEMORY.png" class="hand" id="img5">
                <div class="edits text-left">
                    <h3>Journey</h3>
                    <p> January - March</p>

                    <p>2018</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                <img src="img/MEMORY.png" class="hand" id="img6">
                <div class="edits text-left">
                    <h3>Journey</h3>
                    <p> January - March</p>

                    <p>2018</p>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
    <div class="container-fluid  text-center not-diplay">
        <br>
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-30">UPCOMING EVENTS</h5>
                <br>
            </div>
        </div>
        <br>
        <div class="row index-edition">
            <div class="col-md-4">
                <h1 class="font-54">Edition: Religious</h1>
                <br>
                <p class="dark-grey-text text-18">We are welcoming contributors to apply for the next edition in april 19</p>
                <br>
                <a href=""><button class="button btn gomore text-18">Go for more →</button></a>
                
            </div>
            <div class="col-md-4">
                <h1 class="font-54">Video Screening</h1>
                <br>
                <p class="dark-grey-text text-18">We are welcoming contributors to apply for the next edition in april 19</p>
                <br>
                <a href=""><button class="button btn gomore text-18">Go for more →</button></a>
                
            </div>
            <div class="col-md-4">
                <h1 class="font-54">Photo Exhibition</h1>
                <br>
                <p class="dark-grey-text text-18">We are welcoming contributors to apply for the next edition in april 19</p>
                <br>
                <button class="button btn gomore txet-18">Go for more →</button>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <div class="container-fluid story-8 text-center">
        <div class="row">
            <div class="animated fadeIn delay-1s col-md-6">
                <img src="img/story8.png">
            </div>
            <div class="animated fadeIn delay-1s col-md-6 lal">

                <h1 class="story-8-h">Our story</h1>
                <p class="story-8-p textcor text-22">Chai Khana is a multi award-winning regional media platform reaching women, rural communities, minority groups, and conflict-affected communities in the Caucasus. Lead by women, the issue-driven multimedia platform aims to give voice to the under-represented across the region, amplifying their voices through dynamic human-focused storytelling, while providing mentorship to young journalists.</p>
                <br>
                <br>
                <br>
                <a class="topb" href="#" id="myBtn" onclick="topFunction()">
                    <i class="fa fa-arrow-circle-up"></i>
                    TOP
                </a>

            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <!-- Footer -->
    <script>

        function searchdiv() {
                    if($("#ovrdiv")[0].style.display == "table") $("#ovrdiv")[0].style.display = "none";
                    else $("#ovrdiv")[0].style.display = "table";
                }
                $(document).ready(function() {
                    $(".collapse").on('show.bs.collapse', function() {
                        $(".collapse").collapse('hide');
                    });
                });

                $(document).click(function(e) {
            if (!$(e.target).is('.navbar-collapse')) {
                $('.collapse').collapse('hide');        
            }
        });

        var imgarr2018 = ["img/story-7-1.png", "img/story-7-2.png", "img/editions3.png", "img/editions4.png", "img/story-7-2.png", "img/editions3.png"];
        var imgarr2017 = ["img/story-7-2.png", "img/story-7-1.png", "img/editions4.png", "img/editions3.png", "img/story-7-2.png", "img/editions3.png"];
        var imgarr2016 = ["img/editions3.png", "img/story-7-2.png", "img/editions1.png", "img/editions4.png", "img/editions3.png", "img/editions3.png"];
        function years(obj) {
            switch(obj.id) {
                case "id18":
                    if($("#id17").hasClass("year")) $("#id17").removeClass("year");
                    if($("#id16").hasClass("year")) $("#id16").removeClass("year");
                    if(!$(obj).hasClass("year")) {
                        $(obj).addClass("year");
                        for(var i=1; i<=6; i++) {
                            $("#img" + i)[0].src = imgarr2018[i-1];
                            }
                        }
                break;
                case "id17":
                    if($("#id16").hasClass("year")) $("#id16").removeClass("year");
                    if($("#id18").hasClass("year")) $("#id18").removeClass("year");
                    if(!$(obj).hasClass("year")) {
                        $(obj).addClass("year");
                        for(var i=1; i<=6; i++) {
                            $("#img" + i)[0].src = imgarr2017[i-1];
                            }
                    }
                break;
                case "id16":
                    if($("#id17").hasClass("year")) $("#id17").removeClass("year");
                    if($("#id18").hasClass("year")) $("#id18").removeClass("year");
                    if(!$(obj).hasClass("year")) {
                        $(obj).addClass("year");
                        // $(obj).addClass("opacity-effect");
                        for(var i=1; i<=6; i++) {
                            $("#img" + i)[0].src = imgarr2016[i-1];

                            }
                    }
                break;
            }
            
        }


//      var videoPlayButton,
//  videoWrapper = document.getElementsByClassName('video-wrapper')[0],
//     video = document.getElementsByTagName('video')[0],
//     videoMethods = {
//         renderVideoPlayButton: function() {
//             if (videoWrapper.contains(video)) {
//              this.formatVideoPlayButton()
//                 video.classList.add('has-media-controls-hidden')
//                 videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0]
//                 videoPlayButton.addEventListener('click', this.hideVideoPlayButton)
//             }
//         },

//         formatVideoPlayButton: function() {
//             videoWrapper.insertAdjacentHTML('beforeend', '\
//                 <svg class="video-overlay-play-button" viewBox="0 0 200 200" alt="Play video">\
//                     <circle cx="100" cy="100" r="90" fill="none" stroke-width="15" stroke="#fff"/>\
//                     <polygon points="70, 55 70, 145 145, 100" fill="#fff"/>\
//                 </svg>\
//             ')
//         },

//         hideVideoPlayButton: function() {
//             video.play()
//             videoPlayButton.classList.add('is-hidden')
//             video.classList.remove('has-media-controls-hidden')
//             video.setAttribute('controls', 'controls')
//         }
//  }

// videoMethods.renderVideoPlayButton()


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$("video").prop('muted', true);



$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    

//video preview

/*
var figure = $(".index-main-video").hover( hoverVideo, hideVideo );

function hoverVideo(e) {
    $('video-wrapper', this).get(0).play();
}

function hideVideo(e) {
    $('video-wrapper', this).get(0).pause();
}*/

// function func(){
//  $('.paper').css('background'); 
//  this.style.background = '#205A2C';                                  
// }    
    </script>



@endsection