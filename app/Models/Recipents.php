<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipents extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'status',
        'phone_number',
        'address',
        'category_id',
        'description'
    ];
}
