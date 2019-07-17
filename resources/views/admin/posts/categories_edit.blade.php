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
                                        Sửa danh mục
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"
                              action="{{route('admin.posts.categories.update' , $category->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10">
                                    <div class="alert alert-danger" role="alert">
                                        Vui lòng không bỏ trống nhưng ô có đánh dấu *
                                    </div>

                                </div>

                                <div class="form-group m-form__group">
                                    <label>Tên danh mục <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control m-input"
                                           value="{{old('name' , $category->name)}}">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                @if($parent == false)
                                    <div class="form-group m-form__group">
                                        <label>Danh mục cha</label>
                                        <select id="categories" name="parent_id" class="form-control m-input">
                                            <option></option>
                                            <option value="0">Không có</option>
                                            @foreach($parents as $item)
                                                <option value="{{$item->id}}" @if($item->id == $category->parent_id){{'selected'}}@endif>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif


                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
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
        swal('Cập nhập danh mục thành công' , '' , 'success');
        @endif
        $("#categories").select2({placeholder: "Chọn danh mục"})
    </script>
@endsection