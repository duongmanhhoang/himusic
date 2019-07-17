@extends('admin.metronic.layout.main')
@section('content')
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head"
                                 style="background-image: url(../../assets/app/media/img//logos/bg-6.jpg);">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__logo">
                                        <a href="#">
                                            <h1>Chi tiết hóa đơn</h1>
                                        </a>
                                    </div>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Thời gian đặt hàng</span>
                                            <span class="m-invoice__text">{{$order->created_at}}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Thông tin khách hàng</span>
                                            <span class="m-invoice__text">{{$order->receiver_name}}</span>
                                            <span class="m-invoice__text">{{$order->receiver_email}}</span>

                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Thông tin liên lạc</span>
                                            <span class="m-invoice__text">{{$order->receiver_phone}}</span>
                                            <span class="m-invoice__text">{{$order->receiver_address}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($totalBill = 0)
                                        @foreach($info as $item)
                                            @php($total = $item['price'] * $item['quantity'])
                                            <tr>
                                                <td>{{$item['name']}}</td>
                                                <td class="price">{{$item['price']}} vnđ</td>
                                                <td>{{$item['quantity']}}</td>
                                                <td class="price m--font-danger">{{$total}} vnđ</td>
                                            </tr>
                                            @php($totalBill += $total)
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <form method="post" action="{{route('admin.orders.update' , $order->id)}}">
                                        @csrf
                                        <div class="form-group form-inline">
                                            <label style="margin-right: 30px ">Trạng thái</label>
                                            <select class="form-control m-input" name="status" onchange="this.form.submit()">
                                                <option @if($order->status == 0) {{'selected'}} @endif value="0">Đang chờ xử lý</option>
                                                <option @if($order->status == 1) {{'selected'}} @endif value="1">Đã hoàn thành</option>
                                                <option @if($order->status == -1) {{'selected'}} @endif value="-1">Đã hủy</option>
                                            </select>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="m-invoice__footer">
                                <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Tổng cộng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="price m--font-danger">{{$totalBill}} vnđ</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            $(".price").each(function () {
                var num = $(this).text();
                var commaNum = numberWithCommas(num);
                $(this).text(commaNum);
            });
        })

        @if(session('update'))
        swal('Cập nhập đơn hàng thành công', '', 'success');
        @endif
    </script>
@endsection