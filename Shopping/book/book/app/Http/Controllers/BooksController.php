<?php

namespace App\Http\Controllers;

use DB;
use App\Books;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    
    public function index()
    {
        //Session::flush();
        // if($this->middleware('auth'))
        // dd(Auth::user());
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct("latest");
        $tempBooks=true;
        
        //dd($cat_product);
        //banners and sliders
        $sliders=$this->getSlider();
        $banners=$this->getBanners();
        $promo_banner=array();
        $bottom_banner=array();
        foreach($banners as $bann)
        {
            if($bann->group_id=="promo_banner")
                $promo_banner=$bann;
            elseif($bann->group_id=="bottom")
                array_push($bottom_banner,$bann);
        }
        //dd($cat_product);
        
        return view('Books.index',compact('tempBooks','categories','sub_categories','cat_product','img_url','current_currency','promo_banner','bottom_banner','sliders'));
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
