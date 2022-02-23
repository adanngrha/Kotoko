<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product_image ()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function ordered_product ()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function cart ()
    {
        return $this->hasMany(Cart::class);
        //return $this->belongsToMany(User::class, 'user_id', 'product_id')->withPivot('quantity');
    }

    public function review ()
    {
        return $this->hasMany(Review::class);
    }
}
