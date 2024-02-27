<?php

namespace App\Http\Controllers;

use App\Models\LinkMovie;
use Illuminate\Http\Request;

class LinkMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $linkmovie = LinkMovie::orderBy( 'id','ASC')->get();
        return view('admincp.linkmovie.index', compact('linkmovie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $list = LinkMovie::orderBy('ASC')->get();
        return view('admincp.linkmovie.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|unique:linkmovie|max:255',
               
                'description' => 'required:linkmovie',

            ],
            [
                'title.required' => 'Bạn chưa nhập Tên',
                'title.unique' => 'Tên đã tồn tại',
                'description.required' => 'Bạn chưa nhập mô tả'
            ]
        );
        $data = $request->all();
        $linkmovie = new LinkMovie();
        $linkmovie->title = $data['title'];
      
        $linkmovie->description = $data['description'];
        $linkmovie->status = $data['status'];
        $linkmovie->save();
        toastr()->info('Thêm dữ liệu thành công', 'Thành công');
        return redirect()->route('linkmovie.index');
        
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
        $linkmovie = linkmovie::find($id);
      
        return view('admincp.linkmovie.form', compact('linkmovie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'title' => 'required|unique:linkmovie|max:255',
               
                'description' => 'required:linkmovie',

            ],
            [
                'title.required' => 'Bạn chưa nhập Tên',
                'title.unique' => 'Tên đã tồn tại',
                
                'description.required' => 'Bạn chưa nhập mô tả'
            ]
        );
        $data = $request->all();
        $linkmovie =  linkmovie::find($id);
        $linkmovie->title = $data['title'];
        $linkmovie->description = $data['description'];
        $linkmovie->status = $data['status'];
        $linkmovie->save();
        toastr()->info('Cập nhật dữ liệu thành công', 'Thành công');
        return redirect()->route('linkmovie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        linkmovie::find($id)->delete();
        toastr()->info('Xóa dữ liệu thành công', 'Thành công');
        return redirect()->back();
    }
}