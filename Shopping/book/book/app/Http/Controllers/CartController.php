<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use DB;
use App\Inventory;
use Illuminate\Support\Facades\Auth;

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

        if($this->middleware('auth'))
        {
            $customerid=Auth::id();
            $cart=Cart::where('customer_id',$customerid)->get();
            $cart_items=Cart::with('inventories')->get();
            dd($cart_items);
            foreach($cart_items as $item)
            {
                
            }
            dd(count($cart));
        }else{
            return view('Cart.EmptyCart.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
        }
        

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



    public function addToCart(Request $request)
    {
        $test="";
        $id=$request->productid;
        $inventory=DB::table('inventories')->where('id',$id)->first();
        //dd($inventory);

        $customerid=0;

        //check if authenticated
        if($this->middleware('auth'))
        $customerid=Auth::id();
        else
        return redirect()->route('login');


        //check if customer id exist in the cart table or not
        $cart=Cart::where('customer_id',$customerid)->first();
        
        if($cart==null)
        {
            //means create on cart
            $cart=new Cart();
            $cart->shop_id=$inventory->shop_id;
            $cart->customer_id=$customerid;
            $cart->ip_address=$request->ip();
            $cart->item_count=1;
            $cart->quantity=1;
            $cart->payment_status=1;
            $cart->save();
        }
        
            
            
            $cart_item_pivot_data = [];
            $cart_item_pivot_data[$inventory->id] = [
                'inventory_id' => $inventory->id,
                'item_description'=> $inventory->sku . ': ' . $inventory->title . ' - ' . ' - ' . $inventory->condition,
                'quantity' => 1,
                'unit_price' => $inventory->sale_price,
            ];
            // Save cart items into pivot
            if ( ! empty($cart_item_pivot_data) ) {
                $cart->inventories()->syncWithoutDetaching($cart_item_pivot_data);
            }
        
        return redirect()->back();
    }

    public function addToGetTest($id)
    {
         dd($id);
        // dd("Hello world");
        
        return view('welcome');
    }
}
