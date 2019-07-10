@if($trashed==true)
    <form id="drop-down-form-{{$model->id}}" action="{{ route("$name.force.destroy") }}" method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="model" value="{{$model->id}}">

        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-notification-ok-{{$model->id}}">
            حذف
        </button>

    </form>
    <form method="post" id="restore" action="{{route("$name.restore")}}">
        @csrf
        <input type="hidden" name="model" value="{{$model->id}}">

        <button type="button" class="dropdown-item" onclick="this.parentElement.submit()">
            بازیابی
        </button>
    </form>

@else
    <form id="drop-down-form-{{$model->id}}" action="{{ route("$name.destroy", $model) }}" method="post">
        @csrf
        @method('delete')

        <a class="dropdown-item" href="{{ route("$name.edit", $model) }}">ویرایش</a>

        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-notification-ok-{{$model->id}}">
            حذف
        </button>

    </form>

@endif
