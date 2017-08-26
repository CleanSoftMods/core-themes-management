<?php namespace WebEd\Base\ThemesManagement\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use WebEd\Base\ThemesManagement\Facades\ThemeOptionsSupportFacade;
use WebEd\Base\ThemesManagement\Facades\ThemesManagementFacade;

class ModuleProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'webed-themes-management');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'webed-themes-management');

        $this->publishes([
            __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/webed-themes-management',
        ], 'views');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/webed-themes-management'),
        ], 'lang');

        app()->booted(function () {
            $this->app->register(BootstrapModuleServiceProvider::class);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Load helpers
        load_module_helpers(__DIR__);

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('ThemesManagement', ThemesManagementFacade::class);
        $aliasLoader->alias('ThemeOptions', ThemeOptionsSupportFacade::class);

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(LoadThemeServiceProvider::class);
        $this->app->register(HookServiceProvider::class);
    }
}
