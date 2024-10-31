<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

final class FileImageUpload
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            $originalFilename = $args['image']->getClientOriginalName();
            $pathStorage = "/public/common/images";
            $filePath = $args['image']->store($pathStorage);
            $ret = [
                'url' => url(Storage::url($filePath)),
                'original_filename' => $originalFilename,
            ];
            DB::commit();
            return $ret;
        } catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        };
    }
}
