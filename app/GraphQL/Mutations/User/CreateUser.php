<?php declare(strict_types=1);

namespace App\GraphQL\Mutations\User;

use App\Mail\LoginAccountInformationMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

final class CreateUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            if (!isset($args['department_id'])) {
                $args['department_id'] = Auth::user()->department_id;
            }

            $user = new User();
            $user->fill($args);
            $user->password = Hash::make($args['password']);

            if($args['created_by_user_id']) {
                $user->created_by_user_id = Auth::user()->id;
            }

            // $user->email_verified_at = now();
            // $user->remember_token = Str::random(10);
            $user->save();

            if (isset($args['role'])) {
                $user->assignRole($args['role']);
            } else {
                $user->assignRole(3); //customer
            }

            Mail::to($args['email'])->send(
                new LoginAccountInformationMail(
                    $args['email'],
                    $args['password']
                )
            );

            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }
}
