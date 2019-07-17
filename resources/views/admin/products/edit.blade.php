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
                                        Cài đặt Website
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.products.update' , $product->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link @if(session('active'))@else {{'active'}} @endif" data-toggle="tab" href="#m_tabs_9_1" role="tab">
                                            <i class="la la-info-circle"></i> Thông tin cơ bản</a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link @if(session('active')) {{'active'}} @else @endif" data-toggle="tab" href="#m_tabs_9_2" role="tab">
                                            <i class="la la-image"></i> Ảnh slide</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane @if(session('active'))@else {{'active'}} @endif" id="m_tabs_9_1" role="tabpanel">
                                        <div class="form-group m-form__group">
                                            <label for="logo">Ảnh sản phẩm <span class="text-danger">*</span> </label>
                                            <div style="margin: 30px 0">
                                                <img src="{{asset('uploads/products')}}/{{$product->image}}"
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
                                                   placeholder="Nhập tên sản phẩm" value="{{old('name' , $product->name)}}">
                                            @if($errors->has('name'))
                                                <p class="text-danger">{{$errors->first('name')}}</p>
                                            @endif
                                        </div>


                                        <div class="form-group m-form__group">
                                            <label>Đường dẫn sản phẩm <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control m-input" id="slug" name="slug"
                                                   value="{{old('slug' , $product->slug)}}">
                                            @if($errors->has('slug'))
                                                <p class="text-danger">{{$errors->first('slug')}}</p>
                                            @endif
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label>Danh mục <span class="text-danger">*</span></label>
                                            <select class="form-control m-select2" id="m_select2_1" name="cate_id">
                                                <option value="0">Không có danh mục</option>
                                                @foreach($categories as $category)
                                                    <option @if($product->cate_id == $category->id){{'selected'}}@endif value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="">Miêu tả</label>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="description" id="description"
                                                  name="description">{{old('description' , $product->description)}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label>Giá sản phẩm </label>
                                            <input type="text" class="form-control m-input" id="price" name="price"
                                                   placeholder="Nhập giá sản phẩm" value="{{old('price' , $product->price)}}">
                                            @if($errors->has('price'))
                                                <p class="text-danger">{{$errors->first('price')}}</p>
                                            @endif
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label>Giá khuyến mãi </label>
                                            <input type="text" class="form-control m-input" id="sale_price" name="sale_price"
                                                   placeholder="Nhập giá khuyến mãi"
                                                   value="{{old('sale_price' , $product->sale_price)}}">
                                            @if($errors->has('sale_price'))
                                                <p class="text-danger">{{$errors->first('sale_price')}}</p>
                                            @endif
                                        </div>

                                        <div class="m-form__group form-group">
                                            <div class="m-checkbox-list">
                                                <label class="m-checkbox">
                                                    <input type="checkbox" name="sale_status"
                                                           value="1" @if($product->sale_status == 1){{'checked'}}@endif> Bật
                                                    khuyến mãi
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label>Meta Title </label>
                                            <input type="text" class="form-control m-input" id="meta_title" name="meta_title"
                                                   placeholder="Nhập meta tilte"
                                                   value="{{old('meta_title' , $product->meta_title)}}">
                                            @if($errors->has('meta_title'))
                                                <p class="text-danger">{{$errors->first('meta_title')}}</p>
                                            @endif
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label>Meta Description </label>
                                            <textarea class="form-control m-input"
                                                      rows="10"
                                                      name="meta_description">{{old('meta_description' , $product->meta_description)}}</textarea>
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label>Meta Keywords </label>
                                            <input type="text" class="form-control m-input" id="meta_keyword"
                                                   name="meta_keywords"
                                                   placeholder="Nhập meta keywords"
                                                   value="{{old('meta_keyword' , $product->meta_keywords)}}">
                                        </div>

                                        <input type="hidden" name="old_image" value="{{$product->image}}">
                                    </div>

                                    <div class="tab-pane @if(session('active')) {{'active'}} @else @endif" id="m_tabs_9_2" role="tabpanel">
                                        <div class="form-group m-form__group">

                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#m_modal_4">Thêm ảnh
                                            </button>
                                        </div>

                                        <div class="row" style="padding: 0 30px">
                                            @foreach($images as $image)
                                                <div class="col-md-3" style="margin: 20px 0; text-align: center">
                                                    <img src="{{asset('uploads/images')}}/{{$image->name}}" class="img-fluid"  style="width: 100%; height: 300px; object-fit: cover">
                                                    <a href="{{route('admin.products.delete.image' , $image->id)}}" class="btn btn-danger" style="margin-top: 10px">Xóa ảnh</a>
                                                </div>
                                            @endforeach
                                            <div class="modal fade show" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                 style="display: none;">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh</h5>
                                                            <a href="{{route('admin.products.edit' , $product->id)}}" style="font-size: 20px">x</a>

                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="m-dropzone dropzone m-dropzone--success dz-clickable"
                                                                 action="{{route('admin.products.upload' , $product->id)}}" id="m-dropzone-three">
                                                                @csrf
                                                                <div class="m-dropzone__msg dz-message needsclick">
                                                                    <h3 class="m-dropzone__msg-title">Thả ảnh vào để tải lên (Ảnh sẽ tự động upload)</h3>
                                                                    <span class="m-dropzone__msg-desc">Chỉ chấp nhận ảnh định dạng jpg, jpeg, png. Dung lượng tối đa là 2MB</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        @if(session('update'))
            swal('Cập nhập thành công' , '', 'success');
        @endif
    </script>
    <script>
        var DropzoneDemo = {
            init: function () {
                Dropzone.options.mDropzoneThree = {
                    maxFilesize: 2,
                    maxFiles: 1000,
                    dictRemoveFile: 'Xóa',
                    dictFileTooBig: 'File lớn hơn 2 MB',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    acceptedFiles: ".jpeg,.jpg,.png,",
                    addRemoveLinks: true,
                    renameFile: function (file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time + '-' + file.name;
                    },
                    timeout: 5000,
                    success: function (file, response) {
                        console.log(response);
                    },
                    error: function (file, response) {
                        return false;
                    },
                    removedfile: function (file) {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{route('admin.products.destroy')}}',
                            data: {filename: name},
                            success: function (data) {
                                console.log(name);
                            },
                            error: function (e) {
                                console.log(e);
                            }
                        });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function (file, response) {
                        console.log(response);
                    },
                    error: function (file, response) {
                        return false;
                    }
                }
            }
        };
        DropzoneDemo.init();


    </script>
@endsection
