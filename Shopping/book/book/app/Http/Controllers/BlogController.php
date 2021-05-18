<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogcategoryindex()
    {
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Blog.BlogCategory.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function bloglistindex()
    {
        
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Blog.BlogList.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function blogpostindex()
    {
        
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Blog.BlogPost.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }
}
