<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Illuminate\Database\Eloquent\Casts\get;

class welcome_controller extends Controller
{
    public function index()
    {
        $hour = date('H');
        $current_time = date('H:i:s');

        return view('welcome', compact('current_time', 'hour'));
    }
}
