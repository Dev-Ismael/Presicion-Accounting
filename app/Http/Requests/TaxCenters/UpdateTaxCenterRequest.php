<?php

namespace App\Http\Requests\TaxCenters;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaxCenterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'           => ['required' , 'string' , 'max:100' , Rule::unique('tax_centers', 'title')->ignore($this->tax_center)],
            'content'         => ['required' , 'string' , 'max:5000'],
            'seo_title'       => ['required' , 'string' , 'max:500'],
            'seo_description' => ['required' , 'string' , 'max:500'],
            'seo_keywords'    => ['required' , 'string' , 'max:500'],
            'img'             => ['nullable' , 'mimes:jpeg,png,jpg' , 'max:2048'],
        ];
    }
}
