<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cottage extends Model
{
    use HasFactory;
    protected $fillable = [
        "cottage_name",
        "capacity",
        "price"
    ];
}
