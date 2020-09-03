<?php

return [

    'paginate' => 10,
    'model_url_segment' => 1,

    /*
    |--------------------------------------------------------------------------
    | Category Model
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */
    'categories' => [
        'index' => [
            'relations' => [
                'users:id,name',
            ],
            'withCount' => [
                'posts'
            ]
        ],
        'store' => [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'filepath' => 'nullable|url'
        ],
        'update' => [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'filepath' => 'nullable|url'
        ]
    ],



    /*
    |--------------------------------------------------------------------------
    | Post Model
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */
    'posts' => [
        'index' => [
            'relations' => [
                'users:id,name'
            ],
            'withCount' => [],
        ],
        'store' => [

        ],
        'update' => [

        ]
    ],

];
