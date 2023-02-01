<?php

namespace App\Http\Controllers;

use App\Models\DanhmucTruyen;
use App\Models\Theloai;
use App\Models\Truyen;
use App\Models\Active;
use Illuminate\Support\Facades\Auth;



class ActiveController extends Controller
{
  public function theodoi()
  {
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $listMangaFavorite = Active::select('manga_id')
      ->where("user_id", Auth::user()->id)
      ->where("type", 0)
      ->pluck('manga_id')->toArray();
    $truyen = Truyen::orderBy('id', 'DESC')
      ->select("truyen.*", "active_account.chapter", "active_account.title","active_account.type")
      ->where('kichhoat', 0)
      ->where("active_account.type", 0)
      ->leftJoin('active_account', "active_account.manga_id", "truyen.id")
      ->whereIn('id', $listMangaFavorite)
      ->paginate(8);
    $theloai = Theloai::orderBy('id', 'DESC')->get();
    return view('pages.favorite')->with(compact('truyen', 'danhmuc', 'theloai'));
  }

  public function lichsu()
  {
    $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
    $truyen = Active::orderBy('created_at', 'desc')
      ->select("active_account.chapter", "active_account.title", "chapter.tieude", "truyen.*","active_account.user_id")
      ->join("truyen", "truyen.id", "active_account.manga_id")
      ->join("chapter", "chapter.slug_chapter", "active_account.chapter")
      ->where("user_id", Auth::user()->id)
      ->where("type", 1)
      ->where('truyen.kichhoat', 0)
      ->paginate(8)->unique('manga_id');

    $theloai = Theloai::orderBy('id', 'DESC')->get();
    return view('pages.history')->with(compact('truyen', 'danhmuc', 'theloai'));
  }

  public function removelichsu($mangaId,$userId){

    Active::where([
      'manga_id' => $mangaId,
      'user_id' => $userId,
      'type' => 1
    ])->delete();
    return redirect()->route('lichsu');
  }

  public function yeuthich($slug, $idManga)
  {
    $check = Active::where(
      [
        'user_id' => Auth::user()->id,
        'type' => 0,
        'manga_id' => $idManga,
        'chapter' => $slug
      ]
    );
    if (!$check->first()) {
      Active::create(
        [
          'user_id' => Auth::user()->id,
          'type' => 0,
          'manga_id' => $idManga,
          'created_at' => now()
        ],
      );
    }
    return redirect("/xem-truyen/" . $slug);
  }

  public function huybo($slug, $idManga)
  {
    Active::where([
      "user_id" => Auth::user()->id,
      "manga_id" => $idManga,
      'type' => 0,
    ])->delete();
    return redirect("/xem-truyen/" . $slug);
  }
}
