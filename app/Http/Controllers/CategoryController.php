<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:publish category|edit category|delete category|add category',['only' => ['index', 'show']]);
        $this->middleware('permission:add category',['only' => ['create', 'store']]);
        $this->middleware('permission:edit category',['only' => ['edit', 'update']]);
        $this->middleware('permission:delete category',['only' => ['delete']]);

    }
    public function index()
    {
        $danhmuctruyen = Category::orderBy('id', 'DESC')->get();
        return view('admincp.category.index')->with(compact('danhmuctruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                'tendanhmuc' => 'required|max:255|unique:danhmuc',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
                'slug' => 'required',
            ],
            [
                'tendanhmuc.required' => 'Tên danh mục phải nhập',
                'slug.required' => 'Tên danh mục phải nhập',
                'mota.required' => 'Mô tả danh mục phải nhập',
                'tendanhmuc.max' => 'Tên danh mục không được nhập quá 255 kí tự',
                'mota.max' => 'Mô tả danh mục không được nhập quá 255 kí tự',
                'tendanhmuc.unique' => 'Tên danh mục không được trùng',

            ]
        );
        $danhmuctruyen = new Category();
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug = $data['slug'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc = Category::find($id);
        return view('admincp.category.edit')->with(compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
                'tendanhmuc' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
                'slug' => 'required',
            ],
            [
                'tendanhmuc.required' => 'Tên danh mục phải nhập',
                'slug.required' => 'Tên danh mục phải nhập',
                'mota.required' => 'Mô tả danh mục phải nhập',
                'tendanhmuc.max' => 'Tên danh mục không được nhập quá 255 kí tự',
                'mota.max' => 'Mô tả danh mục không được nhập quá 255 kí tự',
            ]
        );
        $danhmuctruyen = Category::find($id);
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug = $data['slug'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
