
        
@foreach($translations as $translate)
       @foreach($fields as $field)
          @php  
              // dump( $translate );
              // dump( $translate->{$field} );
              
          @endphp
          <hr>
        {{-- @switch($field)
          
          @case('audio')
                    @php     
                        $upload = $translation->{$field};
                        $value = optional($upload)->url; 
                    @endphp
                    <audio src="{{ $value }}"></audio>
                      @break
             @case('image')
             
           {!! $translate->{$field}  !!}
            
             @case('caption')   {!! $translate->{$field}  !!}
               @break
             @case('caption_align')   {!! $translate->{$field}  !!}
               @break
               --}}
       @endforeach
@endforeach