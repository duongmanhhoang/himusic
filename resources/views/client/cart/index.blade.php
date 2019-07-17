@extends('client.templates.non-slides')
@section('title'){{'Giỏ hàng'}}@endsection
@section('content')

    @include('client.layouts.page-banner')

    @if($carts == null)
        <div class="text-center" style="padding: 100px 0">
            <h2>Chưa có sản phẩm trong giỏ hàng</h2>
            <br>
            <a href="{{route('client.products.index')}}" class="btn btn-primary">Mua hàng</a>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Giá sản phẩm</td>
                                <td>Tổng giá</td>
                                <td>Thao tác</td>
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
                                    <td><img src="{{asset('uploads/products')}}/{{$product->image}}" class="img-fluid"
                                             style="width: 100px"></td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <form method="post" action="{{route('client.cart.update' , $key)}}" >
                                            @csrf
                                            <input type="number" name="quantity" min="1" max="99" value="{{$cart['quantity']}}"
                                                   class="form-control" style="width: 70px" onchange="this.form.submit()">
                                        </form>
                                       </td>
                                    <td><p class='price'>{{$cart['price']}} vnđ</p></td>
                                    <td><p class='price'>{{$total}} vnđ</p></td>
                                    <td>
                                        <a href="{{route('client.cart.delete' , $key)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @php($bill_total += $total )
                                @php($i++)
                            @endforeach
                            <tr>
                                <td colspan="7">
                                    <p class="price">Tổng đơn hàng: {{$bill_total}} vnđ</p>
                                    <a href="{{route('client.checkout')}}" class="btn btn-primary">Chuyển tới trang thanh toán</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    @endif

@endsection
