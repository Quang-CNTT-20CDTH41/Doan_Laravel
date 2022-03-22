<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    private $categories = '';
    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->search()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data = new Recusive($this->categories::all());
        $htmlOption = $data->Recusive($parent_id = '');
        return view('admin.category.create', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($this->categories::create($request->all())) {
            return redirect()->back()->with('status', 'Thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = new Recusive($this->categories::all());
        $htmlOption = $data->Recusive($parent_id = $category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category)
    {
        if ($category->update($request->all())) {
            return redirect()->back()->with('status', 'Thêm danh mục thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->products->count() > 0) {
            return redirect()->route('categories.index')->with('error', "Không thể xoá danh mục này");
        } else {
            $category->delete();
            return redirect()->route('categories.index')->with('status', "Xoá danh mục thành công");
        }
    }
}
