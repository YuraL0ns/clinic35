<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacanсyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vacancy_title' => 'nullable',
            'vacancy_alias' => 'nullable',
            'vacancy_description' => 'nullable|string',
            'vacancy_price' => 'nullable',
            'vacancy_visible' => 'nullable',
            'vacancy_images' => 'nullable',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'seo_key' => 'nullable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
