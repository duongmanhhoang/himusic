@extends('client.templates.non-slides')
@section('title'){{$class->name}}@endsection
@section('content')

    @include('client.layouts.page-banner')

    <div class="section-spacing our-class-details">
        <div class="container">
            <img src="{{asset('uploads/classes')}}/{{$class->image}}"
                 alt="{{$class->getImageName($class->image)}}" class="main-img">
            <h2 class="title">{{$class->name}}</h2>
            {!! $class->body !!}
        </div>

    </div>
    <div class="container">
        @if($images->count() > 0)
            <div class="client-section section-spacing">
                <div class="theme-title-one text-center">
                    <h2 class="main-title">Hình ảnh</h2>
                </div> <!-- /.theme-title-one -->
                <div class="wrapper">
                    <div class="client-slider">
                        @foreach($images as $image)
                            <div class="item">
                                <img src="{{asset('uploads/images')}}/{{$image->name}}" class="slide-img-item classes-img-slide">
                            </div>
                        @endforeach

                    </div> <!-- /.client-slider -->
                </div> <!-- /.wrapper -->
            </div>
        @endif


            @if($videos->count() > 0)
                <div class="section-spacing section-spacing-bottom">
                    <div class="client-section">
                        <div class="theme-title-one text-center">
                            <h2 class="main-title">Videos</h2>
                        </div> <!-- /.theme-title-one -->
                        <div class="wrapper">
                            <div class="client-slider">
                                @foreach($videos as $video)
                                    <div class="item who-can-attend">
                                        <div class="video-holder"
                                             style="background-image: url('https://i.ytimg.com/vi/{{$video->url}}/maxresdefault.jpg');">

                                            <a data-fancybox="" href="https://www.youtube.com/watch?v={{$video->url}}"
                                               class="play-video fancybox"> <span class="flaticon-003-play-button"></span></a>
                                        </div>
                                    </div>
                                @endforeach

                            </div> <!-- /.client-slider -->
                        </div> <!-- /.wrapper -->
                    </div> <!-- /.client-section -->
                </div>
            @endif
    </div>





@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000
            });
        });
    </script>
@endsection
