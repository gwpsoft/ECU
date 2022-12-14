    @include('admin/header')

    <meta name="csrf-token" content="{{csrf_token()}}" />

     <title>Dagelijkse Projecten</title>



 <?php use App\reports;

 use App\Weekcard;
use App\Planning;
 $yearWeek = date('YW');

   $Report_model = new reports();

   $week_model = new Weekcard();

   $segment5 = Request::segment( 3 );

  if (!empty($segment5)){

   $CurrentYear = ($segment5[0].$segment5[1].$segment5[2].$segment5[3]);

   @$Currentweek = ($segment5[4].$segment5[5]);

   $yearWeek = $segment5;

  }



  else {

	 $CurrentYear = ($yearWeek[0].$yearWeek[1].$yearWeek[2].$yearWeek[3]);

   @$Currentweek = ($yearWeek[4].$yearWeek[5]);

	 }


function convert_day ($days) {

	if ($days == 'Monday'){ return 'Maandag';}
	if ($days == 'Tuesday'){ return 'Dinsdag';}
	if ($days == 'Wednesday'){ return 'Woensdag';}
	if ($days == 'Thursday'){ return 'Donderdag';}
	if ($days == 'Friday'){ return 'Vrijdag';}
	if ($days == 'Saturday'){ return 'Zaterdag';}
	if ($days == 'Sunday'){ return 'Zondag';}

	}


   ?>

