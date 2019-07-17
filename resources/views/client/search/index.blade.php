@extends('client.templates.non-slides')
@section('title'){{'Tìm kiếm'}}@endsection
@section('content')

    @include('client.layouts.page-banner')




    <div class="our-event">
        <div class="container">
            <div class="main-wrapper" style="margin-bottom: 30px">
                <img src="{{asset('client/images/shape/23.png')}}" alt="" class="shape">

                @foreach($classes as $class)
                    <div class="table-responsive event-table">
                        <table class="table">
                            <tr>
                                <td class="date">Lớp học</td>
                                <td><img src="{{asset('uploads/classes')}}/{{$class->image}}" alt="{{$class->getImageName($class->image)}}" class="img-fluid" style="width: 70px"></td>
                                <td class="title">{{$class->name}}</td>
                                <td class="check-button"><a href="{{route('client.classes.detail' , $class->slug)}}">Chi tiết</a></td>
                            </tr>
                        </table>
                    </div>
                @endforeach
                @foreach($events as $event)
                    <div class="table-responsive event-table">
                        <table class="table">
                            <tr>
                                <td class="date">Sự kiện</td>
                                <td><img src="{{asset('uploads/events')}}/{{$event->image}}" alt="{{$event->getImageName($event->image)}}" class="img-fluid" style="width: 70px"></td>
                                <td class="title">{{$event->title}}</td>
                                <td class="check-button"><a href="{{route('client.events.detail' , $event->slug)}}">Chi tiết</a></td>
                            </tr>
                        </table>
                    </div>
                @endforeach
                @foreach($products as $product)
                    <div class="table-responsive event-table">
                        <table class="table">
                            <tr>
                                <td class="date">Sản phẩm</td>
                                <td><img src="{{asset('uploads/products')}}/{{$product->image}}" alt="{{$product->getImageName($product->image)}}" class="img-fluid" style="width: 70px"></td>
                                <td class="title">{{$product->name}}</td>
                                <td class="check-button"><a href="{{route('client.products.detail' , $product->slug)}}">Chi tiết</a></td>
                            </tr>
                        </table>
                    </div>
                @endforeach

                @foreach($posts as $post)
                    <div class="table-responsive event-table">
                        <table class="table">
                            <tr>
                                <td class="date">Bài viết</td>
                                <td><img src="{{asset('uploads/posts')}}/{{$post->image}}" alt="{{$post->getImageName($post->image)}}" class="img-fluid" style="width: 70px"></td>
                                <td class="title">{{$post->title}}</td>
                                <td class="check-button"><a href="{{route('client.posts.detail' , $post->slug)}}">Chi tiết</a></td>
                            </tr>
                        </table>
                    </div>
                @endforeach


            </div>
        </div>

@endsection
