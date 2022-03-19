<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:categories|max:255',
            ],
            [
                'name.required' => 'Vui lòng không để trống tên danh mục',
                'name.unique' => 'Tên danh mục đã tồn tại',
            ]
        );
        $this->categories::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->back()->with('status', 'Thêm danh mục thành công');
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
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'Vui lòng không để trống tên danh mục',
            ]
        );
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->back()->with('status', 'Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
