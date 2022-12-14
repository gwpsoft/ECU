<!-- Header -->



    @include('admin/header')

    

    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

</style>

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

 <title>Lijst met notities</title>   

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>

                    <li class="active">Lijst met notities</li>

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

                        <h2>Lijst met notities</h2>

                        <div style="float:right"><a href=" <?php echo URL:: to( 'admin/create_note' ); ?> " class="btn btn-success">+ Nieuw Notitie</a>

                         </div>                                        

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="notes">

                            <thead>

                                <tr>

                                    

                                    <th width="5%">ID</th>

                                    <th width="15%">Project Manager</th> 

                                    <th width="15%">Date Time</th> 

                                   <!-- <th width="15%">Contact</th>-->  

                                    <th width="15%">Type</th>                                 

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

                if (alert("Weet je zeker dat je deze notitie wilt verwijderen?")) {

                   

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

			

		

	 /* Datatables */  

	 oTable = $('#notes').DataTable({

        "processing": true,

        "serverSide": true,

        "ajax": "{{ route('datatable.notes') }}",
		"order": [[ 0, "desc" ]],
        "columns": [

            {data: 'Id', name: 'Id'},

            {data: 'PM_Name', name: 'PM_Name'},

            {data: 'Datetime', name: 'Datetime'},

		    {data: 'Type', name: 'Type'},

			{data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });

  /*  if($("table.sortable_simple").length > 0)

        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});

    

    if($("table.sortable_default").length > 0)

        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null]});

    

    if($("table.sortable").length > 0)

        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null]});    */

    /* eof Datatables */

	

	});

        })(jQuery);

	

    </script>

  

  

       @include('admin/footer')</div>  