<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

   "http://www.w3.org/TR/html4/loose.dtd">



<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title></title>

    <style>

        body {

        font-family:"Arial Black", Gadget, sans-serif;

        }

		.center{ text-align:center; }
		.left{ text-align:left; }
		.padding{ padding:3px; }
		.right{ text-align:right;}
		.margin-top{ margin-top:15px !important}


      .weekcard table,td,th {

            border:1px solid #000; box-shadow:none; text-shadow:none; }

		table  {

           border-collapse: collapse;  }

		.strong{ font-weight:bold;}

        .weekcard th { font-size:9px !important; } .weekcard td{ font-size:8px !important;}

    </style>

</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

<!--

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:-10px;">

        <tr>

        <td width="25%" >

		<img src="<?php echo url();?>/assets/img/icons/Logo.jpg" style=" vertical-align:top; height:160px; width:270px; margin-bottom:25px;" />



        </td>

        <td width="60%" style="line-height:4px; vertical-align:bottom; font-size:13px;">

        <h1 class="center">Easy Cleanup B.V.</h1>

        <p class="center">Kollenbergweg 78 – 1101 AV Amsterdam</p>

        <p class="center">Tel: 020 - 691 61 15, E-mail: info@easycleanup.nl</p>

        <p class="center">&nbsp;</p>

        <p class="center">Schoonmaakonderhoud - Bouwopruiming - Opleveringsschoonmaak</p>

        <p class="center">Glasbewassing - Gevelreiniging - Keetschoonmaak - Bedrijfsdiensten</p>

        <p class="center">Bouwafval management & Containers Service</p>


        </td>

        </tr>

        </table>
-->





         <table width="100%" class="weekcard">

         <tr>
         <th colspan="5" class="center">Dagelijkse Projecten</th>
         </tr>


         <tr>
         <th class="center" style="width:25%"><?php echo date('l, F d, Y',strtotime(@$ProjectsDtl[0]->date))?></th>
         <td colspan="3" class="center">keet=keetonderhoud opr=opruimer hndy=handyman tman=timmerman opl=oplevering</td>
         <th class="center" ><?php echo date('W',strtotime($ProjectsDtl[0]->date))?></th>

         </tr>




         <tr>

		<th class="center" style="width:25%">Afdeling</th>

          <th class="center" style="width:25%">Project</th>

          <th class="center" style="width:35%">Geplande personeel</th>

          <th class="center" style="width:10%">Regie</th>

          <th class="center" style="width:10%">Aangenomen</th>

         </tr>
<?php use App\Planning;
$planning_model = new planning();

if (!empty($ProjectsDtl) && count ($ProjectsDtl) > 0){

	  @$p =0 ;
$P_Regie = 0;$P_Aangenomen = 0;
	 	foreach ($ProjectsDtl as $Project) { @$p++;

		$GetEmployees = $planning_model->GetEmployees ($Project->project_id,@$Project->week_no,$Project->plan_id, $Date);	
		$GetDept = $planning_model->DepartmentByProject($Project->project_id);
		//print_r($GetEmployees);
	//	if (@$ProjectsDtl) {


			$proj = '';

		$Regie = 0;$Aangenomen = 0;
		foreach ($GetEmployees as $Employee) {
		if ($Employee->status == 1){
			$Regie ++;
			$P_Regie ++;
		}
		if ($Employee->status == 2){
			$Aangenomen ++;
			$P_Aangenomen++;
		}

		 $proj .= $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')'.", ";;


		}
		$proj = trim($proj, ",");



		?>
       <tr>
       <td class="left"><?php echo $GetDept[0]->Dept_Name;?></td>
       <td class="left"><?php echo $Project->Name;?></td>
       <td class="left" ><?php echo @$proj?> </td>
       <td class="center"><?php echo $Regie?></td>
       <td class="center"><?php echo $Aangenomen?></td>
       </tr>
<?php } }?>
      <tr>
      <td colspan="3"></td>
      <td class="center"><?php echo $P_Regie;?></td>
       <td class="center"><?php echo $P_Aangenomen;?></td>
      </tr>

      <tr>
      <td colspan="3"></td>
      <td colspan="2" class="center"><?php echo $P_Regie+$P_Aangenomen;?></td>
      </tr>


</table>


          <div style="height:20px;">&nbsp;</div>

         <!--<p style="font-size:16px;">Pagina: 1</p>-->











</body>

</html>
