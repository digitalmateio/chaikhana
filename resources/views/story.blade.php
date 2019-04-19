
{{ $story->thumbnail }}
{{ $story->thumbnail_preview }}
{{ $story->cover }}


{!! $story->TextTrans('title') !!}
{!! $story->TextTrans('about') !!}
{!! $story->TextTrans('media_author') !!}
{{ $story->created_at }}
{{ $story->impressions_count }}
@php

    $edition = $story->edition;
    $tags = $story->tags;
    $authors = $story->authors;
    $blocks = $story->blocks;
    
    
    if(!empty($story->block_sort_oder))
    {
        $order = json_decode($story->block_sort_oder);
        $blocksSorted = $blocks->sortBy(function($model) use ($order){
            return array_search($model->getKey(), $order);
        });
        
    }else{
    
      $blocksSorted = $blocks;
    
    }

@endphp

         
            
            @foreach($blocksSorted as $block)
               
                @foreach($block_types as $blocktype)
                    @if( $blocktype->id == $block->asset_type_id  )   
                        @php                 
                            $fields = json_decode($blocktype->fields) 
                        @endphp
                    @endif
                @endforeach
                
                @php 
                    $translations = $block->translations ;
                @endphp
                
                 @switch( $block->asset_type_id )
                    @case(6)
                        აქ გამოიძახებ სექციას და გადასცემ ამ $translations 
                        
                            @include('blocks.slideshow', ['translations ' => $translations, 'block' => $block, 'fields' => $fields ])
                        
                        @break

                    @case(2)
                        Second case...
                        @break

                    @default
                        Default case...
                @endswitch
            @endforeach


{{ $edition->TextTrans('name')  }}


@foreach($tags as $tag)
    {{ $tag->TextTrans('title') }}
@endforeach


@foreach($authors as $author)
    {{ $author->TextTrans('name') }}
@endforeach

<a href="{{ $story->link }}">work with freelancer</button>
