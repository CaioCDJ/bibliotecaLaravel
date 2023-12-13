<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            "title" => "nullable",
            "author" => "nullable",
            "publisher" => "nullable",
            "qtPages" => "nullable|integer|min:5",
            "releaseDt" => "nullable|before:today",
            "category" => "nullable|min:3",
            "imgUrl" => "nullable|url",
            "qt" => "nullable|integer|gt:0",
            "desc" => "nullable",
        ];
    }
}
