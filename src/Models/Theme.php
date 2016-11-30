<?php namespace WebEd\Base\ThemesManagement\Models;

use WebEd\Base\ThemesManagement\Models\Contracts\ThemeModelContract;
use WebEd\Base\Core\Models\EloquentBase as BaseModel;

class Theme extends BaseModel implements ThemeModelContract
{
    protected $table = 'themes';

    protected $primaryKey = 'id';

    protected $fillable = [];

    public $timestamps = false;

    public function themeOptions()
    {
        return $this->hasMany(ThemeOption::class, 'theme_id');
    }

    public function setEnabledAttribute($value)
    {
        $this->attributes['enabled'] = (int)!!$value;
    }

    public function setInstalledAttribute($value)
    {
        $this->attributes['installed'] = (int)!!$value;
    }
}
