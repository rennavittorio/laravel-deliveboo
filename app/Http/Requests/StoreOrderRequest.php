<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            /*'total' => ['required', 'decimal:2'], //prezzo totale
            'status' => ['required', 'boolean'], //stato del pagamento
            'first_name' => ['required', 'string', 'max:255'], //nome
            'last_name' => ['required', 'string', 'max:255'], //cognome
            'email' => ['required', 'email'], //email
            'phone' => ['required', 'string', 'max:20'], //phone
            'address' => ['required', 'string', 'max:255'], //address
            'postal_code' => ['required', 'string', 'max:5'],*/ //codice postale
        ];
    }
}
