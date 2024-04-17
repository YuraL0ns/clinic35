<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'point_title' => 'nullable|string',
            'point_price' => 'nullable|string',
            'point_okvd' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
