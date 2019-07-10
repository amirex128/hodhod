@if (session('status'))
    <div class="row">
    <div class="col-12">
<div class="container rtl">
    <div class=" text-right alert alert-{{session('type')??'success'}} alert-dismissible fade show" role="alert">
            {{ session('status') }}
        <button type="button" class="close text-left" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
    </div>
</div>
@endif