<style>

 .checker {float:right !important; }

 .error { color:#fff; }

 .select2-container-disabled span { color:#000;}
.icons-list-icon {
    font-size: 37px !important;
    line-height: 32px !important;
    text-align: center !important;
}
 .save {

	  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;

    border: medium none;

    display: inline;

    float: left;

    padding: 0;

    width: 5px;

	margin: 0 8px 0 0;

	 }

div.checker  {

  margin-right: 15px !important;

    margin-top: 10px;



 }

 .weeknr_mini {

    color: #59ad2f ;

    font-size: 12px;

}

.weeknr_small {

    color: #59ad2f ;

    font-size: 18px;

}

.weeknr_large {

    color: #59ad2f ;

    font-size: 24px;

    font-weight: bold;

}

#year {

    cursor: pointer;

    margin-right: 30px;

}

.label { font-size:100%;}

.modal-dialog { width:35%;}

</style>



<script>
function del_personeel (id) {

	var msg = confirm("Weet u het zeker of u de planning van deze werknemer wilt verwijderen ?");
                if (msg == true) {
					$('table').on('click','tr a',function(e){
							e.preventDefault();
							$(this).parents('tr').remove();
						});

					$.get('<?php echo URL:: to( 'admin/Delpersoneel' ); ?>?id=' + id,function(data) {
						$('#Customer_Name').val(data);

					});
               return true;

				} else {
		       return false;
			}



	}


        $(document).ready(function() {

        // This will now be added just before the closing body tag, after jquery,

                // and thus should work fine.

        });



        // However, to not worry about potential collisions if you were to use multiple

        // js libraries that want to use the dollar sign identifier, you might be better off

        // doing something like this, and running jQuery in no conflict mode:

        (function($) {

            // your normal jQuery code goes here.

            $(document).ready(function() { /* Do stuff */



		$( "#search" ).click(function() {

			// year  = document.getElementById('weeknumbery').value;

			date  = document.getElementById('trg_date').value;
			if (date !='') {
				document.location.href="<?=URL:: to( 'admin' )?>/PlanningByDate/"+ date;
			} else {
				document.location.href="<?=URL:: to( 'admin' )?>/PlanningByDate";
				}
	});
			});

$(document).ready(function(){



    $("#checked").click(function(){

        $("#received").val("<?=date('Y-m-d')?>");

    });

});

        })(jQuery);

    </script>
<?php $class = array ('btn-success','btn-warning','btn-danger','btn-info','btn-primary','btn-default');
$random_keys=array_rand($class,1);
?>


     <div class="row">

            <div class="col-md-12">


                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Home</a></li>

                    <li class="active">Dagelijkse Projecten</li>

                </ol>

            </div>

        </div>



        <div class="row">



    @include('admin/sidebar')





    <div class="col-md-12">

      @if (Session::has('message'))

   <div class="alert alert-danger">

                        <b>Success!</b> {{Session::get('message')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif




<div style="float:right; margin:5px;">

<a class="btn btn-success" href="<?php echo URL:: to( 'admin/PlanningByDate',@$ProjectsDtl[0]->date ); ?>" title="Detailweergave">Detailweergave</a>

<a class="btn btn-success" data-toggle="modal" href="#modal_default_2" title="Toevoegen">+ Nieuw Project</a>

<a class="btn btn-success" data-toggle="modal" href="#modal_default_4" title="Toevoegen">Kopiëren</a>

<a class="btn btn-success" href="<?php echo URL:: to( 'admin/PlanPDF',@$ProjectsDtl[0]->date ); ?>" title="Toevoegen">Afdrukken</a>


 </div>

 <div class="block">

   <span id="alert_msg"></span>

                    <div class="header" >

                       <h2>Geplande personeel</h2>
</div>
                    <div class="content">

<table width="100%" class="table table-bordered sort" style="margin-top:15px;">

         <tr>
         <th colspan="5" class="center">Dagelijkse Projecten</th>
         </tr>


         <tr>
         <th class="center" colspan="4" style="width:25%"><?php
		 $day = date('l',strtotime(@$ProjectsDtl[0]->date));?>
		  <?=convert_day($day);?>, <?php echo date('F d, Y',strtotime(@$ProjectsDtl[0]->date))?></th>
         <th class="center" ><?php echo date('W',strtotime($ProjectsDtl[0]->date))?></th>

         </tr>


<tr>

		<th class="center" style="width:25%">Afdeling</th>

          <th class="center" style="width:25%">Project</th>

          <th class="center" style="width:35%">Geplande personeel</th>

          <th class="center" style="width:10%">Regie</th>

          <th class="center" style="width:10%">Aangenomen</th>

         </tr>

<?php
$planning_model = new planning();
if (!empty($ProjectsDtl) && count ($ProjectsDtl) > 0){

	  @$p =0 ;
$P_Regie = 0;$P_Aangenomen = 0;
	 	foreach ($ProjectsDtl as $Project) { @$p++;

		$GetEmployees = $planning_model->GetEmployees ($Project->project_id,@$Project->week_no,$Project->plan_id, $Date);
		$GetDept = $planning_model->DepartmentByProject($Project->project_id);
		//print_r($GetEmployees);
	//	if (@$ProjectsDtl) {

//die;
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

		 $proj = $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';


		}
		//$proj = trim($proj, ",");



		?>
       <tr>
       <td class="left"><?php echo $GetDept[0]->Dept_Name;?></td>
       <td class="left"><?php echo $Project->Name;?></td>
       <td class="left" >
      <a  class="btn btn-success" style="float:right" data-toggle="modal" href="#modal_default_5" onclick="add_new('<?php echo $Project->plan_id?>','<?php echo $Project->project_id?>')" title="Toevoegen"><span class="icon-plus"></span></a>
       <?php
	   if ($p == 0) {
	   ?>

       <?php }$A = 0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='A') {$A++;

		if ($A ==1){
		   ?>
        <!-- <div class="header" style="background:none;" >
      <h2>Groep A</h2>
	  </div> -->
         <?php } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default <?php echo $random_keys;?>"         @if (in_array($Employee->employee_id, $duplicateIDs))
                                        style="font-size: 10px;
        line-height: 12px; background-color: #FFAD2A;"
                                      @else
                                        style="font-size: 10px;
        line-height: 12px;"
                                      @endif
									  ><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-success dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">

                                      <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>





      <?php } } ?>




       <?php $B=0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='B') {$B++;
		 if ($B ==1){  ?>
          <div class="header" style="background:none;" >
      <h2>Groep B</h2>
	  </div>
            <?php } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default <?php echo $random_keys;?>" style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-warning dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">

                                     <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
      <?php } }?>



       <?php $C=0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='C') {		$C++;
		 if ($C ==1){  ?>
	  <div class="header" style="background:none;" >
      <h2>Groep C</h2>
	  </div>
      <?php } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default <?php echo $random_keys;?>" style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-info dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">

                                      <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
      <?php }}?>




       <?php $D=0;
		foreach ($GetEmployees as $Employee) {
		if ($Employee->group=='D') {$D++;
		if ($D ==1){  ?>
		<div class="header" style="background:none;" >
		<h2>Groep D</h2>
		</div>
		<div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
			<button type="button" class="btn btn-default btn-primary" style="font-size: 10px;
		line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
			<button type="button" class="btn btn-default btn-primary dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
		line-height: 12px;">
			  <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">

			   <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
			  <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
			</ul>
		</div>
        <?php } ?>
      <?php }}?>


       <?php $E=0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='E') {$E++;
		if ($E ==1){  ?>
         <div class="header" style="background:none;" >
      <h2>Groep E</h2>
	  </div>
      <?PHP } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default btn-danger" style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-danger dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">

                                     <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
      <?php }}?>




       <?php $F=0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='F') {$F++;
		 if ($F ==1){  ?>
          <div class="header" style="background:none;" >
      <h2>Groep F</h2>
	  </div>
       <?PHP } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default btn-default" style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-default dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">

                                      <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
      <?php } }?>




       <?php $G=0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='G') {$G++;
		 if ($G ==1){  ?>
          <div class="header" style="background:none;" >
      <h2>Groep G</h2>
	  </div>
       <?PHP } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-success " style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                         <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
      <?php }}?>





       <?php $H=0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='H') {$H++;
		  if ($H==1){  ?>
           <div class="header" style="background:none;" >
      <h2>Groep H</h2>
	  </div>
       <?PHP } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default btn-success" style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-success dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                         <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
      <?php }}?>




       <?php $I=0;
	    foreach ($GetEmployees as $Employee) {
	   if ($Employee->group=='I') {$I++;
		if ($I==1){  ?>
         <div class="header" style="background:none;" >
      <h2>Groep I</h2>
	  </div>
       <?PHP } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default btn-warning" style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-warning dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                     <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
      <?php } }?>


      <?php $J=0;
	   foreach ($GetEmployees as $Employee) {
	  if ($Employee->group=='J') {$J++;
		if ($J==1){  ?>
         <div class="header" style="background:none;" >
      <h2>Groep J</h2>
	  </div>
      <?PHP } ?>
      <div class="btn-group <?php echo $Employee->id;?>" style="margin:3px;">
                                    <button type="button" class="btn btn-default btn-primary" style="font-size: 10px;
    line-height: 12px;"><?php echo $Employee->Firstname.' '.$Employee->Lastname.' ('.$Employee->Geschikt.')';?></button>
                                    <button type="button" class="btn btn-default btn-primary dropdown-toggle" data-toggle="dropdown" style="font-size: 10px;
    line-height: 12px;">
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                    <li><a href="javascript:void(0)" title="Bewerken" onclick="EditEmp ('<?php echo $Employee->id?>','<?php echo $Project->project_id?>','<?php echo $Employee->employee_id;?>','<?php echo $ProjectsDtl[0]->date;?>','<?php echo $Employee->status?>','<?php echo $Employee->Geschikt?>','<?php echo $Employee->group?>','<?php echo $Employee->Notes?>')">Bewerken</a></li>
                                      <li><a href="javascript:void(0)" title="Verwijderen" onclick="del('<?php echo $Employee->id.'_'.$ProjectsDtl[0]->date?>','<?php echo $Project->project_id?>','<?php echo $Employee->status?>');">Verwijderen</a></li>
                                    </ul>
                                </div>
		<?php } }?>

         </td>
       <td class="center" id="<?php echo $Project->project_id?>_Regie"><?php echo $Regie?></td>
       <td class="center" id="<?php echo $Project->project_id?>_Aangenomen"><?php echo $Aangenomen?></td>
       </tr>
