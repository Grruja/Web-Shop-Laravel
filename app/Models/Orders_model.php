<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_model extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'price', 'status',];
}
