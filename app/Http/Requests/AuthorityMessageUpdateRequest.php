<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorityMessageUpdateRequest extends FormRequest
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
            'authority_name'=>'required|string|max:255',
            'authority_type'=>'required|string|max:200',
            'authority_message'=>'required|string|max:20000',
            'authority_image'=>'nullable|mimes:png,jpg|max:10240',
        ];
    }
}
