<?php

namespace techlink\cms\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use techlink\cms\Http\Requests\CommonRequest;
use techlink\cms\Models\Category;
use techlink\cms\Services\ModelService;

class CategoryController extends Controller
{
    private $service;

    private $type = 'categories';

    public function __construct(ModelService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->fetchModels(Category::class, $this->type);
    }

    public function create(Category $category)
    {
        return $this->service->createModelFormView($category, $this->type);
    }

    public function store(CommonRequest $request)
    {
        $category = DB::transaction(function() use ($request) {
            $category = Auth::user()->categories()->create([
               'name' => $request->name,
               'parent_id' => $request->parent_id,
               'slug' => Str::slug($request->name),
               'description' => $request->description,
            ]);

            //adding the meta
            $this->service->createMeta($category, [
                'title' => $request->meta_title,
                'keywords' => $request->meta_keywords,
                'description' => $request->meta_description,
            ]);

            //adding the images if available
            if($request->filepath) {
                $this->service->createImage($category, [
                   'url' => $request->filepath
                ]);
            }

            return $category;
        });

        return $this->service->redirectToEditModelView($category->id, $this->type);
    }

    public function edit(Category $category)
    {
        return $this->service->editModelFormView($category, $this->type);
    }

    public function update(Category $category, CommonRequest $request)
    {
        DB::transaction(function() use ($request, $category) {
            $category->update([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
            ]);

            //adding the meta
            $this->service->updateMeta($category, [
                'title' => $request->meta_title,
                'keywords' => $request->meta_keywords,
                'description' => $request->meta_description,
            ]);

            //adding the images if available
            if($request->filepath) {
                $this->service->updateImage($category, [
                    'url' => $request->filepath
                ]);
            }
        });

        return $this->service->redirectToEditModelView($category->id, $this->type);
    }

    public function delete(Category $category)
    {
        return $this->service->deleteModel($category, $this->type);
    }
}
