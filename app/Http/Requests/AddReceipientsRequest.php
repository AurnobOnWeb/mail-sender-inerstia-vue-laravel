<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReceipientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255', 'required',],
            'email' => ['email', 'max:255', 'required',],
            'description' => ['string', 'max:255', 'nullable',],
            'phone_number' => ['string', 'max:255', 'nullable',],
            'address' => ['string', 'max:255', 'nullable',],
            'category_id' => ['max:255', 'required',],
            'status' => ['string', 'max:255', 'required'],
        ];
    }
}
