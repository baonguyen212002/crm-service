<?php

namespace App\GraphQL;

use App\Enums\ProductSize;
use App\Enums\UserStatus;
use App\Enums\UserType;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use Nuwave\Lighthouse\Schema\Types\LaravelEnumType;

class GraphQLServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(TypeRegistry $typeRegistry): void
    {
        $typeRegistry->register(
            new LaravelEnumType(UserType::class)
        );
        $typeRegistry->register(
            new LaravelEnumType(UserStatus::class)
        );
        $typeRegistry->register(
            new LaravelEnumType(ProductSize::class)
        );
    }
}
