<?php

namespace techlink\cms\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 'description', 'excerpt', 'type', 'status', 'commentable', 'slug'
    ];

    protected $hidden = [
        'type', 'commentable'
    ];

    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
