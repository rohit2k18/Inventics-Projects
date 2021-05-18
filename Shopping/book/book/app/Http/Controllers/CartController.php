<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Cart.CartPage.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function emptycartindex()
    {
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Cart.EmptyCart.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function checkoutcartindex()
    {
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Cart.EmptyCart.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }
}
