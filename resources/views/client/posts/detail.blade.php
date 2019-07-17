<?php
$post->increment('views');
?>
@extends('client.templates.non-slides')
@section('title'){{$post->title}}@endsection
@section('content')
    @include('client.layouts.page-banner')

    <div class="section-spacing section-spacing-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12 blog-details">
                    <div class="single-blog-post">
                        <div class="img-box"><img src="{{asset('uploads/posts')}}/{{$post->image}}" alt="{{ getImageName($post->image) }}"></div>
                        <div class="post-meta">
                            <ul class="date-meta">
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ createdAt($post) }}</li>
                                <li><i class="fa fa-comments" aria-hidden="true"></i> {{$post->views}}</li>
                            </ul>
                            <h2 class="blog-title">{{$post->title}}</h2>
                            {!! $post->body !!}


                            <div class="clearfix bottom-widget">
                                @include('client.layouts.sharing-btn')
                            </div>
                        </div> <!-- /.post-meta -->

                    </div> <!-- /.single-blog -->
                </div> <!-- /.blog-list -->

                @include('client.layouts.post-sidebar')
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
@endsection
