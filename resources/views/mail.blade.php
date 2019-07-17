<?php
$data = json_decode($data, true );
?>
<h2>Thông tin đơn hàng:</h2>
<table style="border-collapse: collapse;border: 1px solid #e0e0e0;">
    <thead>
    <tr style=" border: 1px solid #e0e0e0; border-bottom: 2px solid #e0e0e0">
        <th style="width: 300px;
        text-align: center;
        padding: 10px 0"> Sản phẩm
        </th>
        <th style=" width: 150px;
        text-align: center;
        padding: 10px 0">Số lượng
        </th>
        <th style=" width: 150px;
        text-align: center;
        padding: 10px 0">Giá
        </th>
    </tr>
    </thead>
    <tbody>
    @php($totalPrice = 0)
    @foreach($data as $item)
    <?php
    $total = $item['price'] * $item['quantity']
    ?>
    <tr style="border: 1px solid #e0e0e0;">
        <td style="width: 300px;
        text-align: center;
        padding: 10px 0">{{$item['name']}}</td>
        <td style=" width: 150px;
        text-align: center;
        padding: 10px 0">{{$item['quantity']}}</td>
        <td style=" width: 150px;
        text-align: center;
        padding: 10px 0">{{$total}}</td>
    </tr>
        @php($totalPrice += $total)
    @endforeach

    <tr>
        <td colspan="3" style="padding: 10px"><b style="color: red; font-size: 20px">Tổng tiền: {{$totalPrice}}đ</b>
        </td>
    </tr>
    </tbody>
</table>
<br>
<br>
<h2>Thông tin người mua:</h2>
<table style="border-collapse: collapse;border: 1px solid #e0e0e0;">
    <tbody>
    <tr style="border-bottom: 1px solid #e0e0e0">
        <th style="width: 150px; padding: 10px 0">Tên</th>
        <td style="width: 450px; text-align: center">{{$name}}</td>
    </tr>

    <tr style=" border: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0">
        <th style="width: 150px; padding: 10px 0">Email</th>
        <td style="width: 450px; text-align: center">{{$email}}</td>
    </tr>

    <tr style=" border: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0">
        <th style="width: 150px; padding: 10px 0">Số điện thoại</th>
        <td style="width: 450px; text-align: center">{{$phone}}</td>
    </tr>

    <tr style=" border: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0">
        <th style="width: 150px; padding: 10px 0">Địa chỉ</th>
        <td style="width: 450px; text-align: center">{{$address}}</td>
    </tr>

    <tr style=" border: 1px solid #e0e0e0;border-bottom: 1px solid #e0e0e0">
        <th style="width: 150px; padding: 10px 0">Lưu ý</th>
        <td style="width: 450px; text-align: center">
            <p style="word-break: break-all">
                {{$note}}
            </p>
        </td>
    </tr>


    </tbody>
</table>