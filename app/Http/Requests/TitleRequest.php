<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'emp_no' => 'integer',
            'title' => 'string|max:255',
            'from_date' => 'date|after:today',
            'to_date' => 'date|after:from_date',
        ];
    }
}