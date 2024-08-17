<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleRequest extends FormRequest
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
        $maxYear = now()->format('Y');
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'period' => ['required', 'integer', function ($attribute, $value, $fail) use ($maxYear) {
                if ($value < 2021 || $value > $maxYear) {
                    $fail(" $attribute harus dalam rentang 2021 - $maxYear.");
                }
            },],
            'file' => [$this->method() === 'POST' ? 'required' : '', 'file', 'max:2048'],
            'rule_category_id' => 'required',
        ];
    }
}
