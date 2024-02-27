<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Genre::all();
        return view('admincp.genre.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Genre::all();
        return view('admincp.genre.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        toastr()->success('Thêm dữ liệu thành công', 'Thành công');
        return redirect()->route('genre.index');
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
        $genre = Genre::find($id);
        $list = Genre::all();
        return view('admincp.genre.form', compact('list', 'genre'));
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
        $genre =  Genre::find($id);
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        toastr()->success('Cập nhật dữ liệu thành công', 'Thành công');
        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::find($id)->delete();
        toastr()->success('Xóa dữ liệu thành công', 'Thành công');
        return redirect()->back();
    }
}