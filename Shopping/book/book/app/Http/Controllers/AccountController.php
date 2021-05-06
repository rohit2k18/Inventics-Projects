<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public $accountPages=array("details","orders","wishlist","address");

    public function index($page)
    {
        $flag=false;
        foreach($this->accountPages as $ss)
        {
            if($page==$ss)
            {
                $flag=true;
            }
        }
        if(!$flag)
        return redirect()->route('Error');

        return view('Account.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }


    public function loginindex()
    {
        return view('Account.Login.index');
    }

    public function signupindex()
    {
        return view('Account.SignUp.index');
    }

    public function galleryindex()
    {
        return view('Gallery.index');
    }

    public function faqindex()
    {
        return view('Faq.index');
    }

    public function aboutusindex()
    {
        return view('AboutUs.index');
    }

    public function errorindex()
    {
        return view('Error.index');
    }

    public function commingsoonindex()
    {
        return view('CommingSoon.index');
    
    }
    
    public function contactusindex()
    {
        $hidefooterinfo=true;
        return view('ContactUs.index',compact('hidefooterinfo'));
    }

    //-------------------------------------category-------------------------
    public function ecategoryindex()
    {
        $tempcategory=true;
        return view('Category.EmptyCategory.index',compact('tempcategory'));
    }

    public function categoryindex()
    {
        $tempcategory=true;
        $titlename="Account Category";
        return view('Category.index',compact('tempcategory','titlename'));
    }
    //--------------------------------------------------------------categoryend

    //-------------------------------------cart-------------------------
    public function cartpageindex()
    {
        return view('Cart.CartPage.index');
    }

    public function emptycartpageindex()
    {
        return view('Cart.EmptyCart.index');
    }

    public function cehckoutindex()
    {
        return view('Cart.CheckOut.index');
    }
    //----------------------------------------------------end cart-

    //----------------------------------------blog--------------
    public function blogcategoryindex()
    {
        return view('Blog.BlogCategory.index');
    }
    public function bloglistindex()
    {
        return view('Blog.BlogList.index');
    }
    public function blogpostindex()
    {
        return view('Blog.BlogPost.index');
    }
    //test
    //-----------------------------------------------end blog
    
    // public function accountaddressindex()
    // {
    //     return view('Account.AccountAddress.index');
    // }

    // public function accountdetailsindex()
    // {
    //     return view('Account.AccountDetails.index');
    // }

    // public function accountorderhistoryindex()
    // {
    //     return view('Account.OrderHistory.index');
    // }

    // public function accountwishlistindex()
    // {
    //     return view('Account.Wishlist.index');
    // }
}
