<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'from' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
