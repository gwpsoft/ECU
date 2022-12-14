<!-- Header -->

    @include('admin/header')
    
    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
</style>
<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

 <title>Lijst van Project Managers</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">List of Project Managers</li>
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
                        <h2>Lijst van Project Managers</h2>
                        <div style="float:right"><a href=" <?php echo URL:: to( 'admin/create_project_manager' ); ?> " class="btn btn-success">Nieuw Project Manager</a>
                         </div>                                        
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="Projectmanager">
                            <thead>
                                <tr>
                                    
                                    <th width="5%">ID</th>
                                    <th width="15%">First Name</th>
                                    <th width="15%">Last Name</th>
                                    <th width="15%">Phone</th> 
                                    <th width="15%">Options</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>                                        

                    </div>
                </div>
            </div>
  </div>
  <script> 
 
  
  function deleteRecord()
            {
                if (alert("Weet je zeker dat je dit Project Manager verwijderen?")) {
                   
                }
             }
			
			
			
			
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

		  oTable = $('#Projectmanager').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('datatable.projectmanager') }}",
		 "order": [[ 0, "desc" ]],
        "columns": [
            {data: 'Id', name: 'Id'},
            {data: 'Firstname', name: 'Firstname'},
            {data: 'Lastname', name: 'Lastname'},
			{data: 'Phone', name: 'Phone'},
			{data: 'Opties', name: 'Opties',  searchable: false,orderable: false}
        ]
    });
});
	
	
	
	
	
        })(jQuery);
	
    </script>
     
       @include('admin/footer')</div>  