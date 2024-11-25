<?php

namespace App\Models;

use App\Enums\ProductSize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title_en',
        'title_vi',
        'slug',
        'images',
        'main_image',
        'description_en',
        'description_vi',
        'content_en',
        'content_vi',
        'size',
        'price'
    ];

    protected $casts = [
        'images' => 'array',
        'size' => ProductSize::class,
        'price' => 'float',
    ];

    public function productTypes()
    {
        return $this->belongsToMany(ProductType::class, 'product_product_types');
    }

    // Accessor cho title dựa theo locale
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->title_en : $this->title_vi;
    }

    // Accessor cho description dựa theo locale
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->description_en : $this->description_vi;
    }

    // Accessor cho content dựa theo locale
    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->content_en : $this->content_vi;
    }

    // Scope để filter theo size
    public function scopeOfSize($query, $size)
    {
        return $query->where('size', $size);
    }

    // Scope để filter theo price range
    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }
}
