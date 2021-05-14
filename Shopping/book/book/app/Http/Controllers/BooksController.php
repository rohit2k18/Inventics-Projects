<?php

namespace App\Http\Controllers;

use DB;
use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    
    public function index()
    {
        
        $categories=$this->getsubgroup();
        
        $sub_categories=$this->getsubgroupcategories();

        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($sub_categories);
        $tempBooks=true;
        $img_url=$this->server_image_path;
        return view('Books.index',compact('tempBooks','categories','sub_categories','cat_product','img_url'));
    }

    public function product_cat_Index($name)
    {
        $cat_product=$this->getcategoriesproduct();
        return view('CommonContent.producttest',compact('cat_product'));
    }

    public function productindex($slug)
    {
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct();
        $img_url=$this->server_image_path;
        $tempProduct=true;
        return view('Product.index',compact('tempProduct','categories','sub_categories','cat_product','img_url'));
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
