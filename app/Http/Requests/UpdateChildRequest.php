<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChildRequest extends FormRequest
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
            "first_name" => ["required", "string", "min:3", "max:50"],
            "last_name" => ["required", "string", "min:3", "max:50"],
            "birth_date" => ["required", "date"],
            "parent_phone" => ["nullable", "string", "regex:/^(?:\+212|0)[67]\d{8}$/"],
            "image" => ["nullable", "image", "max:2048"]
        ];
    }
}