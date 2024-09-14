<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtracurricularRequest extends FormRequest
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
        'name' => ['required', 'string', 'min:2', 'max:255' ],
        'leader_name' => ['required', 'string', 'min:2', 'max:255'],
        'image' => [$this->method() === 'POST' ? 'required' : '', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
        'contact' => ['required', 'integer'],
        'body' => ['required', 'min:3', 'string' ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 2 karakter.',
            'name.max' => 'Nama melebihi batas maksimal.',

            'leader_name.required' => 'Nama tidak boleh kosong.',
            'leader_name.min' => 'Nama minimal 2 karakter.',
            'leader_name.max' => 'Nama melebihi batas maksimal.',

            'image.required' => 'Gambar wajib diisi.',
            'image.image' => 'Harus berupa gambar.',
            'image.max' => 'Gambar maksimal 2 mb.',
            'image.mimes' => 'Gambar harus jpg, jpeg, png, svg.',

            'contact.required' => 'Telepon wajib diisi',
            'contact.integer' => 'Telepon tidak boleh diawali 0.',

            'body.required' => 'Isi postingan tidak boleh kosong.',
            'body.min' => 'Isi postingan minimal 3 karakter.',
        ];
    }
}
