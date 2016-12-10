<?php namespace WebEd\Base\ThemesManagement\Repositories;

use WebEd\Base\Caching\Repositories\AbstractRepositoryCacheDecorator;

use WebEd\Base\ThemesManagement\Repositories\Contracts\ThemeRepositoryContract;

class ThemeRepositoryCacheDecorator extends AbstractRepositoryCacheDecorator  implements ThemeRepositoryContract
{
    /**
     * @param $alias
     * @return mixed
     */
    public function getByAlias($alias)
    {
        return $this->beforeGet(__FUNCTION__, func_get_args());
    }
}
