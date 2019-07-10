<div class="col-2 text-right">
    @if($trashed==false)
        <a href="{{ route("$name.index",["softDelete"=>"yes"]) }}" class="btn btn-sm btn-warning">زباله دان</a>

    @elseif($trashed==true)
        <a href="{{ route("$name.index",["softDelete"=>"no"]) }}" class="btn btn-sm btn-info">همه</a>

    @endif
</div>