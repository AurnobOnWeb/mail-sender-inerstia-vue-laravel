<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Recipents extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'status',
        'phone_number',
        'address',
        'category_id',
        'description'
    ];

    public function category()
    {
        return $this->hasMany('App\Models\category', 'id', 'category_id');
    }
}
