<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\DanhmucTruyen;
use App\Models\Products;
use App\Models\Sach;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\Active;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

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

  public function home()
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(6)->get();
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(8);
    $sach = Sach::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(8);
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    return view('pages.home')->with(compact('danhmuc', 'truyen', 'sach', 'theloai', 'slide_truyen'));
  }

  public function productdetail($slug)
  {
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    $product = Products::orderBy('id', 'DESC')->where('pro_slug', $slug)->where('pro_active', 0)->first();

    return view('pages.productdetail')->with(compact('product', 'danhmuc', 'theloai'));
  }

  public function muasam()
  {
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    $sach = Sach::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(12);
    $product = Products::orderBy('id', 'DESC')->where('pro_active', 0)->paginate(20);
    return view('pages.muasam')->with(compact('product', 'danhmuc', 'theloai', 'sach'));
  }

  public function docsach()
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $sach = Sach::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(12);
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    return view('pages.listsach')->with(compact('danhmuc', 'sach', 'theloai', 'slide_truyen'));
  }

  public function doctruyen()
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(12);
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    return view('pages.listtruyen')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
  }

  public function xemsachnhanh(Request $request)
  {
    $sach_id = $request->sach_id;
    $sach = Sach::find($sach_id);
    $output['tieude_sach'] = $sach->tensach;
    $output['noidung_sach'] = $sach->noidung;
    echo json_encode($output);
  }

  public function vnpay_payment(Request $request)
  {
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/xem-truyen/" . $request->book_slug;
    $vnp_TmnCode = "879PHKBE"; //Mã website tại VNPAY 
    $vnp_HashSecret = "BJEICZWYOTLXTIAXESZSMNWQBKSHXAEL"; //Chuỗi bí mật

    $vnp_TxnRef = $request->user_id . "+" . $request->book_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = "thanh toán đơn hàng";
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $request->book_price * 100;
    $vnp_Locale = 'VN';
    $vnp_BankCode = 'NCB';
    // $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    // $vnp_ExpireDate = $_POST['txtexpire'];
    //Billing
    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_Returnurl,
      "vnp_TxnRef" => $vnp_TxnRef
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
      $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
      $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
      $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    $returnData = array(
      'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    if (isset($_POST['redirect'])) {
      header('Location: ' . $vnp_Url);
      die();
    } else {
      echo json_encode($returnData);
    }
  }

  public function danhmuc($slug)
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();
    $tendanhmuc = $danhmuc_id->tendanhmuc;
    $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    return view('pages.danhmuc')->with(compact('danhmuc', 'tendanhmuc', 'truyen', 'theloai', 'slide_truyen'));
  }

  public function theloai($slug)
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $theloai_id = Theloai::where('slug_theloai', $slug)->first();
    $tentheloai = $theloai_id->tentheloai;
    $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    return view('pages.theloai')->with(compact('danhmuc', 'tentheloai', 'truyen', 'theloai', 'slide_truyen'));
  }

  public function xemtruyen($slug, Request $request)
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

    $truyenxemnhieu = Truyen::where('truyen_noibat', 1)->take(4)->get();

    $truyennoibat = Truyen::where('truyen_noibat', 2)->take(4)->get();

    $truyen  = Truyen::with('danhmuctruyen', 'theloai')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();

    $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->get();

    $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();

    $chapter_moinhat = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id', $truyen->id)->first();

    $cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();

    $theloai = Theloai::orderBy('id', 'DESC')->get();

    $favorite = null;

    $key_unlock = Auth::user()->id . "+" . $truyen->id;
    $lock = Order::where("id",$key_unlock)->first() ? true : false;

    if (Auth::check()) {
      $favorite = Active::where([
        "user_id" => Auth::user()->id,
        "manga_id" => $truyen->id,
        "type" => 0
      ])->first();
    }
    $id_order = (string)Auth::user()->id . "+" . $truyen->id;
    if($request->vnp_ResponseCode == "00" && $lock) {
        Order::create([
          'id' => $id_order,
          'user_id' => Auth::user()->id,
          'manga_id' => $truyen->id,
        ]);
        $lock = true;
    }
    return view('pages.truyen')->with(compact(
      'danhmuc',
      'truyen',
      'chapter',
      'chapter_dau',
      'cungdanhmuc',
      'theloai',
      'slide_truyen',
      'chapter_moinhat',
      'truyenxemnhieu',
      'truyennoibat',
      'favorite',
      'lock'
    ));
  }

  public function xemchapter($slug)
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $truyen  = Chapter::where('slug_chapter', $slug)->first();
    // breadcrumb
    $truyen_breadcrumb = Truyen::with('danhmuctruyen', 'theloai')->where('id', $truyen->truyen_id)->first();
    // end breadcrumb     
    $chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id', $truyen->truyen_id)->first();
    $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();
    $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug_chapter');
    $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug_chapter');
    $max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();
    $min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();
    if (Auth::check()) {
      Active::where([
        "user_id" => Auth::user()->id,
        "manga_id" => $truyen_breadcrumb->id,
        "type" => 0,
      ])->update(['chapter' => $slug, 'title' => $chapter->truyen->tentruyen]);

      $check = Active::where(
        [
          'user_id' => Auth::user()->id,
          'type' => 1,
          'manga_id' => $truyen_breadcrumb->id,
          'chapter' => $slug
        ]
      );
      if ($check->first()) {
        $check->update(['created_at' => now()]);
      } else {
        Active::create(
          [
            'user_id' => Auth::user()->id,
            'type' => 1, 'manga_id' => $truyen_breadcrumb->id,
            'chapter' => $slug,
            'chapter' => $slug,
            'title' => $chapter->truyen->tentruyen,
            'created_at' => now()
          ],
        );
      }
    }

    return view('pages.chapter')->with(compact(
      'danhmuc',
      'chapter',
      'all_chapter',
      'previous_chapter',
      'next_chapter',
      'max_id',
      'min_id',
      'theloai',
      'truyen_breadcrumb',
      'slide_truyen'
    ));
  }

  public function timkiem(Request $request)
  {
    $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $tukhoa = $_GET['tukhoa'];
    $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')
      ->orWhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->get();
    $sach = Sach::orderBy('id', 'DESC')->where('tensach', 'LIKE', '%' . $tukhoa . '%')
      ->orWhere('noidung', 'LIKE', '%' . $tukhoa . '%')->orWhere('tomtat', 'LIKE', '%' . $tukhoa . '%')->get();
    $product = Products::orderBy('id', 'DESC')->where('pro_name', 'LIKE', '%' . $tukhoa . '%')
      ->orWhere('pro_description', 'LIKE', '%' . $tukhoa . '%')->get();
    return view('pages.timkiem')->with(compact('slide_truyen', 'danhmuc', 'theloai', 'truyen', 'tukhoa', 'sach', 'product'));
  }
}
