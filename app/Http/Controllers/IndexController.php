<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;

class IndexController extends Controller
{
    public function home(){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.home')->with(compact('danhmuc','truyen','theloai'));
    }

    public function danhmuc($slug){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc',$slug)->first();

        $tendanhmuc = $danhmuc_id->tendanhmuc;

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->get();

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.danhmuc')->with(compact('danhmuc','tendanhmuc','truyen','theloai'));
    }

    public function theloai($slug){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $theloai_id = Theloai::where('slug_theloai',$slug)->first();

        $tentheloai = $theloai_id->tentheloai;

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->get();

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.danhmuc')->with(compact('danhmuc','tentheloai','truyen','theloai'));
    }

    public function xemtruyen($slug){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen  = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('kichhoat',0)->first();

        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        
        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','chapter_dau','cungdanhmuc','theloai'));
    }

    public function xemchapter($slug){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen  = Chapter::where('slug_chapter',$slug)->first(); 
       
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        
        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();
        
        $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();

        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();

        $theloai = Theloai::orderBy('id','DESC')->get();
        return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','previous_chapter','next_chapter','max_id','min_id','theloai'));
    }

}
