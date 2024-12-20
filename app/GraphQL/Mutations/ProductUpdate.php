<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Product;
use App\Services\SlugService;

final class ProductUpdate
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public function __construct(protected SlugService $slugService) {}

    public function __invoke($_, array $args)
    {
        try {
            $product = Product::findOrFail($args['id']);
            $product->fill($args);

            $slugEn = $this->slugService->createUniqueSlug($args['slug_en'] ?? null, $args['title_en'], $product, 'slug_en');
            $slugVi = $this->slugService->createUniqueSlug($args['slug_vi'] ?? null, $args['title_vi'], $product, 'slug_vi');

            $product->slug_en = $slugEn;
            $product->slug_vi = $slugVi;

            $product->save();
          
            return $product;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
