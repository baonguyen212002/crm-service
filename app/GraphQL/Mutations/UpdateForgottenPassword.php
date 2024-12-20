<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\DB;

final class UpdateForgottenPassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            $passwordReset = DB::table('password_reset_tokens')->where(['token' => $args['token']])->first();

            if ($passwordReset) {
                User::where('email', $passwordReset->email)->update(['password' => $passwordReset->password]);
                DB::table('password_reset_tokens')->where(['token' => $passwordReset->token])->delete();
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
