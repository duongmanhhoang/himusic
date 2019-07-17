<div id="theme-main-banner" class="banner-one">
    <div data-src="{{asset('uploads/events')}}/{{ $banner->image }}">
        <div class="camera_caption">
            <div class="container">
                <h1 class="wow fadeInUp animated">{{ $banner->title }}</h1>
               <a href="{{route('client.events.detail' , $banner->slug)}}" class="read-more wow fadeInLeft animated" data-wow-delay="0.8s">Chi tiết <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
            </div> <!-- /.container -->
        </div> <!-- /.camera_caption -->
    </div>
</div>