<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart_add_request;
use App\Models\Products_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Cart_controller extends Controller
{
    public function cart() {
        $my_cart = [];

        foreach (Session::get('products') as $item) {
            $product = Products_model::where('id', $item['product_id'])->first();

            if ($product) {
                array_push($my_cart, [
                    'name' => $product->name,
                    'price' => $product->price,
                    'amount' => $item['amount'],
                    'total' => $item['amount'] * $product->price,
                ]);
            }
        }

        return view('products.cart', compact('my_cart'));
    }

    public function add_to_cart(Cart_add_request $request) {
        $product = Products_model::where(['id' => $request->id])->first();
        if ($request->amount > $product->amount) {
            return redirect()->back()
                ->withErrors('Only '.$product->amount.' left.');
        }

        Session::push('products', [
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);

        return redirect( route('cart') );
    }
}
