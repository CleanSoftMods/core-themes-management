<?php namespace WebEd\Base\ThemesManagement\Http\Controllers;

use WebEd\Base\Http\Controllers\BaseAdminController;
use WebEd\Base\ThemesManagement\Repositories\Contracts\ThemeOptionRepositoryContract;
use WebEd\Base\ThemesManagement\Repositories\ThemeOptionRepository;

class ThemeOptionController extends BaseAdminController
{
    protected $module = 'webed-themes-management';

    /**
     * @param ThemeOptionRepository $repository
     */
    public function __construct(ThemeOptionRepositoryContract $repository)
    {
        parent::__construct();

        $this->repository = $repository;

        $this->getDashboardMenu('webed-theme-options');
        $this->breadcrumbs->addLink('Theme options');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $this->setPageTitle('Theme options');

        return do_filter('theme-options.index.get', $this)->viewAdmin('theme-options-index');
    }

    public function postIndex()
    {
        $data = $this->request->except([
            '_token',
            '_tab',
        ]);

        /**
         * Filter
         */
        $data = do_filter('theme-options.before-edit.post', $data, $this);

        $result = $this->repository->updateOptions($data);

        $msgType = $result['error'] ? 'danger' : 'success';

        flash_messages()
            ->addMessages($result['messages'], $msgType)
            ->showMessagesOnSession();

        do_action('theme-options.after-edit.post', $result, $this);

        return redirect()->back();
    }
}
