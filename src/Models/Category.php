<?php

namespace techlink\cms\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'name', 'slug', 'description', 'parent_id'
    ];

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
