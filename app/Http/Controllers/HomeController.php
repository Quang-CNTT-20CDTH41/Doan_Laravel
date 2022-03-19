<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function shop_grid()
    {
        return view('shop-grid');
    }
    public function shop_details()
    {
    }
    public function shoping_cart()
    {
    }
    public function checkout()
    {
    }
    public function blog_details()
    {
    }
    public function blog()
    {
    }
    public function contact()
    {
    }
}
