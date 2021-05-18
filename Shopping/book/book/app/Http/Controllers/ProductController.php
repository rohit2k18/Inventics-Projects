<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function productindex($cat_group,$cat_name,$slug)
    {
        
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct();
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;

        $product=DB::table('products')->where('slug',$slug)->first();
        $product_images=DB::table('images')->where('imageable_id',$product->id)->get();
        $current_subgroup=DB::table('category_sub_groups')
        ->where('slug',$cat_group)->first();
        $current_category=DB::table('categories')
        ->where('slug',$cat_name)->first();
        // dd($current_category);
        // $tempProduct=true;
        return view('Product.index',compact('categories','sub_categories','cat_product','img_url','product','product_images','current_currency','current_subgroup','current_category'));
    }
}
