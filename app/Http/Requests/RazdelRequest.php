<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RazdelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'razdel_title' => 'nullable|string',
            'razdel_alias' => 'nullable|string',
            'razdel_images' => 'nullable|image',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
