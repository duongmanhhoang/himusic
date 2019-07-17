@extends('client.templates.non-slides')
@section('title'){{$event->title}}@endsection
@section('content')

    @include('client.layouts.page-banner')


    <!--
    =====================================================
        Event Details
    =====================================================
    -->

    <div class="section-spacing">
        <div class="event-details">
            <div class="event-uppper-text">
                <div class="container">
                    <div class="row" style="margin-top: 30px">
                        <div class="col-lg-6 order-lg-last">
                            <div class="text-wrapper">
                                <img src="{{asset('client/images/shape/25.png')}}" alt="" class="shape-one">
                                <div class="theme-title-one">
                                    <h2 class="main-title">{{$event->title}} </h2>
                                </div> <!-- /.theme-title-one -->
                                {!! $event->body !!}
                            </div> <!-- /.text-wrapper -->
                        </div>
                        <div class="col-lg-6 order-lg-first"><img src="{{asset('uploads/events')}}/{{$event->image}}"
                                                                  alt="{{ getImageName($event->image) }}"
                                                                  class="event-img"></div>
                    </div>
                    @if($images->count() > 0)
                    <div class="section-spacing">
                        <div class="client-section">
                            <div class="theme-title-one text-center">
                                <h2 class="main-title">Hình ảnh</h2>
                            </div> <!-- /.theme-title-one -->
                            <div class="wrapper">
                                <div class="client-slider">
                                    @foreach($images as $image)
                                        <div class="item">
                                            <img src="{{asset('uploads/images')}}/{{$image->name}}" class="slide-img-item events-img-slide">
                                        </div>
                                    @endforeach

                                </div> <!-- /.client-slider -->
                            </div> <!-- /.wrapper -->
                        </div> <!-- /.client-section -->
                    </div>
                    @endif

                    @if($videos->count() > 0)
                    <div class="section-spacing">
                        <div class="client-section">
                            <div class="theme-title-one text-center">
                                <h2 class="main-title">Videos</h2>
                            </div> <!-- /.theme-title-one -->
                            <div class="wrapper">
                                <div class="client-slider">
                                    @foreach($videos as $video)
                                        <div class="item who-can-attend">
                                            <div class="video-holder" style="background-image: url('https://i.ytimg.com/vi/{{$video->url}}/maxresdefault.jpg');">

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

                    <div class="row event-bottom-data">
                        <div class="col-md-6">
                            <div class="details-box">
                                <h6 class="box-title">Thông tin sự kiện</h6>
                                <table>
                                    <tr>
                                        <td>Bắt đầu:</td>
                                        <td>{{ getTime($event->start_at) }}
                                            ngày {{ getDateEvent($event->start_at) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kết thúc:</td>
                                        <td>{{ getTime($event->end_at) }}
                                            ngày {{ getDateEvent($event->end_at) }}</td>
                                    </tr>
                                </table>
                            </div> <!-- /.details-box -->
                        </div>
                        <div class="col-md-6">
                            <div class="details-box">
                                <h6 class="box-title">Thông tin sự kiện</h6>
                                <table>
                                    <tr>
                                        <td>Địa chỉ:</td>
                                        <td>{{$event->address}}</td>
                                    </tr>
                                    <tr class="color-fix">
                                        <td>Link:</td>
                                        <td>{{$event->link}}</td>
                                    </tr>
                                </table>
                            </div> <!-- /.details-box -->
                        </div>

                        <div class="col-12">
                            <div class="row no-gutters details-box">
                                <div class="col-lg-5">
                                    <div class="clearfix">
                                        <h6 class="box-title">Thông tin nhà tổ chức</h6>
                                        <table>
                                            <tr>
                                                <td>Tên:</td>
                                                <td>{{$event->organizer_name}}</td>
                                            </tr>
                                            <tr class="color-fix">
                                                <td>Số điện thoại:</td>
                                                <td>{{$event->organizer_phone}}</td>
                                            </tr>
                                            <tr class="color-fix">
                                                <td>Email :</td>
                                                <td>{{$event->organizer_email}}</td>
                                            </tr>
                                        </table>
                                    </div> <!-- /.clearfix -->
                                </div>
                                <div class="col-lg-7"><img src="{{asset('client/images/shape/map.png')}}" alt=""
                                                           class="map"></div>
                            </div>
                        </div>
                    </div> <!-- /.event-bottom-data -->
                </div>
            </div> <!-- /.event-uppper-text -->
        </div> <!-- /.event-details -->
    </div>

@endsection
