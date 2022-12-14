<!-- Header -->
  @include('front/header') 
 <title>Report</title> 
  <script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>   
  <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" />  
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>
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
			document.location.href="<?=URL:: to( 'report' )?>/Project_Overview_Containers/filter/" + project_id + "/" + start + "/" + end;
		});	
		
		$( "#download" ).click(function() {			
			project_id  = document.getElementById('project_id').value;
			start_date  = document.getElementById('start_date').value;
			end_date  = document.getElementById('end_date').value;
			if (project_id == '') { alert ('Selecteer Project'); return false;}
			
			if (project_id != 0) { project = project_id} else { project = 0;}
			if (start_date != 0) { start = start_date} else { start = 0;}
			if (end_date != 0) { end = end_date} else { end = 0;}
			document.location.href="<?=URL:: to( 'report' )?>/Pdf_Containers/filter/" + project_id + "/" + start + "/" + end;
		});	
		
		
	});
        })(jQuery);
	  jQuery().ready(function() {
$('#end_date,#start_date').datepicker({
				format: 'yyyy-mm-dd'
			});
			 });
    </script>


  
   <?php 
  $segment = Request::segment( 4 );
   $start = Request::segment( 5 );
   $end = Request::segment( 6 );
 
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



<div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Report</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>                              
                                <li class="active">Report</li>
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
 					
                  <div class="block">   
                <!-- <div class="col-md-12">-->
					 <div class="header">
                    <h4>Uitgezocht Project</h4>
                  </div>
                    <div class="content">
					

  <div class="form-group">
  
 <div class="col-md-4" style=" margin-bottom:10px;">

        <select name="project_id" id="project_id" class="form-control">
        <?php 
        foreach ($AllProjects as $project) {?>
        <option value="<?=$project->id?>" <?php if ($project->id == $segment){?> selected="selected" <?php }?>>
        <?=$project->Name;?></option>
        <?php } ?>                                 
        </select> 
                                </div>
                                
                                  <div class="col-md-2"> 
                          <div class="form-group">
                                    <!--<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>-->
                                    <input type="text" class="form-control" id="start_date" placeholder="<?=date('Y-m-d')?>" name="start_date"/>
                                </div>
                               
                        </div>
                        <div class="col-md-1" align="center" style="width:50px; margin-top: 5px;">Naar</div>
                            
                           <div class="col-md-2"> 
                          <div class="form-group"> 
                                    <!--<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>-->
                                  <input type="text" class="form-control" id="end_date" placeholder="<?=date('Y-m-d')?>" name="end_date"/>
                                </div>
                               
                        </div>                                  
                                 <div class="col-md-2 " style="margin-left:15px;">
                                <img  src="{{ URL::asset('assets/img/icons/search.png') }}" id="search" style=" cursor:pointer">
                                <img  src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="download" style=" cursor:pointer">
                           </div>
                         
                          </div> 
                           </div>
                    <!--</div>-->
                 </div>     
               
          <div class="block">
            <legend></legend>    
           <?php if ($ProjectWiseBons){  ?>
                    <div class="header">
                        <h4>Project overzicht Containers</h4>
                    </div>
                    <div class="content">       
   
    <table  id="example" class="table table-striped" style="font-size:12px;" >
                <colgroup>
          <col class="col-md-2">
          <col class="col-md-2">         
            <col class="col-md-2">
             <col class="col-md-2">
              <col class="col-md-2">             
        </colgroup> 

     
        <thead>
        <tr>
            <th width="5%">Size</th>
            <th width="5%">No.</th>
            <th width="5%">Gewicht</th>
            <th width="10%">Verkoop</th>
            <th width="10%">Besparing</th>                                    
        </tr>
        </thead>
       <?php
        $total_container = 0;
        $total_weight = 0;
        $net = 0;
        $cost = 0;
		$discount = 0;
		$Gross_Container = 0;
		$Gross_Weight = 0;
		$Gross_net = 0;
		$Gross_cost = 0;
		$distance=0;
		$Gross_discount=0;
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
		
		if ($result->size == '20m3') { $Transportrate = $MarketPrice->Price_10m3;}
		else { $Transportrate = $MarketPrice->Price_40m3;}
							
		if ($result->size=='3m3'){ $size = '3m&sup3;';}
		if ($result->size=='6m3'){ $size = '6m&sup3;';}
		if ($result->size=='10m3'){ $size = '10m&sup3;';}
		if ($result->size=='20m3'){ $size = '20m&sup3;';}
		?>                   	 
        <tr>
            <td>{{ @$size }}</td>
            <td>{{ @$result->total_container }}</td>
            <td>{{ @$result->Gewicht }} </td>
            <td>€ {{ @$result->TotalCost }}</td>
           <td>€ <?php
		    if ($result->meterial == 'sorteerbaar') { echo $distance = (($result->Gewicht*$MarketPrice->Price_sorteerbaar)-($result->TotalCost)+$Transportrate); }
			
			if ($result->meterial == 'niet_sorteerbaar') { echo $distance =(($result->Gewicht*$MarketPrice->Price_niet_sorteerbaar)-($result->TotalCost)+$Transportrate); }
			
			
		   if ($result->meterial == 'Bedrijfsafval') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Bedrijfsafval)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'A_B_hout') { echo $distance =(($result->Gewicht*$MarketPrice->Price_A_B_hout)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'C_hout') { echo $distance =(($result->Gewicht*$MarketPrice->Price_C_hout)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Schoon_puin') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Schoon_puin)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Puin_Grof') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Puin_Grof)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Puin_met_10') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Puin_met_10)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Puin_met_25') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Puin_met_25)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Asfaltpuin') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Asfaltpuin)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Schoon_Gips') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Schoon_Gips)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Groenafval') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Groenafval)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Dakafval') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Dakafval)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Dakgrind') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Dakgrind)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Schoon_vlakglas') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Schoon_vlakglas)-($result->TotalCost)+$Transportrate); }
		    if ($result->meterial == 'Opbrengsten_metalen') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Opbrengsten_metalen)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Opbrengsten_Papier') { echo $distance =(($result->Gewicht * $MarketPrice->Price_Opbrengsten_Papier)-($result->TotalCost)+$Transportrate); }
			
		   ?></td>
        </tr>                    
		<?php 
		$discount += $distance;
		
		} 
		$Gross_Container += $total_container;
		$Gross_Weight += $total_weight;
		$Gross_net += $net;
		$Gross_cost += $cost;
		$Gross_discount += $discount;
		 
		?>
        <tr>
            <th>No. of Containers&nbsp;</th>
            <th><?=$total_container?></th>
            <th>Totaal : <?=number_format($total_weight,2)?></th>
            <th>Totaal : € <?=number_format($cost,2)?></th>
            <th>Totaal : € <?=number_format($discount,2)?></th>
        </tr>
       
        <?php  $total_container = 0;
        $total_weight = 0;
        $net = 0;
        $cost = 0;
		$discount=0;
		
        }   ?>
        <tr><td colspan="5">&nbsp;</td></tr>
          <tr style="border-bottom: 6px solid #3071A9;background-color: lightgrey;">
            <th>Bruto Totaal&nbsp;</th>
            <th><?=$Gross_Container?></th>
            <th>Totaal : <?=number_format($Gross_Weight,2)?></th>
            <th>Totaal : € <?=number_format($Gross_cost,2)?></th>
            <th>Totaal : € <?=number_format($Gross_discount,2)?></th>
        </tr>
        
        
        
        
        </tbody>
        <?php 
		$Gross_Container = 0;
		$Gross_Weight = 0;
		$Gross_net = 0;
		$Gross_cost = 0; 
		$Gross_discount = 0;
		?>
		
  
        </table>
     </div>
        <?php }  else { ?>                                       
				<p align="center">Gegevens niet Gevonden...!</p>
		<?php } ?>
                </div>  </div>      
               </div>                
           
   
       @include('front/footer')</div>  