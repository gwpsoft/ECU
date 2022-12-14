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
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, ]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null]});    
    /* eof Datatables */
	
	});
        })(jQuery);
	
    </script>
 <title>Lijst van klanten</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
                    <li class="active">Lijst van klanten</li>
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
                        <h2>Lijst van klanten</h2>
                                                            
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>
                                    
                                    <th width="15%">Project Naam</th>
                                    <th width="25%">Message</th>
                                    <th width="5%">Opties</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i =0;?>
                            @foreach($Projects as $key => $value)
                             <?php $i++; 
							 
							 $All_Messages = DB::table('tbl_emp_messages')->orderBy('created_at','DESC')->where('project_id','=',$value->Id)->first();
							 ?>
                                <tr>
                                 
                                    <td>{{ $value->Name }} </td>
                                    
                                     <td><?php 
									 if ($All_Messages) { 
									 	if ($All_Messages->admin_view == 0) {
									 		echo '<b>'.$All_Messages->message.'</b>';
										} else { 
									      	echo $All_Messages->message;
									    }  
									 } else {
										 echo '';
										 }
									  ?></td>
                                     <td>
<a href="<?php echo URL:: to( 'admin/view_EMPBerichten',$value->Id); ?>" title="bewerk client onderzoek" class="widget-icon"><span class="icon-pencil"></span></a>
<!--<a href="<?php echo URL:: to( 'admin/edit_employee',$value->Id); ?>" title="Bewerk" class="widget-icon"><span class="icon-pencil"></span></a>
<a href="<?php echo URL:: to( 'admin/delete_employee',$value->Id ); ?>" title="verwijderen" class="widget-icon" onclick="return confirm('Bent u zeker dat u dit wilt Werknemer verwijderen?');"><span class="icon-trash"></span></a>-->
                                     </td>                                    
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>                                        

                    </div>
                </div>
            </div>
  </div>   
       @include('admin/footer')</div>  