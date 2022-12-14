<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTblemployeeRequest extends Request
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
				'Gender' => 'required',
				//'initials' => 'required',
				'Firstname' => 'required',
				'Lastname' => 'required',
				'Birthday' => 'required',
				//'Sofinumber' => 'required|unique:tblemployee',
				'Startdate' => 'required',
				//'Phone' => 'required|integer',
				//'Mobile' => 'required|integer',
				//'Email' => 'required|email',
				//'Id_Type' => 'required',
				//'Id_Number' => 'required',
				//'Id_Expirationdate' => 'required',
				//'Address' => 'required',
				//'Zipcode' => 'required',
				//'City' => 'required',
				'Employmentagency_Id' => 'required',
				'Geschikt' => 'required',
				//'Employmentagencynote' => 'required',	   
				///'Rate' => 'required|integer',
				//'Cost' => 'required|integer',
				//'Notes' => 'required',
				//'Image'       => 'required|mimes:jpg,jpeg,png,bmp'
     
        ];
    }
	
	public function messages()
    {
        return [
            'Employmentagency_Id.required' => 'The Uitzendbureau field is required.',
			/*'email.required' => 'Email is required.',
			'email.email' => 'Email must be a valid email address.',*/
			//'mobile.required' => 'È necessario il campo mobile.',
			//'mobile.integer' => 'Il campo mobile deve essere in Integer richiesto.',
			
           
        ];
    }
}
