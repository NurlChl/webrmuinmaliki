<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleRequest extends FormRequest
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
        $maxYear = now()->format('Y');
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'period' => ['required', 'integer', function ($attribute, $value, $fail) use ($maxYear) {
                if ($value < 2021 || $value > $maxYear) {
                    $fail(" $attribute harus dalam rentang 2021 - $maxYear.");
                }
            },],
            'file' => [$this->method() === 'POST' ? 'required' : '', 'file', 'max:2048'],
            'rule_category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.max' => 'Nama melebihi batas maksimal.',

            'period.required' => 'Tahun tidak boleh kosong.',
            'period.integer' => 'Tahun harus angka.',
            
            'file.required' => 'File wajib diisi.',
            'file.file' => 'File tidak valid.',
            'file.max' => 'File maksimal 2 mb.',

            'rule_category_id.required' => 'Kategori tidak boleh kosong.',
            
        ];
    }
}
