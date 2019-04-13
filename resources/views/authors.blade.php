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
                            <input class="form-control form-control-lg form-control-borderless contributor-search" type="search" >
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

                  <div class="col-md-4">
                      <div class="row">
                          <div class="col-md-10">
                              <a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/author/{{ $auth->id }}">
                                   <img src="{{ asset('assets/img/Chinara Majidova.jpg') }}" class="hand contributor-img"> 
                              </a>                        
                          </div>
                          <div class="col-md-2">
                              <div class="name-right ">
                                  <h1 class="contributor-font-50" >
                                  	<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/author/{{ $auth->id }}">
                                      {{ $auth->TextTrans('name') }}
                                    </a>
                                  </h1>
                               </div>
                          </div>
                      </div>
                  </div>

                @endforeach

                <div id="remove-row" class="col-md-12">
                  <p class="mt-5 mb-5" id="btn-more">
                    <img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="width: 50px !important">
                    Loading More post
                  </p>
                </div>


            </div>
            <br>
            <br>
            <br>

        </div>
        <!-- Footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">

  var id = 14;
  $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() >= $(document).height() - 720) {
          id++;
          loadMoreData(id);
      }
  });

  function loadMoreData(id){

    $("#btn-more").html("<img src='http://demo.itsolutionstuff.com/plugin/loader.gif' style='width: 50px !important'> Loading....");

      $.ajax({
          url : '{{ URL::to('/').'/'.App::getLocale('locale').'/authors' }}',
          method : "POST",
          data : {
            id: id,
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
  }








</script>







@endsection