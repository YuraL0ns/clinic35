<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'service_title' => 'nullable|string|max:255',
                'service_alias' => 'nullable|string|max:255|unique:services,service_alias',
                'service_title_description' => 'nullable|string',
                'service_description' => 'nullable|string',
                'service_many_description' => 'nullable|string',
                'service_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'service_seo_another' => 'nullable|string',
                'service_seo_description' => 'nullable|string',
                'service_seo_key' => 'nullable|string',
                'services_seo_title' => 'nullable|string',
                'razdel_id' => 'nullable|integer'
        ];
    }
}
