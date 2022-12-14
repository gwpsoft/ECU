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
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null,null]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null,null]});    
    /* eof Datatables */
	
	});
        })(jQuery);
	
    </script>
 <title>Lijst van de projecten</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Lijst van de projecten</li>
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
                        <h2>Lijst van de projecten</h2>
                        <div style="float:right">
                        <a href=" <?php echo URL:: to( 'admin/Active/Project' ); ?> " class="btn btn-success">Actief</a>
                        <a href=" <?php echo URL:: to( 'admin/Inactive/Project' ); ?> " class="btn btn-danger">Inactief</a>
                        <a href=" <?php echo URL:: to( 'admin/projects' ); ?> " class="btn btn-warning">Alle projecten</a>
                        <a href=" <?php echo URL:: to( 'admin/create_project' ); ?> " class="btn btn-success">Nieuw Project</a>
                         </div>                                        
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>
                                    
                                    <th width="5%">ID</th>
                                    <th width="15%">Naam</th>
                                    <th width="15%">Afdeling</th>
                                    <th width="15%">Stad</th> 
                                     <!--  <th width="15%">Contact</th> 
                                   <th width="15%">Actief	Project nr</th>-->
                                     <th width="10%">Status</th>  
                                    <th width="15%">Opties</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                              <?php  $Department = DB::table('tbldepartment')->where('id', $value->Department_Id)->first();  ?>
                                <?php $ProjectManager = DB::table('tblprojectmanager')->where('id', $value->Projectmanager_Id)->first();  ?>      
                                <tr>
                                   
                                    <td>{{ $value->Id }}</td>
                                    <td>{{ $value->Name }} </td>
                                    <td>&nbsp;
                                    <?php  if ($Department !='') {
                                    echo $Department->Name ; }?>
                                    </td>
                                     <td>{{ $value->City }}
                                    </td>
                                    <!-- <td>{{ $value->contact_id }}</td>
                                     <td>{{ $value->project_ref }}</td>
                                     <td>{{ $value->customer_ref }}</td>-->
                                     <td> <?php if ($value->Active == 1) { ?>
                                     <a href="<?php echo URL:: to( 'admin/Project/Inactive',$value->Id); ?>" title="Inactief" class="" onclick="return confirm('Weet u het zeker dat u dit project inactief wilt maken?');"><span class="label label-success">Actief</span></a>
                 
                 <?php } else { ?>
<a href="<?php echo URL:: to( 'admin/Project/Active',$value->Id); ?>" title="Actief" class="" onclick="return confirm('Weet u het zeker dat u dit project actief wilt maken?');"><span class="label label-danger">Inactief</span></a>
                                  <?php } ?>                                       
                                     </td>
                                     <td>
                                     <a href="<?php echo URL:: to( 'admin/show_project',$value->Id ); ?>" title="uitzicht" class="widget-icon"><span class="icon-eye-open"></span></a>
                                     
                                    <a href="<?php echo URL:: to( 'admin/edit_project',$value->Id); ?>" title="Bewerk" class="widget-icon"><span class="icon-pencil"></span></a>
                                      <a href="<?php echo URL:: to( 'admin/delete_project',$value->Id ); ?>" title="verwijderen" class="widget-icon" onclick="return confirm('Weet u het zeker dat u dit project wilt verwijderen?');"><span class="icon-trash"></span></a>
                                     
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