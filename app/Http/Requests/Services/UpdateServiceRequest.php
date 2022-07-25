<?php

namespace App\Http\Requests\Services;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'title'           => ['required' , 'string' , 'max:100' , Rule::unique('services', 'title')->ignore($this->service)],
            'parent_id'       => ['nullable' , 'numeric' , 'digits_between:1,11' ],
            'content'         => ['required' , 'string' , 'max:5000'],
            'img'             => ['nullable' , 'mimes:jpeg,png,jpg' , 'max:2048'],
        ];
    }
}
