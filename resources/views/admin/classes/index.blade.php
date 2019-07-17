@extends('admin.metronic.layout.main')
@section('content')
    <div class="m-content">

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Danh sách lớp học
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin: Search Form -->
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" placeholder="Search..."
                                               id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
														</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                            <a href="{{route('admin.classes.create')}}"
                               class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-plus"></i>
													<span>Thêm lớp học</span>
												</span>
                            </a>
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                    </div>
                </div>

                <!--end: Search Form -->

                <!--begin: Datatable -->
                <table class="m-datatable" id="html_table" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên lớp</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($classes as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td><img src="{{asset('uploads/classes')}}/{{$item->image}}" style="width: 200px; object-fit: cover"> </td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{route('admin.classes.edit' , $item->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Chỉnh sửa"><i class="la la-edit"></i> </a>
                                <a href="javascript:;" linkurl="{{route('admin.classes.delete' , $item->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill btn-remove" title="Xóa"><i class="la la-trash"></i> </a>
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        $(document).ready(function () {
            $(".btn-remove").click(function (e) {
                var removeUrl = $(this).attr('linkurl');
                swal({
                    title: "Bạn có chắc muốn lớp học này?",
                    text: "",
                    type: "warning",
                    showCancelButton: !0,
                    cancelButtonText: "Hủy",
                    confirmButtonText: "Tôi chắc chắn"
                }).then(function (e) {
                    e.value && $(location).attr('href', removeUrl)
                })
            });
        })

        @if(session('delete'))
        swal('Xóa lớp học thành công', '', 'success');
        @endif
    </script>
@endsection