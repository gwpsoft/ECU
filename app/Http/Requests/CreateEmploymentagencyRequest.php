<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEmploymentagencyRequest extends Request
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
            //
				/*'Name' => 'required',
				'Address' => 'required',
				'Zipcode' => 'required',
				'City' => 'required',
				'Notes' => 'required',
				'Phone' => 'required|integer',
				'Fax' => 'required',
				'Email' => 'required|email',
				'Contact1' => 'required|integer',
				'Mobile1' => 'required|integer',*/
        ];
    }
}
