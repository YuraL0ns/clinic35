<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sales_title' => 'required|string|max:255',
            'sales_desc' => 'nullable|string',
            'sales_alias' => 'nullable|string|max:255',
            'sales_img' => 'nullable|image|max:2048',
            'sales_seo_title' => 'nullable|string|max:255',
            'sales_seo_another' => 'nullable|string|max:255',
            'sales_seo_description' => 'nullable|string|max:255',
            'sales_seo_key' => 'nullable|string|max:255',
        ];
    }
}
