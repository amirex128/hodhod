<form action="{{route("test.store")}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="media">
    <button>send</button>
</form>