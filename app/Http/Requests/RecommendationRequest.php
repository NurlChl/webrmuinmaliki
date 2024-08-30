<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecommendationRequest extends FormRequest
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
            'nim' => ['required', 'integer', 'min:10', 'max:20'],
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
            'nim.required' => 'NIM tidak boleh kosong.',
            'nim.min' => 'NIM minimal 10 karakter.',
            'nim.integer' => 'NIM harus angka.',
            'nim.max' => 'NIM melebihi batas maksimal.',
            'nim.unique' => 'NIM ini sudah ada.',

            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 2 karakter.',
            'name.max' => 'Nama melebihi batas maksimal.',
            
            'address.required' => 'Alamat tidak boleh kosong.',
            'address.min' => 'Alamat minimal 2 karakter.',
            'address.max' => 'Alamat melebihi batas maksimal.',
            
            'telephone.required' => 'Telepon tidak boleh kosong.',
            'telephone.integer' => 'Telepon harus angka.',
            
            'faculty_id.required' => 'Fakultas tidak boleh kosong.',

            'generation.required' => 'Angkatan tidak boleh kosong.',
            'generation.integer' => 'Angkatan harus angka.',

            'body.required' => 'Usulan tidak boleh kosong.',
            'body.min' => 'Usulan minimal 3 karakter.',
        ];
    }
}
