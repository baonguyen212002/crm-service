<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

final class ProductDelete
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            Product::whereIn('id', $args['id'])->each(function($product) {
                if ($product->productTypes()->exists()) {
                    $product->productTypes()->detach();
                    $product->delete();
                }
            });
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
            return false;
        }

    }
}
