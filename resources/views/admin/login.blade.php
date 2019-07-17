@extends('admin.metronic.layout.auth')
@section('content')
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3"
             id="m_login" style="background-image: url({{asset('admin/metronic/app/media/img/bg/bg-2.jpg')}});">
            <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                <div class="m-login__container">
                    <div class="m-login__logo">
                        <a href="#">
                            <img src="{{asset('admin/metronic/app/media/img//logos/logo-1.png')}}">
                        </a>
                    </div>
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Login To Admin</h3>
                        </div>
                        <form class="m-login__form m-form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="Email" name="email">
                                @if($errors->has('email'))
                                    <b class="text-danger">{{$errors->first('email')}}</b>
                                @endif
                                @if(session('wrong-email'))
                                    <b class="text-danger">Email bạn nhập không tồn tại</b>
                                @endif
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input m-login__form-input--last" type="password"
                                       placeholder="Password" name="password">
                                @if($errors->has('password'))
                                    <b class="text-danger">{{$errors->first('password')}}</b>
                                @endif
                                @if(session('wrong-password'))
                                    <b class="text-danger">Mật khẩu bạn nhập không đúng</b>
                                @endif
                            </div>
                            <div class="m-login__form-action">
                                <button id="m_login_signin_submit"
                                        class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection