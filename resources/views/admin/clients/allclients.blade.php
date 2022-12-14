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

 <title>Lijst van Online Gebruikers</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
                    <li class="active">Lijst van Online Gebruikers</li>
                </ol>
            </div>
        </div> 
        <div class="row">     
    @include('admin/sidebar')
    <div class="col-md-10">
     @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif 
   </div>
   <div class="col-md-12">
   <div class="block">
    <div class="header">
        <h2>Lijst van Online Gebruikers</h2>        
    </div>
    <div class="content">
    <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="15%">Naam</th>
                <th width="15%">E-Mail</th>
                <th width="15%">Toestand</th> 
                <th width="15%">Opties</th>                                   
            </tr>
        </thead>
        <tbody>
        <?php $i =0;?>
        @foreach($data as $key => $value)
         <?php $i++;?>
          <tr>
            <td><?=$i?></td>
            <td>{{ $value->name }} </td>
            <td>{{ $value->email }}</td>
            <td><?=$value->status == 1 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';?> </td>
 <td><a href="<?php echo URL:: to( 'admin/view_clientProjects',$value->id ); ?>" title="beheer van projecten" class="widget-icon"><span class="icon-eye-open"></span></a>
<?php if ($value->status == 0) { ?>
<a href="<?php echo URL:: to( 'admin/Active',$value->id); ?>" title="actief" class="widget-icon" onclick="return confirm('Weet u zeker dat u deze klant te activeren ?');"><span class="icon-unlock"></span></a>
<?php } else {?>
<a href="<?php echo URL:: to( 'admin/Inactive',$value->id); ?>" title="inactief" class="widget-icon" onclick="return confirm('Weet u zeker dat u deze klant te inactiveren ?');"><span class="icon-lock"></span></a>
<?php } ?> </td>                                    
            </tr>
            @endforeach                    
        </tbody>
    </table>
                    </div>
                </div>
            </div>
 		 </div>   
       @include('admin/footer')
    </div>  