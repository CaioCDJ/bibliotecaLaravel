<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            "title" => "required",
            "author" => "required",
            "publisher" => "required",
            "qtPages" => "required|integer|min:5",
            "releaseDt" => "required|before:today",
            "category" => "required|min:3",
            "imgUrl" => "required|url",
            "qt" => "required|integer|gt:0",
            "desc" => "required",
        ];
    }
}
