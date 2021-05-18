<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Category.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function ecategoryindex()
    {
        
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Category.EmptyCategory.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }
}
