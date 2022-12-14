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
 <title>List of Employement Agencies</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">List of Employement Agencies</li>
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
                        <h2>List of Employement Agencies</h2>
                        <div style="float:right"><a href=" <?php echo URL:: to( 'admin/create_agency' ); ?> " class="btn btn-success">Nieuw Agency</a>
                         </div>                                        
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>
                                    
                                    <th width="5%">ID</th>
                                    <th width="15%">Name</th>
                                    <th width="15%">Addess</th>
                                    <th width="15%">Postcode</th> 
                                    <th width="15%">Options</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                   
                                    <td>{{ $value->Id }}</td>
                                    <td>{{ $value->Name }} </td>
                                    <td>{{ $value->Address }}</td>
                                     <td>{{ $value->Zipcode }}</td>
                                     <td>
     <a href="<?php echo URL:: to( 'admin/agency',$value->Id ); ?>" title="uitzicht" class="widget-icon"><span class="icon-eye-open"></span></a>
     <a href="<?php echo URL:: to( 'admin/edit_agency',$value->Id); ?>" title="Bewerk" class="widget-icon"><span class="icon-pencil"></span></a>
     <a href="<?php echo URL:: to( 'admin/delete_agency',$value->Id ); ?>" title="verwijderen" class="widget-icon" onclick="return confirm('Bent u zeker dat u dit agentschap verwijderen?');"><span class="icon-trash"></span></a>
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