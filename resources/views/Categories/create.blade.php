@extends('layouts.app', ['title' => __('User Management')])

@section('content')
	@include('users.partials.header', ['title' => 'افزودن دسته بندی'])

	<div class="container-fluid mt--7">
		<div class="row">
			<div class="col-xl-12 order-xl-1">
				<div class="card bg-secondary shadow">
					<div class="card-header bg-white border-0">
						<div class="row align-items-center">
							<div class="col-8">
								<h3 class="mb-0">مدیریت دسته بندی ها</h3>
							</div>
							<div class="col-4 text-right">
								<a href="{{ route('category.index') }}"
								   class="btn btn-sm btn-primary">بازگشت</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="{{ route('category.store') }}" autocomplete="off"
							  enctype="multipart/form-data">
							@csrf

							<h6 class="heading-small text-muted mb-4">اطلاعات دسته بندی</h6>
							<div class="row pl-lg-4 rtl">


								<div class="col-sm-12">
									<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
										<p class="form-control-label text-right">عنوان دسته بندی :</p>
										<input type="text" name="name" id="input-name"
											   class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
											   placeholder="عنوان دسته بندی را وارد نمایید..."
											   value="{{ old('name') }}" required autofocus>

										@if ($errors->has('name'))
											<span class="invalid-feedback" role="alert"> </span>
										@endif
									</div>
								</div>
                                <div class="col-sm-12">
                                    <div class="text-right rtl form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                        <p class="form-control-label text-right">نوع دسته بندی :</p>
                                        <select class="form-control" name="type" id="">
                                            <option value="1">محصولات</option>
                                            <option value="2">مقالات</option>
                                        </select>

                                        @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert"> </span>
                                        @endif
                                    </div>
                                </div>

								<div class="col-sm-12">
									<div class="rtl text-right form-group{{ $errors->has('category_parent') ? ' has-danger' : '' }}">
										<p class="form-control-label text-right">دسته بندی پدر :</p>

										<select class="demo form-control" name="parent_id" id="">
											<option value="null">بدون پدر</option>

											@foreach($categories as $category)
												<option value="{{$category->id}}">{{$category->name}}</option>
												@if(count($category->childrenRecursive)>0)
													@include("Categories.partials.row",["categories"=>$category->childrenRecursive,"level"=>1])
												@endif
											@endforeach

										</select>

										@if ($errors->has('category_parent'))
											<span class="invalid-feedback" role="alert"> </span>
										@endif

									</div>
								</div>


								<div class="col-sm-6 mb-4 mt-4">

									<div class="form-group{{ $errors->has('icon') ? ' has-danger' : '' }}">
										<p class="form-control-label text-right">آیکون دسته بندی </p>
										<input type="file"
											   name="icon"
											   data-min-width="100"
											   data-max-width="700"

											   data-min-height="100"
											   data-max-height="600"
											   class="dropify-icon"
										>

										@if ($errors->has('icon'))
											<span class="invalid-feedback" role="alert">
                                                     </span>
										@endif
									</div>


								</div>

								<div class="col-sm-6 mb-4 mt-4">

									<div class="form-group{{ $errors->has('icon') ? ' has-danger' : '' }}">
										<p class="form-control-label text-right">تصویر دسته بندی </p>
										<input type="file"
											   name="image"
											   data-max-file-size="1M"
											   data-min-width="120"
											   data-max-width="550"
											   data-min-height="120"
											   data-max-height="550"
											   data-allowed-formats="square"
											   data-allowed-file-extensions="png jpg jpeg"
											   class="dropify-icon"
										>

										@if ($errors->has('icon'))
											<span class="invalid-feedback" role="alert">
                                                     </span>
										@endif
									</div>


								</div>

								<div class="col-sm-12">
									<button type="submit" class="btn btn-block btn-outline-info">ذخیره</button>

								</div>


							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		@include('layouts.footers.auth')
	</div>
@endsection


