@extends('client.templates.non-slides')
@section('title'){{$category->name}}@endsection
@section('content')

    @include('client.layouts.page-banner')

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12">
                <div class="row">
                    <div class="col-12 product-tool">
                        <form class="">
                            <div class="form-group col-md-4 pull-right">
                                <select class="form-control" name="order" onchange="this.form.submit()">
                                    <option value="name_desc" @if(isset($_GET['order']) && $_GET['order'] == 'name_desc'){{'selected'}}@endif>Mới nhất</option>
                                    <option value="name_asc" @if(isset($_GET['order']) && $_GET['order'] == 'name_asc'){{'selected'}}@endif>Cũ nhất</option>
                                    <option value="price_asc" @if(isset($_GET['order']) && $_GET['order'] == 'price_asc'){{'selected'}}@endif>Theo giá: Từ thấp tới cao</option>
                                    <option value="price_desc" @if(isset($_GET['order']) && $_GET['order'] == 'price_desc'){{'selected'}}@endif>Theo giá: Từ cao tới thấp</option>
                                </select>
                            </div>

                        </form>
                    </div>
                    @foreach($products as $product)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 product-item">
                            <div class="product-item-image">
                                <img src="{{asset('uploads/products')}}/{{$product->image}}" class="img-fluid" alt="{{ getImageName($product->image) }}">
                            </div>
                            <div class="product-item-info">
                                <h1 class="product-item-name">{{$product->name}}</h1>
                                @if($product->sale_status == 0 )
                                    <p class="product-item-price price">{{$product->price}} vnđ</p>
                                @elseif($product->sale_status == 1)
                                    <del class="product-item-price price">{{$product->price}} vnđ</del>
                                    <p class="product-item-price price">{{$product->sale_price}} vnđ</p>
                                @endif
                            </div>

                            <div class="product-item-btn-holder">
                                <form method="post" action="{{route('client.cart.add' , $product->id)}}">
                                    <a href="{{route('client.products.detail' , $product->slug)}}"
                                       class="product-item-btn"
                                       data-toggle="tooltip"
                                       title="Chi tiết"><i class="fa fa-eye"></i> </a>
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="price" value="@if($product->sale_status == 1) {{$product->sale_price}} @else {{$product->price}} @endif">
                                    <button type="submit" class="product-item-btn" data-toggle="tooltip"
                                            title="Thêm vào giỏ hàng"><i class="fa fa-cart-plus"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        {{$products->links()}}
                    </div>

                </div>
            </div>

            @include('client.layouts.product_sidebar')
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
        });
    </script>
@endsection