
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Planning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
     <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
   <link href="{{ URL::asset('assets/frontend/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- <script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>-->

 <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
   <link href="https://valor-software.com/ngx-bootstrap/assets/css/glyphicons.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/frontend/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>


  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet" id="bootstrap-css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

 <style>
.table th { text-align:center; background-color:#428bca; color:#fff;}
.table td { text-align:center; }
label { font-weight:normal;}



.dataTables_filter input {
display: inline;
width: 70%;
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
border: 1px solid #ccc;
transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);}


#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}
   .form-row2 {
    float: left;
    line-height: 30px;
    margin-bottom: 10px;
    width: 100%;
}
.datepicker{z-index:1151 !important;}
.bootstrap-timepicker-widget.dropdown-menu {
    z-index: 99999!important;
}
</style>
   <?php

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


   <div class="page-content">

                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">
                            <h1>Planning</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>
                                <li class="active">Planning</li>
                            </ul>
                            <!-- ./breadcrumbs -->
                        </div>
                        <!-- ./page title -->
                    </div>
                    <!-- ./page content holder -->
                </div>

                  <!-- page content wrapper -->
                <div class="page-content-wrap">

                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>

                    <!-- page content holder -->
                    <div class="page-content-holder">


                     <div class="col-md-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                    <b>Success!</b> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                    @endif

    			 <!--<a href="<?php echo URL:: to( 'AddProject' );?>" class="btn btn-success btn-large" style="float:right;margin-bottom:20px;">Add new Project</a>-->
                <div style="margin-bottom:5%;"></div>

                <div class="table-responsive">
                <table  id="example" class="table table-striped" style="font-size:12px;" >
                <colgroup>
          <col class="col-md-1">
          <col class="col-md-2">
            <col class="col-md-2">
             <col class="col-md-4">
             <col class="col-md-4">

        </colgroup>
                	<thead>
<tr>
<th>S No.</th>
<th>Datum</th>
<th>Dag</th>
<th>Project</th>
<th>Options</th>
</tr>
</thead>
   <tbody>
   <?php $i =0;foreach ($GetUserPlannings as $project) { $i++;
    $day = date('l',strtotime($project->plan_date));
   $GetAttendence_In = DB:: table( 'tbl_pln_emp_attendence' )->where(array('employee_id' =>$project->employee_id,'project_id' =>$project->project_id,'plan_id' =>$project->plan_id))->whereNull('date_out')->first();

    $GetAttendence_Out = DB:: table( 'tbl_pln_emp_attendence' )->where(array('employee_id' =>$project->employee_id,'project_id' =>$project->project_id,'plan_id' =>$project->plan_id))->whereNull('date_in')->first();

  // print_r($GetAttendence);
   @$date_in = @$GetAttendence_In->date_in;
  @ $time_in = @$GetAttendence_In->time_in;
   @ $date_out = @$GetAttendence_Out->date_out;
   @ $time_out = @$GetAttendence_Out->time_out;
  // foreach ($GetAttendence as $Attendence) {
	   /*if (!empty($Attendence->date_out)){

		} if (!empty($Attendence->date_in)){

		}*/
  // }
   ?>
   <tr>
  	<td><?=$i?></td>

   <td><?php echo date('d-m-Y', strtotime( $project->plan_date ))?></td>
  <td><?=convert_day($day);?></td>
    <td><?=$project->project_name?></td>
   <td><a  title="Project Details" data-toggle="modal" href="#modal_default_5" onclick="view_details('<?php echo $project->project_id?>','<?php echo $project->Notes?>','<?php echo $project->functie ?>','<?=convert_day($day);?>','<?php echo date('M d, Y', strtotime( $project->plan_date ))?>','<?php echo $project->Location?>','<?php echo $project->employee_id?>','<?php echo $project->plan_id?>','<?php echo @$date_out?>','<?php echo @$time_out?>','<?php echo @$date_in?>','<?php echo @$time_in?>', '<?php echo date('d-m-Y', strtotime( $project->plan_date ))?>')">
   <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/view-details.png') }}" style="width:30px; height:30px;"></a>
  <!-- <a href="<?php echo URL:: to( 'per-messages/'. $project->project_id );?>" title="Project Berichetn"><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/view-messages.png') }}" style="width:30px; height:30px;"></a>-->
</td>
     </tr>
     <?php } ?>
      </tbody>
                </table>

          </div>

      </div>
      <!--<div class="modal" tabindex="-1" role="dialog" id="modal_default_5">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>-->















        <!-- ./page content holder -->
        <div class="modal" id="modal_default_5"  role="dialog" tabindex="-1"   >

       <div class="modal-dialog" role="document">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

