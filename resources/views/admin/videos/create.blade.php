@extends('admin.metronic.layout.main')
@section('content')
    <div class="m-content">

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Thêm video
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <form class="m-form m-form--fit m-form--label-align-right" method="post"
                      action="{{route('admin.videos.store')}}">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert alert-danger" role="alert">
                                Vui lòng không bỏ trống nhưng ô có đánh dấu *
                            </div>

                        </div>

                        <div class="form-group m-form__group">
                            <label for="name">Tiêu đề</label>
                            <input type="text" name="title" class="form-control m-input" value="{{old('title')}}">
                            @if($errors->has('title'))
                                <p class="text-danger">{{$errors->first('title')}}</p>
                            @endif
                        </div>


                        <div class="form-group m-form__group">
                            <label for="name">ID Video <span class="text-danger">*</span> </label>
                            <input type="text" name="video_id" class="form-control m-input" value="{{old('video_id')}}" >
                            @if($errors->has('video_id'))
                                <p class="text-danger">{{$errors->first('video_id')}}</p>
                            @endif
                        </div>
                        <div class="form-group m-form__group">
                            <label for="name">Miêu tả</label>
                            <textarea name="description" class="form-control m-input" rows="8">{{old('description')}}</textarea>
                            @if($errors->has('title'))
                                <p class="text-danger">{{$errors->first('title')}}</p>
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
    </script>
@endsection
