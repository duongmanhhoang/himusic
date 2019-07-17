@extends('client.templates.non-slides')
@section('title'){{'Lớp học'}}@endsection
@section('content')

    @include('client.layouts.page-banner')

    <div class="our-classes">
        <div class="main-container">
            <div class="row">
                @foreach($classes as $class)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="single-block">
                            <div class="img-box"><img src="{{asset('uploads/classes')}}/{{$class->image}}" alt="{{$class->getImageName($class->image)}}" class="classes-img"></div>
                            <div class="text">
                                <h6><a href="{{route('client.classes.detail' , $class->slug)}}">{{$class->name}}</a></h6>
                                <p>{{$class->description}}</p>
                                <a href="{{route('client.classes.detail' , $class->slug)}}" class="theme-button-two">Chi tiết <span></span></a>
                            </div>
                        </div> <!-- /.single-block -->
                    </div>
                @endforeach

                <div class="col-12" style="margin-bottom: 30px">
                    {{$classes->links()}}
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.main-container -->
    </div>
@endsection
