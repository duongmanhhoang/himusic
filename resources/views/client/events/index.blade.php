@extends('client.templates.non-slides')
@section('title'){{'Sự kiện'}}@endsection
@section('content')

    @include('client.layouts.page-banner')


    <div class="section-spacing">
        <div class="event-details">
            <div class="event-uppper-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 order-lg-last">
                            <div class="text-wrapper">

                                <img src="{{asset('client/images/shape/25.png')}}"
                                     alt="{{$latest_event->getImageName($latest_event->image)}}" class="shape-one">
                                <div class="theme-title-one">
                                    <h2 class="main-title">{{$latest_event->title}}</h2>
                                </div> <!-- /.theme-title-one -->
                                <p>{!! substr($latest_event->body , 0 , 200) !!}</p>
                                <div class="date">Bắt đầu vào : {{$latest_event->getTime($latest_event->start_at)}}
                                    ngày {{$latest_event->getDate($latest_event->start_at)}}</div>
                                <a href="#" class="button-one">Xem thêm</a>
                                <div id="count" class="clearfix row"></div>
                            </div> <!-- /.text-wrapper -->
                        </div>
                        <div class="col-lg-6 order-lg-first"><img
                                    src="  {{asset('uploads/events')}}/{{$latest_event->image}}"
                                    alt="{{$latest_event->getImageName($latest_event->image)}}" class="event-img"></div>
                    </div>
                </div>
            </div> <!-- /.event-uppper-text -->
        </div> <!-- /.event-details -->
    </div>



    <div class="section-spacing our-event">
        <div class="container">
            <div class="theme-title-one text-center">
                <h2 class="main-title">Các Sự Kiện Mới Nhất</h2>
            </div> <!-- /.theme-title-one -->
            <div class="main-wrapper" style="margin-bottom: 30px">
                <img src="{{asset('client/images/shape/23.png')}}" alt="" class="shape">
                @foreach($events as $event)
                    <div class="table-responsive event-table">
                        <table class="table">
                            <tr>
                                <td class="date">{{$event->getDate($event->start_at)}}</td>
                                <td class="time">Bắt đầu lúc: {{$event->getTime($event->start_at)}}</td>
                                <td class="title">{{$event->title}}</td>
                                <td class="check-button"><a href="{{route('client.events.detail' , $event->slug)}}">Chi tiết</a></td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>

            {{$events->links()}}
        </div>
@endsection
