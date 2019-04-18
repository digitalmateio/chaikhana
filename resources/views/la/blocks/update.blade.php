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

<div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('create block') }}
            {{ Form::select('block_types', $block_types_array, null, array('class'=>'form-control block_types_fields', 'placeholder'=>'Please select ...')) }}
        </div>
        <div class="form-group">
            {{-- Form::label('Language') --}}
            {{-- Form::select('Language', $sitelangs, 'en', array('class'=>'form-control block_types_fields', 'placeholder'=>'Please select ...')) --}}
        </div>

    </div>
</div>


<div class="dd">
    <ol class="dd-list">
        <li class="dd-item" data-id="1">
            <div class="dd-handle">Item 1</div>
        </li>
        <li class="dd-item" data-id="2">
            <div class="dd-handle">Item 2</div>
        </li>
        <li class="dd-item" data-id="3">
            <div class="dd-handle">Item 3</div>
           
        </li>
    </ol>
</div>
            
                <!--            <div class="col-md-8 col-md-offset-2">-->

                {{-- dd($block_types) --}}

                @foreach($blocks as $block)

                @php 

                $translations = $block->translations ;

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

                <h3 class="bg-info" style="padding:10px">Section title : {{ $block->title_en }}
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
                <!--აქ ტრანსლეითებიც უნდა გავიტანო ცალკე ფელპერში რო იმიჯებიში არ გამოიტანოს ყველაზე სათითაონ ენის კოდი და არ დუბლირდეს-->
                

                {!! \App\Sections_types::ShowBlocks($translations,$block,$fields) !!}
          
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
<script src="http://chaikhana.io/la-assets/plugins/nestable/jquery.nestable.js"></script>

<script>

    $('.dd').nestable({ 
      maxDepth :0,
         group : 0
    });
//    $('.dd').nestable('serialize');
    $(function () {
        $("#story-edit-form").validate({

        });
    });

    $(document).ready(function($) {


        $('.block_types_fields').change(function(event) {

//            console.log(event.target.value);
            var storyid = '{{ $story->id }}';
            var url = '{{ route('admin.createbyid') }}';
            window.location.href = url+'/'+storyid+'/'+event.target.value;
          
        });






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