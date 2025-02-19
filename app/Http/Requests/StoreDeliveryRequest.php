<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDeliveryRequest extends FormRequest
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
            'pickup_address' => ['required', 'string'],
            'pickup_name' => ['required', 'string'],
            'pickup_contact_no' => ['required', 'string'],
            'pickup_email' => ['email', 'nullable'],
            'delivery_address' => ['required', 'string'],
            'delivery_name' => ['required', 'string'],
            'delivery_contact_no' => ['required', 'string'],
            'delivery_email' => ['email', 'nullable'],
            'type_of_goods' =>  ['required', 'string'],
            'deliver_provider' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'shipment_pickup_date' => ['required', 'date'],
            'shipment_pickup_time' => ['required', 'date_format:H:i'],
            'description' => ['required', 'string'],
            'length' => ['required', 'string'],
            'height' => ['required', 'string'],
            'width' => ['required', 'string'],
            'weight' => ['required', 'string']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422));
    }
}
