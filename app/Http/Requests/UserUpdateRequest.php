<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'max:50|required',
            'email' => 'required',
            'phone' => 'max:13|required',
            'address' => 'max:100|required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Field Nama Pengguna wajib diisi.',
            'email.required' => 'Field Email wajib diisi.',
            'phone.required' => 'Field No. Telepon wajib diisi.',
            'address.required' => 'Field Alamat wajib diisi.',
            'name.max' => 'Nama Pengguna maksimal :max karakter.',
            'phone.max' => 'No. Telepon maksimal :max karakter.',
            'address.max' => 'Alamat maksimal :max karakter.'
        ];
    }
}
