<?php

namespace techlink\cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        return $this->mergeConfigRules($rules);
    }

    private function mergeConfigRules(array $rules) : array
    {
        //taking the 3rd segment from the url
        $type = request()->segment(config('cms.model_url_segment'));
        if($type && config("cms.{$type}")) {
            switch($this->method()) {
                case 'PATCH':
                case 'PUT':
                    $rules = array_merge($rules, config("cms.{$type}.update"));
                    break;

                case 'POST':
                default:
                    $rules = array_merge($rules, config("cms.{$type}.store"));
                    break;
            }
        }
        return $rules;
    }
}
