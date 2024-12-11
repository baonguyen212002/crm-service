<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Product;

final class ProductDelete
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        Product::whereIn('id', $args['id'])->each(function($product) {
            if ($product->productTypes()->exists()) {
                $product->productTypes()->detach();
                $product->delete();
            }
        });

        return true;
    }
}
