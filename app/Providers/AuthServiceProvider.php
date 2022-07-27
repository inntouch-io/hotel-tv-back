<?php

namespace App\Providers;

use Domain\Applications\Entities\Application;
use Domain\Applications\Policies\ApplicationPolicy;
use Domain\Iptv\Entities\IptvChannel;
use Domain\Iptv\Entities\IptvChannelInfo;
use Domain\Iptv\Policies\IptvChannelInfoPolicy;
use Domain\Iptv\Policies\IptvChannelPolicy;
use Domain\Menus\Entities\Menu;
use Domain\Menus\Entities\MenuCard;
use Domain\Menus\Entities\MenuCardInfo;
use Domain\Menus\Entities\MenuInfo;
use Domain\Menus\Policies\MenuCardInfoPolicy;
use Domain\Menus\Policies\MenuCardPolicy;
use Domain\Menus\Policies\MenuInfoPolicy;
use Domain\Menus\Policies\MenuPolicy;
use Domain\Messages\Entities\Message;
use Domain\Messages\Entities\MessageCard;
use Domain\Messages\Entities\MessageCardInfo;
use Domain\Messages\Entities\MessageInfo;
use Domain\Messages\Policies\MessageCardInfoPolicy;
use Domain\Messages\Policies\MessageCardPolicy;
use Domain\Messages\Policies\MessageInfoPolicy;
use Domain\Messages\Policies\MessagePolicy;
use Domain\Modules\Entities\Module;
use Domain\Modules\Policies\ModulePolicy;
use Domain\Rooms\Entities\Room;
use Domain\Rooms\Policies\RoomPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Application::class     => ApplicationPolicy::class,
        Module::class          => ModulePolicy::class,
        Message::class         => MessagePolicy::class,
        MessageInfo::class     => MessageInfoPolicy::class,
        MessageCard::class     => MessageCardPolicy::class,
        MessageCardInfo::class => MessageCardInfoPolicy::class,
        Menu::class            => MenuPolicy::class,
        MenuInfo::class        => MenuInfoPolicy::class,
        MenuCard::class        => MenuCardPolicy::class,
        MenuCardInfo::class    => MenuCardInfoPolicy::class,
        Room::class            => RoomPolicy::class,
        IptvChannel::class     => IptvChannelPolicy::class,
        IptvChannelInfo::class => IptvChannelInfoPolicy::class
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
