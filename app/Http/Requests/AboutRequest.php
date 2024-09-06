<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'body' => ['required', 'string', 'min:3'],
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Isi postingan tidak boleh kosong.',
            'body.min' => 'Isi postingan minimal 3 karakter.',
        ];
    }
}
