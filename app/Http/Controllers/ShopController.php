<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.shop.shop-page');
    }

    public function shopCart()
    {
    	return view('pages.shop.shop-cart');
    }

}
