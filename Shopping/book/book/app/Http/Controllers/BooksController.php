<?php

namespace App\Http\Controllers;

use DB;
use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    
    public function index()
    {
        
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct();
        $tempBooks=true;
        
        // $banners=DB::table('banners')->get();
        //dd($cat_product);


        return view('Books.index',compact('tempBooks','categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function product_cat_Index($name)
    {
        $cat_product=$this->getcategoriesproduct();
        return view('CommonContent.producttest',compact('cat_product'));
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
    
}
