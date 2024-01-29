<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendaftarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'nim' => 'required | numeric | digits_between:8,8',
            'nomor_hp' => 'required | numeric | digits_between:10,13',
            'email' => 'required | email | email:rfc,dns',
            'semester_id' => 'required',
            'beasiswa_id' => 'required',
            'ipk' => 'required',
            'berkas' => 'required | file | mimes:pdf,jpg,png',
        ];
    }
}
