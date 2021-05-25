<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\User;

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

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Account $account)
    {
        //
    }

    
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

    
    public function destroy(Account $account)
    {
        //
    }


    public function loginindex()
    {
        $users=User::all();
        dd($users);
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
