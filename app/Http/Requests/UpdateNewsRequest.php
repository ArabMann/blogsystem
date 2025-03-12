<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            "description" => ['required', "string"],
            "category_id" => ['required', "exists:categories,id"],
            "image" => ['required', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Judul Berita Wajib Diisi tidak boleh kosong",
            "description.required" => "Description Wajib Diisi tidak boleh kosong",
            "category_id.required" => "Kategory Wajib diisi !",
            "image.required" => "Gambar Wajib Diupload tidak boleh kosong",
        ];
    }
}
