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
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null,null],
		"aaSorting": [[ 0, "desc" ]],
		});    
    /* eof Datatables */
	
	});
        })(jQuery);
	
    </script>




 <title>List of Container Bon</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="admin">Home</a></li>
                    <li class="active">List of Container Bon</li>
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
                        <h2>List of Container Bon</h2>
                      <div style="float:right"><a href=" <?php echo URL:: to( 'admin/create_orderBon' ); ?> " class="btn btn-success">+ New Bon</a>                        </div>                
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>
                                    
                                    <th width="4%">ID.</th>
                                    <th width="10%">Bon No.</th>
                                    <th width="20%">Project</th>
                                    <th width="10%">Verz. datum</th>
                                    <th width="10%">Ontv. datum</th>
                                    <!--<th>Totaal Uren</th> -->
                                    <th width="10%">Goedgekeurd</th>
                                    <th width="10%">Opties</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ContainerOrders as $key => $value)
                            <?php 
							$Project = DB::table('tblproject')->select('Name')->where('id',$value->Project_Id)->first();
							if (count($Project) > 0) {
							$ProjectName = $Project->Name;	
							}
							else {
							$ProjectName = '';
							}
							
							?>
                            
                                <tr>
                    <td>{{ $value->id }}</td>               
                <td><a href="<?php echo URL:: to( 'admin/edit_orderBon',$value->id); ?>" title="goedkeuren" class="">BON# 00{{ $value->Nummer }}</a></td>
                <td><a href="<?php echo URL:: to( 'admin/edit_orderBon',$value->id); ?>" title="goedkeuren" class="">{{ $ProjectName }}</a> </td>
                <td><a href="<?php echo URL:: to( 'admin/edit_orderBon',$value->id); ?>" title="goedkeuren" class="">
                 @if (strtotime($value->Sent_Date) > 0)
                 {{ $value->Sent_Date }}
                 @endif</a></td>
                 <td> @if (strtotime($value->Received_Date) > 0)
                 {{ $value->Received_Date }}
                 @endif
                 </td>
                 <!--<td>{{ $value->Received_Date }}</td>-->
                 <td>
                 @if ($value->Checked == 1)
                 <a href="javascript:void(0);" title="goedkeuren" class="label label-success" >Goedgekeurd</a>
                 @else 
                <span class="label label-danger">Open</span>                
                @endif
                <td>
				<a href="<?php echo URL:: to( 'admin/edit_orderBon',$value->id); ?>" title="goedkeuren" class="widget-icon">
                <span class="icon-pencil"></span></a>
				<a href="<?php echo URL:: to( 'admin/destroyBon',$value->id); ?>" title="verwijderen" class="widget-icon" onClick='return confirm("Container bon u het zeker of u deze Container bon wilt verwijderen?")'>
				<span class="icon-trash"></span></a>
                                  
                                     
                                     
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