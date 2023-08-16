<?php

namespace App\Http\Controllers;

use App\Http\Requests\Save_product_request;
use App\Http\Requests\Update_product_request;
use App\Models\Products_model;
use App\Repository\Product_repository;
use Illuminate\Http\Request;

class Products extends Controller
{
    private $product_repo;

    public function __construct() {
        $this->product_repo = new Product_repository();
    }

    public function save_product(Save_product_request $request) {
        $this->product_repo->create_product($request);
        return redirect()->route('all_products');
    }

    public function all_products() {
        $products = Products_model::all();
        return view('all_products', compact('products'));
    }

    public function edit_product(Products_model $product) {
        return view('products.edit_product', compact('product'));
    }

    public function update_product(Update_product_request $request, Products_model $product) {
        $this->product_repo->update_product($request, $product);
        return redirect( route('all_products') );
    }


    public function delete_product(Products_model $product) {
        $product->delete();
        return redirect()->back();
    }
}
