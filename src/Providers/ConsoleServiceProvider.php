<?php namespace WebEd\Base\ThemesManagement\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->generatorCommands();
        $this->otherCommands();
    }

    protected function generatorCommands()
    {
        $this->commands([
            \WebEd\Base\ThemesManagement\Console\Generators\MakeTheme::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeController::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeView::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeProvider::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeCommand::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeCriteria::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeDataTable::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeFacade::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeMiddleware::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeModel::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeRepository::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeRequest::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeService::class,
            \WebEd\Base\ThemesManagement\Console\Generators\MakeSupport::class,
        ]);
    }

    protected function otherCommands()
    {
        $this->commands([
            \WebEd\Base\ThemesManagement\Console\Commands\EnableThemeCommand::class,
            \WebEd\Base\ThemesManagement\Console\Commands\DisableThemeCommand::class,
            \WebEd\Base\ThemesManagement\Console\Commands\InstallThemeCommand::class,
            \WebEd\Base\ThemesManagement\Console\Commands\UpdateThemeCommand::class,
            \WebEd\Base\ThemesManagement\Console\Commands\UninstallThemeCommand::class,
            \WebEd\Base\ThemesManagement\Console\Commands\GetAllThemesCommand::class,
        ]);
    }
}
