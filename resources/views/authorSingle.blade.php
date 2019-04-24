@extends('layouts.home')




@section('content')


@php $stories = $oneAuth->authorsStory; @endphp

<!-- Second Container -->
        <div class="container-fluid authors-page author-single">
            <div class="row text-left">

              <div class="col-md-8 mx-auto mt-5 mb-5">
                <div class="row">
                  
                    <div class="col-md-6 text-right">
                      <div class="single-author-info">
                        <img src="{{ $oneAuth->image['0'] }}" class="img-fluid ">
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="author-header single-author-name">
                                    <h1 class="font-80">{{ $oneAuth->TextTrans('name') }}</h1>
                                </div>
                            </div>
                            <div class="col-md-12 single-author-desc">
                                <p class="stories-main-text font-24">
                                  {!! $oneAuth->TextTrans('about') !!}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
              </div>

            </div>
        </div>
        <!-- Third Container (Grid) -->
<div class="container-fluid story-3 text-center single-theme  single-author-fluid">
    <div class="row author-stories-row">
        <div class="col-md-12 text-center mb-5">
            <h1 class="font-50 single-author-stories-head">My stories</h1>
        </div>
    </div>
   <div class="row "><!--  -->


      @foreach($stories as $story)
            <div class="col-md-4 story-full-one-block" {{ $stories->last()->id==$story->id ? 'id='.$story->id.'':'' }}>
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


@endsection