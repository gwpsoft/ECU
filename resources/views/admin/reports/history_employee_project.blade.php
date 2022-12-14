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
			 filter  = document.getElementById('filter').value;
			  if (filter !=''){				
			document.location.href="<?=URL:: to( 'admin' )?>/report/hist_employee_project/filter/" + filter;
			 else {
				 document.location.href="<?=URL:: to( 'admin/report/hist_employee_project/filter' )?>";
			 }
	});
			
			
			
			
			
			
		 /* Datatables */
    if($("table.sortable_simple").length > 0)
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});
    
    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null]});    
    /* eof Datatables */
	
	
	});
        })(jQuery);
	
    </script>
 
    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}

#year {
    cursor: pointer;
    margin-right: 30px;
}
.label { font-size:100%;}
.active_1 {
}
.active_0 {
     background-color: rgb(255, 173, 42) !important; 
} 
.active_0 a { color:#000 !important;}
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
                        <h2>Zoek</h2>
                    </div>
                    <div class="content">
					<div class="col-md-1">
                    Naam
                    </div>
                    <div class="col-md-3"> 
                     <input type="text" class="form-control" name="filter" id="filter"> 
   					 </div>
                     
                     <div class="col-md-1">
                       <img class=" " src="{{ URL::asset('assets/img/icons/search.png') }}" id="search" style=" cursor:pointer">   					 
					</div>
                    </div>
                </div>  
   
   <div class="block">
                    <div class="header">
                        <h2>Medewerkers per project</h2>
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>
                                    <th width="30%">Project </th>
                                     <th width="30%">Personeel</th>
                                     <th width="10%">Week nr</th>
                                                                 
                                </tr>
                            </thead>
                            <?php 
							  $last_project = NULL;
							if ($HistoryEmployeeProject){  ?>
                             <tbody>
							<?php foreach ($HistoryEmployeeProject as $Project){ ?>                        
                                <tr>
                                    <td class="active_<?=$Project->Project_Active?>"><a href="<?php echo URL:: to( 'admin/show_project',$Project->Project_Id ); ?>"><?php echo  $last_project !=  $Project->Project_Id ?  $Project->Name : ''; ?></a></td>
                                    <td class="active_<?=$Project->Employee_Active?>"><a href="<?php echo URL:: to( 'admin/employee',$Project->Employee_Id ); ?>"><?=$Project->Employee?></a></td>
                                    <td><?=$Project->Final_Week?></td>
                                </tr>
                                <?php 
								
								 $last_project = $Project->Project_Id;
								
								} ?>
                            </tbody>
                            <?php } ?>
                        </table>                                        

                    </div>
                </div>              
            </div>
  </div>   
       @include('admin/footer')</div>  