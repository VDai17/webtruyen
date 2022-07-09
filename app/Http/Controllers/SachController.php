<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use Carbon\Carbon;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listsach = Sach::orderBy('id', 'DESC')->get();
        return view('admincp.sach.index')->with(compact('listsach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.sach.create');
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
            'tensach' => 'required|max:255|unique:sach',
            'slug_sach' => 'required',
            'image' => 'required',
            'tomtat' => 'required',
            'noidung' => 'required',
            'kichhoat' => 'required',
            'tukhoa' => 'required',
            'views' => 'required',
        ],
        [
            'tensach.required' => 'Tên danh mục phải nhập',
            // 'slug.required' => 'Tên danh mục phải nhập',
            // 'tomtat.required' => 'Mô tả danh mục phải nhập',
            // 'tensach.max' => 'Tên danh mục không được nhập quá 255 kí tự',
            // 'tensach.unique' => 'Tên danh mục không được trùng',

        ]
    );
        $sach = new Sach();
        $sach->tensach = $data['tensach'];
        $sach->slug_sach = $data['slug_sach'];
        $sach->tomtat = $data['tomtat'];
        $sach->tukhoa = $data['tukhoa'];
        $sach->noidung = $data['noidung'];
        $sach->views = $data['views'];
        $sach->kichhoat = $data['kichhoat'];

        $sach->create_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('image');
        $path = 'public/uploads/sach';

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $sach->hinhsach = $new_image;
        }
        $sach->save();
        return redirect()->back()->with('status', 'Thêm sách thành công');
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
        $sach = Sach::find($id);
        return view('admincp.sach.edit')->with(compact('sach'));
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
            'tensach' => 'max:255',
            'slug_sach' => 'required',
            'image' => 'image',
            'tomtat' => 'required',
            'noidung' => 'required',
            'kichhoat' => 'required',
            'tukhoa' => 'required',
            'views' => 'required',
        ],
        [
            'tensach.required' => 'Tên danh mục phải nhập',
            // 'slug.required' => 'Tên danh mục phải nhập',
            // 'tomtat.required' => 'Mô tả danh mục phải nhập',
            // 'tensach.max' => 'Tên danh mục không được nhập quá 255 kí tự',
            // 'tensach.unique' => 'Tên danh mục không được trùng',

        ]
    );
        $sach = Sach::find($id);
        $sach->tensach = $data['tensach'];
        $sach->slug_sach = $data['slug_sach'];
        $sach->tomtat = $data['tomtat'];
        $sach->tukhoa = $data['tukhoa'];
        $sach->noidung = $data['noidung'];
        $sach->views = $data['views'];
        $sach->kichhoat = $data['kichhoat'];

        $sach->create_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('image');
        $path = 'public/uploads/sach';

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $sach->hinhsach = $new_image;
        }
        $sach->save();
        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach = Sach::find($id);
        $path = 'public/uploads/sach/'.$sach->hinhsach;
        if(file_exists($path)){
            unlink($path);
        }
        Sach::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công');
    }
}