<?php } ?>
      <tr>
      <td colspan="3"></td>
      <td class="center" id="P_Regie"><?php echo $P_Regie;?></td>
       <td class="center" id="P_Aangenomen"><?php echo $P_Aangenomen;?></td>
      </tr>

      <tr>
      <td colspan="3"></td>
      <td colspan="2" class="center" id="total"><?php echo $P_Regie+$P_Aangenomen;?></td>
      </tr>


</table>
</div>

</div></div>
   <?php } else {  ?>

   <div class="block">
                    <div class="content">

                    <p align="center">Project niet gevonden ...!</p>

                    </div>

   </div>

   <?php } ?>

     </div>

    </div>




  </div>

  <br />

<div class="modal in modal-info" id="modal_default_2"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Personeels planning</h4>

                </div>

                {!! Form::open(['url'=> 'admin/addPlanProject', 'id' => 'planning']) !!}

                <div class="modal-body clearfix">

                <input type="hidden" name="date" value="<?php echo @$ProjectsDtl[0]->date ;?>" />

                    <div class="block">

                    <div class="content">

                      <div class="form-row">



                   	<select name="project_id" id="project_id" class="select2 col-md-12">

                                    <?php

									foreach ($AllProjects as $Projects) {?>

                                    <option value="<?=$Projects->id?>"><?=$Projects->Name?></option>

                                    <?php } ?>

                                </select>

 </div></div>

 </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Opslaan</button>

                </div>



                 {!! Form::close() !!}

            </div>

        </div>

    </div>