<h4 class="modal-title">Personeels planning (<?=Session::get('front_name')?>)</h4>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

					<p id="date"></p>

                </div>

                <input type="hidden" id="emp_id" />
				<input type="hidden" id="plan_id" />
                <input type="hidden" id="project_id" />


                <div class="modal-body">


             <div id="exTab2" >

		<ul class="nav nav-tabs">
			<li class="active"><a  href="#1a" data-toggle="tab">Informatie</a>
			</li>
			<li><a href="#2a" data-toggle="tab">Begintijd</a>
			</li>
			<li><a href="#3a" data-toggle="tab">Eindtijd</a>
			</li>
		</ul>

			<div class="tab-content " style="padding : 15px;">
			  <div class="tab-pane active" id="1a">
       				<div class="container">

                    <div class="row">
                    <div class="col-md-8">
                    <div class="col-md-3" style="font-weight:bold">Klant:</div>
                    <div class="col-md-6">
                    <p id="afdeing">&nbsp;</p>
                    </div>
                    <!--<div class="col-md-5">&nbsp;</div>-->
                    </div>
                    </div>

                    <!--<div class="form-row">
                    <div class="col-md-3" style="font-weight:bold">Afdeling:</div>
                    <div class="col-md-9">
                    <p id="afdeing">&nbsp;</p>
                    </div>
                    </div>-->

                    <div class="row">
                    <div class="col-md-8">
                    <div class="col-md-3" style="font-weight:bold">Project&nbsp;Naam:</div>
                    <div class="col-md-6">
                    <p id="name">&nbsp;</p>
                    </div>

                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-8">
                    <div class="col-md-3" style="font-weight:bold">Project&nbsp;Address:</div>
                    <div class="col-md-6">
                    <p id="address">&nbsp;</p>
                    </div>

                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-8">
                    <div class="col-md-3" style="font-weight:bold">Locatie:</div>
                    <div class="col-md-6">
                    <p><a href="https://www.google.com/maps" id="Locaties" target="_blank">
                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/map.png') }}" style="width:30px; height:30px;">
                    </a></p>
                    </div>

                    </div>
                    </div>


                     <div class="row">
                     <div class="col-md-8">
                    <div class="col-md-3" style="font-weight:bold">Uitvoerder:</div>
                    <div class="col-md-6">
                    <p id="Uitvoerder">&nbsp;</p>
                    </div>

                    </div>
                    </div>

                     <div class="row">
                     <div class="col-md-8">
                    <div class="col-md-3" style="font-weight:bold">Functie:</div>
                    <div class="col-md-6">
                    <p id="Geschikt">&nbsp;</p>
                    </div>

                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-8">
                    <div class="col-md-3" style="font-weight:bold">Opmerkingen:</div>
                    <div class="col-md-6">
                    <p id="Notes">&nbsp;</p>
                    </div>

                    </div>

 </div>
 				</div>
				</div>


				<div class="tab-pane" id="2a">
                <div class="container">
                 <div class="row form-row2">
                  <div class="col-md-8">
                    <div class="col-md-3"><label>Datum:</label><span class="text-hightlight">*</span></div>
                    <div class="col-md-4">
                    <span id="dis_date_in"></span>
                    <input id="date_in" style="display: none;">
                    </div>

                    </div>
                 </div>

                 <div class="row form-row2">
                  <div class="col-md-8">
                    <div class="col-md-3"><label>Tijd In:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4">
                            <span id="dis_time_in"></span>
                            <div class="bootstrap-timepicker timepicker dis_time_in">
            				<input id="timepicker" type="text" class="form-control input-small time_in">
       				 </div>

                 </div>
                  </div>

				</div>
                 <div class="row form-row2">
                  <div class="col-md-8">
                 <div class="col-md-3">&nbsp;</div>
                 <div class="col-md-4">
                 <button type="button" id="Time_in_mark" class="btn btn-lg  btn-success" onclick="Time_In();" >Opslaan</button>
                 </div>
                 </div>
                </div>
                </div>
                </div>

        <div class="tab-pane" id="3a">
        <div class="container">
                <div class="row form-row2">
                <div class="col-md-8">
                <div class="col-md-3"><label>Datum:</label><span class="text-hightlight">*</span></div>
                <div class="col-md-4">
                <span id="dis_date_out"></span>
                <input id="date_out" style="display: none;">
                </div>
                </div>
                   </div>

                 <div class="row form-row2">
                 <div class="col-md-8">
                    <div class="col-md-3"><label>Tijd Out:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4">
                            <span id="dis_time_out"></span>
                            <div class="bootstrap-timepicker timepicker dis_time_out">
            				<input id="timepicker1" type="text" class="form-control input-small time_out" >
       				 </div>

                 </div>


				</div>
                </div>


                 <div class="row form-row2">
                <div class="col-md-8">
                 <div class="col-md-3">&nbsp;</div>
                 <div class="col-md-6">
                 <button type="button" id="Time_out_mark" class="btn btn-lg  btn-success" onclick="Time_Out();" >Opslaan</button>
                 </div>
                 </div>
                  </div>
				</div>
			</div>
               </div>
