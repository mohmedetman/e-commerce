<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            // 'name'=>'required',
            'is_active' => 'nullable',
            'photo' => 'nullable',
            'parent_id' => 'nullable',
            'type' => 'required|in:1,2',
            'slug' => 'required|unique:categories,slug,' . $this->id
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}