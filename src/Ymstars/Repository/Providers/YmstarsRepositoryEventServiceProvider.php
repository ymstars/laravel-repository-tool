<?php

namespace Ymstars\Repository\Providers;

use Illuminate\Support\ServiceProvider;

class YmstarsRepositoryEventServiceProvider extends ServiceProvider
{

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Ymstars\Repository\Events\RepositoryEntityCreated' => [
            'Ymstars\Repository\Listeners\CleanCacheRepository'
        ],
        'Ymstars\Repository\Events\RepositoryEntityUpdated' => [
            'Ymstars\Repository\Listeners\CleanCacheRepository'
        ],
        'Ymstars\Repository\Events\RepositoryEntityDeleted' => [
            'Ymstars\Repository\Listeners\CleanCacheRepository'
        ]
    ];

    /**
     * Register the application's event listeners.
     *
     * @return void
     */
    public function boot()
    {
        $events = app('events');

        foreach ($this->listen as $event => $listeners) {
            foreach ($listeners as $listener) {
                $events->listen($event, $listener);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }

    /**
     * Get the events and handlers.
     *
     * @return array
     */
    public function listens()
    {
        return $this->listen;
    }
}
