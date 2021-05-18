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

    public function getcategoriesproduct()
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

    //getting without images
        // $cat_product=DB::table('category_groups')
        // ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        // ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
        // ->join('category_product', 'categories.id', '=', 'category_product.category_id')
        // ->join('products', 'category_product.product_id', '=', 'products.id')
        // ->where('category_groups.name','Electronics')
        // ->select('products.*')->inRandomOrder()->get();
}
