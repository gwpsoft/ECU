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

			document.location.href="<?=URL:: to( 'admin' )?>/report/total/weeknumber/" + year + week;

	});

	

	

	 /* Datatables */

    if($("table.sortable_simple").length > 0)

        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});

    

    if($("table.sortable_default").length > 0)

        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null]});

    

    if($("table.sortable").length > 0)

        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null]});    

    /* eof Datatables */

	

			});

        })(jQuery);

    </script>





  

   <?php use App\reports;

  /* $Report_model = new reports();

   $segment5 = Request::segment( 5 );

  if (!empty($segment5)){

   $CurrentYear = ($segment5[0].$segment5[1].$segment5[2].$segment5[3]);

   @$Currentweek = ($segment5[4].$segment5[5]); 

  }

  

  else {

	 $CurrentYear = ($yearWeek[0].$yearWeek[1].$yearWeek[2].$yearWeek[3]);

   @$Currentweek = ($yearWeek[4].$yearWeek[5]);

	 

	 }*/

  

  

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

                        <h2>Overzicht van Uren op Aangnomen Project</h2>

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">

                            <thead>

                                <tr>

                                    <th width="25%">Project</th>

                                    <th width="15%">Gewerkte uren</th>

                                    <th width="15%">Vaste prijs </th>

                                    <th width="15%">Kosten</th>  

                                    <th width="15%">Resultaat</th>                                   

                                </tr>

                            </thead>

                            <?php if ($ProjectFixed){  ?>

                             <tbody>

							<?php foreach ($ProjectFixed as $Project){ ?>

                           

                          

                                <tr>

                                    <td>{{ @$Project->Project }}</td>

                                    <td><?php echo($Project->Fixed > 0 ? '<span class="label label-success">'.$Project->Fixed.'</span>' : $Project->Fixed); ?></td> 

                                    <td>€ <?php echo($Project->Hours > 0 ? '<span class="label label-success">'.$Project->Hours.'</span>' : $Project->Hours); ?></td>  

                                    <td>€ <?php echo($Project->Cost > 0 ? '<span class="label label-success">'.$Project->Cost.'</span>' : $Project->Cost); ?></td>

                                    <td>€ <?php echo($Project->Calculated > 0 ? '<span class="label label-success">'.$Project->Calculated.'</span>' : $Project->Calculated); ?></td>

                                    

                      

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