<div class="modal in modal-info" id="modal_default_3"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Personeels planning</h4>

                </div>

                {!! Form::open(['url'=> 'admin/UpdatePlanEmp', 'id' => 'employee']) !!}

                <div class="modal-body clearfix">

                <input type="hidden" name="date" value="<?php echo @$ProjectsDtl[0]->date ;?>" />

                <input type="hidden" id="plan_id" name="plan_id" />

                <input type="hidden" id="id" name="id" />

                <input type="hidden" id="project" name="project"/>

                <input type="hidden"  name="compact" value="yes"/>

                    <div class="block">

                    <div class="content">

                      <div class="form-row">
 <div class="col-md-4">Personeel selecteren:</div>
  <div class="col-md-8">
                   	<select name="employee" id="employee2" class="select " style="width:100%"
                    onchange="checkEmployeeAvailibility(); return 0;">

                                    <?php

									foreach (@$AllEmployees as $Employee) {?>

                                    <option value="<?=$Employee->id?>"><?=$Employee->Firstname.' '.$Employee->Lastname?></option>

                                    <?php } ?>

                                </select>

                                <p style="color: red; background-color: white; font-weight: bold;" id="showErrorMsg">Werknemer is al gepland voor vandaag!</p>
</div>
   </div>
   {{-- <p>HELLO</p> --}}


 <div class="form-row">
 <div class="col-md-4">Functie:</div>
  <div class="col-md-8">
                   	<select name="Geschikt" id="Geschikt" class="select " style="width:100%">

                                   <?php
					   $options = array ('Opruimer','Schoonmaker','Handyman','Timmerman','ZZPer');
					   foreach ($Functie as $CWeeks) { ?>
                            <option value="<?php echo $CWeeks->code;?>"><?php echo $CWeeks->name;?></option>
                        <?php } ?>

                                </select>
