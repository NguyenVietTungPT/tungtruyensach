<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Supplieres;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::orderBy('id', 'DESC')->where('pro_active', 0)->get();
        return view('admincp.products.index')->with(compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplieres = Supplieres::orderBy('id', 'DESC')->get();
        return view('admincp.products.create')->with(compact('supplieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data  = $request->validate(
        //     [
        //         'pro_name'   => 'required',
        //         'pro_price'  => 'required',
        //         'pro_price_entry' => 'required',
        //         'pro_supplier_id' => 'required',
        //         'pro_img'    => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        //         'pro_hot'    => 'required',
        //         'pro_active' => 'required',
        //         'pro_description' => 'required',
        //         'pro_number' => 'required',
        //     ],
        //     [
        //         'pro_name.required'   => 'Phải nhập Tên Mặt Hàng',
        //         'pro_price.unique'   => 'Phải nhập Giá bán Mặt Hàng',
        //         'pro_price_entry.required' => 'Phải nhập Giá nhập Mặt Hàng',
        //         'pro_supplier_id.required'  => 'Phải nhập Mã nhà cung cấp',
        //         'pro_description.required'  => 'Phải nhập Mô Tả Mặt Hàng',
        //         'pro_img.required' => 'Phải nhập Hình ảnh Mặt Hàng',
        //         'pro_number.required' => 'Phải nhập số lượng Mặt Hàng',
        //         ]
        //     );
        $product = new Products();
        $product->pro_name = $request->pro_name;
        $product->pro_price = $request->pro_price;
        $product->pro_price_entry = $request->pro_price_entry;
        $product->pro_supplier_id = $request->pro_supplier_id;
        // $product->pro_view = $request->pro_name;
        // $product->pro_hot = $request->pro_name;
        $product->pro_active = $request->pro_active; 
        $product->pro_description = $request->pro_description;
        $product->pro_number = $request->pro_number; 

        // Thêm ảnh vào folder 
        $get_image = $request->pro_img;
        $path = 'public/uploads/sach/';
        $get_name_image = $get_image->getClientOriginalName();       // hinh1.jpg
        $name_image = current(explode('.',$get_name_image));         // hinh 1  .  jpg
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();    // hinh123.jpg
        $get_image->move($path,$new_image);

        $product->pro_img = $new_image;
        $product->save();
        return redirect()->back()->with('status', 'Thêm Mặt Hàng thành công!');
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
        $supplieres = Supplieres::orderBy('id', 'DESC')->get();
        $product = Products::find($id);
        return view('admincp.products.edit')->with(compact('product', 'supplieres'));
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
        // $data  = $request->validate(
        //     [
        //         'pro_name'   => 'required',
        //         'pro_price'  => 'required',
        //         'pro_price_entry' => 'required',
        //         'pro_supplier_id' => 'required',
        //         'pro_img'    => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        //         'pro_hot'    => 'required',
        //         'pro_active' => 'required',
        //         'pro_description' => 'required',
        //         'pro_number' => 'required',
        //     ],
        //     [
        //         'pro_name.required'   => 'Phải nhập Tên Mặt Hàng',
        //         'pro_price.unique'   => 'Phải nhập Giá bán Mặt Hàng',
        //         'pro_price_entry.required' => 'Phải nhập Giá nhập Mặt Hàng',
        //         'pro_supplier_id.required'  => 'Phải nhập Mã nhà cung cấp',
        //         'pro_description.required'  => 'Phải nhập Mô Tả Mặt Hàng',
        //         'pro_img.required' => 'Phải nhập Hình ảnh Mặt Hàng',
        //         'pro_number.required' => 'Phải nhập số lượng Mặt Hàng',
        //     ]
        // );

        $product = Products::find($id);
        $product->pro_name = $request->pro_name;
        $product->pro_price = $request->pro_price;
        $product->pro_price_entry = $request->pro_price_entry;
        $product->pro_supplier_id = $request->pro_supplier_id;
        // $product->pro_view = $request->pro_name;
        // $product->pro_hot = $request->pro_name;
        $product->pro_active = $request->pro_active; 
        $product->pro_description = $request->pro_description;
        $product->pro_number = $request->pro_number; 

        // Thêm ảnh vào folder 
        $get_image = $request->pro_img;
        if($get_image){
            $path = 'public/uploads/sach'.$product->hinhanh;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'public/uploads/sach';
            $get_name_image = $get_image->getClientOriginalName();       // hinh1.jpg
            $name_image = current(explode('.',$get_name_image));         // hinh 1  .  jpg
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();    // hinh123.jpg
            $get_image->move($path,$new_image);

            $truyen->pro_img = $new_image;
        }

        $product->save();
        return redirect()->back()->with('status', 'Cập nhật Mặt Hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa Mặt Hàng thành công!');
    }
}
