<?php

namespace Modules\Schedule\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Schedule\Interfaces\GroupRepositoryInterface;
use Modules\Schedule\Repositories\GroupRepository;
use Modules\Schedule\Interfaces\TeacherRepositoryInterface;
use Modules\Schedule\Repositories\TeacherRepository;
use Modules\Schedule\Interfaces\RoomRepositoryInterface;
use Modules\Schedule\Repositories\RoomRepository;
use Modules\Schedule\Interfaces\ScheduleRepositoryInterface;
use Modules\Schedule\Repositories\ScheduleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
