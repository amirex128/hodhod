<form action="{{route("change.permission")}}" method="post">
    @csrf

    <div>
        <label for="user">User :</label>
        <input name="user" id="user" type="number">
    </div>
    <div>
        <label for="role">Role :</label>
        <input name="role" id="role" type="number">
    </div>
    <button>Send</button>
</form>