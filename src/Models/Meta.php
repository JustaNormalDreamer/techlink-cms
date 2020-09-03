<?php

namespace techlink\cms\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'title', 'keywords', 'description'
    ];

    public $timestamps = false;

    public function metaable()
    {
        return $this->morphTo();
    }
}
