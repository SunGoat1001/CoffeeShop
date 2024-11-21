<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const DEFAULT_CURRENCY = 'VNĐ';

    public const DEFAULT_IMAGE = './img/default_image.jpg';
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price) . ' ' . $this->currency;
    }

    public function getFormattedTotalAmount($quantity = 1)
    {
        return number_format($this->price * $quantity) . ' ' . $this->currency;
    }
}
