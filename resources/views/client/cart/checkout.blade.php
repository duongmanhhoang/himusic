@extends('client.templates.non-slides')
@section('title'){{'Thanh toán'}}@endsection
@section('content')

    @include('client.layouts.page-banner')

    @if($carts == null)
        <div class="text-center" style="padding: 100px 0">
            <h2>Chưa có sản phẩm trong giỏ hàng</h2>
            <br>
            <a href="{{route('client.products.index')}}" class="btn btn-primary">Mua hàng</a>
        </div>
    @else
        <div class="container">
            <div class="row" style="margin: 70px 0">
                <div class="col-md-6 ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Giá sản phẩm</td>
                                <td>Tổng giá</td>
                            </tr>
                            </thead>

                            <tbody>
                            @php($bill_total =0)
                            @php($i = 1)
                            @foreach($carts as $key => $cart)
                                <?php
                                $product = \App\Model\Product::find($cart['id']);
                                $total = $cart['quantity'] * $cart['price'];
                                ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        {{$cart['quantity']}}
                                    </td>
                                    <td><p class='price'>{{$cart['price']}} vnđ</p></td>
                                    <td><p class='price'>{{$total}} vnđ</p></td>
                                </tr>
                                @php($bill_total += $total )
                                @php($i++)
                            @endforeach
                            <tr>
                                <td colspan="7">
                                    <p class="price">Tổng đơn hàng: {{$bill_total}} vnđ</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-2">

                </div>
                <div class="col-md-4">
                    <form method="post" action="{{route('client.checkout.submit')}}">\
                        @csrf
                        <div class="alert alert-dark" role="alert">
                            Vui lòng không bỏ trống những ô đánh dấu <b class="text-danger">*</b>
                        </div>
                        <div class="alert alert-danger" role="alert">
                            Quý khách sẽ thanh toán khi nhận hàng
                        </div>
                        <div class="form-group">
                            <label>Tên <b class="text-danger">*</b> </label>
                            <input type="text" name="receiver_name" value="{{old('receiver_name')}}"
                                   class="form-control m-input">
                            @if($errors->has('receiver_name'))
                                <p class="text-danger">{{$errors->first('receiver_name')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email <b class="text-danger">*</b></label>
                            <input type="text" name="receiver_email" value="{{old('receiver_email')}}"
                                   class="form-control m-input">

                            @if($errors->has('receiver_email'))
                                <p class="text-danger">{{$errors->first('receiver_email')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại <b class="text-danger">*</b></label>
                            <input type="text" name="receiver_phone" value="{{old('receiver_phone')}}"
                                   class="form-control m-input">
                            @if($errors->has('receiver_phone'))
                                <p class="text-danger">{{$errors->first('receiver_phone')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ nhận hàng <b class="text-danger">*</b></label>
                            <input type="text" name="receiver_address" value="{{old('receiver_address')}}"
                                   class="form-control m-input">

                            @if($errors->has('receiver_address'))
                                <p class="text-danger">{{$errors->first('receiver_address')}}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" rows="5" name="note">{{old('note')}}</textarea>
                        </div>

                        <input type="hidden" name="info" value="{{json_encode($carts)}}">

                        <button class="btn btn-primary">Thanh toán</button>
                    </form>

                </div>
            </div>
        </div>

    @endif

@endsection
