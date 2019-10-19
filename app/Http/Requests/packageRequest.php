<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class PackageRequest extends FormRequest
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
     public function rules(Request $request) {
        return [
               'package_name' => 'required',
               'query_limit' => 'required|numeric',
               'price' => 'required|numeric',
         ];
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages() {
        return [
            'package_name.required' => 'Packages name is required!',
            'query_limit.required' => 'Query Limit is required!',
            'price.required' => 'Price is required!',
         ];
    }
}
