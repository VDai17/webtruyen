<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Story;
use App\Models\Theloai;
use App\Models\ThuocDanh;
use App\Models\ThuocLoai;
use Carbon\Carbon;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listtruyen = Story::with('thuocnhieudanhmuctruyen', 'thuocnhieutheloaitruyen')->orderBy('id', 'DESC')->get();
        // dd($truyen);
        return view('admincp.story.index')->with(compact('listtruyen'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloaitruyen = Theloai::orderBy('id', 'DESC')->get();
        $danhmuctruyen = Category::orderBy('id', 'DESC')->get();
        return view('admincp.story.create')->with(compact('danhmuctruyen', 'theloaitruyen'));

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
            'tentruyen' => 'required|max:255|unique:truyen',
            'tacgia' => 'required',
            'slug' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'danhmuc_id' => '',
            'image' => 'required',
            'theloai_id' => '',
            'tags' => 'required',
            'truyen_noibat' => 'required',
        ],
        [
            'tentruyen.required' => 'Tên danh mục phải nhập',
            'slug.required' => 'Tên danh mục phải nhập',
            'tomtat.required' => 'Mô tả danh mục phải nhập',
            'tentruyen.max' => 'Tên danh mục không được nhập quá 255 kí tự',
            'tentruyen.unique' => 'Tên danh mục không được trùng',

        ]
    );
        $data = $request->all();
        // dd($data['danhmuc']);
        $truyen = new Story();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->slug = $data['slug'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tags = $data['tags'];
        $truyen->truyen_noibat = $data['truyen_noibat'];
        // $truyen->danhmuc_id = $data['danhmuc_id'];
        // $truyen->theloai_id = $data['theloai_id'];
        $truyen->kichhoat = $data['kichhoat'];

        foreach ($data['danhmuc'] as $key => $danh) {
            $truyen->danhmuc_id = $danh[0];
        }

        foreach ($data['theloai'] as $key => $loai) {
            $truyen->theloai_id = $loai[0];
        }

        $truyen->create_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->file('image');
        $path = 'public/uploads/truyen';

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $truyen->image = $new_image;
        }
        $truyen->save();

        $truyen->thuocnhieudanhmuctruyen()->attach($data['danhmuc']);
        $truyen->thuocnhieutheloaitruyen()->attach($data['theloai']);
        return redirect()->back()->with('status', 'Thêm truyện thành công');
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
        $truyen = Story::find($id);
        $danhmuc = Category::orderBy('id', 'DESC')->get();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        // dd($truyen);
        return view('admincp.story.edit')->with(compact('truyen', 'danhmuc', 'theloai'));
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
            'tentruyen' => 'required|max:255',
            'tacgia' => 'required',
            'slug' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'danhmuc_id' => 'required',
            'theloai_id' => 'required',
            'tags' => 'required',
            'truyen_noibat' => 'required',
        ],
        [
            'tentruyen.required' => 'Tên danh mục phải nhập',
            'slug.required' => 'Tên danh mục phải nhập',
            'tomtat.required' => 'Mô tả danh mục phải nhập',
            'tentruyen.max' => 'Tên danh mục không được nhập quá 255 kí tự',
            'tentruyen.unique' => 'Tên danh mục không được trùng',

        ]
    );
        $truyen = Story::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug = $data['slug'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tags = $data['tags'];
        $truyen->truyen_noibat = $data['truyen_noibat'];
        $truyen->danhmuc_id = $data['danhmuc_id'];
        $truyen->theloai_id = $data['theloai_id'];
        $truyen->kichhoat = $data['kichhoat'];

        $truyen->update_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');
        $path = 'public/uploads/truyen';

        if($get_image) {
            // $path = 'public/uploads/truyen/'.$truyen->image;
            // if(file_exists($path)){
            //     unlink($path);
            // }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $truyen->image = $new_image;
        }
        $truyen->save();
        return redirect()->back()->with('status', 'Cập nhật mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Story::find($id);
        $path = 'public/uploads/truyen/'.$truyen->image;
        if(file_exists($path)){
            unlink($path);
        }
        Story::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công');
    }
    public function truyennoibat(Request $request) {
        return "OK";
        // $data = $request->all();
        // dd($data);
        // $truyen = Story::find(data['truyen_id']);
        // $truyen->truyen_noibat= $data['truyennoibat'];
        // $truyen->save();
    }
}
