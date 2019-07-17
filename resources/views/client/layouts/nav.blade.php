<div class="top-header-section">
    <header class="theme-main-menu clearfix">
        <div class="logo"><a href="index-2.html"><img src="images/logo/logo.png" alt=""></a></div>

        <div class="right-widget">
            <ul class="clearfix">
                <li class="cart-button"><a href="{{route('client.cart.index')}}"><i
                                class="cart flaticon-001-shopping-bag"></i>@if(session('cart') && sizeof(session('cart')) > 0)
                            ({{sizeof(session('cart'))}})@endif</a>
                </li>
                <li class="search-option">
                    <div class="dropdown">
                        <button type="button" class="dropdown-button" data-toggle="dropdown"><i
                                    class="flaticon-002-search"></i></button>
                        <form action="{{route('client.search')}}" method="get" class="dropdown-menu dropdown-menu-right">
                            <input type="text" Placeholder="Enter Your Search" name="keyword">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div> <!-- /.right-widget -->


        <!-- ============== Menu Warpper ================ -->
        <div class="menu-wrapper">
            <nav id="mega-menu-holder" class="clearfix">
                <ul class="clearfix">
                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="{{route('client.events.index')}}">Sự kiện</a>
                    </li>
                    <li><a href="{{route('client.classes.index')}}">Lớp học</a>
                    </li>
                    <li><a href="{{route('client.products.index')}}">Sản phẩm</a>
                        <ul class="dropdown">
                            @foreach($product_parent_categories as $product_parent_category)
                                <li>
                                    <a href="{{route('client.products.categories.index' , $product_parent_category->slug)}}">{{$product_parent_category->name}}</a>
                                    <?php
                                    $categories = \App\Model\Category::where('parent_id', $product_parent_category->id)->get();
                                    ?>
                                    @if($categories->count() > 0)
                                        <ul>


                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{route('client.products.categories.index' , $category->slug)}}">{{$category->name}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    @endif
                                </li>

                            @endforeach
                        </ul>
                    </li>

                    <li><a href="{{route('client.posts.index')}}">Tin tức</a>
                        <ul class="dropdown">
                            @foreach($post_parent_categories as $post_parent_category)
                                <li>
                                    <a href="{{route('client.posts.categories.index' , $post_parent_category->slug)}}">{{$post_parent_category->name}}</a>
                                    <?php
                                    $categories = \App\Model\Category::where('parent_id', $post_parent_category->id)->get();
                                    ?>
                                    @if($categories->count() > 0)
                                        <ul>


                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{route('client.posts.categories.index' , $category->slug)}}">{{$category->name}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    @endif
                                </li>

                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('client.contact')}}">Liên hệ</a></li>
                </ul>
            </nav> <!-- /#mega-menu-holder -->
        </div> <!-- /.menu-wrapper -->
    </header> <!-- /.theme-main-menu -->
</div>
