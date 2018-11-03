<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $imageValidationRule = $this->method() == "POST" ? "required" : "";

        return [
            'name'         => 'required|string',
            'description'  => 'required',
            'rating'       => 'required|numeric|min:1|max:5',
            'ticket_price' => 'required|numeric|max:9999.99',
            'country_id'   => 'required|numeric',
            'image_path'   => $imageValidationRule
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'         => 'Name',
            'description'  => 'Description',
            'rating'       => 'Rating',
            'ticket_price' => 'Ticket Price (USD)',
            'country_id'   => 'Country',
            'image_path'   => 'Image'
        ];
    }
}
