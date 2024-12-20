<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\ProductType;
use Exception;
use Illuminate\Support\Facades\DB;

final class ProductTypeDelete
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            ProductType::query()
            ->whereIn('id', $args['id'])
            ->get()
            ->each(function ($productType) {
                if (!$productType->products()->exists()) {
                    $productType->delete();
                }
            });
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
