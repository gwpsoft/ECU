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
			project_id  = document.getElementById('project_id').value;
			start_date  = document.getElementById('start_date').value;
			end_date  = document.getElementById('end_date').value;
			
			if (project_id == '') { alert ('Selecteer Project'); return false;}
			
			if (project_id != 0) { project = project_id} else { project = 0;}
			if (start_date != 0) { start = start_date} else { start = 0;}
			if (end_date != 0) { end = end_date} else { end = 0;}
			document.location.href="<?=URL:: to( 'admin' )?>/report/Project_Overview_Containers/filter/" + project + "/" + start + "/" + end;
	});
			
	
	 /* Datatables */
    if($("table.sortable_simple").length > 0)
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});
    
    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null, null]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null, null]});    
    /* eof Datatables */
	
	});
        })(jQuery);
	
    </script>


  
   <?php 
  
    $segment = Request::segment( 5 );
    $start = Request::segment( 6 );
    $end = Request::segment( 7 );
 
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
                        <h2>Uitgezocht Project</h2>
                    </div>
                    <div class="content">
					

 
 <div class="col-md-4" style="margin-left:15px;"> 
                            		<select name="project_id" id="project_id" class="select2" style="width:100%;">
                                    <option value="">uitgezocht project</option>
                                    <?php 
									foreach ($AllProjects as $project) {?>
                       <option value="<?=$project->id?>" <?php if ($project->id == $segment){?> selected="selected" <?php }?>><?=$project->Name;?></option>
                                    <?php } ?>                                 
                                </select>
                            </div>
                            
                            
                            <div class="col-md-2"> 
                          <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" id="start_date" placeholder="<?=date('Y-m-d')?>" name="start_date" value="<?=$start?>"/>
                                </div>
                               
                        </div>
                        <div class="col-md-1" align="center" style="width:50px; margin-top: 5px;">Naar</div>
                            
                           <div class="col-md-2"> 
                          <div class="input-group"> 
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" id="end_date" placeholder="<?=date('Y-m-d')?>" name="end_date" value="<?=$end?>"/>
                                </div>
                               
                        </div>  
                            
                            
                            
                            <div class="col-md-1">
                            <img class=" " src="{{ URL::asset('assets/img/icons/search.png') }}" id="search" style=" cursor:pointer"></div>
                    </div>
                </div>
   
    
   
   <div class="block">
                    <div class="header">
                        <h2>Project overzicht Containers</h2>
                    </div>
                    <div class="content">

        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered ">
        <thead>
        <tr>
            <th width="5%">Size</th>
            <th width="5%">No.</th>
            <th width="5%">Gewicht</th>
            <th width="10%">Inkoop</th>
            <th width="10%">Verkoop</th> 
            <th width="10%">Verschil</th>                                    
        </tr>
        </thead>
        <?php if ($ProjectWiseBons){  
        $total_container = 0;
        $total_weight = 0;
        $net = 0;
        $cost = 0;
		$Gross_Container = 0;
		$Gross_Weight = 0;
		$Gross_net = 0;
		$Gross_cost = 0;
		$Difference = 0;
		$totalDifference = 0;
		$Gross_totalDifference = 0;
        ?>
        <tbody>
		<?php 
		foreach ($ProjectWiseBons as $ProjectWiseBon){ 							
		if ($ProjectWiseBon->meterial =='sorteerbaar') { $Meterial = 'Bouw- en sloopafval (sorteerbaar)';}
		if ($ProjectWiseBon->meterial =='niet_sorteerbaar') { $Meterial = 'Bouw- en sloopafval (niet sorteerbaar)';}
		if ($ProjectWiseBon->meterial =='Bedrijfsafval') { $Meterial = 'Bedrijfsafval';}
		if ($ProjectWiseBon->meterial =='A_B_hout') { $Meterial = 'Gemengd hout (A- enlof B- hout)';}
		if ($ProjectWiseBon->meterial =='C_hout') { $Meterial = 'C- hout';}
		if ($ProjectWiseBon->meterial =='Schoon_puin') { $Meterial = 'Schoon puin(< 60 cm)';}
		if ($ProjectWiseBon->meterial =='Puin_Grof') { $Meterial = 'Puin Grof (> 60 cm)';}
		if ($ProjectWiseBon->meterial =='Puin_met_10') { $Meterial = 'Puin met 10% tot 25% zand I grond';}
		if ($ProjectWiseBon->meterial =='Puin_met_25') { $Meterial = 'Puin met 25% of meer zand I grond';}
		if ($ProjectWiseBon->meterial =='Asfaltpuin') { $Meterial = 'Asfaltpuin';}
		if ($ProjectWiseBon->meterial =='Schoon_Gips') { $Meterial = 'Schoon Gips';}
		if ($ProjectWiseBon->meterial =='Groenafval') { $Meterial = 'Groenafval';}
		if ($ProjectWiseBon->meterial =='Dakafval') { $Meterial = 'Dakafval';}
		if ($ProjectWiseBon->meterial =='Dakgrind') { $Meterial = 'Dakgrind';}
		if ($ProjectWiseBon->meterial =='Schoon_vlakglas') { $Meterial = 'Schoon vlakglas';}
		if ($ProjectWiseBon->meterial =='Opbrengsten_metalen') { $Meterial = 'Opbrengsten metalen, per ton';}
		if ($ProjectWiseBon->meterial =='Opbrengsten_Papier') { $Meterial = 'Opbrengsten Papier & Karton, per ton';}
		if ($ProjectWiseBon->meterial =='BSA') { $Meterial = 'BSA';}
		if ($ProjectWiseBon->meterial =='Hout') { $Meterial = 'Hout';}
		if ($ProjectWiseBon->meterial =='Puin') { $Meterial = 'Puin';}
		$pricelist = DB::table('tblprojectpricelist')->where('project_id', $ProjectWiseBon->Project_Id)->first();		
		if ($ProjectWiseBon->meterial =='field_1') { $Meterial = $pricelist->description_field1;}
		if ($ProjectWiseBon->meterial =='field_2') { $Meterial = $pricelist->description_field2;}
		if ($ProjectWiseBon->meterial =='field_3') { $Meterial = $pricelist->description_field3;}
		if ($ProjectWiseBon->meterial =='field_4') { $Meterial = $pricelist->description_field4;}
							
							
	$where = " AND meterial = '" . $ProjectWiseBon->meterial . "' AND Project_Id = '" . $ProjectWiseBon->Project_Id . "'";
	$results = DB::select( DB::raw("SELECT id, size,meterial, Project_Id, format(sum(total),2) TotalCost, format(sum(total) - sum(transport_price),2) WithoutTransport, format(sum(transport_price),2) TransportCost, format(sum(Gewicht),2) Gewicht, format(sum(net_total),2) NetTotal, COUNT(size) as total_container  FROM tblcontainerbon WHERE 1=1 ".$where." GROUP BY size" ) );?>
    
			<tr>
            	<th colspan="6" style="font-size:16px; text-decoration:underline;">{{ @$Meterial }}</th>
            </tr>
        <?php		
		foreach ($results as $result){		
		$total_container += $result->total_container ;
		$total_weight += $result->Gewicht;
		$net += $result->NetTotal;
		$cost += $result->TotalCost;
		$Difference += (@$net - @$cost);
		$totalDifference += $Difference;					
		if ($result->size=='3m3'){ $size = '3m&sup3;';}
		if ($result->size=='6m3'){ $size = '6m&sup3;';}
		if ($result->size=='10m3'){ $size = '10m&sup3;';}
		if ($result->size=='20m3'){ $size = '20m&sup3;';}
		?>                   	 
        <tr>
            <td>{{ @$size }}</td>
            <td>{{ @$result->total_container }}</td>
            <td>{{ @$result->Gewicht }} </td>
            <td>€ {{ @$result->NetTotal }}</td>
            <td>€ {{ @$result->TotalCost }}</td>
            <td>€ <?=$Difference ?></td>
        </tr>                    
		<?php }
		$Gross_Container += $total_container;
		$Gross_Weight += $total_weight;
		$Gross_net += $net;
		$Gross_cost += $cost;
		$Gross_totalDifference += ($Gross_net - $Gross_cost);
		 ?>
        <tr>
            <th>No. of Containers&nbsp;</th>
            <th><?=$total_container?></th>
            <th>Totaal : <?=number_format($total_weight,2)?></th>
            <th>Totaal : € <?=number_format($net,2)?></th>
            <th>Totaal : € <?=number_format($cost,2)?></th>
            <th>Totaal Verschil : € <?=number_format(($net - $cost),2)?></th>
        </tr>
        <?php  
		$total_container = 0;
        $total_weight = 0;
        $net = 0;
        $cost = 0;
		$Difference = 0;
		$totalDifference = 0;
        }   ?>
         <tr><td colspan="5">&nbsp;</td></tr>
          <tr style="border-bottom: 6px double #59AD2F;border-top: 2px solid #59AD2F;">
            <th>Bruto Totaal&nbsp;</th>
            <th><?=$Gross_Container?></th>
            <th>Totaal : <?=number_format($Gross_Weight,2)?></th>
            <th>Totaal : € <?=number_format($Gross_net,2)?></th>
            <th>Totaal : € <?=number_format($Gross_cost,2)?></th>
            <th>Totaal Verschil: € <?=number_format(($Gross_net - $Gross_cost) ,2)?></th>
        </tr>
         <?php 
		$Gross_Container = 0;
		$Gross_Weight = 0;
		$Gross_net = 0;
		$Gross_cost = 0;
		$Gross_totalDifference = 0;
		} ?>
        
        </tbody>
       
        </table>                                        

                    </div>
                </div>              
            </div>
  </div>   
       @include('admin/footer')</div>  