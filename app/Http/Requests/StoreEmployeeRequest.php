<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreEmployeeRequest extends FormRequest
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
    public function rules(Request $request)
    {
        switch($request->method())
        {
            case 'POST':
            {
                return [
                    'fullName' => 'required',
                    'email' => 'nullable|email|unique:employees',
                    'skills' => 'nullable|exists:skills,id|array'
                ];
            }  
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'fullName' => 'required',
                    'email' => 'nullable|email|unique:employees,email,'.$request->employee->id,
                    'skills' => 'nullable|exists:skills,id|array'
                ];   
            }  

        }        
    }
}
