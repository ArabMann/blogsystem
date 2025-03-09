<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            "name" => ['required', "string", "max:255"],
            "image" => ['required', "mimes:png,jpg,jpeg"],
            "description" => ["required"],
            "user_id" => ['exists:users,id'],
            "category_id" => ["required","exists:categories,id"]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Judul Wajib diisi !",
            "image.required" => "Gambar Wajib diupload !",
            "description.required" => "Deskripsi Wajib diisi !",
            "category_id.required" => "Kategory Wajib diisi !",
        ];
    }
}
