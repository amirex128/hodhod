@if ($errors->any())
    <div class="alert alert-danger rtl text-right"     >
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
