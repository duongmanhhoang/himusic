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
                                       Thêm bài viết
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <div class="form-group m-form__group">
                                    <label for="logo">Ảnh bài viết <span class="text-danger">*</span> </label>
                                    <div style="margin: 30px 0">
                                        <img src="{{asset('uploads/posts/default.png')}}"
                                             style="width: 500px;object-fit: cover" id="imageTarget">
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
                                    <label>Tiêu đề bài viết <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control m-input" id="title" title="title" name="title"
                                           placeholder="Nhập tiêu đề" value="{{old('title')}}">
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{$errors->first('title')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group row">
                                    <label>Danh mục </label>
                                    <select class="form-control m-input m-select2" id="m_select2_1" name="cate_id">
                                        <option value="0">Không có</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('cate_id'))
                                        <p class="text-danger">{{$errors->first('cate_id')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="">Mô tả</label>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="form-control m-input" id="description"
                                                  name="description" rows="10">{{old('description')}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="">Nội dung</label>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="form-control m-input" id="body"
                                                  name="body">{{old('body')}}</textarea>
                                    </div>
                                    @if($errors->has('body'))
                                        <p class="text-danger">{{$errors->first('body')}}</p>
                                    @endif
                                </div>



                                <div class="form-group m-form__group">
                                    <label>Meta Keywords </label>
                                    <input type="text" class="form-control m-input" id="keywords"
                                           name="keywords"
                                           placeholder="Nhập meta keywords" value="{{old('keywords')}}">
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
            $('#body').summernote({
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
