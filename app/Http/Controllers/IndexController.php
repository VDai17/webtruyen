<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Theloai;
use App\Models\Sach;
use Carbon\Carbon;

class IndexController extends Controller
{
    public static function timkiem_ajax(Request $request) {
        $data = $request->all();
        dd($data);
        if($data['keywords']) {
            $truyen = Story::where('kichhoat', 0)->where('tentruyen', 'LIKE', '%'.$data['keywords'].'%')->get();
            $output = '<ul class="dropdown-menu" style="displey:block;">';
            foreach($truyen as $key=>$tr) {
                $output .= '<li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    public function home() {
        $theloai = Theloai::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc = Category::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $slide_truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
    }
    public function danhmuc($slug) {
        $theloai = Theloai::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc = Category::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc_id = Category::orderBy('id', 'DESC')->where('slug', $slug)->where('kichhoat', 0)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();
        $slide_truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        return view('pages.danhmuc')->with(compact('danhmuc', 'danhmuc_id', 'truyen', 'theloai', 'tendanhmuc', 'slide_truyen'));
    }
    public function theloai($slug) {
        $theloai = Theloai::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc = Category::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $theloai_id = Theloai::orderBy('id', 'DESC')->where('slug', $slug)->where('kichhoat', 0)->first();
        $tentheloai = $theloai_id->tentheloai;
        $truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $theloai_id->id)->get();
        $slide_truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        return view('pages.theloai')->with(compact('danhmuc', 'theloai_id', 'truyen', 'theloai', 'tentheloai', 'slide_truyen'));
    }
    public function xemtruyen($slug) {
        $theloai = Theloai::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc = Category::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $truyen = Story::with('danhmuctruyen', 'theloaitruyen')->orderBy('id', 'DESC')->where('kichhoat', 0)->where('slug', $slug)->first();
        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->where('kichhoat', 0)->get();
        $slide_truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->where('kichhoat', 0)->first();
        // dd($chapter);
        $chapter_moinhat = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id', $truyen->id)->where('kichhoat', 0)->first();

        $truyenmoi = Story::orderBy('id', 'DESC')->where('truyen_noibat', 0)->take(6)->get();
        $truyennoibat = Story::orderBy('id', 'DESC')->where('truyen_noibat', 1)->take(6)->get();
        $truyenxemnhieu = Story::orderBy('id', 'DESC')->where('truyen_noibat', 2)->take(6)->get();

        $cungdanhmuc = Story::with('danhmuctruyen')->orderBy('id', 'DESC')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc', 'chapter', 'truyen', 'cungdanhmuc', 'chapter_dau', 'theloai', 'slide_truyen', 'chapter_moinhat', 'truyennoibat', 'truyenxemnhieu', 'truyenmoi'));
    }
    public function xemchapter($slug) {
        $theloai = Theloai::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc = Category::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $slide_truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $truyen = Chapter::where('slug', $slug)->first();
        // breadcrumb
        $truyen_breadcrumb = Story::with('danhmuctruyen', 'theloaitruyen')->where('id', $truyen->truyen_id)->where('kichhoat', 0)->first();
        // end
        // dd($truyen);
        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('slug', $slug)->where('truyen_id', $truyen->truyen_id)->first();
        // dd($chapter);
        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug');
        $max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();
        // dd($max_id->id);
        $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug');
        return view('pages.chapter')->with(compact('danhmuc', 'truyen', 'chapter', 'theloai', 'all_chapter', 'previous_chapter', 'next_chapter', 'max_id', 'min_id', 'truyen_breadcrumb', 'slide_truyen'));
    }
    public function timkiem() {
        $theloai = Theloai::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc = Category::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $slide_truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $tukhoa = $_GET['tukhoa'];
        // dd($tukhoa);
        $truyen = Story::with('danhmuctruyen', 'theloaitruyen')->orderBy('id', 'DESC')->where('tentruyen', 'LIKE', '%'.$tukhoa.'%')
        ->orWhere('tacgia', 'LIKE', '%'.$tukhoa.'%')->get();
        return view('pages.timkiem')->with(compact('theloai', 'danhmuc', 'slide_truyen', 'tukhoa', 'truyen'));
    }
    // public function tags($tag) {

    // }

    public function docsach() {
        $theloai = Theloai::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $danhmuc = Category::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        $slide_truyen = Story::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        $sach = Sach::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(12);
        return view('pages.sach')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'sach'));
    }

    public function xemsachnhanh(Request $request) {
        $sach_id = $request->sach_id;
        $sach = Sach::find($sach_id);
        $output['tieude_sach']= $sach->tensach;
        $output['noidung_sach']= $sach->noidung;
        echo json_encode($output);
    }
}
