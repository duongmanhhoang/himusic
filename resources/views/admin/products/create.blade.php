@extends('admin.metronic.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="m-portlet m-portlet--tab">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                                    <h3 class="m-portlet__head-text">
                                        Thêm sản phẩm
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <div class="form-group m-form__group">
                                    <label for="logo">Ảnh sản phẩm <span class="text-danger">*</span> </label>
                                    <div style="margin: 30px 0">
                                        <img src="{{asset('uploads/products/default.png')}}"
                                             style="width: 300px;object-fit: cover" id="imageTarget">
                                    </div>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                    </div>
                                    @if($errors->has('image'))
                                        <p class="text-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Tên sản phẩm <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control m-input" id="name" name="name"
                                           placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Danh mục</label>
                                    <select class="form-control m-select2" id="m_select2_1" name="cate_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('cate_id'))
                                        <p class="text-danger">{{$errors->first('cate_id')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="">Miêu tả</label>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="description" id="description"
                                                  name="description">{{old('description')}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Giá sản phẩm </label>
                                    <input type="text" class="form-control m-input" id="price" name="price"
                                           placeholder="Nhập giá sản phẩm" value="{{old('price')}}">
                                    @if($errors->has('price'))
                                        <p class="text-danger">{{$errors->first('price')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Giá khuyến mãi </label>
                                    <input type="text" class="form-control m-input" id="sale_price" name="sale_price"
                                           placeholder="Nhập giá khuyến mãi" value="{{old('sale_price')}}">
                                    @if($errors->has('sale_price'))
                                        <p class="text-danger">{{$errors->first('sale_price')}}</p>
                                    @endif
                                </div>

                                <div class="m-form__group form-group">
                                    <div class="m-checkbox-list">
                                        <label class="m-checkbox">
                                            <input type="checkbox" name="sale_status" value="1"> Bật khuyến mãi
                                            <span></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Meta Title </label>
                                    <input type="text" class="form-control m-input" id="meta_title" name="meta_title"
                                           placeholder="Nhập meta tilte" value="{{old('meta_title')}}">
                                    @if($errors->has('meta_title'))
                                        <p class="text-danger">{{$errors->first('meta_title')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Meta Description </label>
                                    <textarea class="form-control m-input"
                                              rows="10" name="meta_description">{{old('meta_description')}}</textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Meta Keywords </label>
                                    <input type="text" class="form-control m-input" id="meta_keyword"
                                           name="meta_keywords"
                                           placeholder="Nhập meta keywords" value="{{old('meta_keyword')}}">
                                </div>


                            </div>

                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <button type="reset" class="btn btn-secondary">Hủy</button>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        @if(session('update'))
        swal('Cập nhập thành công', '', 'success');

        @endif
        function getBase64(file, selector) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                $(selector).attr('src', reader.result);
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        }

        var img = document.querySelector('#image');
        img.onchange = function () {
            var file = this.files[0];
            if (file == undefined) {
                $('#imageTarget').attr('src', "../../../../admin/images/default-image.jpg");
            } else {
                getBase64(file, '#imageTarget');
            }
        }
        $(document).ready(() => {
            $("#m_select2_1, #m_select2_1_validate").select2({placeholder: "Chọn danh mục"})
            $('#description').summernote({
                height: 500,
                toolbar: [
                    ['style', ['fontname', 'bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['picture', 'link', 'video', 'table', 'hr']],
                    ['color', ['color']],
                    ['height', ['height']],
                    ['misc', ['codeview', 'undo', 'redo']]
                ]
            });
        });
    </script>


@endsection
