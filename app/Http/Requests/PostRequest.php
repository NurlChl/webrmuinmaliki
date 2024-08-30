<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'tittle' => [ 'required', 'string', 'min:3', 'max:255'],
            'member_category_id' => 'required',
            'image' => [$this->method() === 'POST' ? 'required' : '', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'body' => ['required', 'string', 'min:3'],
        ];
    }

    public function messages()
    {
        return [
            'tittle.required' => 'Judul tidak boleh kosong.',
            'tittle.min' => 'Judul minimal 3 karakter.',
            'tittle.max' => 'Judul melebihi batas maksimal.',
            
            'member_category_id.required' => 'Kategori wajib diisi.',

            'body.required' => 'Isi postingan tidak boleh kosong.',
            'body.min' => 'Isi postingan minimal 3 karakter.',
            
            'image.required' => 'Gambar wajib diisi.',
            'image.image' => 'Harus berupa gambar.',
            'image.max' => 'Gambar maksimal 2 mb.',
            'image.mimes' => 'Gambar harus jpg, jpeg, png, svg.',
        ];
    }
}
