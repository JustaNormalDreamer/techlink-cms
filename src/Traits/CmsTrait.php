<?php


namespace Techlink\Cms\Traits;


trait CmsTrait
{
    public function categories()
    {
        return $this->hasMany(\Techlink\Cms\Category::class);
    }

    public function posts()
    {
        return $this->hasMany(\Techlink\Cms\Post::class);
    }
}
