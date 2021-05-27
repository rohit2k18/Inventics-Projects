<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use DB;
use App\Inventory;

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
        $cart_data=array();
        if($this->isAuthenticated())
        {
            $cart_ids=Cart::where('customer_id',$this->isAuthenticated("id"))->get();
            $cart_data=$this->GetAllTheCartDataForCartList();
            $inventory_images=$this->getInventoryImages();
            if($cart_data==null)
            return view('Cart.EmptyCart.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
        
            
        }else{
            return redirect()->route('login');
        }
        

        //dd($categories);
        
        return view('Cart.CartPage.index',compact('categories','sub_categories','cat_product','img_url','current_currency','cart_data','cart_ids','inventory_images'));
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
        $id=$request->productid;
        $inventory=DB::table('inventories')->where('id',$id)->first();
    
        $customerid=0;
        
        //check if authenticated
        if($this->isAuthenticated())
        {
            $customerid=$this->isAuthenticated("id");
        }
        else
        {
            return json_encode(array('data'=>"login"));
        }
        
        //check if customer id exist in the cart table or not
        $cart=$this->for_different_shopInCarts($this->for_same_cart,$customerid,$inventory->shop_id);
        
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

            $quantity=1;
            $cart_items=$this->On_same_cart_items("existornot",$cart->id,$inventory->id);
            if($cart_items==false)//means cart item does not exist
            {
                $cart_item_pivot_data = [];
                $cart_item_pivot_data[$inventory->id] = [
                    'inventory_id' => $inventory->id,
                    'item_description'=> $inventory->sku . ': ' . $inventory->title . ' - ' . ' - ' . $inventory->condition,
                    'quantity' => $quantity,
                    'unit_price' => $inventory->sale_price,
                ];
                // Save cart items into pivot
                if ( ! empty($cart_item_pivot_data) ) {
                    $cart->inventories()->syncWithoutDetaching($cart_item_pivot_data);
                }
            }
            else
            {
                //show message that item already exist
                return json_encode(array('data'=>"Already Exist"));
            }
            $this->updateMainCartItemDetails($cart->id);

        
            return json_encode(array('data'=>"Added To Cart"));
    }

    // public function incresecurrentProduct(Requet)

    public function addToGetTest($idd)
    {
        $id=DB::table('aatest')->insertGetId(
            ['name' => $idd]
        );
        
    }

    public function addToPostTest(Request $request)
    {
        $id=DB::table('aatest')->insertGetId(
            ['name' => $request->ip()]
        );
        return json_encode(array('data'=>$request->ip()));
    }

    //------------------------------------------------------------common functions----------------------

    public function for_different_shopInCarts($term,$customerid,$shop_id)//term="same","different"
    {
        if($term=="same")
        {
            return Cart::where('customer_id',$customerid)->first();
        }else{
            return Cart::where('customer_id',$customerid)->where('shop_id',$shop_id)->first();
        }
    }

    public function On_same_cart_items($term,$cart_id,$inventory_id)//term="increment","existornot"
    {
        $exist=$this->getCartItemsIfExist($cart_id,$inventory_id);
        if($term=="increment" && $exist!=null)
        {
            DB::table('cart_items')
            ->where('cart_id',$cart_id)
            ->where('inventory_id',$inventory_id)
            ->increment('quantity',1);
            
            return true;
        }
        else
        {
            if($exist!=null)
            return true;
            else
            return false;
        }
    }

    public function updateMainCartItemDetails($cart_id)
    {
        $totalQuantity=0;
        $exist=$this->getCartItemsIfExist($cart_id);
        if($exist!=null)
        {
            $total_price=0.0;
            $total_items=0;
            foreach($exist as $item)
            {
                $totalQuantity+=$item->quantity;
                $total_price+=$item->quantity*$item->unit_price;
                $total_items++;
            }

            //update to main cart
            DB::table('carts')->where('id',$cart_id)->update(array('item_count'=>$total_items,'quantity'=>$totalQuantity,'total'=>$total_price,'grand_total'=>$total_price));
        }
        return $totalQuantity;

    }

    public function getCartItemsIfExist($cart_id,$inventory_id=null)
    {
        if($inventory_id==null)
        {
            return DB::table('cart_items')
            ->where('cart_id',$cart_id)
            ->get();
        }
        elseif($cart_id!=null&&$inventory_id!=null)
        {
            return DB::table('cart_items')
            ->where('cart_id',$cart_id)
            ->where('inventory_id',$inventory_id)
            ->first();
        }else{
            return false;
        }

    }

}
