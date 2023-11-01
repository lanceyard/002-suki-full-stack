<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'unique:products|max:50|required',
            'harga' => 'max:11|required',
            'qty' => 'max:4|required',
            'categories' => 'required',
            'desc' => 'required',
            'image' => 'image|file|max:2048|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Field Nama Produk wajib diisi.',
            'harga.required' => 'Field Harga wajib diisi.',
            'qty.required' => 'Field Qty wajib diisi.',
            'categories.required' => 'Wajib memilih salah satu kategori.',
            'desc.required' => 'Field Deskripsi wajib diisi.',
            'name.max' => 'Nama Produk maksimal :max karakter.',
            'harga.max' => 'Harga maksimal :max karakter.',
            'qty.max' => 'Qty maksimal :max karakter.',
            'name.unique' => 'Nama ini sudah terdaftar.',
            'image.image' => 'File yang anda upload bukan gambar',
            'image.file' => 'Ukuran maksimal foto ada 2 MB',
            'image.mimes' => 'File harus bertipe: jpg,png,jpeg,gif,svg.'
        ];
    }
}
