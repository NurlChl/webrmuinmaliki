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
            'nim' => ['required', 'min:10', 'max:20'],
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
            'type.required' => 'Jenis aspirasi tidak boleh kosong',

            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 2 karakter.',
            'name.max' => 'Nama melebihi batas maksimal.',

            'nim.required' => 'NIM tidak boleh kosong',
            'nim.min' => 'NIM minimal 10 karakter',
            'name.max' => 'Nama melebihi batas maksimal.',


            'address.required' => 'Alamat tidak boleh kosong',
            'address.min' => 'Alamat minimal 2 karakter',
            'address.min' => 'Alamat melebihin batas maksimal',
            
            'telephone.required' => 'Telepon wajib diisi',
            'telephone.integer' => 'Telepon tidak boleh diawali 0.',
            
            'faculty.required' => 'Fakultas wajib diisi',
            
            'generation.required' => 'Angkatan tidak boleh kosong.',
            'generation.integer' => 'Angkatan tidak boleh diawali 0.',
            
            'body.required' => 'Aspirasi wajib diisi',
            'body.min' => 'Usulan minimal 3 karakter.',


        ];
    }
}
