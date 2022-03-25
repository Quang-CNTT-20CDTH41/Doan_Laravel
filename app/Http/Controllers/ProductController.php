<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->search()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Recusive(Category::all());
        $htmlOption = $data->Recusive($parent_id = '');
        return view('admin.product.create', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if (Product::create($request->all())) {
            return redirect()->back()->with('status', 'Create Product successfully ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = new Recusive(Category::all());
        $htmlOption = $data->Recusive($parent_id = '');
        return view('admin.product.show', compact('htmlOption', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = new Recusive(Category::all());
        $htmlOption = $data->Recusive($parent_id = '');
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        if ($product->update($request->all())) {
            return redirect()->back()->with('status', 'Update Product successfully ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->details->count() > 0) {
            return redirect()->route('products.index')->with('error', 'Không thể xoá sản phẩm này');
        } else {
            $product->delete();
            return redirect()->route('products.index')->with('status', 'Xoá sản phẩm thành công');
        }
    }
}
