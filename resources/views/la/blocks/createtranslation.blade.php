@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/blocks/'.$story->id) }}">Back to story blocks</a> :
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>

            {!! Form::open(['route' => 'admin.addblock']) !!}

            <div class="modal-body">

                <div class="form-group">

                    {{ Form::label('block_types') }}

                    {{ Form::select('block_types', $block_types_array, null, array('class'=>'form-control block_types_fields', 'placeholder'=>'Please select ...')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Language') }}
                    {{ Form::select('Language', $sitelangs, 'en', array('class'=>'form-control block_types_fields', 'placeholder'=>'Please select ...')) }}
                </div>

                <div class="input-container">
                    {{--  @foreach($translate_fields as $key => $translate_field)
                    @foreach($translate_field as $field)
                    @la_showInput($Translate_module, $filed,null,null,null,['fieldtype' => $key])                    
                    @endforeach
                    @endforeach
                    --}}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

{{--
@if($block_type->id == 6)                         
     <div class="box">
        <div class="box-header">
        Upload Slider block audio file
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">   
                    {!! Form::open(['route' => 'admin.AddblockAudio']) !!}
                    <div class="form-group">
                        {{ Form::hidden('block_type', 6 ) }}

                        {{ csrf_field() }}
                        {{ Form::hidden('story_id', $story->id) }}

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
--}}
<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'admin.addblock']) !!}
                <div class="form-group">
                    
                    {{ csrf_field() }}
                    {{ Form::hidden('story_id', $story->id) }}
                    
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
    $(function () {
        $("#story-edit-form").validate({

        });
    });

    $(document).ready(function($) {

        $('.block_types_fields').change(function(event) {

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