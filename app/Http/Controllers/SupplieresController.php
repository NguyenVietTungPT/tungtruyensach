<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplieres;

class SupplieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplieres = Supplieres::orderBy('id', 'DESC')->get();
        return view('admincp.supplieres.index')->with(compact('supplieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.supplieres.create');
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
                'sl_name'  => 'required|unique:supplieres|max:255',
                'sl_phone'  => 'required|max:20',
                'sl_email' => 'required|max:255',
                'sl_address'    => 'required',
            ],
            [
                'sl_name.unique'    => 'Tên Nhà cung cấp đã có, xin điền tên khác',
                'sl_name.required'  => 'Phải nhập Tên Nhà cung cấp',
                'sl_phone.required' => 'Phải nhập Số điện thoại Nhà cung cấp',
                'sl_email.required' => 'Phải nhập Email Nhà cung cấp',
                'sl_address.required' => 'Phải nhập Địa chỉ Nhà cung cấp',
            ]
        );
        $supplieres = new Supplieres();
        $supplieres->sl_name    = $data['sl_name'];
        $supplieres->sl_phone   = $data['sl_phone'];
        $supplieres->sl_email   = $data['sl_email'];
        $supplieres->sl_address = $data['sl_address'];
        $supplieres->save();
        return redirect()->back()->with('status', 'Thêm danh Nhà cung cấp thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplieres = Supplieres::find($id);
        return view('admincp.supplieres.edit')->with(compact('supplieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplieres = Supplieres::find($id);
        return view('admincp.supplieres.edit')->with(compact('supplieres'));
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
                'sl_name'  => 'required|unique:supplieres|max:255',
                'sl_phone'  => 'required|max:20',
                'sl_email' => 'required|max:255',
                'sl_address'    => 'required',
            ],
            [
                'sl_name.unique'    => 'Tên Nhà cung cấp đã có, xin điền tên khác',
                'sl_name.required'  => 'Phải nhập Tên Nhà cung cấp',
                'sl_phone.required' => 'Phải nhập Số điện thoại Nhà cung cấp',
                'sl_email.required' => 'Phải nhập Email Nhà cung cấp',
                'sl_address.required' => 'Phải nhập Địa chỉ Nhà cung cấp',
            ]
        );
        $supplieres = Supplieres::find($id);
        $supplieres->sl_name    = $data['sl_name'];
        $supplieres->sl_phone   = $data['sl_phone'];
        $supplieres->sl_email   = $data['sl_email'];
        $supplieres->sl_address = $data['sl_address'];
        $supplieres->save();
        return redirect()->back()->with('status', 'Cập nhật danh Nhà cung cấp thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplieres::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa Nhà cung cấp thành công!');
    }
}
