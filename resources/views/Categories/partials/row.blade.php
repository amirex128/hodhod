@foreach($categories as $sub_category)
    <option

{{--       --}}{{--  Product Validate--}}
{{--            @if (!empty(old('categories')))--}}
{{--                @foreach (old('categories') as $categories_old)--}}
{{--                    {{$categories_old==$category->id?"selected":""}}--}}
{{--                @endforeach--}}
{{--            @endif--}}

            {{--  categories--}}
            @if(isset($category))
            {{$category->parent_id==$sub_category->id?"selected":""}}
               @endif

{{--            --}}{{--  Article--}}
{{--            @if(isset($article->categories))--}}
{{--            {{in_array($item->id,(array) $article->categories->pluck("id"))?'selected':""}}--}}
{{--                    {{clock($article->categories->pluck("id"))}}--}}
{{--                    {{clock($item->id)}}--}}
{{--            @endif--}}

            value="{{$sub_category->id}}">{{str_repeat("---",$level)}}{{$sub_category->name}}</option>
    @if(count($sub_category->childrenRecursive)>0)
        @include("Categories.partials.row",["categories"=>$sub_category->childrenRecursive,'article'=>isset($article)?$article:null,"level"=>$level+1])
    @endif
@endforeach