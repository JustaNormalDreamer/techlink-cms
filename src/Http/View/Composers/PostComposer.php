<?php

namespace techlink\cms\Http\View\Composers;

use Illuminate\View\View;
use techlink\cms\Models\Category;

class PostComposer
{
    public function compose(View $view)
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        $view->with([
           'categories' => $categories,
           'status' => [
             '0' => 'Draft',
             '1' => 'Publish'
           ],
            'comment_status' => [
                '0' => 'Forbidden',
                '1' => 'Allowed'
            ],
        ]);
    }
}