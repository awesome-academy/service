<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
        return [
            'name' => 'required',
            'address' => 'required',
            'min_people' => 'required|numeric|min:1',
            'max_people' => 'required|numeric|gt:min_people',
            'image' => 'required|image',
            'typeServices' => 'required',
            'status' => 'required',
        ];
    }
}
