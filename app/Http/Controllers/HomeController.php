<?php

namespace App\Http\Controllers;

use App\Components\ShowCategory;
use App\Models\Category;
use App\Models\Product;
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
        $categories = Category::all();
        $products = Product::all();
        $data = new ShowCategory($categories);
        $htmlCategory = $data->show();
        return view('index', compact('products', 'categories', 'htmlCategory'));
    }

    public function shop_grid()
    {
        $categories = Category::all();
        return view('shop-grid', compact('categories'));
    }

    public function shoping_cart()
    {
        $categories = Category::all();
        return view('shoping-cart', compact('categories'));
    }

    public function shop_details($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('shop-details', compact('categories', 'product'));
    }

    public function store($id, Request $request)
    {
    }
}
