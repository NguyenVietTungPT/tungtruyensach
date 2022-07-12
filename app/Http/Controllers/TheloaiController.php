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
        return view('admincp.theloaitruyen.index')->with(compact('theloaitruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.theloaitruyen.create');
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
                'tentheloai'  => 'required|unique:theloai|max:255',
                'slug_theloai'  => 'required|unique:theloai|max:255',
                'motatheloai' => 'required|max:255',
                'kichhoat'    => 'required',
            ],
            [
                'tentheloai.unique'    => 'Tên danh mục đã có, xin điền tên khác',
                'tentheloai.required'  => 'Phải nhập Tên Thể Loại',
                'motatheloai.required' => 'Phải nhập Mô Tả Thể Loại',
            ]
        );
        $theloaitruyen = new Theloai();
        $theloaitruyen->tentheloai = $data['tentheloai'];
        $theloaitruyen->slug_theloai = $data['slug_theloai'];
        $theloaitruyen->mota = $data['motatheloai'];
        $theloaitruyen->kichhoat = $data['kichhoat'];
        $theloaitruyen->save();
        return redirect()->back()->with('status', 'Thêm thể loại truyện thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theloai = Theloai::find($id);
        return view('admincp.theloaitruyen.edit')->with(compact('theloai'));
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
        return view('admincp.theloaitruyen.edit')->with(compact('theloai'));
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
                'tentheloai'  => 'required|max:255',
                'slug_theloai'  => 'required|max:255',
                'motatheloai' => 'required|max:255',
                'kichhoat'    => 'required',
            ],
            [
                'tentheloai.required'  => 'Phải nhập Tên Thể Loại',
                'slug_theloai.required'  => 'Phải nhập Slug Thể Loại',
                'motatheloai.required' => 'Phải nhập Mô Tả Thể Loại',
            ]
        );
        $theloaitruyen = Theloai::find($id);
        $theloaitruyen->tentheloai = $data['tentheloai'];
        $theloaitruyen->slug_theloai = $data['slug_theloai'];
        $theloaitruyen->mota = $data['motatheloai'];
        $theloaitruyen->kichhoat = $data['kichhoat'];
        $theloaitruyen->save();
        return redirect()->back()->with('status', 'Cập nhật thể loại truyện thành công!');
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
        return redirect()->back()->with('status', 'Xóa thể loại truyện thành công!');
    }
}
