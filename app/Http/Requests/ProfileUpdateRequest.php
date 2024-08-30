<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max' => 'Nama melebihi batas maksimal.',
            
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email tidak valid.',
            'email.lowercase' => 'Email huruf kecil semua.',
            'email.max' => 'Email melebihi batas maksimal.',
        ];
    }
}
