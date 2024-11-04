<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

final class ForgotPassword
{
    /**
     * @param null $_
     * @param array{} $args
     */
    public function __invoke($_, array $args)
    {
        DB::beginTransaction();
        try {
            $user = User::where('email', $args['email'])->first();
            if ($user) {

                $token = Password::getRepository()->create($user);

                DB::table('password_reset_tokens')->updateOrInsert(
                    ['email' => $args['email']], // Key to match
                    [
                        'token' => $token,
                        'created_at' => now(),
                    ]
                );

                Mail::to($args['email'])->send(new ForgotPasswordMail($token, $user->name));
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
