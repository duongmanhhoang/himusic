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
                                    Danh sách tin nhắn
                                </h3>

                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">

                        <!--begin::Section-->
                        <div class="m-section">
                            <div class="m-section__content">
                                <table class="table table-bordered table-hover"
                                       style="font-weight: lighter; font-size: 14px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Tên</th>
                                        <th>Nội dung</th>
                                        <th>Chi tiết</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $key => $message)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>
                                                {{substr($message->message, 0 , 100)}}
                                            </td>
                                            <td><a href="{{route('admin.messages.detail' , $message->id)}}"
                                                   class="btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
                                            </td>
                                            <td><a href="javascript:;" linkurl="{{route('admin.messages.delete' , $message->id)}}"
                                                   class="btn-sm btn-danger btn-remove"><i
                                                            class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
@section('script')
    <script>
        $(".btn-remove").click(function (e) {
            var removeUrl = $(this).attr('linkurl');
            swal({
                title: "Bạn có chắc muốn xóa tin nhắn này?",
                text: "Bạn sẽ không thể khôi phục lại khi đã xóa!",
                type: "warning",
                showCancelButton: !0,
                cancelButtonText: "Hủy",
                confirmButtonText: "Tôi chắc chắn"
            }).then(function (e) {
                e.value && $(location).attr('href', removeUrl)
            })
        });

        @if(session('delete'))
        swal("Xóa thành công!", "", "success")
        @endif
    </script>
@endsection