@extends('admin.metronic.layout.main')
@section('content')
    <div class="m-content">

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Danh sách đơn hàng
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
                    </div>
                </div>

                <!--end: Search Form -->

                <!--begin: Datatable -->
                <table class="m-datatable" id="html_table" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Thông tin người mua</th>
                        <th>Thông tin đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Lưu ý</th>
                        <th>Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <p> Tên: {{$order->receiver_name}}</p>
                                <p> Email: {{$order->receiver_email}}</p>
                                <p> SĐT: {{$order->receiver_phone}}</p>
                                <p> Địa chỉ: {{$order->receiver_address}}</p>
                            </td>
                            <?php
                            $info = json_decode($order->info, true);
                            ?>
                            <td>
                                @foreach($info as $item)
                                    <p>{{$item['name']}} x {{$item['quantity']}}</p>
                                @endforeach
                            </td>
                            <td>
                                @if($order->status == 0)
                                    <p class="text-primary">Đang chờ xử lý</p>
                                @elseif($order->status == 1)
                                    <p class="text-success">Đã hoàn thành</p>
                                @elseif($order->status == -1)
                                    <p class="text-danger">Đã hủy</p>
                                @endif

                            </td>

                            <td style="word-break: break-all">
                                {{substr($order->note , 0 , 200)}}
                            </td>
                            <td>

                                <a href="{{route('admin.orders.detail' , $order->id)}}"
                                   class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill"
                                   title="Chỉnh sửa"><i class="la la-eye"></i> </a>
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
        function numberWithCommas(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        }

        $(document).ready(function () {
            $(".views").each(function () {
                var num = $(this).text();
                var commaNum = numberWithCommas(num);
                $(this).text(commaNum);
            });
            $(".btn-remove").click(function (e) {
                var removeUrl = $(this).attr('linkurl');
                swal({
                    title: "Bạn có chắc muốn bài viết này?",
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

        @if(session('store'))
        swal('Thêm bài viết thành công', '', 'success');
        @endif
        @if(session('delete'))
        swal('Xóa bài viết thành công', '', 'success');
        @endif
    </script>
@endsection