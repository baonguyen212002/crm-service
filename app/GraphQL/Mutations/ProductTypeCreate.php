<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\ProductType;
use App\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final class ProductTypeCreate
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __construct(protected SlugService $slugService){}
    
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            $productType = new ProductType();
            $productType->fill($args);

            $slugEn = $this->slugService->createUniqueSlug($args['slug_en'] ?? null, $args['title_en'] ?? null, $productType, 'slug_en');
            $slugVi = $this->slugService->createUniqueSlug($args['slug_vi'] ?? null, $args['title_vi'] ?? null, $productType, 'slug_vi');

            $productType->slug_en = $slugEn;
            $productType->slug_vi = $slugVi;
            
            $productType->save();
            DB::commit();
            return $productType;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
