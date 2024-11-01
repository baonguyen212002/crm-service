<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class UserDelete
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            User::whereIn('id', (array) $args['id'])->get()->each(function ($user) {
                if ($user->id == Auth::user()->id || Auth::user()->hasRole(1)) {
                    $user->roles()->detach();
                    UserProfile::where('userable_id', $user->id)->delete();
                    $user->delete();
                }
            });
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }

        return false;
    }
}
