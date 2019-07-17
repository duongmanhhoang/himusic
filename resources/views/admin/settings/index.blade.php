@extends('admin.metronic.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="m-portlet m-portlet--tab">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                    <h3 class="m-portlet__head-text">
                                        Cài đặt Website
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.setting.update' , 1)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <div class="form-group m-form__group">
                                    <label for="logo">Logo <span class="text-danger">*</span> </label>
                                    <div style="margin: 30px 0">
                                        <img src="{{asset('uploads/logo')}}/{{$setting->logo}}"
                                             style="width: 100px;object-fit: cover" id="imageTarget">
                                    </div>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo">
                                        <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                    </div>
                                    @if($errors->has('logo'))
                                        <p class="text-danger">{{$errors->first('logo')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="email">Email </label>
                                    <input type="text" class="form-control m-input" id="email" name="email"
                                           placeholder="Nhập Email" value="{{old('email' , $setting->email)}}">
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>


                                <div class="form-group m-form__group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control m-input" id="address" name="address"
                                           placeholder="Nhập địa chỉ" value="{{old('address' , $setting->address)}}">
                                    @if($errors->has('address'))
                                        <p class="text-danger">{{$errors->first('address')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control m-input" id="phone" name="phone"
                                           placeholder="Nhập số điện thoại" value="{{old('phone' , $setting->phone)}}">
                                    @if($errors->has('phone'))
                                        <p class="text-danger">{{$errors->first('phone')}}</p>
                                    @endif
                                </div>


                                <div class="form-group m-form__group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control m-input" id="facebook" name="facebook"
                                           placeholder="Nhập đường dẫn facebook"
                                           value="{{old('facebook', $setting->facebook)}}">
                                    @if($errors->has('facebook'))
                                        <p class="text-danger">{{$errors->first('facebook')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control m-input" id="instagram" name="instagram"
                                           placeholder="Nhập đường dẫn instagram"
                                           value="{{old('instagram' , $setting->instagram)}}">
                                    @if($errors->has('instagram'))
                                        <p class="text-danger">{{$errors->first('instagram')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="instagram">Youtube</label>
                                    <input type="text" class="form-control m-input" id="youtube" name="youtube"
                                           placeholder="Nhập đường dẫn youtube"
                                           value="{{old('youtube' , $setting->youtube)}}">
                                    @if($errors->has('youtube'))
                                        <p class="text-danger">{{$errors->first('youtube')}}</p>
                                    @endif
                                </div>

                                <input type="hidden" value="{{$setting->logo}}" name="old_logo">

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                    <button type="reset" class="btn btn-secondary">Hủy</button>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        @if(session('update'))
        swal('Cập nhập thành công', '', 'success');

        @endif
        function getBase64(file, selector) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                $(selector).attr('src', reader.result);
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        }

        var img = document.querySelector('#logo');
        img.onchange = function () {
            var file = this.files[0];
            if (file == undefined) {
                $('#imageTarget').attr('src', "../../../../admin/images/default-image.jpg");
            } else {
                getBase64(file, '#imageTarget');
            }
        }
    </script>
@endsection
