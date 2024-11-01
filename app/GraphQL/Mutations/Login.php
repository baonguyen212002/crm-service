<?php

    namespace App\GraphQL\Mutations;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use Lcobucci\JWT\Parser;
    use Nuwave\Lighthouse\Exceptions\AuthenticationException;

    final class Login
    {
        /**
         * @param null $_
         * @param array{} $args
         */
        public function __invoke($_, array $args)
        {
            $credentials = [
                'client_id' => env('PASSPORT_CLIENT_ID'),
                'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                'grant_type' => 'password',
                'username' => $args['email'],
                'password' => $args['password'],
            ];

            $token = $this->makeRequest($credentials);

            return $token;
        }

        private function makeRequest(array $credentials)
        {
            $request = Request::create(
                'oauth/token',
                'POST',
                $credentials,
                [],
                [],
                [
                    'HTTP_Accept' => 'application/json',
                ]
            );
            $response = app()->handle($request);
            $decodedResponse = json_decode($response->getContent(), true);
            if ($response->getStatusCode() != 200) {
                throw new AuthenticationException('Unauthenticated.');
            }
            return $decodedResponse;
        }
    }
