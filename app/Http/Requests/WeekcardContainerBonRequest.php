<?php



namespace App\Http\Requests;



use App\Http\Requests\Request;



class WeekcardContainerBonRequest extends Request

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

			//'year' => 'required',

			//'week' => 'required',

			'Project_Id' => 'required',

			'From_Date' => 'required',

			'To_Date' => 'required',

			//'Notes' => 'required',

        ];

    }

}

