@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/stories') }}">Block</a> :
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
    #sections-list {
        padding-left: 0px;
    }
    #sections-list li {
        cursor:pointer;
        list-style:none;
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


<!--            <div class="col-md-8 col-md-offset-2">-->

{{-- dd($block_types) --}}
<ul id="sections-list" class="sortable-list">
    @php 
    $i = 0;  
   
    if(!empty($event->block_sort_oder))
    {
        $order = json_decode($event->block_sort_oder);
        $blocksSorted = $blocks->sortBy(function($model) use ($order){
            return array_search($model->getKey(), $order);
        });
        
    }else{
    
      $blocksSorted = $blocks;
    
    }
    
    @endphp 
    @foreach($blocksSorted as $block)
    <li id="{{ $block->id }}" data-sort="{{ $i }}">
        @php $i++;
        
        $translations = $block->translations ;
        @endphp

        <h3 class="bg-success" style="padding:10px">
            <i class="fa fa-arrows-v"></i>
            Block title : {{ $block->title_en }}
            <span style="display:inline-block;float:right;">
            @foreach($block_types as $blocktype)
                @if( $blocktype->id == $block->asset_type_id  )
                  Block type : {{ $blocktype->type }} 
                    @php                 
                        $fields = json_decode($blocktype->fields) 
                    @endphp
                @endif
            @endforeach
            
              <a href="{{ route('admin.createEventTranslation',[$event->id,$block->id]) }}" class="btn btn-info text-right"  >Add New Translation</a>
              <a href="{{ route('eventeditblock',[$event->id,$block->id]) }}" class="btn btn-warning text-right"  >Edit</a>
              <a href="{{ route('admin.eventdeleteBlock',[$event->id,$block->id]) }}" onclick="return confirm('Are you sure t delete this block ?')" class="btn btn-danger text-right"  >Delete</a>
           </span>
          
        </h3>

      
        <!--აქ ტრანსლეითებიც უნდა გავიტანო ცალკე ფელპერში რო იმიჯებიში არ გამოიტანოს ყველაზე სათითაონ ენის კოდი და არ დუბლირდეს-->


        {!! \App\Sections_types::ShowBlocks($translations,$block,$fields) !!}
    </li>
    @endforeach
</ul>

</div>
</div>
</div>
</div>

@endsection

@push('scripts')
<!--<script src="http://chaikhana.io/la-assets/plugins/nestable/jquery.nestable.js"></script>-->
<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->

<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script>
    $('.sortable-list').sortable({
        connectWith: '.sortable-list',
        update: function(event, ui) {
        var changedList = this.id;
        var order = $(this).sortable('toArray');
        var id = ui.item.attr("id");
        var sortid = ui.item.attr("data-sort");

        $.ajaxSetup({
            url: "{{ route('admin.eventblocksort') }}",
            global: false,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            data : {
                sort : order, 
                _token: '{{ csrf_token() }}',
                event_id : {{ $event->id }}
        },
            success :  function(data){
                console.log(data);
            },
            error :  function(data){},
            beforeSend :  function(data){},
            complete :  function(data){
            }
        });

        }
    });


    $(document).ready(function($) {


        $('.block_types_fields').change(function(event) {

            //            console.log(event.target.value);
            var eventid = '{{ $event->id }}';
            var url = '{{ route('admin.eventblockcreatebyid') }}';
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