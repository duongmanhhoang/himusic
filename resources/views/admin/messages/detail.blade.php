@extends('admin.metronic.layout.main')
@section('content')

    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Chi tiết tin nhắn
                                </h3>

                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">

                        <!--begin::Section-->
                        <div class="m-section">
                            <div class="m-section__content">
                                <h4>Tên</h4>
                                <p>{{$message->name}}</p>

                                <hr>

                                <h4>Email</h4>
                                <p>{{$message->email}}</p>

                                <hr>
                                <h4>Nội dung</h4>
                                <p style="word-break: break-all">{{$message->message}}</p>

                            </div>
                        </div>

                        <!--end::Section-->
                    </div>

                    <!--end::Form-->
                </div>
            </div>

        </div>
    </div>

@endsection