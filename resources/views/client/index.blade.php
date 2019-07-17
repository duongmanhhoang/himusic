@extends('client.templates.main')
@section('title'){{'Trang chủ'}}@endsection

@section('content')
    <!--
			=============================================
				Our feature One
			==============================================
			-->
    <div class="section-spacing our-feature-one">
        <img src="{{ asset('uploads/static/1.png') }}" alt="himusic" class="shape">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="theme-title-one">
                        <h6 class="upper-title">Những lớp học mới nhất </h6>
                        <h2 class="main-title">Những khóa học mới nhất từ cơ bản tới nâng cao của Music</h2>
                    </div> <!-- /.theme-title-one -->
                    {{--<a href="about-us.html" class="theme-button-one button--tamaya color-one"--}}
                    {{--data-text="Learn More"><span>Learn More</span></a>--}}
                </div> <!-- /.col- -->
                <div class="col-lg-6">
                    @foreach ($new_classes as $new_class)
                        <div class="single-block" data-aos="fade-up" data-aos-delay="150">
                            <h6>{{ $new_class->name }} </h6>
                            <p>{{ $new_class->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.our-feature-one -->


    <!--
    =============================================
        About Us
    ==============================================
    -->
    <div class="section-spacing about-us">
        <img src="{{ asset('uploads/static/3.png') }}" alt="himusc" class="shape-two">
        <div class="main-container clearfix">
            <div class="inner-container left-content">
                <img src="{{ asset('uploads/static/2.png') }}" alt="himusic" class="shape" data-aos="zoom-in-up"
                     data-aos-duration="1000"
                     data-aos-delay="150">
                <div class="inner-col">
                    <div class="img-box">
                        <div class="dot" data-aos="fade-up" data-aos-delay="150"></div>
                        <div class="dot" data-aos="fade-up" data-aos-delay="350"></div>
                        <div class="dot" data-aos="fade-up" data-aos-delay="550"></div>
                        <div class="dot" data-aos="fade-up" data-aos-delay="750"></div>
                        <img src="{{ asset('uploads/static/1.jpg') }}" alt="himusic">
                    </div> <!-- /.img-box -->
                </div> <!-- /.inner-col -->
            </div> <!-- /.inner-container -->

            <div class="inner-container right-content">
                <div class="wrapper">
                    <div class="theme-title-one">
                        <h6 class="upper-title">Thành lập từ năm 2010</h6>
                        <h2 class="main-title">Hãy cùng tham gia với chúng tôi</h2>
                    </div> <!-- /.theme-title-one -->
                    <p>Với quá trình hoạt động được gần 10 năm, Himusic đã đào tạo ra rất nhiều tài năng trẻ. Vậy bạn
                        còn chần chừ gì nữa mà không tham gia ngay với chúng tôi</p>
                    <ul class="ceo-info clearfix">
                        <li><img src="{{ asset('uploads/static/sign.png') }}" alt="himusic"></li>
                        <li class="info">
                            <img src="{{ asset('uploads/static/2.jpg') }}" alt="himusic" class="ceo-image">
                            <div class="name">
                                <h6>Ánh Dương</h6>
                                <p>CEO & Founder of Himusic</p>
                            </div>
                        </li>
                    </ul>
                </div> <!-- /.wrapper -->
            </div> <!-- /.inner-container -->
        </div> <!-- /.main-container -->
    </div> <!-- /.about-us -->


    <!--
    =============================================
        Our Service
    ==============================================
    -->
    <div class="section-spacing">
        <div class="our-services">
            <img src="{{ asset('uploads/static/5.png') }}" alt="himusic" class="shape-one">
            <img src="{{ asset('uploads/static/6.png') }}" alt="himusic" class="shape-two">
            <div class="container">
                <div class="theme-title-two">
                    <h2 class="main-title">Loại hình giảng dạy</h2>
                    <p>Himusic cung cấp rất nhiều các lớp học ở những lĩnh vực khác nhau</p>
                    {{--<a href="#" class="theme-button-one button--tamaya color-one" data-text="Xem tất cả"><span>Xem tất cả</span></a>--}}
                </div> <!-- /.theme-title-two -->

                <div class="row">
                    @php($i = 1)
                    @foreach($types as $type)
                        <div class="col-lg-4">
                            <div class="service-block">
                                <div class="num"><img src="{{ asset('uploads/classes') }}/{{ $type->image }}"
                                                      width="62px" class="icon"></i> <span>{{ $i }}</span></div>
                                <h6>{{ $type->name }}</h6>
                                <p>{{ $type->description }}</p>
                                <a href="#" class="theme-button-two">Xem thêm <span></span></a>
                            </div> <!-- /.service-block -->
                        </div>
                        @php($i++)
                    @endforeach
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.our-services -->
    </div>


    <!--
    =============================================
        Our Fact
    ==============================================
    -->
    {{--<div class="section-spacing">--}}
    {{--<div class="our-fact">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-6"><h2 class="main-title">Last year we proved that we’re the best Dance--}}
    {{--Services </h2></div>--}}
    {{--<div class="col-lg-6"><p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod--}}
    {{--tempor incididunt ut labore et dolore magna aliqua.</p></div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-6 col-12">--}}
    {{--<div class="counter-section">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="single-counter-box">--}}
    {{--<h2 class="number"><span class="timer" data-from="0" data-to="20"--}}
    {{--data-speed="1200" data-refresh-interval="5">0</span>+--}}
    {{--</h2>--}}
    {{--<p>Certified Trainer</p>--}}
    {{--</div> <!-- /.single-counter-box -->--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="single-counter-box">--}}
    {{--<h2 class="number"><span class="timer" data-from="0" data-to="1300"--}}
    {{--data-speed="1200" data-refresh-interval="5">0</span>+--}}
    {{--</h2>--}}
    {{--<p>Verified Happy Client</p>--}}
    {{--</div> <!-- /.single-counter-box -->--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="single-counter-box">--}}
    {{--<h2 class="number"><span class="timer" data-from="0" data-to="150"--}}
    {{--data-speed="1200" data-refresh-interval="5">0</span>+--}}
    {{--</h2>--}}
    {{--<p>Time Award Winner</p>--}}
    {{--</div> <!-- /.single-counter-box -->--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
    {{--<div class="single-counter-box">--}}
    {{--<h2 class="number"><span class="timer" data-from="0" data-to="280"--}}
    {{--data-speed="1200" data-refresh-interval="5">0</span>+--}}
    {{--</h2>--}}
    {{--<p>Features added</p>--}}
    {{--</div> <!-- /.single-counter-box -->--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div> <!-- /.counter-section -->--}}
    {{--</div> <!-- /.col- -->--}}

    {{--<div class="col-lg-6 col-12">--}}
    {{--<div class="strategy-section">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-6 strategy-block">--}}
    {{--<div>--}}
    {{--<div class="icon"><i class="flaticon-007-ballet"></i></div>--}}
    {{--<h6>Dance Schedule</h6>--}}
    {{--<p>Find out what's happening by viewing our full schedule of classes.</p>--}}
    {{--</div>--}}
    {{--</div> <!-- /.strategy-block -->--}}
    {{--<div class="col-sm-6 strategy-block">--}}
    {{--<div>--}}
    {{--<div class="icon"><i class="flaticon-008-ballet-1"></i></div>--}}
    {{--<h6>Professional dance</h6>--}}
    {{--<p>Find out what's happening by viewing our full schedule of classes.</p>--}}
    {{--</div>--}}
    {{--</div> <!-- /.strategy-block -->--}}
    {{--</div> <!-- /.row -->--}}
    {{--</div> <!-- /.strategy-section -->--}}
    {{--</div>--}}
    {{--</div> <!-- /.row -->--}}
    {{--</div> <!-- /.container -->--}}
    {{--</div> <!-- /.our-fact -->--}}
    {{--</div>--}}


    <!--
    =====================================================
        Our Classes
    =====================================================
    -->
    <div class="section-spacing our-classes">
        <div class="container">
            <div class="theme-title-two">
                <h2 class="main-title">Lớp học</h2>
                <a href="our-class.html" class="theme-button-one button--tamaya color-one"
                   data-text="Xem tất cả"><span>Xem tất cả</span></a>
            </div> <!-- /.theme-title-two -->
        </div> <!-- /.container -->
        <div class="main-container">
            <div class="class-slider">
                @foreach ($classes as $class)
                    <div class="item">
                        <div class="single-block">
                            <div class="img-box"><img src="{{ asset('uploads/classes') }}/{{ $class->image }}" alt="{{ getImageName($class->image) }}" class="classes-img">
                            </div>
                            <div class="text">
                                <h6><a href="{{ route('client.classes.detail' , $class->slug) }}">{{ $class->name }}</a></h6>
                                <p>{{ $class->description }}</p>
                                <a href="{{ route('client.classes.detail' , $class->slug) }}" class="theme-button-two">Chi tiết <span></span></a>
                            </div>
                        </div> <!-- /.single-block -->
                    </div>
                @endforeach
            </div> <!-- /.row -->
        </div> <!-- /.main-container -->
    </div> <!-- /.our-classes -->




    <!--
    =====================================================
        Short Banner
    =====================================================
    -->
    {{--<div class="section-spacing">--}}
    {{--<div class="short-banner">--}}
    {{--<h2>Online Dance Classes With The <br>World's Best Instructors</h2>--}}
    {{--<a href="#" class="button-style">Start Dance TODAY</a>--}}
    {{--<img src="images/shape/7.png" alt="" class="shape-one">--}}
    {{--<img src="images/shape/8.png" alt="" class="shape-two">--}}
    {{--</div> <!-- /.short-banner -->--}}
    {{--</div>--}}



    <!--
    =====================================================
        Client Slider
    =====================================================
    -->
    <div class="section-spacing">
        <div class="client-section">
            <div class="theme-title-one text-center">
                <h6 class="upper-title">Đánh giá</h6>
                <h2 class="main-title">Đánh giá của học viên</h2>
            </div> <!-- /.theme-title-one -->
            <div class="wrapper">
                <div class="client-slider">
                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="text-wrapper">
                                <p>{{ $testimonial->detail }}</p>
                                <img src="{{ asset('uploads/testimonials') }}/{{ $testimonial->image }}" alt="{{ getImageName($testimonial->image) }}">
                            </div>
                        </div>
                    @endforeach
                </div> <!-- /.client-slider -->
            </div> <!-- /.wrapper -->
        </div> <!-- /.client-section -->
    </div>



    <!--
    =====================================================
        Our Event
    =====================================================
    -->
    <div class="section-spacing our-event">
        <div class="container">
            <div class="theme-title-one text-center">
                <h6 class="upper-title">Sự kiện</h6>
                <h2 class="main-title">Những sự kiện mới nhất</h2>
            </div> <!-- /.theme-title-one -->
            <div class="main-wrapper">
                <img src="{{ asset('uploads/static/23.png') }}" alt="himusic" class="shape">
                @foreach($events as $event)
                    <div class="table-responsive event-table">
                        <table class="table">
                            <tr>
                                <td class="date">{{ getDateEvent($event->start_at) }}</td>
                                <td class="time">Bắt đầu lúc: {{ getTime($event->start_at) }}</td>
                                <td class="title">{{$event->title}}</td>
                                <td class="check-button"><a href="{{route('client.events.detail' , $event->slug)}}">Chi tiết</a></td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.section-spacing -->

@endsection
@section('script')
    <script>
        @if(session('checkout'))
        swal('Đặt hàng thành công', '', 'success')
        @endif
    </script>
@endsection