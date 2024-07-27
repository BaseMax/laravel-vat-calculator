<?php

namespace App\Http\Requests\Admin\Requests;

use App\Models\Currency;
use Illuminate\Foundation\Http\FormRequest;

class RequestsCreateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'integer'],
            'vat' => ['required', 'integer', 'min:0', 'max:100'],
            'type' => ['required', 'in:1,0', 'string'],
            'currency_id' => ['required', 'exists:'.Currency::class.',id'],
        ];
    }
}
