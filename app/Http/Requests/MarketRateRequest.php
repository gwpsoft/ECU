<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MarketRateRequest extends Request
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
			
			'Price_10m3'=> 'required|integer',
			'Price_40m3'=> 'required|integer',			
			'Price_sorteerbaar'=> 'required|integer',			
			'Price_niet_sorteerbaar'=> 'required|integer',			
			'Price_Bedrijfsafval'=> 'required|integer',			
			'Price_A_B_hout'=> 'required|integer',			
			'Price_C_hout'=> 'required|integer',			
			'Price_Schoon_puin'=> 'required|integer',			
			'Price_Puin_Grof'=> 'required|integer',			
			'Price_Puin_met_10'=> 'required|integer',			
			'Price_Puin_met_25'=> 'required|integer',			
			'Price_Asfaltpuin'=> 'required|integer',			
			'Price_Schoon_Gips'=> 'required|integer',			
			'Price_Groenafval'=> 'required|integer',			
			'Price_Dakafval'=> 'required|integer',			
			'Price_Dakgrind'=> 'required|integer',			
			'Price_Schoon_vlakglas'=> 'required|integer',			
			'Price_Opbrengsten_metalen'=> 'required|integer',			
			'Price_Opbrengsten_Papier'=> 'required|integer'
        ];
    }
}
