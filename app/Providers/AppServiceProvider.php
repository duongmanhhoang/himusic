<?php

namespace App\Providers;

use App\Model\Category;
use App\Model\Event;
use App\Model\Post;
use App\Model\Product;
use App\Model\Setting;
use App\Model\Slide;
use App\Model\User;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Client
        View::composer(
            ['client.layouts.banner'],
            function ($view) {
                $banner = Event::orderBy('id', 'desc')->first();
                $view->with('banner', $banner);
            }
        );

        //Admin
        View::composer(
            ['admin.metronic.layout.header' ,'client.layouts.product_sidebar','client.layouts.post-sidebar','client.layouts.nav' ,'client.layouts.footer'],
            function ($view) {
                if(session('admin')){
                    $id = session('admin')->id;
                    $user  = User::where('id' , $id)->first();
                    $view->with('user', $user);
                }


                //web setting
                $setting = Setting::find(1);
                $view->with('setting' , $setting);

                //products categories
                $categories = Category::where('type','product')->get();
                $view->with('categories' , $categories);


                //posts categories
                $post_categories = Category::where('type','post')->get();
                $view->with('post_categories' , $post_categories);

                $product_parent_categories = Category::where('type' , 'product')->where('parent_id' , 0)->get();
                $view->with('product_parent_categories' , $product_parent_categories);

                $latest_products = Product::latest()->limit(3)->get();
                $view->with('latest_products' , $latest_products);

                $latest_posts = Post::latest()->limit(3)->get();
                $view->with('latest_posts' , $latest_posts);

                $post_parent_categories = Category::where('type' , 'post')->where('parent_id' , 0)->get();
                $view->with('post_parent_categories' , $post_parent_categories);
            }
        );
    }
}
