<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KangarooFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'nickname' => 'nullable',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'gender' => 'required|in:male,female,other',
            'color' => 'nullable',
            'friendliness' => 'nullable|in:friendly,not friendly',
            'birthday' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'weight.required' => 'The weight field is required',
            'weight.numeric' => 'The weight field must be a number',
            'weight.min' => 'The weight field must be greater than or equal to 0',
            'height.required' => 'The height field is required',
            'height.numeric' => 'The height field must be a number',
            'height.min' => 'The height field must be greater than or equal to 0',
            'gender.required' => 'The gender field is required',
            'gender.in' => 'The gender field must be male, female, or other',
            'friendliness.in' => 'The friendliness field must be friendly or not friendly',
            'birthday.required' => 'The birthday field is required',
            'birthday.date_format' => 'The birthday field must be in the format Y-m-d',
        ];
    }
}
