<!-- Header -->



    @include('admin/header')



    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

</style>

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

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

                        <h2 class="heading">Lijst van de projecten</h2>

                        <div style="float:right">



                        <a href=" <?php echo URL:: to( 'admin/AllActiveprojects' ); ?> " class="btn btn-success">Actief</a>

                        <a href=" <?php echo URL:: to( 'admin/AllInacticeprojects' ); ?> " class="btn btn-danger">Inactief</a>

                        <a href=" <?php echo URL:: to( 'admin/projects' ); ?> " class="btn btn-warning">Alle projecten</a>

                        <a href=" <?php echo URL:: to( 'admin/create_project' ); ?> " class="btn btn-success">Nieuw Project</a>

                         </div>

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="projects">

                            <thead>

                                <tr>



                                    <th width="5%">ID</th>

                                    <th width="15%">Naam</th>

                                    <th width="15%">Afdeling</th>
                                    <th width="15%">Adres</th>

                                    <th width="15%">Stad</th>

                                     <!--  <th width="15%">Contact</th>

                                   <th width="15%">Actief	Project nr</th>-->

                                     <th width="10%">Status</th>

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
           window.location.href = APP_URL + 'admin/delete_project/' + id ;
        } else {
           return false;
        }

     }



   function ActiveRecord()

            {

                if (confirm("Weet u het zeker dat u dit project inactief wilt maken?")) {



                }

             }







   function InactiveRecord()

            {

                if (confirm("Weet u het zeker dat u dit project actief wilt maken?")) {



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



		<?php if (@$id == 'Active') {  ?>

	 /* Datatables */
	$('.heading,.active').html('Lijst van de actieve projecten');
	 oTable = $('#projects').DataTable({

        "processing": true,

        "serverSide": true,
		"language": {
			"search": "Zoeken in de actieve projecten:"
		  },
        "ajax": "{{ route('datatable.Activeprojects') }}",
		"order": [[ 0, "desc" ]],
        "columns": [

            {data: 'Id', name: 'Id'},

            {data: 'Name', name: 'Name'},

            {data: 'Dept_Name', name: 'Dept_Name'},

            {data: 'Address', name: 'Address'},

		    {data: 'City', name: 'City'},

			{data: 'status', name: 'status'},

			{data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });

  <?php } else if (@$id == 'Inactive') {  ?>

  $('.heading,.active').html('Lijst van de inactieve projecten');

oTable = $('#projects').DataTable({

        "processing": true,

        "serverSide": true,
			"language": {
			"search": "Zoeken in de inactieve projecten:"
		  },
        "ajax": "{{ route('datatable.Inactiveprojects') }}",
		"order": [[ 0, "desc" ]],
        "columns": [

            {data: 'Id', name: 'Id'},

            {data: 'Name', name: 'Name'},

            {data: 'Dept_Name', name: 'Dept_Name'},

            {data: 'Address', name: 'Address'},

		    {data: 'City', name: 'City'},

			{data: 'status', name: 'status'},

			{data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });

<?php } else { ?>

$('.heading,.active').html('Lijst van alle projecten');
oTable = $('#projects').DataTable({

        "processing": true,

        "serverSide": true,
		"language": {
			"search": "Zoeken in alle projecten:"
		  },
        "ajax": "{{ route('datatable.projects') }}",
		"order": [[ 0, "desc" ]],
        "columns": [

            {data: 'Id', name: 'Id'},

            {data: 'Name', name: 'Name'},

            {data: 'Dept_Name', name: 'Dept_Name'},

		    {data: 'Address', name: 'Address'},

		    {data: 'City', name: 'City'},

			{data: 'status', name: 'status'},

			{data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });


<?php } ?>
	});

        })(jQuery);



    </script>

       @include('admin/footer')</div>
