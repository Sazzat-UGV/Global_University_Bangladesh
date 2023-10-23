<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionRequirmentUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "admission_type" => "required|string|max:255",
            "admission_department" => "required|string|max:255",
            "requirment_description" => "required|string|max:20000",
            "admission_image" =>"nullable|mimes:png,jpg|max:10240",
        ];
    }
}