</div>


 </div>
                    <div class="form-row">
                    <div class="col-md-4">Status:</div>
                    <div class="col-md-8">
                    <select name="status" id="status" class="select" style="width:100%">
                    <option value="1">Regie</option>
                    <option value="2">Aangenomen</option>
                    </select>
                    </div>


 </div>

 					<div class="form-row">
                    <div class="col-md-4">Groep:</div>
                    <div class="col-md-8">
                    <select name="group" id="group" class="select " style="width:100%">
                    <option value="A">Groep A</option>
                    <option value="B">Groep B</option>
                    <option value="C">Groep C</option>
                    <option value="D">Groep D</option>
                    <option value="E">Groep E</option>
                    <option value="F">Groep F</option>
                    <option value="G">Groep G</option>
                    <option value="H">Groep H</option>
                    <option value="I">Groep I</option>
                    <option value="J">Groep J</option>
                    </select>
                    </div>
 </div>

  <div class="form-row">

                            <div class="col-md-4">Opmerkingen:</div>

                            <div class="col-md-8">

                            <textarea class="form-control" rows="4" cols="10" id="Notes" name="Notes"></textarea>

                            		<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->

                            </div>

                        </div>
 </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Opslaan</button>

                </div>



                 {!! Form::close() !!}

            </div>

        </div>

    </div>

     </div>

<div class="modal in modal-info" id="modal_default_4"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Uren Toevoegen</h4>

                </div>

                {!! Form::open(['url'=> 'admin/CopyPlan', 'id' => 'employee']) !!}

                <div class="modal-body clearfix">

                <input type="hidden" name="date" value="<?php echo @$ProjectsDtl[0]->date ;?>" />

                    <div class="block">

                    <div class="content">

                      <div class="form-row">
 <div class="col-md-4">Select Datum:</div>
  <div class="col-md-8">


   <div class="input-group">

                             <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                            		<input type="text" class="datepicker form-control" placeholder="Datum" name="copy_todate" id="copy_todate"  />

                            </div>

                             </div>
</div>
   </div>

 </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-warning btn-clean">Opslaan</button>

                </div>



                 {!! Form::close() !!}

            </div>

        </div>

    </div>

    <div class="modal in modal-info" id="modal_default_5"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Personeels planning</h4>

                </div>

                {!! Form::open(['url'=> 'admin/addPlanEmp', 'id' => 'employee']) !!}

                <div class="modal-body clearfix">

                <input type="hidden" name="date" value="<?php echo @$ProjectsDtl[0]->date ;?>" />

                <input type="hidden" id="add_plan_id" name="plan_id" />

                <input type="hidden" id="id" name="id" />

                <input type="hidden" id="add_project" name="project"/>

                <input type="hidden"  name="redirect" value="compact"/>

                    <div class="block">

                    <div class="content">

                      <div class="form-row">
 <div class="col-md-4">Personeel selecteren:</div>
  <div class="col-md-8">
                   	<select name="employee" id="employee" class="select2 " style="width:100%">

                                    <?php

									foreach (@$AllEmployees as $Employee) {?>

                                    <option value="<?=$Employee->id?>"><?=$Employee->Firstname.' '.$Employee->Lastname?></option>

                                    <?php } ?>

                                </select>
</div>
   </div>


 <div class="form-row">
 <div class="col-md-4">Functie:</div>
  <div class="col-md-8">
                   	<select name="Geschikt" id="Geschikt" class="select2 " style="width:100%">

                                   <?php
					   $options = array ('Opruimer','Schoonmaker','Handyman','Timmerman','ZZPer');
					   foreach ($Functie as $CWeeks) { ?>
                            <option value="<?php echo $CWeeks->code;?>"><?php echo $CWeeks->name;?></option>
                        <?php } ?>

                                </select>
