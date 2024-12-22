<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

final class UserUpdate
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            $userId = Auth::user()->hasRole(1) ? $args['id'] : Auth::user()->id;
            $user = User::find($userId);
            $user->fill($args);

            if (isset($args['password']) && isset($args['current_password'])) {
                if (!Hash::check($args['current_password'], $user->password)) {
                    throw new \Exception("Current password does not match.");
                }
                $user->password = Hash::make($args['password']);
            }

            $user->save();

            if (isset($args['role']) && Auth::user()->hasRole(1)) {
                $user->syncRoles($args['role']);
            }

            $userProfile = UserProfile::where('userable_id', $userId)->first();
            if ($userProfile) {
                $userProfile->fill($args);
                $userProfile->save();
            }

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }
    }
}
