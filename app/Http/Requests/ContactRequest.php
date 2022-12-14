<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
			//'Gender' => 'required',
			//'initials' => 'required',
			//'Firstname' => 'required',
			'Lastname' => 'required',
			'Department_Id' => 'required|integer',
			//'jobtitle' => 'required',
			//'Phone' => 'required|integer',
			//'phone_private' => 'required',
			//'Mobile' => 'required|integer',
			//'Email' => 'required|email',
			//'notes' => 'required'
        ];
    }
}
