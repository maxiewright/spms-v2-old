<?php

namespace App\Http\Requests\Serviceperson\Dependent;

use Illuminate\Foundation\Http\FormRequest;

class StoreDependentRequest extends FormRequest
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
            'dependent_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'pin'             =>  'required|numeric|unique:dependents,pin',
            'relationship_id' =>  'required',
            'date_of_birth'   =>  'required|before_or_equal:today',
            'first_name'      =>  'required',
            'middle_name'     =>  'nullable',
            'last_name'       =>  'required',
            'gender_id'       =>  'required',
            'religion_id'     =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'dependent_photo.required'  => 'A photo is required',
            'pin.numeric'               =>  'The pin must be a number',
            'pin.unique'                =>  'The pin provided already exist',
            'relationship_id.required'  =>  'Dependent relationship is required',
            'date_of_birth.required'    =>  'Dependents date of birth is required',
            'first_name.required'       =>  'Dependent first name is required',
            'last_name.required'        =>  'Dependent last name is required',
            'gender_id.required'        =>  'Dependent gender is required',
            'religion_id.required'      =>  'Dependent religion is required',
        ];

    }
}
