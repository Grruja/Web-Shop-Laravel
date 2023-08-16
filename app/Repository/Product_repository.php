<?php

namespace App\Repository;

use App\Models\Products_model;

class Product_repository {

    private $product_model;

    public function __construct() {
        $this->product_model = new Products_model();
    }

    public function create_product($request) {
        $this->product_model->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
        ]);
    }

    public function update_product($request, $product) {
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->image = $request->get('image');
        $product->save();
    }
}
