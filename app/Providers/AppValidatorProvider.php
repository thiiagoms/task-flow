<?php

namespace App\Providers;

use App\Contracts\Validators\Auth\HashValidatorContract;
use App\Contracts\Validators\Email\EmailValidatorContract;
use App\Contracts\Validators\User\UserEmailValidatorContract;
use App\Contracts\Validators\Uuid\UuidValidatorContract;
use App\Validators\Auth\HashValidator;
use App\Validators\Email\EmailValidator;
use App\Validators\User\UserEmailValidator;
use App\Validators\Uuid\UuidValidator;
use Illuminate\Support\ServiceProvider;

class AppValidatorProvider extends ServiceProvider
{
    private array $validators = [
        EmailValidatorContract::class => EmailValidator::class,
        HashValidatorContract::class => HashValidator::class,
        UuidValidatorContract::class => UuidValidator::class,
        /** begin: User */
        UserEmailValidatorContract::class => UserEmailValidator::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->validators as $contract => $validator) {
            $this->app->bind($contract, $validator);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
