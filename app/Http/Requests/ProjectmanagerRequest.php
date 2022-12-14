<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectmanagerRequest extends Request
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
			'Gender' => 'required',
			'Initials' => 'required',
			'Firstname' => 'required',
			'Lastname' => 'required',
			'Phone' => 'required',
			'Mobile' => 'required',
			'Email' => 'required|email',
			//'Notes' => 'required'
        ];
    }
}
