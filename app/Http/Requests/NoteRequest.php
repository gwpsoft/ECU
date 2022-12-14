<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NoteRequest extends Request
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
			'Projectmanager_Id' => 'required',
			'Datetime' => 'required',
			'Contact' => 'required',
			'Type' => 'required',
			'Text' => 'required',
			'Department_Id' => 'required',
			'Project_Id' => 'required',
        ];
    }
}
