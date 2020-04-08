<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'emp_no' => 'integer',
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'birth_date' => 'date',
            'hire_date' => 'date|after:birth_date',
            'gender' => 'string|max:1|in:M,F'
            ]; 
    }
}