@section('style')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

	<script>
		$(document).ready(function () {

			//////////////////////////////////////////selector/////////////////////////////////////////////////////////
			{{--<div class="col-sm-12">--}}
			{{--<div class="col mt-3">--}}
			{{--<p class=" form-control-label text-right" >دسته بندی پدر خود را مشخص--}}
			{{--نمایید</p>--}}
			{{--<div class="form-group">--}}
			{{--<select class="category-selector w-100 " style="" multiple="multiple">--}}
			{{--<optgroup label="Languages">--}}
			{{--<option value="cp">C++</option>--}}
			{{--<option value="cs">C#</option>--}}
			{{--<option value="oc">Object C</option>--}}
			{{--<option value="c">C</option>--}}
			{{--</optgroup>--}}
			{{--<optgroup label="Scripts">--}}
			{{--<option value="js">JavaScript</option>--}}
			{{--<option value="php">PHP</option>--}}
			{{--<option value="asp">ASP</option>--}}
			{{--<option value="jsp">JSP</option>--}}
			{{--</optgroup>--}}
			{{--<optgroup label="Scripts">--}}
			{{--<option value="js">JavaScript</option>--}}
			{{--<option value="php">PHP</option>--}}
			{{--<option value="asp">ASP</option>--}}
			{{--<option value="jsp">JSP</option>--}}
			{{--</optgroup>--}}
			{{--<optgroup label="Scripts">--}}
			{{--<option value="js">JavaScript</option>--}}
			{{--<option value="php">PHP</option>--}}
			{{--<option value="asp">ASP</option>--}}
			{{--<option value="jsp">JSP</option>--}}
			{{--</optgroup>--}}
			{{--<optgroup label="Scripts">--}}
			{{--<option value="js">JavaScript</option>--}}
			{{--<option value="php">PHP</option>--}}
			{{--<option value="asp">ASP</option>--}}
			{{--<option value="jsp">JSP</option>--}}
			{{--</optgroup>--}}
			{{--<optgroup label="Scripts">--}}
			{{--<option value="js">JavaScript</option>--}}
			{{--<option value="php">PHP</option>--}}
			{{--<option value="asp">ASP</option>--}}
			{{--<option value="jsp">JSP</option>--}}
			{{--</optgroup>--}}
			{{--<optgroup label="Scripts">--}}
			{{--<option value="js">JavaScript</option>--}}
			{{--<option value="php">PHP</option>--}}
			{{--<option value="asp">ASP</opti  on>--}}
			{{--<option value="jsp">JSP</option>--}}
			{{--</optgroup>--}}
			{{--</select></div>--}}
			{{----}}
			{{--</div>--}}
			{{----}}
			{{----}}
			{{--</div>--}}

			// $('.category-selector').fSelect({
			// 	placeholder: 'Select some options',
			// 	numDisplayed: 3,
			// 	overflowText: '{n} selected',
			// 	noResultsText: 'No results found',
			// 	searchText: 'Search',
			// 	showSearch: true
			// });
			//////////////////////////////////////////image/////////////////////////////////////////////////////////

			$('.dropify-icon').dropify({
				messages: {
					'default': 'تصاویر خود را اینجا بکشید',
					'replace': 'برای تغییر عکس فعلی تصویر جدید را اینجا بکشید',
					'remove': 'حذف کردن',
					'error': 'مشکل در ارسال تصویر.',
				},
				error: {
					'fileSize': 'حجم تصویر بسیار بزرگ است',
					'minWidth': 'عرض تصویر خیلی کوچک است حداقل سایز باید 100 پیکسل باشد',
					'maxWidth': 'عرض تصویر خیلی بزرگ است حداکثر سایز باید 700 پیکسل باشد',
					'minHeight': 'ارتفاع تصویر خیلی کوچک است حداقل سایز باید 100 پیکسل باشد',
					'maxHeight': 'ارتفاع تصویر خیلی بزرگ است حداکثر سایز باید 700 پیکسل باشد',
					'imageFormat': 'فرمت تصاویر غیر استاندارد میاشد باید از فرمت های png jpg'
				},
				tpl: {
					wrap: '<div class="dropify-wrapper p-2" style="font-family: IRANSans"></div>',
					loader: '<div class="dropify-loader" style="font-family: IRANSans"></div>',
					message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-family: IRANSans">تصاویر خود را اینجا بکشید</p></div>',
					preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p style="font-family: IRANSans" class="dropify-infos-message">جایگذین کردن</p></div></div></div>',
					filename: '<p class="dropify-filename"  style="font-family: IRANSans"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
					clearButton: '<button type="button" class="dropify-clear" style="font-family: IRANSans">حذف</button>',
					errorLine: '<p class="dropify-error" style="font-family: IRANSans">خطا</p>',
					errorsContainer: '<div class="dropify-errors-container" style="font-family: IRANSans"><ul></ul></div>'
				}
			});

		})
	</script>



	{{--<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>--}}
	{{--<script>--}}
	{{----}}
	{{--ClassicEditor--}}
	{{--.create(document.querySelector('#editor'))--}}
	{{--.catch(error => {--}}
	{{--console.error(error);--}}
	{{--});--}}


	{{--</script>--}}



@endsection
