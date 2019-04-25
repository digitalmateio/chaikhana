@extends('layouts.home')


@section('content')


@php

// dd($tags->image);

@endphp

    <div class="container-fluid story-3 text-center single-theme storynam-page">
       <div class="row stories-filter uppercase">

            <div class="col-md-4 text-left">
                <h1 class="stories-header font-58">{{ $tags->TextTrans('title') }}</h1>
            </div>

            <div class="col-md-8">

                <div class="row sort-by-filter justify-content-end">
                    <div class="col-auto mr-3">
                        <h3 class="sort-by-head mb-2 mt-3">SORT BY</h3>
                        <ul class="list-inline story-sort">
                          <li class="list-inline-item">
                            <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/story/sort/resent">
                                resent
                            </a>
                          </li>                          
                          <li class="list-inline-item">
                            <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/story/sort/views">
                                viewvs
                            </a>
                          </li>                          
                          <li class="list-inline-item">
                            <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/story/sort/likes">
                                likes
                            </a>
                          </li>

                        </ul>
                    </div>                    
                    <div class="col-auto">
                        <h3 class="story-type-head mb-2 mt-3">TYPES</h3>
                        <ul class="list-inline story-types">
                            @foreach($types as $type)
                                <li class="list-inline-item">
                                    <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/story/type/{{ $type->id }}">
                                        {{ $type->TextTrans('name') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-inline float-right story-edition-tags-filter">
                                <li class="list-inline-item">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#editions" aria-expanded="false" aria-controls="editions">
                                        editions <i class="fas fa-chevron-down"></i>
                                    </button>
                                </li>                        
                                <li class="list-inline-item">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tags" aria-expanded="false" aria-controls="tags">
                                        tags <i class="fas fa-chevron-down"></i>
                                    </button>
                                </li>
                            </ul>                       
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="collapse multi-collapse" id="editions">
                              <div class="card card-body float-right">

                                <ul class="list-inline story-edition-filter">
                                    @foreach($editions as $edition)
                                        <li class="list-inline-item">
                                            <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/edition/{{ $edition->id }}">
                                                {{ $edition->TextTrans('name') }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                              
                              </div>
                            </div>

                            <div class="collapse multi-collapse" id="tags">
                              <div class="card card-body float-right">
                                <ul class="list-inline story-tags-filter">
                                    @foreach($tagsAll as $tag)
                                        <li class="list-inline-item">
                                            <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/tag/{{ $tag->id }}">
                                                {{ $tag->TextTrans('title') }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                              </div>
                            </div>
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
        <div class="row mb-5">
                
                @foreach($storys as $story)

                    <div class="col-md-4 story-full-one-block" {{ $storys->last()->id==$story->id ? 'id='.$story->id.'':'' }}>
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