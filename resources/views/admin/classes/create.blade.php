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
                                        Thêm lớp học
                                    </h3>
                                </div>
                            </div>
                        </div>


                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.classes.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>
                                <div class="form-group m-form__group">
                                    <label for="logo">Ảnh <span class="text-danger">*</span> </label>
                                    <div style="margin: 30px 0">
                                        <img src="{{asset('uploads/events/default.png')}}"
                                             style="width: 600px;object-fit: cover" id="imageTarget">
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
                                    <label>Tên lớp học<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control m-input" name="name"
                                           placeholder="Nhập tên lớp học" value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Danh mục</label>
                                    <select name="type_class" class="form-control m-input">
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group m-form__group">
                                    <label>Mô tả ngắn</label>
                                    <textarea class="form-control m-input" rows="10" name="description">{{old('description')}}</textarea>
                                </div>

                                <div class="form-group m-form__group">
                                    <label class="">Nội dung <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="form-control m-input" id="body"
                                                  name="body">{{old('body')}}</textarea>
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
            $('#body').summernote({
                height: 500,
                toolbar: [
                    ['style', ['fontname', 'bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'hr' , 'picture' , 'table' ,'video']],
                    ['color', ['color']],
                    ['height', ['height']],
                    ['misc', ['codeview', 'undo', 'redo']]
                ]
            });

            $(".m-datetimepicker").datetimepicker({
                todayHighlight: !0,
                autoclose: !0,
                pickerPosition: "bottom-left",
                format: "dd-mm-yyyy hh:ii"
            })
        });
    </script>


@endsection
