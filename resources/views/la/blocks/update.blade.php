@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/blocks') }}">Block</a> :
@endsection
{{-- @section("contentheader_description", $block->$view_col) --}}
@section("section", "Blocks")
@section("section_url", url(config('laraadmin.adminRoute') . '/blocks'))
@section("sub_section", "Edit")

{{-- @section("htmlheader_title", "Blocks Edit : ".$block->$view_col) --}}

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



<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
<!--            <div class="col-md-8 col-md-offset-2">-->

                {{-- dd($block_types) --}}

                @foreach($blocks as $block)

                @php 

                $section_translations = $block->section_translation ;
                $translations = $block->translations ;

                //for section title
                $filtred =  $section_translations->where('locale', '==', 'en')->toArray() ;
                $filtred = array_shift( $filtred );

        /*
                switch($block->asset_type_id){
                    case 9: 
                  
                     foreach($block_types as $blocktype){
                     if( $blocktype->id == $block->asset_type_id  ){
                                                              
                            $fields = json_decode($blocktype->fields) ;
                     dd($blocktype );
                 }}
                    
                      dd($blocktype->fields);
                  
                    default:
                        continue;
                break;
                }
                */
   
                @endphp

                <h3 class="bg-info" style="padding:10px">Section title : {{ $filtred['title'] }}
                    <a href="{{ route('blockEditing',$block->id) }}" class="btn btn-danger text-right"  style="float: right">Edit</a>
                </h3>

                @foreach($block_types as $blocktype)
                     @if( $blocktype->id == $block->asset_type_id  )
                            <p>   {{ $blocktype->type }}   </p>
                        @php
                                               
                            $fields = json_decode($blocktype->fields) 
                        @endphp
                    @endif
                @endforeach

                <ul class="tabs" >
                    @foreach($translations as $translate)
                    <li data-id="{{ $translate->id  }}" data-block="{{ $block->id }}"><a href="#{{ $translate->id }}">{{ $translate->locale }}</a></li>
                    @endforeach
                </ul>


                <div class="tab_container" >
                    @foreach($translations as $translate)
                    <div id="{{ $translate->id }}" class="tab_content" data-block="{{ $block->id }}" data-id="{{ $translate->id  }}">
                       
                        @switch($block->asset_type_id )
                            @case(13)
                              {!! \App\Sections_types::showYoutubeEmbed($translate->code,$translate) !!}
                        @break
                            @case(3)
                              {!! \App\Sections_types::showTextSection($translate,$fields) !!}
                        @break 
                             @case(9)
                              {!! \App\Sections_types::showInfographicsSection($translate,$fields) !!}
                        @break
                             @case(12)
                              {!! \App\Sections_types::showEmbedMediaSection($translate,$fields) !!}
                        @break
                            @default
                     
                        @endswitch

                    </div>

                    @endforeach	
                </div>
                @endforeach

                <!--
{!! Form::model($story, ['route' => [config('laraadmin.adminRoute') . '.stories.update', $story->id ], 'method'=>'PUT', 'id' => 'story-edit-form']) !!}
{{--  @la_form($module) --}}

{{--
@la_input($module, 'user_id')
@la_input($module, 'latitude')
@la_input($module, 'longitude')
@la_input($module, 'impressions_count')
@la_input($module, 'staff_pick')
@la_input($module, 'publish_home_page')
--}}
<br>
<div class="form-group">
{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/stories') }}">Cancel</a></button>
</div>
{!! Form::close() !!}
-->
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function () {
        $("#story-edit-form").validate({

        });
    });

    $(document).ready(function($) {

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