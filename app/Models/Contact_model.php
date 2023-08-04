<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_model extends Model
{
    protected $table = "contact";
    protected $fillable = [
        "email", "subject", "message",
    ];
}
