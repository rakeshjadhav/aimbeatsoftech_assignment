<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z ]+$/u',
            'age' => 'required|regex:/^[0-9]+$/u',
            'birth_of_birth' => 'required|date',
            'join_of_date' => 'required|date',
            'gender' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:users,email',
            'photo' => 'mimes:jpg,jpeg,bmp,png',
            'password' => 'required|min:6',
        ];
    }

    public function messages(){

        $messages =  [ 
             'name.required' => 'Employee name is required',
             'name.regex' => 'The employee name format is invalid only alphabets and space allowed',
             'age.required' => 'Employee age is required',
             'email.required' => 'Employee email is email',
             'birth_of_birth.required' => 'Date of birth is required'
            ];
        return $messages;
      }
}
