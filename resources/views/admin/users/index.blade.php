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
                                    Danh sách người dùng
                                </h3>

                            </div>
                        </div>
                        <div class="pull-right" style="margin-top: 10px">
                            <a href="{{route('admin.users.create')}}"
                               class="btn m-btn--pill m-btn--air btn-primary m-btn--wide"><i class="flaticon-user"></i>
                                Thêm</a>
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
                                        <th>Quyền</th>
                                        <th>Chỉnh sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                @if($user->role_id == 1)
                                                    Admin
                                                @else
                                                    Thành viên
                                                @endif
                                            </td>
                                            <td><a href="{{route('admin.users.edit' , [$user->id])}}"
                                                   class="btn-sm btn-primary"><i class="fa fa-eye"></i> </a>
                                            </td>
                                            <td><a href="javascript:;" linkurl="{{route('admin.users.delete' , [$user->id])}}"
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
                title: "Bạn có chắc muốn xóa người dùng này?",
                text: "Bạn sẽ không thể khôi phục lại khi đã xóa!",
                type: "warning",
                showCancelButton: !0,
                cancelButtonText: "Hủy",
                confirmButtonText: "Tôi chắc chắn"
            }).then(function (e) {
                e.value && $(location).attr('href', removeUrl)
            })
        });

        @if(session('store'))
        swal("Thêm người dùng thành công!", "", "success")
        @endif

        @if(session('delete'))
        swal("Xóa người dùng thành công!", "", "success")
        @endif

        @if(session('error'))
        swal("Bạn không thể xóa chính mình!", "", "error")
        @endif
    </script>
@endsection