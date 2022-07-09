<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloaitruyen = Theloai::orderBy('id', 'DESC')->get();
        return view('admincp.genre.index')->with(compact('theloaitruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.genre.create');
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
                'tentheloai' => 'required|max:255|unique:theloai',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
                'slug' => 'required',
            ],
            [
                'tentheloai.required' => 'Tên danh mục phải nhập',
                'slug.required' => 'Tên danh mục phải nhập',
                'mota.required' => 'Mô tả danh mục phải nhập',
                'tentheloai.max' => 'Tên danh mục không được nhập quá 255 kí tự',
                'mota.max' => 'Mô tả danh mục không được nhập quá 255 kí tự',
                'tentheloai.unique' => 'Tên danh mục không được trùng',

            ]
        );
        $theloaitruyen = new Theloai();
        $theloaitruyen->tentheloai = $data['tentheloai'];
        $theloaitruyen->slug = $data['slug'];
        $theloaitruyen->mota = $data['mota'];
        $theloaitruyen->kichhoat = $data['kichhoat'];
        $theloaitruyen->save();
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
        $theloai = Theloai::find($id);
        return view('admincp.genre.edit')->with(compact('theloai'));
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
                'tentheloai' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
                'slug' => 'required',
            ],
            [
                'tentheloai.required' => 'Tên danh mục phải nhập',
                'slug.required' => 'Tên danh mục phải nhập',
                'mota.required' => 'Mô tả danh mục phải nhập',
                'tentheloai.max' => 'Tên danh mục không được nhập quá 255 kí tự',
                'mota.max' => 'Mô tả danh mục không được nhập quá 255 kí tự',
            ]
        );
        $theloaitruyen = Theloai::find($id);
        $theloaitruyen->tentheloai = $data['tentheloai'];
        $theloaitruyen->slug = $data['slug'];
        $theloaitruyen->mota = $data['mota'];
        $theloaitruyen->kichhoat = $data['kichhoat'];
        $theloaitruyen->save();
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
        Theloai::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
