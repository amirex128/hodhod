<option
        @if(isset($items))
                @if(is_array($items))


{{in_array($value,$items)?'selected':""}}

                 @else

{{$value==$items?'selected':""}}

                 @endif
         @endif


    value="{{$value}}">

    {{$title}}


</option>
