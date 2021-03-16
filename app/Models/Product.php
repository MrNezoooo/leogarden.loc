<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; //підказує з якої таблички працювати

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'supplier_id',
        'product_name',
        'product_code',
        'product_quantity',
        'product_details',
        'product_size',
        'selling_price',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trend',
        'image_one',
        'image_two',
        'image_three',
        'status',
    ];

    public function category(){
        return $this->hasOne(Category::class,'id', 'category_id');
    }

    public function supplier(){
        return $this->hasOne(Supplier::class,'id', 'supplier_id');
    }
}
