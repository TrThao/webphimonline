<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::orderBy('position', 'ASC')->get();
        return view('admincp.category.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::orderBy('position','ASC')->get();
        return view('admincp.category.form',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories',
            'description' => 'required:categories',
           
        ],
        [
            'title.required'=>'Bạn chưa nhập Tên',
            'title.unique'=>'Tên đã tồn tại',
            'slug.required' => 'Bạn chưa nhập slug',
            'slug.unique'=>'Slug tồn tại',
            'description.required' => 'Bạn chưa nhập mô tả'
       ]);
        $data = $request->all();
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category -> save();
        toastr()->info('Thêm dữ liệu thành công', 'Thành công');
        return redirect()->route('category.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $list = Category::orderBy('position', 'ASC')->get();
        return view('admincp.category.form', compact('list','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'title' => 'required|unique:categories|max:255',
                'slug' => 'required|unique:categories',
                'description' => 'required:categories',

            ],
            [
                'title.required' => 'Bạn chưa nhập Tên',
                'title.unique' => 'Tên đã tồn tại',
                'slug.required' => 'Bạn chưa nhập slug',
                'slug.unique' => 'Slug tồn tại',
                'description.required' => 'Bạn chưa nhập mô tả'
            ]
        );
        $data = $request->all();
        $category =  Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        toastr()->info('Cập nhật dữ liệu thành công', 'Thành công');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        toastr()->info('Xóa dữ liệu thành công', 'Thành công');
        return redirect()->back();
    }
    public function resorting(Request $request){
        $data = $request->all();

        foreach($data['array_id'] as $key =>$value){
            $category = Category::find($value);
            $category->position = $key;
            $category->save();
        }
    }
}