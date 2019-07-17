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
                                        Sửa mật khẩu
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.users.updatePassword' , $user->id)}}">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <div class="form-group m-form__group">
                                    <label for="old_password">Mật khẩu cũ <span class="text-danger">*</span> </label>
                                    <input type="password" class="form-control m-input" id="old_password"
                                           name="old_password"
                                           placeholder="Nhập mật khẩu cũ" value="{{old('old_password')}}">
                                    @if($errors->has('old_password'))
                                        <p class="text-danger">{{$errors->first('old_password')}}</p>
                                    @endif

                                    @if(session('wrong-old'))
                                        <p class="text-danger">Mật khẩu cũ không đúng</p>
                                    @endif
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="password">Mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control m-input" id="password" name="password"
                                           placeholder="Nhập mật khẩu">
                                    @if($errors->has('password'))
                                        <p class="text-danger">{{$errors->first('password')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="password_confirm">Nhập lại mật khẩu <span
                                                class="text-danger">*</span></label>
                                    <input type="password" class="form-control m-input" id="password_confirm"
                                           name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                    @if($errors->has('password_confirmation'))
                                        <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                                    @endif
                                </div>

                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
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
        @if(session('success'))
            swal('Thay đổi mật khẩu thành công' , '' , 'success');
        @endif
    </script>
@endsection