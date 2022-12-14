<!-- Header -->



    @include('admin/header')



    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

</style>

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

 <title>Lijst van Contacten</title>

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                     <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>

                    <li class="active">Lijst van Contacten</li>

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

                        <h2>Lijst van Contacten</h2>

                        <div style="float:right">
                        <a href=" <?php echo URL:: to( 'admin/download' ); ?> " class="btn btn-warning">Downloaden</a>
                        <a href=" <?php echo URL:: to( 'admin/create_contact' ); ?> " class="btn btn-success">+ Nieuw Contact</a>

                         </div>

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="contacts">

                            <thead>

                                <tr>



                                    <th width="5%">ID</th>

                                    <th width="15%">Voornaam</th>

                                    <th width="15%">Achternaam</th>

                                    <th width="15%">Telefoonnummer</th>

                                    <th width="15%">Email</th>

                                    <th width="15%">Afdeling</th>

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



  function deleteRecord(id)
    {
        if (confirm("Bent u zeker dat u deze klant wilt verwijderen?")) {
           let APP_URL = {!! json_encode(url('/').'/') !!};
           window.location.href = APP_URL + 'admin/delete_contact/' + id ;
        } else {
           return false;
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

	 oTable = $('#contacts').DataTable({

        "processing": true,

        "serverSide": true,

        "ajax": "{{ route('datatable.contacts') }}",
		 "order": [[ 0, "desc" ]],
        "columns": [

            {data: 'Id', name: 'Id'},

            {data: 'Firstname', name: 'Firstname'},

            {data: 'Lastname', name: 'Lastname'},

		    {data: 'Phone', name: 'Phone'},

        {data: 'Email', name: 'Email'},

			{data: 'Name', name: 'Name'},

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
