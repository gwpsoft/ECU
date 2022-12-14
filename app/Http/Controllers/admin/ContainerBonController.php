<?php

namespace App\Http\Controllers\admin;
use App\Projects;
use App\Http\Requests\WeekcardContainerBonRequest;
use App\ContainerBon;
use Session;
use Mail;
use Validator;
use DB;
use PDF;
use Response;
use Input;
use App\Http\Controllers\Controller;

class ContainerBonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$ContainerOrders = DB::table('tblcontainerweekcard')->select('*')->orderBy('id','DESC')->get();
		return View('admin.containerbon.allorders',compact('ContainerOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$AllProjects  = Projects:: where('Active',1)->orderBy('Name','ASC')->get();
		return View('admin.containerbon.create',compact('AllProjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeekcardContainerBonRequest $request) {
        //
		/*print($request->Project_Id);
		die;*/
		$checlExistBon_no = ContainerBon:: where('Project_Id',$request->Project_Id)->max('Nummer');
		if (!empty($checlExistBon_no)){
				$incrementNummer = $checlExistBon_no+1;
		}
		else {
			$incrementNummer = 1;
			}

		if (empty($request->Checked) ) { $check = 0;} else { $check = 1; }
			$data = array (

					'From_Date' => $request->From_Date,
					'To_Date' => $request->To_Date,
					'Nummer' => $incrementNummer,
					'Project_Id' => $request->Project_Id,
					'Sent_Date' => $request->Sent_Date,
					'Received_Date' =>$request->Received_Date,
					'Checked' => $check,
					'Notes' => $request->Notes,
					'Billing_Date' => $request->Billing_Date,
					'Billing_no' => $request->Billing_no,
					'created_at' => date('Y-m-d h:i:s', time()),
					//'updated_at' => time()

				);

		DB::table('tblcontainerweekcard')->insert($data);
		Session::flash('message', 'Containervervoer note gestoken..!');
		return redirect('admin/ContainerBons');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
		//echo $id; die;
		$AllProjects  = Projects:: orderBy('Name','ASC')->get();
		$Orders = DB::table('tblcontainerweekcard')->where('id', $id)->first();
		$pricelist = DB::table('tblprojectpricelist')->where('project_id', $Orders->Project_Id)->first();
		$ContainersBons = DB::table('tblcontainerbon')->where('BonCard_No', $id)->get();
		/*echo '<pre>';
		print_r($Orders); die;*/
		return View('admin.containerbon.edit', compact('AllProjects' ,'Orders','pricelist','ContainersBons'));
		//print_r($Orders); die;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(/*WeekcardContainerBonRequest $request*/)
    {
        //
		$id =  Input::get('id');
	/*	print_r($request);
		die;*/
		if (empty(Input::get('Checked')) ) { $check = 0;} else { $check = 1; }
			$data = array (

					//'From_Date' => Input::get('From_Date'),
					'Billing_Date' => Input::get('Billing_Date'),
					'Billing_no' => Input::get('Billing_no'),
					'Sent_Date' => Input::get('Sent_Date'),
					'Received_Date' =>Input::get('Received_Date'),
					'Checked' => $check,
					'Notes' => Input::get('Notes'),
					'updated_at' => date('Y-m-d h:i:s', time()),
				);

		DB::table('tblcontainerweekcard')->where('id',$id)->update($data);
		Session::flash('Sucess', 'Containerbon is opgeslagen . . . .');
		return redirect('admin/edit_orderBon/'.$id);
		//return redirect('admin/ContainerBons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$id = explode ('_',$id);

		DB::table('tblcontainerbon')->where('id',$id[1])->delete();
		Session::flash('DelSucess', 'Containervervoer note gestoken..!');
		return redirect('admin/edit_orderBon/'.$id[0]);
    }

	    public function destroyBon($id)
    {
        //


		DB::table('tblcontainerbon')->where('BonCard_No',$id)->delete();
		DB::table('tblcontainerweekcard')->where('id',$id)->delete();
		Session::flash('DelSucess', 'Containervervoer note gestoken..!');
		return redirect('admin/ContainerBons');
    }

	public function AjaxBonPrice () {

		$price = Input::get('price');
		$size = Input::get('size');
		$Meterial = Input::get('meterial');
		$Project_Id = Input::get('Project_Id');
		$Gewicht = Input::get('Gewicht');
		//$price_per = Input::get('price_per');


		$GetPriceList = DB::table('tblprojectpricelist')->where('project_id', $Project_Id)->first();
		//$PriceList = get_object_vars($GetPriceList);
		//return Response:: json($GetPriceList);
		//die;
		if ($Meterial == 'sorteerbaar') {$per_price = $GetPriceList->Price_sorteerbaar; $sale_price = $GetPriceList->sale_Price_niet_sorteerbaar;}
		if ($Meterial == 'niet_sorteerbaar') {$per_price = $GetPriceList->Price_niet_sorteerbaar; $sale_price = $GetPriceList->sale_Price_niet_sorteerbaar;}
		if ($Meterial == 'Bedrijfsafval') {$per_price = $GetPriceList->Price_Bedrijfsafval; $sale_price = $GetPriceList->sale_Price_Bedrijfsafval;}
		if ($Meterial == 'A_B_hout') {$per_price = $GetPriceList->Price_A_B_hout; $sale_price = $GetPriceList->sale_Price_A_B_hout;}
		if ($Meterial == 'C_hout') {$per_price = $GetPriceList->Price_C_hout; $sale_price = $GetPriceList->sale_Price_C_hout;}
		if ($Meterial == 'Schoon_puin') {$per_price = $GetPriceList->Price_Schoon_puin; $sale_price = $GetPriceList->sale_Price_Schoon_puin;}
		if ($Meterial == 'Puin_Grof') {$per_price = $GetPriceList->Price_Puin_Grof; $sale_price = $GetPriceList->sale_Price_Puin_Grof;}
		if ($Meterial == 'Puin_met_10') {$per_price = $GetPriceList->Price_Puin_met_10; $sale_price = $GetPriceList->sale_Price_Puin_met_10;}
		if ($Meterial == 'Puin_met_25') {$per_price = $GetPriceList->Price_Puin_met_25; $sale_price = $GetPriceList->sale_Price_Puin_met_25;}
		if ($Meterial == 'Asfaltpuin') {$per_price = $GetPriceList->Price_Asfaltpuin; $sale_price = $GetPriceList->sale_Price_Asfaltpuin ;}
		if ($Meterial == 'Schoon_Gips') {$per_price = $GetPriceList->Price_Schoon_Gips; $sale_price = $GetPriceList->sale_Price_Schoon_Gips ;}
		if ($Meterial == 'Groenafval') {$per_price = $GetPriceList->Price_Groenafval; $sale_price = $GetPriceList->sale_Price_Groenafval ;}
		if ($Meterial == 'Dakafval') {$per_price = $GetPriceList->Price_Dakafval; $sale_price = $GetPriceList->sale_Price_Dakafval ;}
		if ($Meterial == 'Dakgrind') {$per_price = $GetPriceList->Price_Dakgrind; $sale_price = $GetPriceList->sale_Price_Dakgrind ;}
		if ($Meterial == 'Schoon_vlakglas') {$per_price = $GetPriceList->Price_Schoon_vlakglas; $sale_price = $GetPriceList->sale_Price_Schoon_vlakglas ;}
		if ($Meterial == 'Opbrengsten_metalen') {$per_price = $GetPriceList->Price_Opbrengsten_metalen; $sale_price = $GetPriceList->sale_Price_Opbrengsten_metalen ;}
		if ($Meterial == 'Opbrengsten_Papier') {$per_price = $GetPriceList->Price_Opbrengsten_Papier; $sale_price = $GetPriceList->sale_Price_Opbrengsten_Papier ;}


		if ($Meterial == 'field_1') {$per_price = $GetPriceList->Price_field1; $sale_price = $GetPriceList->sale_Price_field1 ;}
		if ($Meterial == 'field_2') {$per_price = $GetPriceList->Price_field2; $sale_price = $GetPriceList->sale_Price_field2 ;}
		if ($Meterial == 'field_3') {$per_price = $GetPriceList->Price_field3; $sale_price = $GetPriceList->sale_Price_field3 ;}
		if ($Meterial == 'field_4') {$per_price = $GetPriceList->Price_field4; $sale_price = $GetPriceList->sale_Price_field4 ;}



		//echo '<pre>';
		//echo $GetPriceList->sale_Price_10m3; die;
		// Start Price in All
		if ($price == 'price_all'){

				// Rolcontainer
				if ($size == 'Rolcontainer' && $Meterial == 'BSA') {

					$BSARolcontainer =   array (
								'Price'=> number_format($GetPriceList->rl_sl_bsa, 2),
								'Total' => number_format($GetPriceList->rl_pr_bsa + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->rl_pr_bsa, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($BSARolcontainer);
				}
				// BSA
				if ($size == '3m3' && $Meterial == 'BSA') {

					$BSA3m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_3m3_bsa, 2),
								'Total' => number_format($GetPriceList->pr_3m3_bsa + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->pr_3m3_bsa, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($BSA3m3);
				}
				if ($size == '6m3' && $Meterial == 'BSA') {

					$BSA6m3 =  array (
						'Price'=> number_format($GetPriceList->sl_pr_6m3_bsa, 2),
						'Total' => number_format($GetPriceList->pr_6m3_bsa + $GetPriceList->sale_Price_10m3 , 2),
						'Actual' => number_format($GetPriceList->pr_6m3_bsa, 2),
						'Transport'	 => $GetPriceList->sale_Price_10m3,
					);
					return Response:: json($BSA6m3);
				}
				if ($size == '10m3' && $Meterial == 'BSA') {

					$BSA10m3 =  array (
						'Price'=> number_format($GetPriceList->sl_pr_10m3_bsa, 2),
						'Total' => number_format($GetPriceList->pr_10m3_bsa + $GetPriceList->sale_Price_10m3 , 2),
						'Actual' => number_format($GetPriceList->pr_10m3_bsa, 2),
						'Transport'	 => $GetPriceList->sale_Price_10m3,
					);
					return Response:: json($BSA10m3);


				}
				if ($size == '20m3' && $Meterial == 'BSA') {

					$BSA20m3 =  array (
						'Price'=> number_format($GetPriceList->sl_pr_20m3_bsa, 2),
						'Total' => number_format($GetPriceList->pr_20m3_bsa + $GetPriceList->sale_Price_40m3 , 2),
						'Actual' => number_format($GetPriceList->pr_20m3_bsa, 2),
						'Transport'	 => $GetPriceList->sale_Price_40m3,
					);
					return Response:: json($BSA20m3);
				}
				// End BSA

				if ($size == '30m3' && $Meterial == 'BSA') {

					$BSA30m3 =  array (
						'Price'=> number_format($GetPriceList->rl_sl_30m3_bsa, 2),
						'Total' => number_format($GetPriceList->rl_pr_30m3_bsa + $GetPriceList->sale_Price_40m3 , 2),
						'Actual' => number_format($GetPriceList->rl_pr_30m3_bsa, 2),
						'Transport'	 => $GetPriceList->sale_Price_40m3,
					);
					return Response:: json($BSA30m3);
				}
				// End BSA

				// Hout
				if ($size == 'Rolcontainer' && $Meterial == 'Hout') {

					$HoutRolcontainer =   array (
								'Price'=> number_format($GetPriceList->rl_sl_hout, 2),
								'Total' => number_format($GetPriceList->rl_pr_hout + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->rl_pr_hout, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($HoutRolcontainer);
				}

				if ($size == '3m3' && $Meterial == 'Hout') {
					$Hout3m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_3m3_hout, 2),
								'Total' => number_format($GetPriceList->pr_3m3_hout + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->pr_3m3_hout, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($Hout3m3);

				}
				if ($size == '6m3' && $Meterial == 'Hout') {

					$Hout6m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_6m3_hout, 2),
								'Total' => number_format($GetPriceList->pr_6m3_hout + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->pr_6m3_hout, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($Hout6m3);

				}
				if ($size == '10m3' && $Meterial == 'Hout') {

					$Hout10m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_10m3_hout, 2),
								'Total' => number_format($GetPriceList->pr_10m3_hout + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->pr_10m3_hout, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($Hout10m3);

				}
				if ($size == '20m3' && $Meterial == 'Hout') {

					$Hout20m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_20m3_hout, 2),
								'Total' => number_format($GetPriceList->pr_20m3_hout + $GetPriceList->sale_Price_40m3 , 2),
								'Actual' => number_format($GetPriceList->pr_20m3_hout, 2),
								'Transport'	 => $GetPriceList->sale_Price_40m3,
									);
					return Response:: json($Hout20m3);
				}

				if ($size == '30m3' && $Meterial == 'Hout') {

					$Hout20m3 =   array (
								'Price'=> number_format($GetPriceList->rl_sl_30m3_hout, 2),
								'Total' => number_format($GetPriceList->rl_sl_30m3_hout + $GetPriceList->sale_Price_40m3 , 2),
								'Actual' => number_format($GetPriceList->rl_sl_30m3_hout, 2),
								'Transport'	 => $GetPriceList->sale_Price_40m3,
									);
					return Response:: json($Hout20m3);
				}
				// End Hout

				// Puin
				if ($size == 'Rolcontainer' && $Meterial == 'Puin') {

					$Rolcontainer3m3 =   array (
								'Price'=> number_format($GetPriceList->rl_sl_puin, 2),
								'Total' => number_format($GetPriceList->rl_pr_puin + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->rl_pr_puin, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($Rolcontainer3m3);
				}

				if ($size == '3m3' && $Meterial == 'Puin') {

					$Puin3m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_3m3_puin, 2),
								'Total' => number_format($GetPriceList->pr_3m3_puin + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->pr_3m3_puin, 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($Puin3m3);
				}
				if ($size == '6m3' && $Meterial == 'Puin') {

					$Puin6m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_6m3_puin, 2),
								'Total' => number_format($GetPriceList->pr_6m3_puin + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->pr_6m3_puin , 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($Puin6m3);
				}
				if ($size == '10m3' && $Meterial == 'Puin') {

					$Puin10m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_10m3_puin, 2),
								'Total' => number_format($GetPriceList->pr_10m3_puin + $GetPriceList->sale_Price_10m3 , 2),
								'Actual' => number_format($GetPriceList->pr_10m3_puin , 2),
								'Transport'	 => $GetPriceList->sale_Price_10m3,
									);
					return Response:: json($Puin10m3);
				}
				if ($size == '20m3' && $Meterial == 'Puin') {

					$Puin20m3 =   array (
								'Price'=> number_format($GetPriceList->sl_pr_20m3_puin, 2),
								'Total' => number_format($GetPriceList->pr_20m3_puin + $GetPriceList->sale_Price_40m3 , 2),
								'Actual' => number_format($GetPriceList->pr_20m3_puin , 2),
								'Transport'	 => $GetPriceList->sale_Price_40m3,
									);
					return Response:: json($Puin20m3);
				}

				if ($size == '30m3' && $Meterial == 'Puin') {

					$Puin30m3 =   array (
								'Price'=> number_format($GetPriceList->rl_pr_30m3_puin, 2),
								'Total' => number_format($GetPriceList->rl_pr_30m3_puin + $GetPriceList->sale_Price_40m3 , 2),
								'Actual' => number_format($GetPriceList->rl_pr_30m3_puin, 2),
								'Transport'	 => $GetPriceList->sale_Price_40m3,
									);
					return Response:: json($Puin30m3);
				}
				// End Puin

		}
		// End Price in All


		// Start Price By wieght
		if ($price == 'weight'){
				//die($per_price.'  '.$sale_price);
				// By Container size
				if ($size == '20m3') {

							$Niet_Sorteerbaar6m3 =   array (
										'Total' => number_format(($Gewicht * $per_price) + $GetPriceList->sale_Price_40m3 , 2),
										'Price' =>  number_format($sale_price,2),
										'Actual' => number_format(($Gewicht * $per_price), 2),
										'Transport'	 => $GetPriceList->sale_Price_40m3,
											);
							return Response:: json($Niet_Sorteerbaar6m3);
				}
				/*if ($size == '3m3' || $size == '6m3' || $size == '10m3')*/ else {

							$Niet_Sorteerbaar3m3 =   array (
										'Total' => number_format(($Gewicht * $per_price) + $GetPriceList->sale_Price_10m3 , 2),
										'Price' =>  number_format($sale_price,2),
										'Actual' => number_format(($Gewicht * $per_price), 2),
										'Transport'	 => $GetPriceList->sale_Price_10m3,
											);
							return Response:: json($Niet_Sorteerbaar3m3);
				}


				// End By Container size

		}
		//End Price By Wieght

	}

	public function AjaxDescription () {

		$Project_Id = Input::get('Project_Id');
		$Price = Input::get('Price');
		$pricelist = DB::table('tblprojectpricelist')->where('project_id', $Project_Id)->first();
		//$Description =  array ('field_1'=> $pricelist->description_field1 );
		//echo $pricelist->description_field4; die;
		$Description = array (
							'sorteerbaar' =>	'Bouw- en sloopafval (sorteerbaar)' ,
							'niet_sorteerbaar' =>	'Bouw- en sloopafval (niet sorteerbaar)',
							'Bedrijfsafval'	=>	'Bedrijfsafval' ,
							'A_B_hout' =>	'Gemengd hout (A- enlof B- hout)',
							'C_hout' =>	'C- hout',
							'Schoon_puin' =>	'Schoon puin(< 60 cm)',
							'Puin_Grof' =>	'Puin Grof (> 60 cm)',
							'Puin_met_10' =>	'Puin met 10% tot 25% zand I grond ',
							'Puin_met_25' =>	'Puin met 25% of meer zand I grond ',
							'Asfaltpuin' =>	'Asfaltpuin' ,
							'Schoon_Gips'	=>	'Schoon Gips' ,
							'Groenafval' => 'Groenafval',
							'Dakafval' => 'Dakafval',
							'Dakgrind' => 'Dakgrind',
							'Schoon_vlakglas' => 'Schoon vlakglas',
							'Opbrengsten_metalen' =>	'Opbrengsten metalen, per ton',
							'Opbrengsten_Papier' =>	'Opbrengsten Papier & Karton, per ton',
				);

		if ($pricelist->description_field1) {
		$Description['field_1'] = $pricelist->description_field1;
		}
		if ($pricelist->description_field2) {
		$Description['field_2']=  $pricelist->description_field2 ;
		}
		if ($pricelist->description_field3) {
		$Description['field_3']= $pricelist->description_field3;
		}
		if ($pricelist->description_field4) {
		$Description['field_4']= $pricelist->description_field4;
			}

		if ($Price == 'weight') {

					echo '<select name="meterial" class="select1 txt" id="meterial" style="width:150px;" required>';
		 			echo '<option value="">Select Omschrijving</option>';
					foreach($Description as $key =>$value)
					{

						echo '<option value="'.$key.'">'.$value.'</option>';
					 }
					echo '</select>';

		}

		else {
					echo '<select name="meterial" class="select1 txt" id="meterial" style="width:150px;" required>
						<option value="">Select Omschrijving</option>
						<option value="BSA">BSA</option>
						<option value="Hout">Hout</option>
						<option value="Puin">Puin</option>

					</select>';
		}
	}

	public function AddContainer () {

			$data = array (
							'BonCard_No' => Input::get('BonCard_No'),
							'Project_Id' => Input::get('project_id'),
							'BonNummer' => Input::get('Nummer'),
							'Sent_Date' => Input::get('Sent_Date'),
							'transport_price' => Input::get('Transport_price'),
							'price' => Input::get('price'),
							'size' => Input::get('size'),
							'meterial' => Input::get('meterial'),
							'Gewicht' => Input::get('Gewicht'),
							'All_price' => Input::get('All_price'),
							'Toeslag' => Input::get('Toeslag'),
							'price_per' => Input::get('price_per'),
							'net_total' => Input::get('net_price'),
							'Inkoop' => Input::get('Inkoop'),
							'total' => Input::get('gr_total'),
							'Notes' => Input::get('notes'),
							'created_at' => date('Y-m-d h:i:s', time()),
							);
			DB::table('tblcontainerbon')->insert($data);
		Session::flash('message', 'Container Inserte succes !');
		return redirect('admin/edit_orderBon/'.Input::get('BonCard_No'));


	}

	public function AjaxEditBon() {

		$BonCard_No=  Input::get('BonCard_No');
		$data = array (
					'Sent_date' => Input::get('Sent_Date'),
					'transport_price' => Input::get('Transport'),
					'price' => Input::get('Price'),
					'size' => Input::get('size'),
					'meterial' => Input::get('meterial'),
					'Gewicht' => Input::get('Gewicht'),
					'All_price' => Input::get('PriceAll'),
					'Toeslag' => Input::get('Toeslag'),
					'price_per' => Input::get('price_per'),
					'net_total' => Input::get('net_price'),
					'Inkoop' => Input::get('Inkoop'),
					'total' => Input::get('gr_total'),
					'Notes' => Input::get('Note'),
					'updated_at' => date('Y-m-d h:i:s', time())
					);


		DB::table('tblcontainerbon')->where('id',$BonCard_No)->update($data);
		return ' <div class="alert alert-success">
                        <b>Success!</b> Container succeefully Bijgewerkt ..
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>';


		}

	public function ContainerBon_pdf ($id) {


		@$ContainerBon = DB::table('tblcontainerbon')
		  ->join('tblcontainerweekcard', 'tblcontainerbon.BonCard_No', '=', 'tblcontainerweekcard.id', 'left')
		->where('BonCard_No',$id)->get();
		/*echo $ContainerBon[0]->price;
		print_r($ContainerBon); die;*/




		$Project = DB::table('tblproject')
            ->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.id')
			->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.id', 'left outer')
            ->select('tblproject.Name as Pro_Name', 'tblcontact.Lastname as Con_Lastname', 'tblcontact.Firstname as Con_Firstname', 'tblcontact.Email as Con_Email','tblcustomer.Name as Cus_Name')
			->where('tblproject.id', '=', @$ContainerBon[0]->Project_Id)
            ->first();

			/*print_r($Project);
		die;*/

		$pdf= PDF::loadView('admin.containerbon.pdf', compact('ContainerBon','Project'));
		return $pdf->download('ContainerBon-'.@$ContainerBon[0]->BonNummer.'.pdf');

	}


	function Email ($id) {

		$data = DB::table('tblcontainerweekcard')
		->join('tblproject','tblcontainerweekcard.Project_Id' , '=',  'tblproject.id')
		->select('tblproject.Name as Pro_Name','tblproject.AanTo','tblproject.CcTo','tblcontainerweekcard.Project_Id','tblcontainerweekcard.id as Con_Id')
		->where('tblcontainerweekcard.id',$id)->first();
		return View('admin.containerbon.email',compact('data'));
	}

	function ContainerBon_sent() {

		$id = Input::get('id');
		$text = Input::get('Text');
		$ContainerBon = DB::table('tblcontainerbon')
		  ->join('tblcontainerweekcard', 'tblcontainerbon.BonCard_No', '=', 'tblcontainerweekcard.id', 'left')
		->where('BonCard_No',$id)->get();

		$Project = DB::table('tblproject')
            ->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.id')
			->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.id', 'left outer')
            ->select('tblproject.Name as Pro_Name', 'tblcontact.Lastname as Con_Lastname', 'tblcontact.Firstname as Con_Firstname',
			'tblcontact.Email as Con_Email','tblcustomer.Name as Cus_Name')
			->where('tblproject.id', '=', $ContainerBon[0]->Project_Id)
            ->first();
		$BonNummer = $ContainerBon[0]->BonNummer;
		$pdf= PDF::loadView('admin.containerbon.pdf', compact('ContainerBon','Project'))->setPaper('a4', 'landscape');

		Mail::raw($text, function($message) use ($pdf) {
//		$message->to('khurram.lucky@gmail.com','Khurram')->from('khurram.asml@gmail.com')
            $message->to('khurram.lucky@gmail.com','Khurram')->from('planning@easycleanup.nl','Easy Clean Up BV')

                ->subject('Afvalcontainers mailen naar')
		->attachData($pdf->output(), "ContainerBon.pdf"); });
		Session::flash('message', 'Email verzonden');
		return redirect('admin/ContainerBons');

		}







}
