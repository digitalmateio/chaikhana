
        
@foreach($translations as $translate)
       @foreach($fields as $field)
          @php  
              // dump( $translate );
              // dump( $translate->{$field} );
              
          @endphp
          <hr>
           {!! $translate->{$field}  !!}
           
       @endforeach
@endforeach