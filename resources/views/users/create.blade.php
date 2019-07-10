@extends('layouts.app', ['title' => 'مدیریت کاربران'])

@section('content')
	@include('users.partials.header', ['title' => 'افزودن کاربر'])

	<div class="container-fluid mt--7">
		<div class="row">
			<div class="col-xl-12 order-xl-1">
				<div class="card bg-secondary shadow">
					<div class="card-header bg-white border-0">
						<div class="row align-items-center">
							<div class="col-8">
								<h3 class="mb-0">مدیریت کاربران</h3>
							</div>
							<div class="col-4 text-right">
								<a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">بازگشت</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="post" autocomplete="off" action="{{ route('user.store') }}">
							@csrf

							<h6 class="heading-small text-muted mb-4">اطلاعات کاربر</h6>
							<div class="pl-lg-4 rtl text-right">
								@input(['name'=>'name','title'=>'نام'])
								@input(['name'=>'lname','title'=>'نام خانوادگی'])
								@input(['name'=>'phone','title'=>'شماره تلفن','type'=>'number'])
								@select(['name'=>'status','title'=>'وضعیت'])
								<option value="1">فعال</option>
								<option value="0">غیر فعال</option>
								@endselect
								@select(['name'=>'level','title'=>'مسئولیت'])
								<option value="1">مدیر</option>
								<option value="2">کاربر مدیریتی</option>
								<option value="3">مشتری</option>
								@endselect
								@input(['name'=>'address','title'=>'آدرس'])
								@input(['name'=>'email','title'=>'ایمیل','type'=>'email'])
								@input(['name'=>'password','title'=>'پسورد','type'=>'password'])
								<input type="hidden" name="status" value="1">
									<button class="btn btn-danger btn-block"> ذخیره</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		@include('layouts.footers.auth')
	</div>
@endsection
