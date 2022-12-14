<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentRequest extends Request
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
				/*'Customer_Id' => 'required',*/
				/*'Name' => 'required',
				'Address' => 'required',
				'Zipcode' => 'required',
				'City' => 'required',
				'Mailbox' => 'required',
				'MailboxZipcode' => 'required',
				'MailboxCity' => 'required',*/
				/*'Phone' => 'required|integer',
				'Fax' => 'required|integer',
				'Email' => 'required|email',*/
				//'Notes' => 'required'
        ];
    }
}
