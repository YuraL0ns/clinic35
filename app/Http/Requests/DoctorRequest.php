<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'doctor_name'=> 'nullable|string',
            'doctor_alias'=> 'nullable|string',
            'doctor_spec'=> 'nullable|string',
            'doctor_exp'=> 'nullable|string',
            'doctor_students'=> 'nullable|string',
            'doctor_initial'=> 'nullable|string',
            'doctor_secondary'=> 'nullable|string',
            'doctor_images'=> 'nullable|image',
            'doctor_visible'=> 'nullable|string',
            'seo_title'=> 'nullable|string',
            'seo_description'=> 'nullable|string',
            'seo_key'=> 'nullable|string',
        ];
    }
}
