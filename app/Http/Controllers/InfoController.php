<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = Info::find(1);
        return view('admincp.info.form',compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'title' => 'required|unique:categories|max:255',
                'description' => 'required:categories',
                'copyright' => 'required:categories',
                'image'=> 'image|mimes:jpg,png,jpeg,gif,svg|max:2045|',

            ],
            [
                'title.required' => 'Bạn chưa nhập Tên',
              
                'description.required' => 'Bạn chưa nhập mô tả',

                'copyright.required' => 'Bạn chưa nhập copyright',
            ]
        );
        $data = $request->all();
        $info =  info::find($id);
        $info->title = $data['title'];      
        $info->description = $data['description'];
        $info->copyright = $data['copyright'];


        
        $get_image = $request->file('image');
        //Thêm Hình Ảnh
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/logo/', $new_image);
            $info->logo = $new_image;
        }
        
        $info->save();
        toastr()->success('Cập nhật thông tin thành công', 'Thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}