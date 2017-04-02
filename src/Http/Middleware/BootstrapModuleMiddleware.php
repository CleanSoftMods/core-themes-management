<?php namespace WebEd\Base\ThemesManagement\Http\Middleware;

use \Closure;

class BootstrapModuleMiddleware
{
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  array|string $params
     * @return mixed
     */
    public function handle($request, Closure $next, ...$params)
    {
        /**
         * Register to dashboard menu
         */
        \DashboardMenu::registerItem([
            'id' => 'webed-themes-management',
            'priority' => 1002,
            'parent_id' => null,
            'heading' => null,
            'title' => trans('webed-themes-management::base.admin_menu.themes.title'),
            'font_icon' => 'icon-magic-wand',
            'link' => route('admin::themes.index.get'),
            'css_class' => null,
            'permissions' => ['view-themes'],
        ]);
        \DashboardMenu::registerItem([
            'id' => 'webed-theme-options',
            'priority' => 1002,
            'parent_id' => null,
            'heading' => null,
            'title' => trans('webed-themes-management::base.admin_menu.theme_options.title'),
            'font_icon' => 'icon-settings',
            'link' => route('admin::theme-options.index.get'),
            'css_class' => null,
        ]);

        return $next($request);
    }
}
