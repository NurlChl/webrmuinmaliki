<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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

            'nim' => [  'required', 'min:10', ' max:20', $this->method() === 'POST' ? 'unique:members' : ''], 
            'name' => 'required | string | min:3 | max:255',
            'image' => [$this->method() === 'POST' ? 'required' : '', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'major' => 'required | min:3 | max:255',
            'position' => 'required | min:2 | max:255',
            'member_category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nim.required' => 'NIM tidak boleh kosong.',
            'nim.min' => 'NIM minimal 10 karakter.',
            'nim.max' => 'NIM melebihi batas maksimal.',
            'nim.unique' => 'NIM ini sudah ada.',

            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.max' => 'Nama melebihi batas maksimal.',
            
            'image.required' => 'Gambar wajib diisi.',
            'image.image' => 'Harus berupa gambar.',
            'image.max' => 'Gambar maksimal 2 mb.',
            'image.mimes' => 'Gambar harus jpg, jpeg, png, svg.',
            
            'major.required' => 'Jurusan tidak boleh kosong.',
            'major.min' => 'Jurusan minimal 3 karakter.',
            'major.max' => 'Jurusan melebihi batas maksimal.',
            
            'position.required' => 'Jabatan tidak boleh kosong.',
            'position.min' => 'Jabatan minimal 2 karakter.',
            'position.max' => 'Jabatan melebihi batas maksimal.',
            
            'member_category_id.required' => 'Kategori tidak boleh kosong.',
        ];
    }
}
