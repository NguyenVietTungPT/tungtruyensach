<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Theloai;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen','theloai')->orderBy('id','DESC')->get();

        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = $request->validate(
            [
                'tentruyen'   => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255',
                'tacgia'      => 'required',
                'tomtat'      => 'required',
                'hinhanh'     => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'kichhoat'    => 'required',
                'danhmuc'     => 'required',
                'theloai'     => 'required',
                'truyennoibat'     => 'required',
            ],
            [
                'tentruyen.unique'     => 'Tên Truyện đã có, xin điền tên khác',
                'tentruyen.required'   => 'Phải nhập Tên Truyện',
                'slug_truyen.unique'   => 'Slug truyện đã có, xin điền Slug khác',
                'slug_truyen.required' => 'Phải nhập Slug truyện',
                'tacgia.required'  => 'Phải nhập Tác giả Truyện',
                'tomtat.required'  => 'Phải nhập Mô Tả Truyện',
                'hinhanh.required' => 'Phải nhập Hình ảnh Truyện',
            ]
        );

        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->price = $request->giatruyen ? $request->giatruyen : (int)0;

        // Thêm ảnh vào folder 
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();       // hinh1.jpg
        $name_image = current(explode('.',$get_name_image));         // hinh 1  .  jpg
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();    // hinh123.jpg
        $get_image->move($path,$new_image);

        $truyen->hinhanh = $new_image;

        $truyen->save();
        return redirect()->back()->with('status', 'Thêm truyện thành công!');
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
        $truyen = Truyen::find($id);
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view('admincp.truyen.edit')->with(compact('truyen','danhmuc','theloai'));
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
        $data  = $request->validate(
            [
                'tentruyen'   => 'required|max:255',
                'slug_truyen' => 'required|max:255',
                'tacgia'      => 'required',
                'tomtat'      => 'required',
                'kichhoat'    => 'required',
                'danhmuc'     => 'required',
                'theloai'     => 'required',
                'truyennoibat'     => 'required',
            ],
            [
                'tentruyen.required'   => 'Phải nhập Tên Truyện',
                'slug_truyen.required' => 'Phải nhập Slug truyện',
                'tacgia.required'  => 'Phải nhập Tác giả Truyện',
                'tomtat.required'  => 'Phải nhập Mô Tả Truyện',
            ]
        );

        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->truyen_noibat = $data['truyennoibat'];

        // Thêm ảnh vào folder 
        $get_image = $request->hinhanh;
        if($get_image){
            $path = 'public/uploads/truyen'.$truyen->hinhanh;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'public/uploads/truyen';
            $get_name_image = $get_image->getClientOriginalName();       // hinh1.jpg
            $name_image = current(explode('.',$get_name_image));         // hinh 1  .  jpg
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();    // hinh123.jpg
            $get_image->move($path,$new_image);

            $truyen->hinhanh = $new_image;
        }

        $truyen->save();
        return redirect()->back()->with('status', 'Cập nhật truyện thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }

        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công!');
    }

    public function truyennoibat(Request $request){

    }
}
