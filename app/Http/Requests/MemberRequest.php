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

            'nim' => [  'required', 'min:10', ' max:15', $this->method() === 'POST' ? 'unique:members' : ''], 
            'name' => 'required | string | min:3 | max:255',
            'image' => [$this->method() === 'POST' ? 'required' : '', 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'major' => 'required | min:3 | max:255',
            'position' => 'required | min:2 | max:255',
            'member_category_id' => 'required',
        ];
    }
}
