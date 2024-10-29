<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            $user = User::find($args['id']);
            $user->fill($args);

            if (isset($args['password'])) {
                $user->password = Hash::make($args['password']);
            }

            $user->save();

            if (isset($args['role'])) {
                $user->assignRole($args['role']);
            }

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }
    }
}
