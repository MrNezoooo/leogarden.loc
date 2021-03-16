<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_name',
    ];

    public function user(){  //<td> {{ $category->user_id }} </td> one to one   //  I спосіб
        return $this->hasOne(User::class,'id', 'user_id');
   }

    //  II спосіб (з допомогою query bilder) - в модудь нічого не пишуть
}
