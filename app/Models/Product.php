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

    public static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    protected static function boot() // runs when product is created
    {
        parent::boot();

        // Automatically creates a slug on product creation
        static::creating(function ($product) {
            $product->slug = self::generateUniqueSlug($product->name);
        });
    }

    protected $fillable = [
        'name',
        'qty',
        'price',
        'description'
    ];
}
