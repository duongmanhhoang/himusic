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
                                        Chỉnh sửa lớp học
                                    </h3>
                                </div>
                            </div>
                        </div>


                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.classes.update' , $classes->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <div class="m-portlet" style="box-shadow: none; -webkit-box-shadow: none">
                                    <div class="m-portlet__body">
                                        <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link @if(session('image_active')) @elseif(session('video_active')) @else {{'active'}} @endif"
                                                   data-toggle="tab" href="#m_tabs_9_1" role="tab">
                                                    <i class="la la-info-circle"></i> Thông tin</a>
                                            </li>
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link @if(session('image_active')) {{'active'}} @elseif(session('video_active')) @else @endif"
                                                   data-toggle="tab" href="#m_tabs_9_2" role="tab">
                                                    <i class="la la-image"></i> Ảnh</a>
                                            </li>
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link @if(session('image_active')) @elseif(session('video_active'))  {{'active'}} @else @endif"
                                                   data-toggle="tab" href="#m_tabs_9_3" role="tab">
                                                    <i class="la la-video-camera"></i> Videos</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane @if(session('image_active')) @elseif(session('video_active')) @else {{'active'}} @endif"
                                                 id="m_tabs_9_1" role="tabpanel">
                                                <div class="form-group m-form__group">
                                                    <label for="logo">Ảnh <span class="text-danger">*</span> </label>
                                                    <div style="margin: 30px 0">
                                                        <img src="{{asset('uploads/classes')}}/{{$classes->image}}"
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
                                                           placeholder="Nhập tên lớp học" value="{{old('name' , $classes->name)}}">
                                                    @if($errors->has('name'))
                                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                                    @endif
                                                </div>
                                                <div class="form-group m-form__group">
                                                    <label>Danh mục</label>
                                                    <select name="type_class" class="form-control m-input">
                                                        @foreach($types as $type)
                                                            <option {{ $classes->type_class == $type->id ? 'selected' : '' }} value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group m-form__group">
                                                    <label>Mô tả ngắn</label>
                                                    <textarea class="form-control m-input" rows="10" name="description">{{old('description' , $classes->description)}}</textarea>
                                                </div>

                                                <div class="form-group m-form__group">
                                                    <label class="">Nội dung <span class="text-danger">*</span> </label>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="form-control m-input" id="body"
                                                  name="body">{{old('body' , $classes->body)}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane @if(session('image_active')) {{'active'}} @elseif(session('video_active')) @else @endif"
                                                 id="m_tabs_9_2" role="tabpanel">
                                                <div class="form-group m-form__group">

                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#m_modal_4">Thêm ảnh
                                                    </button>
                                                </div>

                                                <div class="row" style="padding: 0 30px">
                                                    @foreach($images as $image)
                                                        <div class="col-md-3"
                                                             style="margin: 20px 0; text-align: center">
                                                            <img src="{{asset('uploads/images')}}/{{$image->name}}"
                                                                 class="img-fluid"
                                                                 style="width: 100%; height: 300px; object-fit: cover">
                                                            <a href="{{route('admin.classes.delete.image' , $image->id)}}"
                                                               class="btn btn-danger" style="margin-top: 10px">Xóa
                                                                ảnh</a>
                                                        </div>
                                                    @endforeach
                                                    <div class="modal fade show" id="m_modal_4" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel"
                                                         style="display: none;">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm
                                                                        ảnh</h5>
                                                                    <a href="" style="font-size: 20px">x</a>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="m-dropzone dropzone m-dropzone--success dz-clickable"
                                                                         action="{{route('admin.classes.upload' , $classes->id)}}"
                                                                         id="m-dropzone-three">
                                                                        @csrf
                                                                        <div class="m-dropzone__msg dz-message needsclick">
                                                                            <h3 class="m-dropzone__msg-title">Thả ảnh
                                                                                vào để tải lên (Ảnh sẽ tự động
                                                                                upload)</h3>
                                                                            <span class="m-dropzone__msg-desc">Chỉ chấp nhận ảnh định dạng jpg, jpeg, png. Dung lượng tối đa là 2MB</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane @if(session('image_active')) @elseif(session('video_active'))  {{'active'}} @else @endif"
                                                 id="m_tabs_9_3" role="tabpanel">
                                                <div class="form-group m-form__group" id="m_repeater_1">
                                                    <label>Đường dẫn youtube </label>
                                                    <div>
                                                        <div data-repeater-list="" class="col-lg-10">
                                                            @if($videos->count() == 0)
                                                                <div data-repeater-item class="row"
                                                                     style="margin-bottom: 20px">
                                                                    <div class="col-md-6" style="padding-left: 0">
                                                                        <input type="text" class="form-control m-input"
                                                                               placeholder="Nhập đường dẫn youtube"
                                                                               name="url[]">
                                                                        <div class="d-md-none m--margin-bottom-10"></div>
                                                                    </div>


                                                                    <div class="col-md-4">
                                                                        <div data-repeater-delete=""
                                                                             class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>Xóa</span>
																</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @foreach($videos as $video)
                                                                    <div data-repeater-item class="row"
                                                                         style="margin-bottom: 20px">
                                                                        <div class="col-md-6" style="padding-left: 0">
                                                                            <input type="text"
                                                                                   class="form-control m-input"
                                                                                   placeholder="Nhập đường dẫn youtube"
                                                                                   name="url[]" value="{{$video->url}}">
                                                                            <div class="d-md-none m--margin-bottom-10"></div>
                                                                        </div>


                                                                        <div class="col-md-4">
                                                                            <div data-repeater-delete=""
                                                                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>Xóa</span>
																</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="m-form__group form-group row">
                                                        <div data-repeater-create=""
                                                             class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>Thêm</span>
														</span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="old_image" value="{{$classes->image}}">
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
                            url: '{{route('admin.classes.destroy')}}',
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
                    }
                }
            }
        };
        DropzoneDemo.init();

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


            var FormRepeater = {
                init: function () {
                    $("#m_repeater_1").repeater({
                        initEmpty: !1,
                        defaultValues: {"text-input": "foo"},
                        show: function () {
                            $(this).slideDown()
                        },
                        hide: function (e) {
                            $(this).slideUp(e)
                        }
                    }), $("#m_repeater_2").repeater({
                        initEmpty: !1,
                        defaultValues: {"text-input": "foo"},
                        show: function () {
                            $(this).slideDown()
                        },
                        hide: function (e) {
                            confirm("Are you sure you want to delete this element?") && $(this).slideUp(e)
                        }
                    }), $("#m_repeater_3").repeater({
                        initEmpty: !1,
                        defaultValues: {"text-input": "foo"},
                        show: function () {
                            $(this).slideDown()
                        },
                        hide: function (e) {
                            confirm("Are you sure you want to delete this element?") && $(this).slideUp(e)
                        }
                    }), $("#m_repeater_4").repeater({
                        initEmpty: !1,
                        defaultValues: {"text-input": "foo"},
                        show: function () {
                            $(this).slideDown()
                        },
                        hide: function (e) {
                            $(this).slideUp(e)
                        }
                    }), $("#m_repeater_5").repeater({
                        initEmpty: !1,
                        defaultValues: {"text-input": "foo"},
                        show: function () {
                            $(this).slideDown()
                        },
                        hide: function (e) {
                            $(this).slideUp(e)
                        }
                    }), $("#m_repeater_6").repeater({
                        initEmpty: !1,
                        defaultValues: {"text-input": "foo"},
                        show: function () {
                            $(this).slideDown()
                        },
                        hide: function (e) {
                            $(this).slideUp(e)
                        }
                    })
                }
            };
            jQuery(document).ready(function () {
                FormRepeater.init()
            });

        });


        @if(session('store'))
        swal('Thêm lớp học thành công', '', 'success');
        @endif

        @if(session('update'))
        swal('Sửa lớp học thành công', '', 'success');
        @endif
    </script>
@endsection
