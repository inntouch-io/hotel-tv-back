<?php

namespace App\Providers;

use Domain\Applications\Entities\Application;
use Domain\Applications\Policies\ApplicationPolicy;
use Domain\Modules\Entities\Module;
use Domain\Modules\Policies\ModulePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Application::class => ApplicationPolicy::class,
        Module::class      => ModulePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
