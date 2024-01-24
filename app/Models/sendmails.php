<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sendmails extends Model
{
    use HasFactory;
    protected $fillable = [
        'mail_subject',
        'mail_body',
        'category_id'
    ];
    public function category()
    {
        return $this->hasMany('App\Models\category', 'id', 'category_id');
    }
}
