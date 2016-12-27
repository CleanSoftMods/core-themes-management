<?php namespace WebEd\Base\ThemesManagement\Http\Controllers;

use WebEd\Base\Core\Http\Controllers\BaseAdminController;
use WebEd\Base\Core\Support\DataTable\DataTables;
use WebEd\Base\ThemesManagement\Http\DataTables\ThemesListDataTable;

class ThemeController extends BaseAdminController
{
    protected $module = 'webed-themes-management';

    public function __construct()
    {
        parent::__construct();

        $this->breadcrumbs->addLink('Themes');

        $this->setPageTitle('Themes');

        $this->getDashboardMenu($this->module);
    }

    /**
     * Get index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(ThemesListDataTable $themesListDataTable)
    {
        $this->dis['dataTable'] = $themesListDataTable->run();

        return do_filter('webed-themes-management.index.get', $this)->viewAdmin('list');
    }

    /**
     * Set data for DataTable plugin
     * @param ThemesListDataTable $themesListDataTable
     * @return \Illuminate\Http\JsonResponse
     */
    public function postListing(ThemesListDataTable $themesListDataTable)
    {
        return do_filter('datatables.webed-themes-management.index.post', $themesListDataTable, $this);
    }

    public function postChangeStatus($alias, $status)
    {
        switch ((bool)$status) {
            case true:
                return themes_management()->enableTheme($alias)->refreshComposerAutoload();
                break;
            default:
                return themes_management()->disableTheme($alias)->refreshComposerAutoload();
                break;
        }
    }

    public function postInstall($alias)
    {
        $module = get_theme_information($alias);

        if (!$module) {
            return response_with_messages('Theme not exists', true, 500);
        }

        \Artisan::call('theme:install', [
            'alias' => $alias
        ]);

        return response_with_messages('Installed theme dependencies');
    }

    public function postUninstall($alias)
    {
        $module = get_theme_information($alias);

        if (!$module) {
            return response_with_messages('Theme not exists', true, 500);
        }

        \Artisan::call('theme:uninstall', [
            'alias' => $alias
        ]);

        return response_with_messages('Uninstalled theme dependencies');
    }
}
