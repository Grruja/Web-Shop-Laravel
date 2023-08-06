<?php

namespace App\Http\Controllers;

use App\Models\Products_model;
use Illuminate\Http\Request;

class Products extends Controller
{
    public function all_products()
    {
        $products = Products_model::all();

        return view('all_products', compact('products'));
    }


    public function save_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'description' => 'required|string|max:255',
            'amount' => 'required|int|min:0',
            'price' => 'required|numeric|between:0,99.99',
            'image' => 'required|string',
        ]);

        Products_model::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
        ]);

        return redirect()->route('all_products');
    }


    public function edit_product(Products_model $product)
    {
        return view('products.edit_product', compact('product'));
    }

    public function update_product(Request $request, Products_model $product)
    {
        $request->validate([
           'name' => 'required|string|min:2',
           'description' => 'required|string|max:255',
           'amount' => 'required|int|min:0',
           'price' => 'required|numeric|gt:0|between:0,99.99',
           'image' => 'required|string',
        ]);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->save();

        return redirect( route('all_products') );
    }


    public function delete_product(Products_model $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
