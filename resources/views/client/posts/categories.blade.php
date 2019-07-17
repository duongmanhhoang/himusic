@extends('client.templates.non-slides')
@section('title'){{$category->name}}@endsection
@section('content')
    @include('client.layouts.page-banner')

    <div class="section-spacing section-spacing-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12 blog-list">
                    @foreach($posts as $post)
                        <div class="single-blog-post">
                            <div class="img-box"><img src="{{asset('uploads/posts')}}/{{$post->image}}" alt="{{ getImageName($post->image) }}"></div>
                            <div class="post-meta">
                                <ul class="date-meta">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ createdAt($post) }}</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i> {{$post->views}}</li>
                                </ul>
                                <h2 class="blog-title"><a href="{{route('client.posts.detail' , $post->slug)}}">{{$post->title}}</a></h2>
                                <p>{{$post->description}}</p>
                                <a href="{{route('client.posts.detail' , $post->slug)}}" class="read-more">Xem thêm</a>
                            </div> <!-- /.post-meta -->
                        </div>
                    @endforeach



                    {{$posts->links()}}

                </div>

                @include('client.layouts.post-sidebar')
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>

@endsection
