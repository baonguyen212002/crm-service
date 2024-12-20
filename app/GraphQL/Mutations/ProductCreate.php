<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Product;
use App\Services\SlugService;

final class ProductCreate
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __construct(protected SlugService $slugService) {}

    public function __invoke($_, array $args)
    {
        try {
            $product = new Product();
            $product->fill($args);

            $slugEn = $this->slugService->createUniqueSlug($args['slug_en'] ?? null, $args['title_en'] ?? null, $product, 'slug_en');
            $slugVi = $this->slugService->createUniqueSlug($args['slug_vi'] ?? null, $args['title_vi'] ?? null, $product, 'slug_vi');

            $product->slug_en = $slugEn;
            $product->slug_vi = $slugVi;

            $product->save();

            if (isset($args['types']['sync'])) {
                $product->productTypes()->sync($args['types']['sync']);
            }

            return $product;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
