<?php
/**
 * Created by YMSTARS.LTD -Junjie Zeng.
 * Author: Junjie Zeng
 * Email: ymstars@qq.com
 * Url: www.ymstars.com
 * Date: 2019/1/4
 * Time: 13:33
 */

namespace Ymstars\Repository\Providers;

use Illuminate\Support\ServiceProvider;

class YmstarsRepositoryServiceProvider extends ServiceProvider
{

    protected $defer = false;


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__ . '/../../../resources/config/repository.php' => config_path('repository.php')
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../../../resources/config/repository.php', 'repository');

        $this->loadTranslationsFrom(__DIR__ . '/../../../resources/lang', 'repository');
    }

    /**
     * Register services.
     *
     * @return void
     */
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands('Ymstars\Repository\Generators\Commands\RepositoryCommand');
        $this->commands('Ymstars\Repository\Generators\Commands\TransformerCommand');
        $this->commands('Ymstars\Repository\Generators\Commands\PresenterCommand');
        $this->commands('Ymstars\Repository\Generators\Commands\EntityCommand');
        $this->commands('Ymstars\Repository\Generators\Commands\BindingsCommand');
        $this->commands('Ymstars\Repository\Generators\Commands\CriteriaCommand');
        $this->app->register('Ymstars\Repository\Providers\YmstarsRepositoryEventServiceProvider');
    }
}