<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;

class CartController extends Controller
{
    public function save_cart(Request $request){
        // $id = $request->productid_hidden;
        // $quantity = $request->qty;
        // $data = Products::orderBy('id','DESC')->where('id', id)->get();

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        return view('pages.cart.show_cart');

    }
}
