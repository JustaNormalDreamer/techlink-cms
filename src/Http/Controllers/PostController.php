<?php

namespace techlink\cms\Http\Controllers;

use Illuminate\Routing\Controller;
use techlink\cms\Models\Post;
use techlink\cms\Services\ModelService;

class PostController extends Controller
{
    private $service;

    private $type = 'posts';

    public function __construct(ModelService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->fetchModels(Post::class, $this->type);
    }
}
