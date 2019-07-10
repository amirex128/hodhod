
@foreach($category as $sub_category)

    <tr>
        <td>{{str_repeat("---",$level)}}{{ $sub_category->name }}</td>
        <td>
            <div class="badge badge-default"> {{!$sub_category->parent_id==null? \App\model\Category::find($sub_category->parent_id)->name:"بدون پدر"}}</div>

        </td>
        <td>
            <div class="badge badge-info">
                @if((int)$sub_category->type==1)
                    محصولات
                @elseif((int)$sub_category->type==2)
                    مقالات
                @endif
            </div>
        </td>

        <td>
            {{ date_fa($sub_category->created_at )}}
        </td>

        <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                    @include("Components.recycle_form",["trashed"=>$trashed,"name"=>"category","model"=>$sub_category])

                </div>
            </div>
            @include("Components.modal-delete", ["user" => auth()->user(), "name" => $sub_category->name, "what" => "دسته بندی", "trashed" => $trashed, "model"=>$sub_category])
        </td>

    </tr>


    @if(count($sub_category->childrenRecursive)>0)

        @include("Categories.partials.list",["category"=>$sub_category->childrenRecursive,"level"=>$level+1])

    @endif

@endforeach