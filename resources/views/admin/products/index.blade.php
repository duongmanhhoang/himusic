@extends('admin.metronic.layout.main')
@section('content')
    <div class="m-content">

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Danh sách sản phẩm
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
                            <a href="{{route('admin.products.create')}}"
                               class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-plus"></i>
													<span>Thêm sản phẩm</span>
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
                        <th>Ảnh đại diện</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($products as $product)
                        <tr>
                            <td>{{$i}}</td>
                            <td><img src="{{asset('uploads/products')}}/{{$product->image}}" style="width: 200px; object-fit: cover"> </td>
                            <td>{{$product->name}}</td>
                            <td>
                                @if($product->price !=null)
                                    @if($product->sale_status == 1)
                                        <p class="text-success price" style="text-decoration: line-through">Giá sản phẩm: {{$product->price}} vnđ</p>
                                        <p class="text-danger price">Giá khuyến mãi: {{$product->sale_price}} vnđ</p>
                                    @else
                                        <p class="text-success price">Giá sản phẩm: {{$product->price}} vnđ</p>
                                    @endif
                                @endif
                            </td>
                            <td>

                                <a href="{{route('admin.products.edit' , $product->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Chỉnh sửa"><i class="la la-edit"></i> </a>
                                <a href="javascript:;" linkurl="{{route('admin.products.delete' , $product->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill btn-remove" title="Xóa"><i class="la la-trash"></i> </a>
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
            $(".price").each(function () {
                var num = $(this).text();
                var commaNum = numberWithCommas(num);
                $(this).text(commaNum);
            });
        });
        $(document).ready(function () {
            $(".btn-remove").click(function (e) {
                var removeUrl = $(this).attr('linkurl');
                swal({
                    title: "Bạn có chắc muốn sản phẩm này?",
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
        swal('Thêm sản phẩm thành công', '', 'success');
        @endif
        @if(session('delete'))
        swal('Xóa sản phẩm thành công', '', 'success');
        @endif
    </script>
@endsection