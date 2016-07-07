<?php

namespace App\Http\Requests;

class BrandRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'description' => 'required'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => trans('back/brands.requestNameRequired'),
            'name.max' => trans('back/brands.requestNameMax'),
            'description.required' => trans('back/brands.requestDescriptionRequired')
        ];
    }
}
