@extends('layouts.home')


@section('content')






{{-- {{ dd($OneEdition) }} --}}
{{-- {{ dd($Storys) }} --}}



    <!-- Third Container (Grid) -->
    <div class="container-fluid story-3 text-center single-theme single-theme-page">
      
        
        <div class="row">
            <div class="col-md-12">
                <img src="{{ $OneEdition->cover_image[0] }}">
            </div>
        </div>
       
        <div class="row text-left padding-bottom-30 mt-5">
            <div class="col-md-4 single-edition-title-info">
                <h1 class="article-header font-50">{{ $OneEdition->TextTrans('name') }}</h1>
                <p class="h-detail-text text-18">
                    {{ $OneEdition->TextTrans('edition') }}
                </p>
            </div>
            <div class="col-md-8 mb-5 single-edition-description">
                <p class="theme-single-text text-28">{{ $OneEdition->TextTrans('description') }}</p>
            </div>
        </div>
       
        <div class="row edition-story-list">

            <!--  -->
            @foreach($Storys as $story)

            <div class="col-md-4 story-full-one-block" {{ $Storys->last()->id==$story->id ? 'id='.$story->id.'':'' }}>
              <div class=" story3-col-bg text-left trans  animated slideInUp delay-1s hoverable">
                <div class="storyes-one-image">
                    <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/story/{{ $story->id }}">
                        <img src="{{ $story->thumbnail_preview['490x355'] }}" class="img-fluid flex-img preview">
                        <img src="{{ $story->thumbnail['490x355'] }}" class="img-fluid flex-img hover-preview">
                    </a>
                </div>
                <div class="one-story-info-block">
                  <h2>
                    <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/story/{{ $story->id }}">
                        {{ $story->TextTrans('title') }}
                    </a>
                  </h2>
                  <div class="one-story-info-block-sec-date">
                    <span class="">{{ $story->edition->TextTrans('name') }}</span>
                    <img src="{{ asset('assets/img/play-button.png') }}" class="playbtn text-right hand">
                    <p class="little grey-text">{{ date("j F, Y", strtotime($story->created_at)) }}</p>
                  </div>
                </div>
              </div>
            </div>

            @endforeach

            <div id="remove-row" class="col-md-12 mb-5">
                <button id="btn-more" data-id="{{ $Storys->last()->id }}" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                    <p class="loadmore-text">Load more</p>
                </button>
            </div>


        </div>
    </div>

    <!-- Footer -->

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



$(document).ready(function(){
   $(document).on('click','#btn-more',function(){
    $("#btn-more").html("<img src='http://demo.itsolutionstuff.com/plugin/loader.gif' style='width: 50px !important'> Loading....");
      $.ajax({
          url : '{{ URL::to('/').'/'.App::getLocale('locale').'/edition' }}',
          method : "POST",
          data : {
            id: $('.edition-story-list .col-md-4').last().attr('id'),
            uID: {{ $OneEdition->id }},
            _token : $('meta[name="csrf-token"]').attr('content')
          },
          dataType : "text",
          success : function (data)
          {
                console.log(data);
              if(data != '') 
              {
                  $('#remove-row').remove();
                  $('.edition-story-list').append(data);
              }
              else
              {
                  $('#btn-more').html("No Data");
              }
          }
      });
   });  
});



</script>



@endsection