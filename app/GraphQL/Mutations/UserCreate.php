<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Mail\LoginAccountInformationMail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

final class UserCreate
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();

        try {
            $user = new User();
            $user->fill([
                'name' => $args['name'],
                'email' => $args['email'],
                'password' => Hash::make($args['password']),
            ]);

            if (Auth::check()) {
                $user->created_by_user_id = Auth::id();
                $user->assignRole($args['role']);
            } else {
                $user->assignRole(3);
            }

            $user->save();

            // Create user profile
            UserProfile::create([
                'phone' => $args['phone'] ?? null,
                'userable_type' => User::class,
                'userable_id' => $user->id
            ]);

            // Send welcome email
            Mail::to($user->email)->send(
                new LoginAccountInformationMail(
                    $user->email,
                    $args['password']
                )
            );

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