</div>
                <div class="modal-footer">
                 <span style="float:left">Huidige tijd : <?php echo date('H:i a')?></span>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sluiten</button>
                </div>





            </div>

        </div>

    </div>

     </div>
    </div>
    <!-- ./page content wrapper -->
    </div>
</div>

</div>

       @include('front/footer')

       <script>

	   function Time_Out () {

		  date_out =  $('#date_out').val();
		  time_out =  $('.time_out').val();
		  project_id = $('#project_id').val();
		  emp_id = $('#emp_id').val();
		  plan_id = $('#plan_id').val();

		    $.get('<?php echo URL:: to( 'AjaxTimeOut' ); ?>?date_out=' + date_out
			+'&time_out='+time_out
			+'&project_id='+project_id
			+'&emp_id='+emp_id
			+'&plan_id='+plan_id,
			function(data) {
						location.reload();
					});
		   }

	   		function Time_In () {

		  date_in =  $('#date_in').val();
		  time_in =  $('.time_in').val();
		  project_id = $('#project_id').val();
		  emp_id = $('#emp_id').val();
		  plan_id = $('#plan_id').val();

		    $.get('<?php echo URL:: to( 'AjaxTimeIn' ); ?>?date_in=' + date_in
			+'&time_in='+time_in
			+'&project_id='+project_id
			+'&emp_id='+emp_id
			+'&plan_id='+plan_id,
			function(data) {
						location.reload();
					});
		   }










       function view_details (project_id,Notes,Geschikt,day,date,Location,emp_id,plan_id,date_out,time_out,date_in,time_in, project_date) {

		 /*  $('#modal_default_5').modal({
        	show: 'true'
    	}); */
		//alert (date_out+'--'+time_out+'--'+date_in+'--'+time_in);
    $('#dis_date_in').html(project_date);
    $('#dis_date_out').html(project_date);
		 $.get('<?php echo URL:: to( 'AjaxPlanning' ); ?>?id=' + project_id + '&emp_id=' + emp_id + '&date=' + project_date,function(comingData) {
          let data = comingData.project_details;
						$('#Klant').html(data.CustomerName);
						$('#afdeing').html(data.DeptName);
						$('#project_id').val(project_id);
						$('#emp_id').val(emp_id);
						$('#date_in').val(project_date);
						$('#date_out').val(project_date);
						$('#plan_id').val(plan_id);
						$('#Geschikt').html(Geschikt);
						$('#date').html(day+ ', ' +date );
						$('#name').html(data.project_name);
						$('#Uitvoerder').html(data.Contact_Firstname+' '+data.Contact_Lastname+' - ('+data.Contact_phone+')');
						$('#address').html(data.Address + ', '+ data.Zipcode +' '+ data.City);
						$('#Notes').html(Notes);
						$("#Locaties").attr("href", "https://www.google.com/maps/"+Location);

            // if Employee check in then show checkout button else not
              if(!comingData.did_check_in && !comingData.did_check_out) {
                $('#dis_time_in').html('');
                $('#dis_time_out').html('');
                $(".form-control.input-small.time_in").css('display', 'block');
                $('#Time_in_mark').css('display','block');
                $('#Time_out_mark').css('display','none');
                $(".form-control.input-small.time_out").css('display', 'block');
              }

              if(comingData.did_check_in) { // Yes
                $('#Time_in_mark').css('display','none');
                $('#Time_out_mark').css('display','block');
                $('#dis_time_in').html(comingData.check_in_time);
                $(".form-control.input-small.time_in").css('display', 'none');

              } else { // No
                $('#Time_in_mark').css('display','block');
                $('#Time_out_mark').css('display','none');
                $('#dis_time_in').css('display','block');
                $(".form-control.input-small.time_in").css('display', 'block');

              }

              if(comingData.did_check_in && !comingData.did_check_out) {
                $('#Time_out_mark').css('display','block');
                // $("dis_time_in").css('display','block');
                $('#dis_time_in').html(comingData.check_in_time);
                $('#dis_time_out').html('');
                $(".form-control.input-small.time_out").css('display', 'block');
              }

              if(comingData.did_check_in && comingData.did_check_out) {
                  $('#Time_out_mark').css('display','none');
                  $(".form-control.input-small.time_out").css('display', 'none');
                  $('#dis_time_in').html(comingData.check_in_time);
                  $('#dis_time_out').html(comingData.check_out_time);
                  // $("dis_time_out").css('display','block');
              }

						//$('#Locaties').html('<a href="https://www.google.com/maps/'+Location);
						//return false;
					});

		   }


       </script>
       <script>
        $(document).ready(function(){
		    $('#timepicker,#timepicker1').timepicker({
			defaultTime: '07:00AM',
			icons:{
    up: 'glyphicon glyphicon-chevron-up',
    down: 'glyphicon glyphicon-chevron-down'
}
			 });
	  $('.datepicker').datepicker({
		format: 'yyyy-mm-dd'
	  });
        });

       </script>


       <!--<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
  <script>
 $(document).ready(function(){
    $('#example').DataTable();
});




  </script>
