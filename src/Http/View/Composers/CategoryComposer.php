<?php

namespace techlink\cms\Http\View\Composers;

use techlink\cms\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Category::pluck('name', 'id');

        $view->with('parent_categories', $categories);
    }
}