<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart_add_request;
use App\Models\Order_items_model;
use App\Models\Orders_model;
use App\Models\Products_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart_controller extends Controller
{
    public function cart() {
        $cart = Session::get('products');
        $my_cart = [];

        if ($cart == null) {
            return redirect('/');
        }

        foreach ($cart as $item) {
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

    public function finish_order() {
        $cart = Session::get('products');
        $total_price = 0;

        if ($cart == null) {
            return redirect('/');
        }

        foreach ($cart as $item) {
            $product = Products_model::where('id', $item['product_id'])->first();

            if ($item['amount'] > $product->amount) {
                return redirect()->back()->withErrors('Only'.$product->amount.'left.');
            }

            $total_price += $product->price * $item['amount'];
        }

        $order = Orders_model::create([
            'user_id' => Auth::id(),
            'price' => $total_price,
        ]);

        foreach ($cart as $item) {
            $product = Products_model::where('id', $item['product_id'])->first();
            $product->amount -= $item['amount'];
            $product->save();

            Order_items_model::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $product->price * $item['amount'],
            ]);
        }

        Session::remove('products');
        return view('thank_you');
    }
}
