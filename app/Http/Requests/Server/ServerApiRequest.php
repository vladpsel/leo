<?php

namespace App\Http\Requests\Server;

use Illuminate\Foundation\Http\FormRequest;

class ServerApiRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'ip' => 'required|ip',
            'password' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            // optional
            'alias' => 'nullable|string|max:255',
            'port' => 'nullable|integer',
            'key' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
        ];
    }
}
