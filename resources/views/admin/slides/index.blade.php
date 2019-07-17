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
                                        Slide Ảnh
                                    </h3>
                                </div>
                            </div>
                        </div>


                        <!--begin::Form-->

                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <b class="text-danger">Chú ý: Chỉ nên để số ảnh trong slide tối đa là 10</b>
                                <br>
                                <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#m_modal_4">Thêm ảnh
                                </button>
                            </div>

                            <div class="row">
                                @foreach($slides as $slide)
                                    <div class="col-md-3" style="margin: 20px 0; text-align: center">
                                        <img src="{{asset('uploads/slides')}}/{{$slide->image}}" class="img-fluid"  style="width: 100%; height: 300px; object-fit: cover">
                                        <a href="{{route('admin.slides.delete' , $slide->id)}}" class="btn btn-danger" style="margin-top: 10px">Xóa ảnh</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!--end::Form-->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade show" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm ảnh</h5>
                    <a href="{{route('admin.slides.index')}}" style="font-size: 20px">x</a>

                </div>
                <div class="modal-body">
                    <div class="m-dropzone dropzone m-dropzone--success dz-clickable"
                         action="{{route('admin.slides.upload')}}" id="m-dropzone-three">
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
@endsection
@section('script')
    <script>
        var DropzoneDemo = {
            init: function () {
                Dropzone.options.mDropzoneThree = {
                    maxFilesize: 2,
                    maxFiles: 10,
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
                            url: '{{route('admin.slides.destroy')}}',
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
        @if(session('update'))
        swal('Cập nhập thành công', '', 'success');

        @endif

    </script>

@endsection