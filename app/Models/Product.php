<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    // public function getRouteKeyName()
    // {
    //     return 'title'; // db column name you would like to appear in the url.
    // }

    protected static function boot()
    {
        parent::boot();

        // Automatically create a slug on product creation
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }

    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];
}
