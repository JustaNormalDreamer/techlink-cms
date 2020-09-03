<?php

namespace Techlink\Cms\Services;

use Illuminate\Support\Str;

class ModelService
{
    public function fetchModels(string $model, string $type)
    {
        $models = $model::with(config("cms.{$type}.index.relations"))
            ->withCount(config("cms.{$type}.index.withCount"))
            ->latest()
            ->paginate(config("cms.paginate"));

        return view("cms::{$type}.index", compact('models'));
    }

    public function createModelFormView(object $model, string $type)
    {
        return view("cms::components.form.create", compact('model', 'type'));
    }

    public function editModelFormView(object $model, string $type)
    {
        return view("cms::components.form.edit", compact('model', 'type'));
    }

    public function deleteModel(object $model, string $type)
    {
        return redirect()->back()->with("toast_success", Str::singular(ucfirst($type)) . " has been deleted.");
    }

    public function createMeta(object $model, $metaData)
    {
        $model->meta()->create($metaData);
    }

    public function createImage(object $model, $imageData)
    {
        $model->image()->create($imageData);
    }

    public function updateMeta(object $model, $metaData)
    {
        $model->meta()->update($metaData);
    }

    public function updateImage(object $model, $imageData)
    {
        $model->image()->update($imageData);
    }

    public function redirectToEditModelView($modelId, string $type)
    {
        $message = (request()->getMethod() === 'PUT') ? 'updated' : 'created';
        return redirect()->route("cms.{$type}.edit", $modelId)->with('toast_success', Str::singular(ucfirst($type)) . " has been {$message}.");
    }
}
