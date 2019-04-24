@extends('layouts.home')


@section('content')



        <div class="container-fluid story-3 text-center  topics-page">
            <div class="row stories-filter uppercase">

                <div class="col-md-6 text-left" id="r">
                    <h1 class="topic-header editions-header uppercase">Editions</h1>
                    <div class="card-header" id="heading-1-1">
                        <h5 class="mb-0">
                         <input type="image" class="collapsed" onclick="$('#year-parent').toggle()" src=" img/filter-results-button.png">
                        <a onclick="$('#year-parent').toggle()" class="text">
                         filter
                        </a>
                      </h5>
                    </div>
                </div>

                <div class="col-md-6 text-right destop-filter " id="filter2">
                    <div class="text-18">
                        <a class="text-18 uppercase">years  </a>
                        <div class="text-14">
                          <a href="#">2017</a> <a href="#">2018</a> <a href="#">2019</a>
                        </div>   
                    </div>      
                </div>

                <div class="col-sm-12 col-12 mobile-filter">
                    <div class="accordion" id="accordion2">
                        <!--ACCORDION ITEM TWO-->
                        <div class="card-body">
                            <div id="accordion-1">
                                <div class="card">
                                    <div id="year-parent" class="collapse show" data-parent="#accordion-1" aria-labelledby="heading-1-1" style="">
                                        <div class="card-body">
                                            <div id="accordion-1-1">
                                                <div class="card">
                                                    <div class="card-header" id="heading-1-1-2">
                                                        <h5 class="mb-0 uppercase">
                                                      <a onclick="tog('#years-by')">
                                                        years <img src="img/left-arrow (1).png" class="filter-arrow">
                                                      </a>
                                                    </h5>
                                                    </div>
                                                    <div id="years-by" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-2">
                                                        <div class="card-body text-14">
                                                            <a href="">2017</a>
                                                            <a href="">2018</a>
                                                           <a href="">2019</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function tog(e) {
                                                        $(e).toggle();
                                                        //setTimeout(function(){ $('#year-parent').eq(0).addClass('show'); }, 5);
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row navimg topic-row">



                @foreach($editionLs as $edition)


                  <div class="col-md-3">
                      <div class="relative edition-one-block">
                          <a href="{{ URL::to('/').'/'.App::getLocale('locale').'/edition/'.$edition->id }}" class="edition-list-image-bl">
                             <img src="{{ $edition->thumbnail_image[0] }}" class="hand">   
                          </a>
                          <div class="navimg-text text-left edition-text-block"> 
                              <a href="{{ URL::to('/').'/'.App::getLocale('locale').'/edition/'.$edition->id }}">
                                  <h2 class="navimg-header edition-name">
                                    {{ str_limit($edition->TextTrans('name'), 20) }}
                                  </h2>
                              </a>
                              <a href="{{ URL::to('/').'/'.App::getLocale('locale').'/edition/'.$edition->id }}">
                                  <span class="navimg-description grey-txt">
                                    {{ $edition->TextTrans('edition') }}
                                  </span>  
                              </a>
                          </div>
                      </div>
                  </div>

                @endforeach


            </div>
          
         

    </div>
 

<script type="text/javascript">
    if ($(window).width() < 767) {
        $('#r').addClass('col-md-12');
        $('#r').removeClass('col-md-6');
    } else {
        $('#r').addClass('col-md-6');
    }

    if ($(window).width() < 967 && $(window).width() > 767) {
        $('#r').addClass('col-md-3');
        $('#r').removeClass('col-md-6');
    } else {
        $('#r').addClass('col-md-6');
    }

    if ($(window).width() < 967 && $(window).width() > 767) {
        $('#filter1').addClass('col-md-5');
        $('#filter1').removeClass('col-md-3');
    } else {
        $('#filter1').addClass('col-md-3');
    }
    if ($(window).width() < 967 && $(window).width() > 767) {
        $('#filter2').addClass('col-md-4');
        $('#filter2').removeClass('col-md-3');
    } else {
        $('#filter2').addClass('col-md-3');
    }
</script>






@endsection