<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $server_image_path="http://zcommerce.online/image/";
    public $my_category='Electronics';//Apparel,Books,Electronics
    public $my_banner_category="Fashion";
    public $current_currency="Rs.";

    public function getsubgroup()
    {
        return DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        ->where('category_groups.name',$this->my_category)->get();
    }

    public function getsubgroupcategories()
    {
        return DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
        ->where('category_groups.name',$this->my_category)
        ->select('categories.*','category_sub_groups.name as cat_sub_name')->get();
    }

    public function getcategoriesproduct($order="random")//random, latest
    {
        if($order=="random")
        {
            return DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('images', 'products.id', '=', 'images.imageable_id')
            ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Product')
            ->select('products.*','images.path as img_path','images.name as img_name','categories.slug as product_cat','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')->inRandomOrder()->get();
        }
        elseif($order=="latest")
        {
            return DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('images', 'products.id', '=', 'images.imageable_id')
            ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Product')
            ->select('products.*','images.path as img_path','images.name as img_name','categories.slug as product_cat','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')->orderBy('updated_at', 'DESC')->get();
        
        }
        
    }

    public function getBanners()
    {
        return DB::table('banners')
        ->join('images', 'banners.id', '=', 'images.imageable_id')
        ->where('banners.store_type',$this->my_banner_category)
        // ->where('images.imageable_type','App\Banner')
        ->select('banners.*','images.path as img_path')->get();
    }

    public function getSlider()
    {
        return DB::table('sliders')
        ->join('images', 'sliders.id', '=', 'images.imageable_id')
        ->where('sliders.store_type','Sports')
        // ->where('images.imageable_type','App\Slider')
        ->select('sliders.*','images.path as img_path')->first();
    }

    //--------------------------------------------------------blogs area ------start
    public function getblogs($slug=null)
    {
        if($slug==null)
        {
            return DB::table('blogs')
            ->join('images', 'blogs.id', '=', 'images.imageable_id')
            ->join('platforms', 'blogs.platform_id', '=', 'platforms.id')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->where('blogs.status','1')
            ->where('blogs.approved','1')
            ->where('images.imageable_type','App\Blog')
            ->select('blogs.*','images.path as img_path','users.name as user_name','platforms.name as platoform_name','platforms.slug as platoform_slug')
            ->orderBy('updated_at', 'DESC')->paginate(6);
        }
        else
        {
            return DB::table('blogs')
            ->join('images', 'blogs.id', '=', 'images.imageable_id')
            ->join('platforms', 'blogs.platform_id', '=', 'platforms.id')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->where('blogs.status','1')
            ->where('blogs.approved','1')
            ->where('images.imageable_type','App\Blog')
            ->where('blogs.slug',$slug)
            ->select('blogs.*','images.path as img_path','users.name as user_name','platforms.name as platoform_name','platforms.slug as platoform_slug')
            ->first();
        }
        
    }

    public function getcurrentBlogComments($blog_slug)
    {
        return DB::table('blog_comments')
        ->join('blogs', 'blogs.id', '=', 'blog_comments.blog_id')
        ->join('users', 'users.id', '=', 'blog_comments.user_id')
        ->where('blogs.slug',$blog_slug)
        ->select('blog_comments.*','blogs.slug as blog_slug','users.name as user_name','users.sex as user_gender')
        ->orderBy('created_at', 'DESC')->get();
    }

    public function getBlogTags($blog_slug=null)
    {
        if($blog_slug==null)
        {
            return DB::table('blogs')
            ->join('taggables', 'taggables.taggable_id', '=', 'blogs.id')
            ->join('tags', 'tags.id', '=', 'taggables.tag_id')
            ->select('tags.*','blogs.slug as blog_slug')
            ->orderBy('created_at', 'DESC')->get();
        }
        else
        {
            return DB::table('blogs')
            ->join('taggables', 'taggables.taggable_id', '=', 'blogs.id')
            ->join('tags', 'tags.id', '=', 'taggables.tag_id')
            ->where('blogs.slug',$blog_slug)
            ->select('tags.*','blogs.slug as blog_slug')
            ->orderBy('created_at', 'DESC')->get();
        }
    }
//---------------------------------------------------------blogs area ------end

}
