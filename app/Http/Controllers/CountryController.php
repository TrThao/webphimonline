<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Country::all();
        return view('admincp.Country.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Country::all();
        return view('admincp.Country.form', compact('list'));
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
        $country = new Country();
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        toastr()->success('Thêm dữ liệu thành công', 'Thành công');
        return redirect()->route('country.index');
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
        $country = Country::find($id);
        $list = Country::all();
        return view('admincp.Country.form', compact('list', 'country'));
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
        $country =  Country::find($id);
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        toastr()->success('Cập nhật dữ liệu thành công', 'Thành công');
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id)->delete();
        toastr()->success('Xóa liệu thành công', 'Thành công');
        return redirect()->back();
    }
}
