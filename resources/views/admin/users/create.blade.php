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
                                        Thêm người dùng
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('admin.users.store')}}">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <div class="form-group m-form__group">
                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control m-input" id="email" name="email"
                                           placeholder="Nhập email" value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
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

                                {{--<div class="form-group m-form__group">--}}
                                    {{--<label for="role_id">Quyền <span class="text-danger">*</span></label>--}}
                                    {{--<select class="form-control m-input" name="role_id" id="role_id">--}}
                                        {{--<option value="1">Admin</option>--}}
                                        {{--<option value="100">Người dùng</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}

                                <div class="form-group m-form__group">
                                    <label for="name">Họ và tên</label>
                                    <input type="text" class="form-control m-input" id="name" name="name"
                                           placeholder="Nhập họ và tên" value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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