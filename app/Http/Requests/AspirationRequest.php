<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AspirationRequest extends FormRequest
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
            'type_id' => 'required',
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'nim' => ['required', 'integer', 'min:10'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
            'telephone' => ['required', 'integer'],
            'faculty_id' => ['required'],
            'generation' => ['required', 'integer'],
            'body' => ['required', 'string', 'min:3'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 2 karakter.',
            'name.max' => 'Nama melebihi batas maksimal.',

            'nim.required' => 'NIM tidak boleh kosong',
            'nim.integer' => 'NIM harus angka',
            'nim.min' => 'NIM minimal 10 karakter',

            'address.required' => 'Alamat tidak boleh kosong',

        ];
    }
}
