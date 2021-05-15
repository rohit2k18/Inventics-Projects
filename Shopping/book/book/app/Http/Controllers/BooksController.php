<?php

namespace App\Http\Controllers;

use DB;
use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    
    public function index()
    {
        //withour join
        // $group_name=DB::table('category_groups')->where('name','Electronics')->first();
        
        // $sub_grouptest=DB::table('category_sub_groups')->where('category_group_id',$group_name->id)->get();
        

        // foreach($sub_grouptest as $su)
        // {
        //     $sub_grouptest=DB::table('categories')->where('category_group_id',$group_name->id)->get();
        
        // }
        
        // dd($sub_grouptest);


        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($sub_categories);
        $tempBooks=true;
        
        return view('Books.index',compact('tempBooks','categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function product_cat_Index($name)
    {
        $cat_product=$this->getcategoriesproduct();
        return view('CommonContent.producttest',compact('cat_product'));
    }

    public function productindex($slug,Request $request)
    {
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct();
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;

        $product=DB::table('products')->where('slug',$slug)->first();
        //$product_category=DB::table('categories')->where('id','');
        $product_images=DB::table('images')->where('imageable_id',$product->id)->get();
        //dd($product_images);
        $current_subgroup=$request->s;
        $current_category=$request->c;
        $tempProduct=true;
        return view('Product.index',compact('tempProduct','categories','sub_categories','cat_product','img_url','product','product_images','current_currency','current_subgroup','current_category'));
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
