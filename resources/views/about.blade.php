@extends('layouts.home')


@section('content')



<div class="container-fluid story-3 text-center single-theme about-chaikhana">    
  
  <div class="row ">
    <div class="col-md-12 text-center">
     <h1 class="about-chaikhana-h1">{{ $HeadAbout->TextTrans('title') }}</h1>
     <p>{{ $HeadAbout->TextTrans('description') }}</p>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <img src="{{ $HeadAbout->image[0] }}" class="chaikhana-cover">
    </div>
  </div>
  <br>
  <div class="row text-center">
    <div class="col-md-6">
      <h1 class="font-48">{{ $aboutMission->TextTrans('title') }}</h1>
      <p class="grey-color normal-text-size">{{ $aboutMission->TextTrans('description') }}</p>
    </div>
    <div class="col-md-6">
      <h1 class="font-48 vision">{{ $aboutVision->TextTrans('title') }}</h1>
      <p class="grey-color normal-text-size">{{ $aboutVision->TextTrans('description') }}</p>
    </div>
  </div>
  <br>
 <div class="row donnor-row">
  <div class="col-md-12">
      <h1 class="font-48">Donnors</h1>
  </div>

  @foreach($donnors as $logo)

    <div class="col-md-3 col-sm-3">
      <img src="{{ $logo->image[0] }}">
    </div>

  @endforeach

 </div>

 <div class="row contact">
   <div class="col-md-12">
     <h1 class=" contact-header font-48">
       contact
     </h1>
   </div>
   
   @foreach($contacts as $contact)


   <div class="col-md-4 text-left">
     <h1 class="font-48">{{ $contact->TextTrans('title') }}</h1>
     <p class="text-22">{{ $contact->TextTrans('info') }}</p>
   </div>

   @endforeach

</div>


   
   <div class="row text-left editorial-policy">
     <div class="col-md-12">
       <h1 class="font-48 policy-header">{{ $policy->TextTrans('title') }}</h1>
       <p class="text-22">{{ $policy->TextTrans('description') }}</p>
     </div>

     <div class="row vacanies-row">
        <hr>
        <div class="col-md-4 text-left vacancies-header">
        <h1>vacancies</h1>
       </div>
     <div class="col-md-8 selectbox-jobs-col">
       <div data-slick='{"slidesToShow": 4, "slidesToScroll": 4}' class="center selectbox-jobs text-center">
        @foreach($vacancies as $vacancie)
          <div>
            <h3>
              <a href="vacancie/{{ $vacancie->id }}">
                {{ $vacancie->TextTrans('title') }}
              </a>
            </h3>
        </div>
        @endforeach
      </div>
     </div>
     </div>
   
   </div>
   
</div>


<script type="text/javascript">
  $('.center').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 5,
  vertical:true,
  verticalSwiping:true,
  infinite:true,
  mobileFirst:true,
  slidesToScroll:3,

  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 5
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 5
      }
    }
  ]
});
</script>


@endsection