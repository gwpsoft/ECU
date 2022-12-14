<!-- Header -->

  @include('admin/header') 



<script>  

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

			 year  = document.getElementById('weeknumbery').value;

			week  = document.getElementById('weeknumberw').value;

			document.location.href="<?=URL:: to( 'admin' )?>/report/employeeoverview/weeknumber/" + year + week;

	});

			

		

		 /* Datatables */

    if($("table.sortable_simple").length > 0)

        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});

    

    if($("table.sortable_default").length > 0)

        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null,null]});

    

    if($("table.sortable").length > 0)

        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null,null]});    

    /* eof Datatables */

	

	

	});

        })(jQuery);

	

    </script>





  

   <?php use App\reports;

   $Report_model = new reports();

  @$segment5 = Request::segment( 5 );

  

 if (!empty($segment5)){

   @$CurrentYear = ($segment5[0].$segment5[1].$segment5[2].$segment5[3]);

   @$Currentweek = ($segment5[4].$segment5[5]); 

  }

  

  else {

   @$CurrentYear = ($yearWeek[0].$yearWeek[1].$yearWeek[2].$yearWeek[3]);

   @$Currentweek = ($yearWeek[4].$yearWeek[5]);

	 

	 }

   ?> 

    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

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

</style>











 <title>Report</title>   

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin' ); ?>">huis</a></li>

                    <li class="active">Report</li>

                </ol>

            </div>

        </div> 

        <div class="row">     

    @include('admin/sidebar') 

   <div class="col-md-12">

   @if (Session::has('message'))

   <div class="alert alert-success">

                        <b>Success!</b> {{Session::get('message')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif

 

   <div class="block">

                    <div class="header">

                        <h2>Week nr</h2>

                    </div>

                    <div class="content">

					<div class="col-md-5"> 

                                                              

					<?php 

					 $y = 0;



    for ($i=-2; $i<=2; $i++) {

        if ( 2 == abs($i)) {

            $class = 'mini';

        } elseif ( 1 == abs($i) ) {

            $class = 'small';

        } elseif ( 0 == $i ) {

            $class = 'large';

			

        }

        $weeknumber = $Report_model->getWeekNumber($yearWeek, $i);



        echo '<a href="' . URL:: to( 'admin' ) . '/report/employeeoverview' . '/weeknumber/' . $weeknumber . '"><span class="weeknr_' . $class . '" id="year">' . $weeknumber . '</span></a>';

    }?>

    </div>



  <div class="col-md-1"> 

                            		<select name="weeknumbery" id="weeknumbery" class="select2" style="width:100px; ">

                                    <?php 

									$current_year = date('Y');

									$range = range($current_year, $current_year-10);

									$years = array_combine($range, $range);

									foreach ($years as $year) {?>

                                    <option value="<?=$year?>" <?php if ($CurrentYear == $year) {?> selected="selected" <?php } ?>><?=$year?></option>

                                    <?php } ?>                                 

                                </select>

                                 

                            </div>

 <div class="col-md-1" style="margin-left:15px;"> 

                            		<select name="weeknumberw" id="weeknumberw" class="select2" style="width:70px;">

                                    <?php 

									

									foreach (range(00, 52) as $number) {

										$number = (str_pad($number, 2, "0", STR_PAD_LEFT));

										?>

                                    <option value="<?=$number?>"  <?php if (@$Currentweek == $number) {?> selected="selected" <?php } ?>><?=$number;?></option>

                                    <?php } ?>                                 

                                </select>

                            </div>

                            <div class="col-md-1">

                            <img class=" " src="{{ URL::asset('assets/img/icons/search.png') }}" id="search" style=" cursor:pointer">

                            

   					 

</div>

                    </div>

                </div>

   

    

   

   <div class="block">

                    <div class="header">

                        <h2>Personeel Overzicht per Project</h2>

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">

                            <thead>

                                <tr>

                                    <th width="25%">Personeel</th>

                                     <th width="25%">Project</th>

                                    <th width="10%">Gewerkte uren</th>

                                    <th width="8%">Opgebracht</th>

                                    <th width="8%">Kosten</th>  

                                    <th width="8%">Resultaat</th>                                   

                                </tr>

                            </thead>

                            <?php if ($EmployeeOverView){  ?>

                             <tbody>

							<?php foreach ($EmployeeOverView as $Employee){?>

                           

                          

            <tr>

                <td>{{ @$Employee->Name }}</td>

                <td>{{ @$Employee->Project }} </td>              

                <td><?php echo($Employee->Hours > 0 ? '<span class="label label-success">'.$Employee->Hours.'</span>' : $Employee->Hours); ?></td> 

                <td>€ <?php echo($Employee->Rate > 0 ? '<span class="label label-success">'.$Employee->Rate.'</span>' : $Employee->Rate); ?></td>  

                <td>€ <?php echo($Employee->Cost > 0 ? '<span class="label label-success">'.$Employee->Cost.'</span>' : $Employee->Cost); ?></td>

                <td>€ <?php echo($Employee->Calculated > 0 ? '<span class="label label-success">'.$Employee->Calculated.'</span>' : $Employee->Calculated); ?></td>

            </tr>

                                <?php } ?>

                            </tbody>

                            <?php } ?>

                        </table>                                        



                    </div>

                </div>              

            </div>

  </div>   

       @include('admin/footer')</div>  