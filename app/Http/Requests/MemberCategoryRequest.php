<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCategoryRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Kategori fakultas tidak boleh kosong.',
            'name.min' => 'Nama Kategori fakultas minimal 2 karakter.',
            'name.max' => 'Nama Kategori fakultas melebihi batas maksimal.',

        ];
    }
}
