<!-- Header -->

    @include('admin/header')
    
    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
</style>
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
 <title>Lijst van klanten</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
                    <li class="active">berichtenlijst</li>
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
                        <h2>berichtenlijst</h2>
                        <?php  if(count($Project_Messages) == 0) {?>
    <div style="float:right"><a href=" <?php echo URL:: to( 'admin/Add-New-message',$project_ID ); ?> " class="btn btn-success">+ 
voeg nieuw bericht</a></div>
 <?php } ?>                                                           
                    </div>
                   
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>
                                    <th width="5%">S No.</th>
                                    <th width="10%">Project Name</th>
                                    <th width="15%">Berichten</th>
                                    <th width="10%">Aangemaakt</th>
                                    <th width="5%">Opties</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i =0;?>
                            @foreach($Project_Messages as $key => $value)
                             <?php $i++; 
							 $Project_Name = DB::table('tblquote')->where('id','=',$value->project_id)->first(); ?>
                                <tr <?php if ($value->admin_view == 0) { ?> style="font-weight:bold" <?php } ?>>
                                    <td><?=$i?></td>
                                    <td><?=$Project_Name->project_name?></td>
                                    <td>{{ str_limit($value->message, $limit = 150, $end = '...') }} </td>
                                    <td>{{ $value->created_at }} </td>
                                    <td><a href="<?php echo URL:: to( 'admin/view-message-Details',$value->project_id); ?>" title="Berichten" class="widget-icon">
                                    <span class="icon-comment"></span></a></td>                                    
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>                                        

                    </div>
                </div>
            </div>
  </div>   
       @include('admin/footer')</div>  