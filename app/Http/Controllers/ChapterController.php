<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Story;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id', 'DESC')->get();
        // dd($chapter);
        return view('admincp.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Story::orderBy('id', 'DESC')->get();
        return view('admincp.chapter.create')->with(compact('truyen'));
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
            'tieude' => 'required|max:255|unique:chapter',
            'slug' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'noidung' => 'required',
            'truyen_id' => 'required',
        ],
        [
            'tieude.required' => 'Tên danh mục phải nhập',
            'slug.required' => 'Tên danh mục phải nhập',
            'tomtat.required' => 'Mô tả danh mục phải nhập',
            'tieude.max' => 'Tên danh mục không được nhập quá 255 kí tự',
            'tieude.unique' => 'Tên danh mục không được trùng',

        ]
    );
        $chapter = new Chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->slug = $data['slug'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->save();
        return redirect()->back()->with('status', 'Thêm chapter truyện thành công');
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
        $chapter = Chapter::find($id);
        $truyen = Story::orderBy('id', 'DESC')->get();
        return view('admincp.chapter.edit', compact('chapter', 'truyen'));
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
            'tieude' => 'required|max:255',
            'slug' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'noidung' => 'required',
            'truyen_id' => 'required',
        ],
        [
            'tieude.required' => 'Tên danh mục phải nhập',
            'slug.required' => 'Tên danh mục phải nhập',
            'tomtat.required' => 'Mô tả danh mục phải nhập',
            'tieude.max' => 'Tên danh mục không được nhập quá 255 kí tự',
            'tieude.unique' => 'Tên danh mục không được trùng',

        ]
    );
        $chapter = Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->slug = $data['slug'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->save();
        return redirect()->back()->with('status', 'Cập nhật chapter truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa chapter thành công');
    }
}
