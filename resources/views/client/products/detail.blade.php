@extends('client.templates.non-slides')
@section('title'){{$product->name}}@endsection
@section('content')

    @include('client.layouts.page-banner')

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('uploads/products')}}/{{$product->image}}" class="img-fluid"
                     alt="{{$product->getImageName($product->image)}}">

                <div class="product-slide-img">
                    <div class="owl-carousel owl-theme">
                        @foreach($images as $image)
                            <div><img src="{{asset('uploads/images')}}/{{$image->name}}" class="img-fluid"
                                      alt="{{$image->getImageName($image->name)}}"></div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <h2 class='main-title'>{{$product->name}}</h2>
                @if($product->sale_status == 0 )
                    <p class="product-item-price price">{{$product->price}} vnđ</p>
                @elseif($product->sale_status == 1)
                    <del class="product-item-price price">{{$product->price}} vnđ</del>
                    <p class="product-item-price price">{{$product->sale_price}} vnđ</p>
                @endif
                <div class="product-description">
                    {{$product->meta_description}}
                </div>
                <form class="add-to-cart-product form-inline" method="post" action="{{route('client.cart.add' , $product->id)}}">
                    @csrf
                        <div class="form-group">
                            <span class="input-number-decrement">–</span><input class="input-number" type="text"
                                                                                value="1" name="quantity"
                                                                                min="1" max="99"><span
                                    class="input-number-increment">+</span>
                        </div>
                        <input type="hidden" name="price"
                               value="@if($product->sale_status == 1) {{$product->sale_price}} @else {{$product->price}} @endif">
                        <div class="form-group">
                            <button type="submit"    class="product-add-to-cart-btn"> Thêm vào giỏ hàng</button>
                        </div>



                </form>

                @include('client.layouts.sharing-btn')

            </div>

            <div class="col-12 product-body">
                <hr>
                <h3 class="main-title">Thông tin chi tiết</h3>
                {!! $product->description !!}
            </div>

        </div>
    </div>


@endsection
@section('script')
    <script>

        (function () {

            window.inputNumber = function (el) {

                var min = el.attr('min') || false;
                var max = el.attr('max') || false;

                var els = {};

                els.dec = el.prev();
                els.inc = el.next();

                el.each(function () {
                    init($(this));
                });

                function init(el) {

                    els.dec.on('click', decrement);
                    els.inc.on('click', increment);

                    function decrement() {
                        var value = el[0].value;
                        value--;
                        if (!min || value >= min) {
                            el[0].value = value;
                        }
                    }

                    function increment() {
                        var value = el[0].value;
                        value++;
                        if (!max || value <= max) {
                            el[0].value = value++;
                        }
                    }
                }
            }
        })();

        inputNumber($('.input-number'));

        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000
            });
        });
    </script>
@endsection