</div>


 </div>
                    <div class="form-row">
                    <div class="col-md-4">Status:</div>
                    <div class="col-md-8">
                    <select name="status"  class="select2 " style="width:100%">
                    <option value="1">Regie</option>
                    <option value="2">Aangenomen</option>
                    </select>
                    </div>


 </div>

 					<div class="form-row">
                    <div class="col-md-4">Groep:</div>
                    <div class="col-md-8">
                    <select name="group"  class="select2 " style="width:100%">
                    <option value="A" selected="selected">Groep A</option>
                    <option value="B">Groep B</option>
                    <option value="C">Groep C</option>
                    <option value="D">Groep D</option>
                    <option value="E">Groep E</option>
                    <option value="F">Groep F</option>
                    <option value="G">Groep G</option>
                    <option value="H">Groep H</option>
                    <option value="I">Groep I</option>
                    <option value="J">Groep J</option>
                    </select>
                    </div>
 </div>

 <div class="form-row">

                            <div class="col-md-4">Opmerkingen:</div>

                            <div class="col-md-8">

                            <textarea class="form-control" rows="4" cols="10" name="Notes"></textarea>

                            		<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->

                            </div>

                        </div>
 </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Opslaan</button>

                </div>



                 {!! Form::close() !!}

            </div>

        </div>

    </div>

     </div>

     </div>


       @include('admin/footer')</div>

 <script>


 function EditEmp (id,pro_id,emp_id,date,status,Geschikt,group,Opmerkingen){





		alert (Opmerkingen);
		$('#project').val(pro_id);
		$('#status').val(status).prop("selected",true);
		$('#group').val(group).prop("selected",true);
		$('#id').val(id);
		$('#employee2').val(emp_id).prop("selected",true);


		$('#Notes').val(Opmerkingen);


		$('#Geschikt').val(Geschikt).prop("selected",true);;



		/*if (status == 1) {
			$("#Regie").prop("checked");
		} else {
			$("#Aangenomen").prop("checked");
		}*/
			/*	$('#modal_default_3').modal({
        	show: 'true'
    	});*/
		$( "#employee2" ).removeClass( "select" );
		$( "#employee2" ).addClass( "select2" );
		$('#modal_default_3').modal({
        	show: 'true'
    	});


		//$('#').val(date);


		//Aangenomen 2
		//Regie 1
		}

 function del (id,project,status) {

	var arr = id.split('_');
	Regie = $('#'+project+'_Regie').text();
	Aangenomen = $('#'+project+'_Aangenomen').text();


	P_Regie = $('#P_Regie').text();
	P_Aangenomen = $('#P_Aangenomen').text();
	total = $('#total').text();



	/*alert (Regie);
	alert (Aangenomen);
	 return false;*/
	var msg = confirm("Weet u het zeker of u de planning van deze werknemer wilt verwijderen ?");
                if (msg == true) {
					$('.'+arr).hide();
					if (status == 1) {
						$('#'+project+'_Regie').text(Regie-1);
					}
					if (status == 2) {
						$('#'+project+'_Aangenomen').text(Aangenomen-1);
					}

					$('#P_Regie').text(P_Regie-1);
					$('#P_Aangenomen').text(P_Aangenomen-1);
					$('#total').text(total-1);

					$.get('<?php echo URL:: to( 'admin/Delpersoneel' ); ?>?id=' + id,function(data) {
						$('#Customer_Name').val(data);
					});
               return true;

				} else {
		       return false;
			}
	}

	function add_new(plan_id,Project) {



		$('#add_plan_id').val(plan_id);
		$('#add_project').val(Project);
	 }

   let showErrorMsg = document.getElementById('showErrorMsg');
   let givenDate    = "{{ $Date }}";
   console.log("Date: ", givenDate);
   // showErrorMsg.style.display = "none";

   function checkEmployeeAvailibility() {
     console.log("HELLO");
     showErrorMsg.style.display = "none";

     var e       = document.getElementById("employee2");
     let empID   = e.options[e.selectedIndex].value;
     let APP_URL = {!! json_encode(url('/').'/') !!}
     let url     = APP_URL + `admin/checkUserIsFree`;


     axios.post(url, {
       date: givenDate,
       empID: empID
     })
     .then(response => {
       console.log(response.data);
       if(response.data) {
         showErrorMsg.style.display = "inline-block";

       } else {
         showErrorMsg.style.display = "none";
       }

     })
     .catch(err => console.log(err))
   }


 </script>
