@foreach($categories as $sub_category)
    <option


                        @if(isset($article->categories))
                        {{in_array($item->id,(array) $article->categories->pluck("id")->toArray())?'selected':""}}
                        @endif

            value="{{$sub_category->id}}">{{str_repeat("---",$level)}}{{$sub_category->name}}</option>
    @if(count($sub_category->childrenRecursiveArticle)>0)
        @include("Articles.partials.row",["categories"=>$sub_category->childrenRecursiveArticle,'article'=>$article,"level"=>$level+1])
    @endif
@endforeach