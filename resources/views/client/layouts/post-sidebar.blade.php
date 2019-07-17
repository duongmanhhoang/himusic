<div class="col-xl-3 col-lg-4 col-md-6 col-12 theme-siddebar">
    <div class="sidebar-data sidebar-search">
        <form action="{{route('client.posts.index')}}" method="get">
            <input type="text" placeholder="Search" name="keyword">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div> <!-- /.sidebar-search -->
    <div class="sidebar-data sidebar-list">
        <h6 class="key-title" style="margin-bottom: 20px">Danh mục sản phẩm</h6>
        <ul>
            @foreach($post_categories as $category)
                <li><a href="{{route('client.products.categories.index' ,  $category->slug)}}">{{$category->name}} </a>
                </li>
            @endforeach
        </ul>
    </div>  <!-- /.sidebar-list -->
    <div class="sidebar-data sidebar-recent-post">
        <h6 class="key-title" style="margin-bottom: 20px">Bài viết mới nhất</h6>
        <ul>
            @foreach($latest_posts as $latest_post)
                <li>
                    <a href="{{route('client.posts.detail', $latest_post->slug)}}" class="title">{{$latest_post->title}}</a>
                    <div class="date">{{$latest_post->createdAt($latest_post)}}</div>
                    <a href="{{route('client.posts.detail', $latest_post->slug)}}" class="read-more">Xem thêm <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </li>
            @endforeach
        </ul>
    </div> <!-- /.sidebar-recent-post -->
    <div class="sidebar-key">
        <h6 class="key-title">Staff Contacts</h6>
        <ul>
            <li>
                <a href="#">Steven J. Joffe</a>
                <p>Senior Managing Director</p>
            </li>
            <li>
                <a href="#">Larry Portal</a>
                <p>Senior Managing Director</p>
            </li>
        </ul>
    </div> <!-- /.sidebar-key -->
</div>