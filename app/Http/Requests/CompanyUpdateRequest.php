<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
        return [
            'company_name_arabic' => ['required', 'string', 'max:255'],
            'company_name_english' => ['required', 'string', 'max:255'],
            /* 'company_name_kurdish' => ['required', 'string', 'max:255'], */
            'address_arabic' => ['required', 'string', 'max:255'],
            'address_english' => ['required', 'string', 'max:255'],
            /* 'address_kurdish' => ['required', 'string', 'max:255'], */
            /* 'logo' =>['required'], */
            'location' =>['required'],
            'bio_arabic' => ['required'],
            'bio_english' => ['required'],
            /* 'bio_kurdish' => ['required'], */
        ];
    }//end of rules
}
