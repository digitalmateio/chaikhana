@extends('layouts.home')




@section('content')






<div class="container-fluid story-3 text-center single-theme contributors-page">
            <div class="row uppercase contributor-header ">
                <div class="col-md-6 text-left" id="r">
                    <h1 class="font-58" >Contributors</h1>
                </div>
                <div class="col-md-6">
                	 <div class="card-body row no-gutters align-items-center contributor-search-row">
                                   
                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless contributor-search" id="search" type="search" >
                        </div>
                        <!--end of col-->
                        
                        <!--end of col-->
                         <div class="col-auto">
                            <i class="fa fa-search msearch contributor-search-icon" ></i>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row navimg contributor-row">


                @foreach($author as $auth)

                  <div class="col-md-4 authors-list-one" {{ $author->last()->id==$auth->id ? 'id='.$auth->id.'':'' }}>
                      <div class="row">
                          <div class="col-md-8 authors-list-img">
                              <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/author/{{ $auth->id }}">
                                   <!-- <img src="" class="hand contributor-img"> -->
                                   <div class="author-one-image" style="background: url('{{ $auth->image['275x190'] }}');">
                                     <!-- Author image -->
                                     <span class="author-one-image-gradient"><!-- --></span>
                                   </div>
                              </a>                        
                          </div>
                          <div class="col-md-4">
                              <div class="name-right ">
                                  <h1 class="contributor-font-50 one-author-name">
                                  	<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/author/{{ $auth->id }}">
                                      {{ $auth->TextTrans('name') }}
                                    </a>
                                  </h1>
                               </div>
                          </div>
                      </div>
                      <input type="hidden" value="{{ $auth->id }}" class="idForLastRequest">
                  </div>

                @endforeach

                <div id="remove-row" class="col-md-12">
                    <button id="btn-more" data-id="{{ $author->last()->id }}" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                        <p class="loadmore-text">Load more</p>
                    </button>
                </div>


            </div>
            <br>
            <br>
            <br>

        </div>
        <!-- Footer -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script type="text/javascript">

        $(document).ready(function(){
           $(document).on('click','#btn-more',function(){
            $("#btn-more").html("<img src='http://demo.itsolutionstuff.com/plugin/loader.gif' style='width: 50px !important'> Loading....");
              
              var LastID = $('.contributor-row .authors-list-one').last().attr('id');
              console.log(LastID);

              $.ajax({
                  url : '{{ URL::to('/').'/'.App::getLocale('locale').'/authors' }}',
                  method : "POST",
                  data : {
                    id: LastID,
                    _token : $('meta[name="csrf-token"]').attr('content')
                  },
                  dataType : "text",
                  success : function (data)
                  {

                      if(data != '') 
                      {
                          $('#remove-row').remove();
                          $('.contributor-row').append(data);
                      }
                      else
                      {
                          $('#btn-more').html("No Data");
                      }
                  }
              });
           });  
        });



$(document).ready(function(){
  $('#search').keyup(function(e){

      console.log($(this).val());

      $(".contributor-row").html('<div id="remove-row" class="col-md-12"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="width: 50px !important"> Loading....</div>');

      $.ajax({
          url : '{{ URL::to('/').'/'.App::getLocale('locale').'/searchauthors' }}',
          method : "POST",
          data : {
            search: $(this).val(),
            _token : $('meta[name="csrf-token"]').attr('content')
          },
          dataType : "text",
          success : function (data)
          {
              if(data != '') 
              {
                  $('#remove-row').remove();
                  $('.contributor-row .col-md-4').remove();
                  $('.contributor-row').append(data);
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