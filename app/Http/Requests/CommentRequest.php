<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'post_id' => ['required'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'body' => ['required', 'string', 'min:3', 'max:1000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.min' => 'Nama minimal 2 karakter.',
            'name.max' => 'Nama melebihi batas maksimal.',
            
            'body.required' => 'Komentar tidak boleh kosong.',
            'body.min' => 'Komentar minimal 3 karakter.',
            'body.max' => 'Komentar melebihi batas maksimal.',

        ];
    }
}
