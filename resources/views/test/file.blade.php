<form action="/test/store" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button>send</button>
</form>