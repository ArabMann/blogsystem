<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            //
            "name" => ["required", "string", "max:255"],
            "description" => ["required", "string"],
            "news_id" => ["required","exists:news,id"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nama Harus Wajib Diisi",
            "description.required" => "Deskripsi Harus Wajib Diisi",
        ];
    }
}
