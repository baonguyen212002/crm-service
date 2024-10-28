<?php

namespace App\GraphQL;

use App\Enums\UserStatus;
use App\Enums\UserType;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use Nuwave\Lighthouse\Schema\Types\LaravelEnumType;

class GraphQLServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(TypeRegistry $typeRegistry)
    {
        $typeRegistry->register(
            new LaravelEnumType(UserType::class)
        );
        $typeRegistry->register(
            new LaravelEnumType(UserStatus::class)
        );
    }
}