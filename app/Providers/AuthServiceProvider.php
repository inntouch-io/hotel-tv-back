<?php

namespace App\Providers;

use Domain\Applications\Entities\Application;
use Domain\Applications\Policies\ApplicationPolicy;
use Domain\Messages\Entities\Message;
use Domain\Messages\Entities\MessageInfo;
use Domain\Messages\Policies\MessageInfoPolicy;
use Domain\Messages\Policies\MessagePolicy;
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
        Module::class      => ModulePolicy::class,
        Message::class     => MessagePolicy::class,
        MessageInfo::class => MessageInfoPolicy::class,
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
