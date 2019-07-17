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
                                        Thêm sự kiện
                                    </h3>
                                </div>
                            </div>
                        </div>


                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.events.store')}}" enctype="multipart/form-data">
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
                                    <label>Tiêu đề<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control m-input" name="title"
                                           placeholder="Nhập tiêu đề" value="{{old('title')}}">
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{$errors->first('title')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Địa điểm<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control m-input" name="address"
                                           placeholder="Nhập địa điểm" value="{{old('address')}}">
                                    @if($errors->has('address'))
                                        <p class="text-danger">{{$errors->first('address')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Đường dẫn liên kết</label>
                                    <input type="text" class="form-control m-input" name="link"
                                           placeholder="Nhập đường dẫn liên kết" value="{{old('link')}}">
                                    @if($errors->has('link'))
                                        <p class="text-danger">{{$errors->first('link')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-6">
                                        <label>Thời gian bắt đầu <span class="text-danger">*</span> </label>
                                        <div class="col-12">
                                            <div class="input-group date">
                                                <input type="text" class="form-control m-input m-datetimepicker"
                                                       readonly="" placeholder="Chọn thời gian bắt đầu" name="start_at"
                                                       value="{{old('start_at')}}">
                                                <div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o glyphicon-th"></i>
													</span>
                                                </div>
                                            </div>

                                            @if($errors->has('start_at'))
                                                <p class="text-danger">{{$errors->first('start_at')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label>Thời gian kết thúc <span class="text-danger">*</span> </label>
                                        <div class="col-12">
                                            <div class="input-group date">
                                                <input type="text" class="form-control m-input m-datetimepicker"
                                                       readonly="" placeholder="Chọn thời gian kết thúc" name="end_at"
                                                       value="{{old('end_at')}}">
                                                <div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o glyphicon-th"></i>
													</span>
                                                </div>
                                            </div>

                                            @if($errors->has('end_at'))
                                                <p class="text-danger">{{$errors->first('end_at')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group m-form__group">
                                    <label class="">Miêu tả <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="form-control m-input" id="body"
                                                  name="body">{{old('body')}}</textarea>
                                    </div>
                                    @if($errors->has('body'))
                                        <p class="text-danger">{{$errors->firest('body')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Tên nhà tổ chức</label>
                                    <input type="text" class="form-control m-input" name="organizer_name"
                                           placeholder="Nhập tên nhà tổ chức" value="{{old('organizer_name')}}">
                                    @if($errors->has('organizer_name'))
                                        <p class="text-danger">{{$errors->first('organizer_name')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Số điện thoại nhà tổ chức</label>
                                    <input type="text" class="form-control m-input" name="organizer_phone"
                                           placeholder="Nhập số điện thoại nhà tổ chức"
                                           value="{{old('organizer_phone')}}">
                                    @if($errors->has('organizer_phone'))
                                        <p class="text-danger">{{$errors->first('organizer_phone')}}</p>
                                    @endif
                                </div>

                                <div class="form-group m-form__group">
                                    <label>Email nhà tổ chức</label>
                                    <input type="text" class="form-control m-input" name="organizer_email"
                                           placeholder="Nhập email nhà tổ chức" value="{{old('organizer_email')}}">
                                    @if($errors->has('organizer_email'))
                                        <p class="text-danger">{{$errors->first('organizer_email')}}</p>
                                    @endif
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
                    ['insert', ['link', 'hr']],
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
