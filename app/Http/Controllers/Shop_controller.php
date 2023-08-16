<?php

namespace App\Http\Controllers;

use App\Models\Products_model;

class Shop_controller extends Controller
{
    public function index()
    {
        $products = Products_model::all();

        $latest_products = Products_model::orderByDesc('id')
            ->take(6)
            ->get();

        return view('shop', compact('products', 'latest_products'));
    }
}
