<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
        
     
            'email'=> 'required|max:255|unique:teachers',
            'firstname' => 'required|alpha_spaces|max:255',
            'middlename' => 'sometimes|nullable|alpha_spaces|max:255',

            'lastname' => 'required|max:255|alpha_spaces',
            'phonenumber' => 'required|digits:11|starts_with:63|unique:teachers',

        ];
    }
}
