<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $data = [
            //
            'name' => ['required', 'string', 'min:3', 'max:400'],
            'email' => ['required', 'string', 'email', 'max:400', 'unique:users'],
        ];
        if ($this->has('password') || $this->method() == 'POST') {
            $data['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }
        return $data;
    }
}
