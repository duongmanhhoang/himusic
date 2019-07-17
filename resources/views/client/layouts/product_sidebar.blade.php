<div class="col-xl-3 col-lg-4 col-md-6 col-12 theme-siddebar">
    <div class="sidebar-data sidebar-search">
        <form action="" method="get">
            <input type="text" placeholder="Tìm kiếm sản phẩm" name="keyword">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div> <!-- /.sidebar-search -->
    <div class="sidebar-data sidebar-list">
        <h6 class="key-title" style="margin-bottom: 20px">Danh mục sản phẩm</h6>
        <ul>
            @foreach($categories as $category)
                <li><a href="{{route('client.products.categories.index' ,  $category->slug)}}">{{$category->name}} </a>
                </li>
            @endforeach
        </ul>
    </div> <!-- /.sidebar-list -->
    <div class="sidebar-data sidebar-recent-post">
        <ul>
            <li>
                <div class="tag">Sản phẩm mới</div>
                    @foreach($latest_products as $latest_product)
                        <div class="side-bar-new-product row">
                            <div class="col-4">
                                <img src="{{asset('uploads/products')}}/{{$latest_product->image}}"
                                     alt="{{ getImageName($latest_product->image) }}" class="img-fluid"
                                     style="width: 70px;">
                            </div>
                            <div class="col-8">
                                <a href="{{route('client.products.detail' , $latest_product->slug)}}" class="title">{{$latest_product->name}}</a>
                            </div>
                        </div>

                    @endforeach
            </li>
        </ul>
    </div> <!-- /.sidebar-recent-post -->
    <div class="sidebar-key">
        <h6 class="key-title">Thông tin liên hệ</h6>
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