@foreach($categories as $sub_category)
    <option

    @if(isset($old))
        @if (!empty($old))
            @foreach ($old as $categories_old)
                {{$categories_old==$sub_category->id?"selected":""}}
            @endforeach
        @endif
    @endif

         @if(isset($product))
            @if(count($product->categories)>0)
                {{in_array($sub_category->id,(array) $product->categories->pluck("id")->toArray())?'selected':""}}
            @endif
         @endif


            value="{{$sub_category->id}}">{{str_repeat("---",$level)}}{{$sub_category->name}}</option>
    @if(count($sub_category->childrenRecursiveProduct)>0)
        @include("Products.partials.row",["categories"=>$sub_category->childrenRecursiveProduct,"old"=>$old,'product'=>isset($product)?$product:null,"level"=>$level+1])
    @endif
@endforeach