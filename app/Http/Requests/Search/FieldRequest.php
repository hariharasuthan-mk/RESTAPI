<?php

namespace App\Http\Requests\Search;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'text' => 'required',
            
          
        ];
    }

    public function messages()
    {
        return [
        'text.required' => 'Search Keyword is required',
        
        ];
    }
}