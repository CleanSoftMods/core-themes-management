<?php namespace WebEd\Base\ThemesManagement\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapModuleServiceProvider extends ServiceProvider
{
    protected $module = 'WebEd\Base\ThemesManagement';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    private function booted()
    {
        /**
         * Register to dashboard menu
         */
        \DashboardMenu::registerItem([
            'id' => 'webed-themes-management',
            'priority' => 1002,
            'parent_id' => null,
            'heading' => null,
            'title' => 'Themes',
            'font_icon' => 'icon-magic-wand',
            'link' => route('admin::themes.index.get'),
            'css_class' => null,
            'permissions' => ['view-themes'],
        ]);
        if (cms_theme_options()->count()) {
            \DashboardMenu::registerItem([
                'id' => 'webed-theme-options',
                'priority' => 1002,
                'parent_id' => null,
                'heading' => null,
                'title' => 'Theme options',
                'font_icon' => 'icon-settings',
                'link' => route('admin::theme-options.index.get'),
                'css_class' => null,
            ]);
        }
    }
}
