<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class GalleryRequest extends FormRequest
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
            'image' => [$this->method() === 'POST' ? 'required' : '', 'image', 'mimes:png,jpg,jpeg,svg', 'max:5120'],
            'description' => ['required', 'string','min:3'],
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Gambar tidak boleh kosong.',
            'image.mimes' => 'Gambar harus jpg, jpeg, png, svg.',
            'image.max' => 'Gambar maksimal 5 mb.',
            
            'description.required' => 'Deskripsi tidak boleh kosong.',
            'description.min' => 'Deskripsi minimal 3 karakter.',

        ];
    }
}
