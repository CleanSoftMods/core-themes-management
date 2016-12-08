<?php use Illuminate\Routing\Router;

/**
 *
 * @var Router $router
 *
 */

$adminRoute = config('webed.admin_route');

/**
 * Admin routes
 */
$router->group(['prefix' => $adminRoute, 'middleware' => 'has-role:super-admin'], function (Router $router) use ($adminRoute) {
    $router->group(['prefix' => 'themes-management'], function (Router $router) use ($adminRoute) {
        /**
         * Put some route here
         */
        $router->get('', 'ThemeController@getIndex')->name('admin::themes.index.get');
        $router->post('', 'ThemeController@postListing')->name('admin::themes.index.post');
        $router->post('change-status/{module}/{status}', 'ThemeController@postChangeStatus')->name('admin::themes.change-status.post');

        $router->post('install/{module}', 'ThemeController@postInstall')->name('admin::themes.install.post');
        $router->post('uninstall/{module}', 'ThemeController@postUninstall')->name('admin::themes.uninstall.post');
    });
    $router->group(['prefix' => 'theme-options'], function (Router $router) use ($adminRoute) {
        /**
         * Put some route here
         */
        $router->get('', 'ThemeOptionController@getIndex')->name('admin::theme-options.index.get');
        $router->post('', 'ThemeOptionController@postIndex')->name('admin::theme-options.index.post');
    });
});
