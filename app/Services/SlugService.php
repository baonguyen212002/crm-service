<?php

namespace App\Services;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SlugService {
    public function createUniqueSlug($slug = null, $title = null, Model $model, $slugColumn) {
        // Clean up inputs
        $slug = trim($slug ?? '');
        $title = trim($title ?? '');
        
        // Determine which string to use for slug generation
        if (empty($slug) || $slug === '-') {
            // If slug is empty or just a dash, use title
            if (empty($title)) {
                // If both are empty, generate a timestamp-based slug
                return 'item-' . time();
            }
            $slugString = $title;
        } else {
            $slugString = $slug;
        }
        
        // Generate base slug
        $baseSlug = Str::of($slugString)->slug('-');
        
        // If the resulting slug is empty or just a dash, use a fallback
        if (empty($baseSlug) || $baseSlug == '-') {
            $baseSlug = 'item-' . time();
        }
        
        $slug = $baseSlug;
        $originalSlug = $baseSlug;
        $count = 1;
        
        // Check for uniqueness
        while ($model::where($slugColumn, $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}