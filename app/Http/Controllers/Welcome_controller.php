<?php

namespace App\Http\Controllers;

use App\Models\Products_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class welcome_controller extends Controller
{
    public function index()
    {
        $hour = date('H');
        $current_time = date('H:i:s');

        $products = Products_model::orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('welcome', compact('products', 'current_time', 'hour'));
    }
}
