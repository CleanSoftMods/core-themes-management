<?php namespace WebEd\Base\ThemesManagement\Repositories;

use WebEd\Base\Core\Repositories\AbstractBaseRepository;
use WebEd\Base\Caching\Services\Contracts\CacheableContract;

use WebEd\Base\ThemesManagement\Repositories\Contracts\ThemeRepositoryContract;

class ThemeRepository extends AbstractBaseRepository implements ThemeRepositoryContract, CacheableContract
{
    protected $rules = [

    ];

    protected $editableFields = [
        '*',
    ];

    /**
     * @param $alias
     * @return mixed
     */
    public function getByAlias($alias)
    {
        return $this->where('alias', '=', $alias)->first();
    }
}
