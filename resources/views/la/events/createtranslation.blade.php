@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/events/blocks/'.$event->id) }}">Back to event blocks</a> :
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


@if($block_type->id == 6)                         
     <div class="box">
        <div class="box-header">
        Upload Slider block audio file
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">   
                    {!! Form::open(['route' => 'admin.eventAddblockAudio']) !!}
                    <div class="form-group">
                        {{ Form::hidden('block_type', 6 ) }}
                        {{-- Form::hidden('block_id', $block->id ) --}}

                        {{ csrf_field() }}
                        {{ Form::hidden('event_id', $event->id) }}

                        @la_showInput($block_module, 'audio',0,null,null,['class' => 'form-control'])    

                    <br>
                    {!! Form::submit( 'Add audio', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
              </div>
           </div>
        </div>
    </div>
  </div>
@endif

<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'admin.eventaddblock']) !!}
                <div class="form-group">
                    
                    {{ csrf_field() }}
                    {{ Form::hidden('event_id', $event->id) }}
                    
                    {{ Form::label('block_types') }}
                    
                    {{ Form::select('block_type', $block_types_array, $block_type->id, array('class'=>'form-control block_types_fields', 'placeholder'=>'Please select ...')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Language') }}
                    {{ Form::select('Language', $sitelangs, 'en', array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                </div>
                @foreach($translate_fields as $key => $field)
                   @la_showInput($Translate_module, $field,null,null,null,['class' => 'form-control'])     
                @endforeach
                <br>
                <br>
                {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
//    $(function () {
//        $("#event-edit-form").validate({
//
//        });
//    });

    $(document).ready(function($) {

        $('.block_types_fields').change(function(event) {

            var eventid = '{{ $event->id }}';
            var url = '{{ route('admin.createbyid') }}';
            window.location.href = url+'/'+eventid+'/'+event.target.value;
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