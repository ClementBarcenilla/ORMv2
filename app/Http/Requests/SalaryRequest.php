<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'emp_no' => 'integer',
            'salary' => 'integer|max:99999',
            'from_date' => 'date|after:today',
            'to_date' => 'date|after:from_date',
        ];
    }
}
