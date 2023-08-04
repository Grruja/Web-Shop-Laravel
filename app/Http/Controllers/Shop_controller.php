<?php

namespace App\Http\Controllers;

use App\Models\Products_model;
use Illuminate\Http\Request;

class shop_controller extends Controller
{
    public function index()
    {
        $products = Products_model::all();

        $latest_products = Products_model::orderByDesc('id')
            ->take(6)
            ->get();

        return view('shop', compact('products', 'latest_products'));
    }

    public function send_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|min:5',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric|gt:0',
            'image' => 'required|string',
        ]);

        Products_model::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
        ]);

        return redirect('shop');
    }
}
