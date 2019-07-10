<div class="modal fade" id="modal-notification-ok-{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">{{$user->name." ".$user->lname}} عزیز</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">از حذف {{$what}} &quot;{{ $name }}&quot; مطمئن هستید؟</h4>
                    @if($trashed==true)
                        <p>.این {{$what}} به طور کامل حذف خواهد شد و قابل بازیابی نیست</p>
                    @else
                        <p>.بعدا می توانید در بخش زباله دان این {{$what}} را بازیابی کنید</p>
                    @endif
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" onclick="document.getElementById('drop-down-form-{{$model->id}}').submit()">!حذفش کن</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">بستن</button>
            </div>

        </div>
    </div>
</div>