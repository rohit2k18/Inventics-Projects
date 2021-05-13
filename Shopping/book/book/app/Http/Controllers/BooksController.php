<?php

namespace App\Http\Controllers;

use DB;
use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    
    public function index()
    {
        
        $categories=DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        ->where('category_groups.name',$this->my_category)->get();
        
        $sub_categories=DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
        ->where('category_groups.name',$this->my_category)
        ->select('categories.*','category_sub_groups.name as cat_sub_name')->get();

        //getting without images
        // $cat_product=DB::table('category_groups')
        // ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        // ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
        // ->join('category_product', 'categories.id', '=', 'category_product.category_id')
        // ->join('products', 'category_product.product_id', '=', 'products.id')
        // ->where('category_groups.name','Electronics')
        // ->select('products.*')->inRandomOrder()->get();

        //getting with images
        $cat_product=DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
        ->join('category_product', 'categories.id', '=', 'category_product.category_id')
        ->join('products', 'category_product.product_id', '=', 'products.id')
        ->join('images', 'products.id', '=', 'images.imageable_id')
        ->where('category_groups.name',$this->my_category)
        ->where('images.imageable_type','App\Product')
        ->select('products.*','images.path as img_path','images.name as img_name')->inRandomOrder()->get();

        //dd($sub_categories);
        $tempBooks=true;
        $img_url=$this->server_image_path;
        return view('Books.index',compact('tempBooks','categories','sub_categories','cat_product','img_url'));
    }

    public function product_cat_Index($name)
    {
        $cat_product=DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
        ->join('category_product', 'categories.id', '=', 'category_product.category_id')
        ->join('products', 'category_product.product_id', '=', 'products.id')
        ->join('images', 'products.id', '=', 'images.imageable_id')
        ->where('category_groups.name',$this->my_category)
        ->where('images.imageable_type','App\Product')
        ->select('products.*','images.path as img_path','images.name as img_name')->inRandomOrder()->get();
        return view('CommonContent.producttest',compact('cat_product'));
    }

    public function productindex()
    {
        $tempProduct=true;
        return view('Product.index',compact('tempProduct'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Books $books)
    {
        //
    }

    
    public function edit(Books $books)
    {
        //
    }

    
    public function update(Request $request, Books $books)
    {
        //
    }

    public function destroy(Books $books)
    {
        //
    }
    //image path : http://zcommerce.online/image/
}
