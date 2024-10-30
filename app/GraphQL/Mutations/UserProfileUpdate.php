<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

final class UserProfileUpdate
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            $userProfile = UserProfile::find($args['id']);
            $userProfile->fill($args);

            $userProfile->save();

            DB::commit();
            return $userProfile;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }
}
