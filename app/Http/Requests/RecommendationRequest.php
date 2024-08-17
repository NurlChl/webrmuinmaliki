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
            'nim' => ['required', 'integer', 'min:10'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
            'telephone' => ['required', 'integer'],
            'faculty_id' => ['required'],
            'generation' => ['required', 'integer'],
            'body' => ['required', 'string', 'min:3'],
        ];
    }
}
