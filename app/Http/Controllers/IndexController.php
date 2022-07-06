<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;
use App\Models\Sach;

class IndexController extends Controller
{
    // Tìm kiếm nâng cao
    // public function timkiem_ajax(Request $request){
    //     $data = $request->all();

    //     if($data['keywords'])
    //     {
    //         $truyen = Truyen::where('kichhoat',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();

    //         $output = '<ul class="dropdown-menu" style="display:block;">';

    //         foreach($truyen as $key => $tr) {
    //             $output .= '<li class="li_timkiem_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';
    //         }

    //         $output .= '</ul>';
    //         echo $output;
    //     }
    // }

    public function home(){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(6)->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->paginate(6);

        $sach = Sach::orderBy('id','DESC')->where('kichhoat',0)->paginate(6);

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.home')->with(compact('danhmuc','truyen','sach', 'theloai','slide_truyen'));
    }

    public function docsach(){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $sach = Sach::orderBy('id','DESC')->where('kichhoat',0)->paginate(12);

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.sach')->with(compact('danhmuc','sach','theloai','slide_truyen'));
    }

    public function doctruyen(){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->paginate(12);

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.truyen')->with(compact('danhmuc','truyen','theloai','slide_truyen'));
    }

    public function xemsachnhanh(Request $request){
        $sach_id = $request->sach_id;

        $sach = Sach::find($sach_id);

        $output['tieude_sach'] = $sach->tensach;
        $output['noidung_sach'] = $sach->noidung;

        echo json_encode($output);
    }

    public function danhmuc($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc',$slug)->first();

        $tendanhmuc = $danhmuc_id->tendanhmuc;

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->get();

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.danhmuc')->with(compact('danhmuc','tendanhmuc','truyen','theloai','slide_truyen'));
    }

    public function theloai($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $theloai_id = Theloai::where('slug_theloai',$slug)->first();

        $tentheloai = $theloai_id->tentheloai;

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->get();

        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.theloai')->with(compact('danhmuc','tentheloai','truyen','theloai','slide_truyen'));
    }

    public function xemtruyen($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyenxemnhieu = Truyen::where('truyen_noibat',1)->take(20)->get();

        $truyennoibat = Truyen::where('truyen_noibat',2)->take(20)->get();

        $truyen  = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();

        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();

        $chapter_moinhat = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        
        $theloai = Theloai::orderBy('id','DESC')->get();

        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','chapter_dau','cungdanhmuc',
        'theloai','slide_truyen','chapter_moinhat','truyenxemnhieu','truyennoibat'));
    }

    public function xemchapter($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        
        $theloai = Theloai::orderBy('id','DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen  = Chapter::where('slug_chapter',$slug)->first(); 

        // breadcrumb
        $truyen_breadcrumb = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->first();
        // end breadcrumb
       
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        
        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();
        
        $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();

        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();

        return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','previous_chapter',
        'next_chapter','max_id','min_id','theloai','truyen_breadcrumb','slide_truyen'));
    }

    public function timkiem(Request $request){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $theloai = Theloai::orderBy('id','DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        
        $tukhoa = $_GET['tukhoa'];

        $truyen = Truyen::with('danhmuctruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')
        ->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->orWhere('tomtat','LIKE','%'.$tukhoa.'%')->get();

        $sach = Sach::orderBy('id','DESC')->where('tensach','LIKE','%'.$tukhoa.'%')
        ->orWhere('noidung','LIKE','%'.$tukhoa.'%')->orWhere('tomtat','LIKE','%'.$tukhoa.'%')->get();

        return view('pages.timkiem')->with(compact('slide_truyen','danhmuc','theloai','truyen','tukhoa','sach'));
    }

}
