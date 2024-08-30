<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'color' => ['required', 'string', 'min:2', 'max:20']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama fakultas tidak boleh kosong.',
            'name.min' => 'Nama fakultas minimal 2 karakter.',
            'name.max' => 'Nama fakultas melebihi batas maksimal.',
            
            'color.required' => 'Warna tidak boleh kosong.',
            'color.min' => 'Warna minimal 2 karakter.',
            'color.max' => 'Warna melebihi batas maksimal.',

        ];
    }
}
