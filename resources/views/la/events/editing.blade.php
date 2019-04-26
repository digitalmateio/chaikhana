@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/events/blocks/'.$event->id) }}">Back</a> :
 <h3>Block Items</h3>
@endsection
{{-- @section("contentheader_description", $block->$view_col)
@section("contentheader_description", $event->$view_col)  --}}
@section("section", "Events")
@section("section_url", url(config('laraadmin.adminRoute') . '/events'))
@section("sub_section", "Edit")
{{--
@section("htmlheader_title", "Events Edit : ".$event->$view_col)
  --}}
@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .tabs {
        margin: 0;
        padding: 0;
        list-style: none;
        overflow: hidden;
        border-bottom: 1px solid #999;
    }

    .tabs li {
        float: left;
        border: 1px solid #999;
        border-bottom: none;
        background: #e0e0e0;
    }

    .tabs li a {
        display: block;
        padding: 10px 20px;
        font-size: 16px;
        color: #000;
        text-decoration: none;
    }

    .tabs li a:hover {
        background: #ccc;
    }

    .tabs li.active,
    .tabs li.active a:hover {
        font-weight: bold;
        background: #fff;
    }

    .tab_container {
        border: 1px solid #999;
        border-top: none;
        background: #fff;
    }

    .tab_content {
        padding: 20px;
        font-size: 16px;
    }
</style>

@if($block->asset_type_id == 6)                         
     <div class="box">
        <div class="box-header">
        Upload Slider block audio file
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">   
                    {!! Form::open(['route' => 'admin.eventeditblockAudio']) !!}
                    <div class="form-group">
                        {{ Form::hidden('event_id', $event->id ) }}
                        {{ Form::hidden('block_id', $block->id ) }}
                        {{ Form::hidden('event_id', $event->id) }}

                        {{ csrf_field() }}
                      

                        @la_showInput($block_module, 'audio',optional($block)->audio,null,null,['class' => 'form-control'])    

                    <br>
                    {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
              </div>
           </div>
        </div>
    </div>
  </div>
@endif
       <br>
                    <br>
                   
@if(count($translations) == 0)

    <div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
                     <div class="row">
            <div class="col-md-12">
                  
                    {!! Form::open(['route' => 'admin.eventeditblock']) !!}
                    <div class="form-group">
                        {{ Form::hidden('event_id', $event->id ) }}
                        {{ Form::hidden('block_id', $block->id ) }}

                        {{ csrf_field() }}
                        {{ Form::hidden('event_id', $event->id) }}

                        {{ Form::label('block_types') }}

                        {{ Form::select('block_type', $block_types_array, $block_type->id, array('class'=>'form-control block_types_fields','disabled' => 'disabled', 'placeholder'=>'Please select ...')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Language') }}
                        {{ Form::select('Language', $sitelangs, 'en', array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                    </div>
                    @foreach($translate_fields as $key => $field)

                        @php
                       
                            $value = '';

                            if($field == 'image' || $field == 'file' || $field == 'audio')
                            { 
                                $value = 0;                          
                            }
                        
                        @endphp
                        
                        @la_showInput($Translate_module, $field,$value,null,null,['class' => 'form-control'])    
                         
                    @endforeach
                    <br>
                    <br>
                    {!! Form::submit( 'Add', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                    <hr>
                      </div>
        </div>
                 </div>
</div>
               <br>
            
@endif
                    
                @foreach($translations as $translation)
                  
 <div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
                     <div class="row">
            <div class="col-md-12">
                 
                    {!! Form::open(['route' => 'admin.eventeditblock']) !!}
                    <div class="form-group">
                        {{ Form::hidden('event_id', $event->id ) }}
                        {{ Form::hidden('block_id', $block->id ) }}
                        {{ Form::hidden('translation_id', $translation->id) }}
                        {{ csrf_field() }}
                        {{ Form::hidden('event_id', $event->id) }}

                        {{ Form::label('block_types') }}

                        {{ Form::select('block_type', $block_types_array, $block_type->id, array('class'=>'form-control block_types_fields','disabled' => 'disabled', 'placeholder'=>'Please select ...')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Language') }}
                        {{ Form::select('Language', $sitelangs, $translation->locale, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                    </div>
                    @foreach($translate_fields as $key => $field)

                        @php
                        if($field == 'image' || $field == 'file' || $field == 'audio')
                        { 
                           
                            $upload = $translation->{$field};
                            $value = optional($upload)->id; 
                                                     
                        }else{
                             $value = $translation->{$field};
                        }
                        @endphp

                        @la_showInput($Translate_module, $field,$value,null,null,['class' => 'form-control'])    
                         
                    @endforeach
                    <br>
                    <br>
                    {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                    <br>
                    <br>
                    <a href="{{ route('admin.eventdeleteBlock',[$event->id,$block->id]) }}" onclick="return confirm('Are you sure t delete this block ?')" class="btn btn-danger text-right"  >Delete</a>
                     <hr>
             </div>
         </div>
     </div>
</div>
               <br>
                @endforeach
          
  
@endsection

@push('scripts')
<script>
    $(function () {
        $("#story-edit-form").validate({

        });
    });

    $(document).ready(function($) {

        //        $('.block_types_fields').change(function(event) {
        //
        //            var storyid = '{{ $event->id }}';
        //            var url = '{{ route('admin.createbyid') }}';
        //            window.location.href = url+'/'+storyid+'/'+event.target.value;
        //        });


        $('.tabs li a').click(function(event) {
            event.preventDefault();
        });


        $('.tab_content').hide();
        //  $('.tab_content:first').show();
        $('.tab_content:first-of-type').show();


        $('.tabs li:first').addClass('active');
        $('.tabs li').click(function(event) {
            $('.tabs li').removeClass('active');
            $(this).addClass('active');

            var id = $(this).attr('data-id');
            var blockId = $(this).attr('data-block');

            //      console.log('data-id : ',$(this).attr('data-id'));

            //    $('.tab_content').hide(); // hide all
            //    $('.tab_content:first-of-type').show(); // show only firsts
            $('.tab_content[data-block='+ blockId +'] ').hide(); // show only firsts
            $('.tab_content[data-id='+ id +'] ').show(); // show only firsts

            var selectTab = $(this).find('a').attr("href");

            //    $(selectTab).fadeIn();
        });
    });
</script>
@endpush