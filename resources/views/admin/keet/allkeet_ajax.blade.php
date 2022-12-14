<!-- Header -->



    @include('admin/header')



    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

</style>

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

<!--<script>

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

        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null, null, null]});



    if($("table.sortable").length > 0)

        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null, null, null]});

    /* eof Datatables */



	});

        })(jQuery);



    </script>-->



 <title>Lijst van de Weekstaat Keetonderhoud</title>

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>

                    <li class="active">Lijst van de Weekstaat Keetonderhoud</li>

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

                        <h2>Lijst van de Weekstaat Keetonderhoud</h2>

                      <div style="float:right">

                   <!--    <a href=" <?php echo URL:: to( 'admin/Active/Weekcards' ); ?> " class="btn btn-success">Actief</a>

                        <a href=" <?php echo URL:: to( 'admin/Inactive/Weekcards' ); ?> " class="btn btn-danger">Inactief</a>

                        <a href=" <?php echo URL:: to( 'admin/weekcard' ); ?> " class="btn btn-warning">Alle WeekStaat</a>-->

                      <a href=" <?php echo URL:: to( 'admin/Add-Keetonderhoud' ); ?> " class="btn btn-success">+ Nieuw Keetonderhoud</a>

                                            </div>

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="Weekcards">

                            <thead>

                                <tr>

                                    <th width="5%">ID.</th>

                                    <th width="8%">Vanaf week nr</th>

                                    <th width="8%">t/m week nr</th>

                                    <th width="18%">Project</th>

                                    <th width="10%">Verz. datum</th>

                                    <th width="10%">Ontv. datum</th>

                                    <th width="10%">Factuurdatum</th>

                                    <!--<th>Totaal Uren</th> -->

                                    <th width="5%">Status</th>

                                    <th width="5%">Afgehandeld</th>

                                    <th width="15%">Opties</th>

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



   function ProjectDisapprove()   {

	   var msg = confirm("Weet je zeker dat het Weekcard goedkeuren?");

          if (msg == true){
                   return true;

          } else {
		       return false;
			}

             }



  function ProjectApprove()   {

	  var msg = confirm("Weet je zeker dat het Weekcard goedkeuren?");

                if (msg ==true) {

                   return true;

                } else {
		       		return false;
				}

             }







  function deleteRecord()      {

	  var msg = confirm("Weet u het zeker of u deze weekstaat wilt verwijderen?");

                if (msg == true) {
               return true;

				} else {

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



		  oTable = $('#Weekcards').DataTable({

        "processing": true,

        "serverSide": true,

        "ajax": "{{ route('datatable.Keetonderhoud') }}",
		 "order": [[ 0, "desc" ]],
        "columns": [

            {data: 'id', name: 'id'},

            {data: 'fr_Keeknumber', name: 'fr_Keeknumber'},

			{data: 'to_Keeknumber', name: 'to_Keeknumber'},

            {data: 'Project_Name', name: 'Project_Name'},

			{data: 'Sent_Date', name: 'Sent_Date'},

			{data: 'Received_Date', name: 'Received_Date'},

			{data: 'Billing_Date', name: 'Billing_Date'},

			{data: 'Status', name: 'Status'},

			{data: 'Checked', name: 'Checked'},

			//{data: 'Sent_Date', name: 'Sent_Date'},

			{data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });

});











        })(jQuery);



    </script>









       @include('admin/footer')</div>
