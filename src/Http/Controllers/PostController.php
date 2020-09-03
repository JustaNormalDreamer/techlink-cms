<?php

namespace techlink\cms\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use techlink\cms\Http\Requests\CommonRequest;
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

    public function create(Post $post)
    {
        return $this->service->createModelFormView($post, $this->type);
    }

    public function store(CommonRequest $request)
    {
        $post = DB::transaction(function() use ($request) {
            $post = Auth::user()->posts()->create([
               'name' => $request->name,
               'slug' => Str::slug($request->name),
                'status' => $request->status,
                'description' => $request->description,
                'type' => $request->type,
                'excerpt' => $request->excerpt,
                'commentable' => $request->commentable,
            ]);

            //sync the categories
            $post->categories()->sync($request->categories);

            //attach the meta
            $this->service->createMeta($post, [
                'title' => $request->meta_title,
                'description' => $request->meta_description,
                'keywords' => $request->meta_keywords
            ]);

            //adding the images if available
            if($request->filepath) {
                $this->service->createImage($category, [
                    'url' => $request->filepath
                ]);
            }

            return $post;
        });

        return $this->service->redirectToEditModelView($post->id, $this->type);
    }

    public function edit(Post $post)
    {
        return $this->service->editModelFormView($post, $this->type);
    }

    public function update(CommonRequest $request, Post $post)
    {
       DB::transaction(function() use ($request, $post) {
            $post->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'status' => $request->status,
                'description' => $request->description,
                'type' => $request->type,
                'excerpt' => $request->excerpt,
                'commentable' => $request->commentable,
            ]);

            //sync the categories
            $post->categories()->sync($request->categories);

            //attach the meta
            $this->service->updateMeta($post, [
                'title' => $request->meta_title,
                'description' => $request->meta_description,
                'keywords' => $request->meta_keywords
            ]);

           //adding the images if available
           if($request->filepath) {
               $this->service->updateImage($category, [
                   'url' => $request->filepath
               ]);
           }
        });

        return $this->service->redirectToEditModelView($post->id, $this->type);
    }

    public function delete(Post $post)
    {
        return $this->service->deleteModel($post, $this->type);
    }
}
