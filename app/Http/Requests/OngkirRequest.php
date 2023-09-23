<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OngkirRequest extends FormRequest
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
            'origin' => 'required',
            'destination' => 'required',
            'courier' => 'required',
            'weight' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'origin' => 'Kota Asal',
            'destination' => 'Kota Tujuan',
            'courier' => 'Ekspedisi',
            'weight' => 'Berat Barang',
        ];
    }
}
