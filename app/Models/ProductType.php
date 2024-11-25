<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    // Relationship với Product qua bảng pivot
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_types');
    }

    // Scope để tìm theo slug
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
