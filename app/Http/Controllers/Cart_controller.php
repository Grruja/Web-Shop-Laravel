<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart_add_request;
use App\Models\Products_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Cart_controller extends Controller
{
    public function cart() {
        $products = Session::get('products');

        return view('products.cart', compact('products'));
    }

    public function add_to_cart(Cart_add_request $request) {
        Session::push('products', [
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);

        return redirect( route('cart') );
    }
}
