<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\ProductType;
use Illuminate\Support\Facades\DB;

final class ProductTypeUpdate
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            $productType = ProductType::findOrFail($args['id']);
            $productType->fill($args);
            $productType->save();

            DB::commit();
            return $productType;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }

    }
}
