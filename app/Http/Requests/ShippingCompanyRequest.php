<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShippingCompanyRequest extends Request
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
			'Companyname' => 'required',
			'Code' => 'required',
			/*'Phone' => 'required',
			'Mobile' => 'required',
			'Fax' => 'required',*/
			'Email' => 'required|email',
			/*'pr_3m3_bsa' => 'required|integer',
			'pr_3m3_hout' => 'required|integer',
			'pr_3m3_puin' => 'required|integer',
			'pr_6m3_bsa' => 'required|integer',
			'pr_6m3_hout' => 'required|integer',
			'pr_6m3_puin' => 'required|integer',
			'pr_10m3_bsa' => 'required|integer',
			'pr_10m3_hout' => 'required|integer',
			'pr_10m3_puin' => 'required|integer',			
			'pr_20m3_bsa' => 'required|integer',
			'pr_20m3_hout' => 'required|integer',
			'pr_20m3_puin' => 'required|integer',
			'article_no_10m3' => 'required',
			'Price_10m3'=> 'required|integer',
			'Unit_10m3' => 'required',
			'article_no_40m3' => 'required',
			'Price_40m3'=> 'required|integer',
			'Unit_40m3' => 'required',
			'article_no_sorteerbaar' => 'required',
			'Price_sorteerbaar'=> 'required|integer',
			'Unit_sorteerbaar' => 'required',
			'article_no_niet_sorteerbaar' => 'required',
			'Price_niet_sorteerbaar'=> 'required|integer',
			'Unit_niet_sorteerbaar' => 'required',
			'article_no_Bedrijfsafval' => 'required',
			'Price_Bedrijfsafval'=> 'required|integer',
			'Unit_Bedrijfsafval' => 'required',
			'article_no_A_B_hout' => 'required',
			'Price_A_B_hout'=> 'required|integer',
			'Unit_A_B_hout' => 'required',
			'article_no_C_hout' => 'required',
			'Price_C_hout'=> 'required|integer',
			'Unit_C_hout' => 'required',
			'article_no_Schoon_puin' => 'required',
			'Price_Schoon_puin'=> 'required|integer',
			'Unit_Schoon_puin' => 'required',
			'article_no_Puin_Grof' => 'required',
			'Price_Puin_Grof'=> 'required|integer',
			'Unit_Puin_Grof' => 'required',     
			'article_no_Puin_met_10' => 'required',
			'Price_Puin_met_10'=> 'required|integer',
			'Unit_Puin_met_10' => 'required',     
			'article_no_Puin_met_25' => 'required',
			'Price_Puin_met_25'=> 'required|integer',
			'Unit_Puin_met_25' => 'required',
			'article_no_Asfaltpuin' => 'required',
			'Price_Asfaltpuin'=> 'required|integer',
			'Unit_Asfaltpuin' => 'required',
			'article_no_Schoon_Gips' => 'required',
			'Price_Schoon_Gips'=> 'required|integer',
			'Unit_Schoon_Gips' => 'required',
			'article_no_Groenafval' => 'required',
			'Price_Groenafval'=> 'required|integer',
			'Unit_Groenafval' => 'required',
			'article_no_Dakafval' => 'required',
			'Price_Dakafval'=> 'required|integer',
			'Unit_Dakafval' => 'required',
			'article_no_Dakgrind' => 'required',
			'Price_Dakgrind'=> 'required|integer',
			'Unit_Dakgrind' => 'required',
			'article_no_Schoon_vlakglas' => 'required',
			'Price_Schoon_vlakglas'=> 'required|integer',
			'Unit_Schoon_vlakglas' => 'required',  
			'article_no_Opbrengsten_metalen' => 'required',
			'Price_Opbrengsten_metalen'=> 'required|integer',
			'Unit_Opbrengsten_metalen' => 'required',     
			'article_no_Opbrengsten_Papier' => 'required',
			'Price_Opbrengsten_Papier'=> 'required|integer',
			'Unit_Opbrengsten_Papier' => 'required'*/
			
			
			
        ];
    }
}
