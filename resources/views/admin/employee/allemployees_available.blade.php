<!-- Header -->



    @include('admin/header')

    

    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}











</style>



<!-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>-->

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

<!--    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->

 <title>Lijst van Personeel</title>   

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>

                    <li class="active">Lijst van Personeel</li>

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

                        <h2 class="heading">Lijst van Personeel</h2>

                         <div style="float:right">
						
                    
                        <a href=" <?php echo URL:: to( 'admin/AvailabileEmp' ); ?> " class="btn btn-primary">Uitgebreid Zoeken</a>
                        
                         <a href=" <?php echo URL:: to( 'admin/ActiveEmp' ); ?> " class="btn btn-success">Actief</a>

                        <a href=" <?php echo URL:: to( 'admin/InactiveEmp' ); ?> " class="btn btn-danger">Inactief</a>

                        <a href=" <?php echo URL:: to( 'admin/employees' ); ?> " class="btn btn-warning">Alle Personeel</a>

                       <a href=" <?php echo URL:: to( 'admin/create_employee' ); ?> " class="btn btn-success">+ Nieuw Personeel</a>

                         </div>                                        

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="employee">

                            <thead>

                                <tr>

                                    

                                    <th width="5%">ID</th>

                                    <th width="15%">Voornaam</th>

                                    <th width="15%">Achternaam</th>

                                    <th width="15%">VCA Certificaat</th>

                                    <th width="15%">Eigen auto</th>
                                    
                                    <th width="15%">Geschikt voor</th> 

                                    <th width="5%">Status</th>  

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

  

  function deleteRecord()

            {

                if (confirm("Bent u zeker dat u dit wilt Werknemer verwijderen?")) {

                   

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



		$('.heading,.active').html('Lijst van de actieve personeel');

		  oTable = $('#employee').DataTable({

        "processing": true,

        "serverSide": true,
		"language": {
			"search": "Zoeken in de actieve personeel:"
		  },
        "ajax": "{{ route('datatable.getAvailabileEmp') }}",
		 "order": [[ 0, "desc" ]],
        "columns": [

            {data: 'id', name: 'ID'},

            {data: 'Firstname', name: 'Firstname'},

            {data: 'Lastname', name: 'Lastname'},
			
			{data: 'VCA_Certificaat', name: 'VCA_Certificaat'},

			{data: 'Eigen_auto', name: 'Eigen_auto'},
			
			{data: 'Geschikt', name: 'Geschikt'},

			{data: 'status', name: 'status',searchable: false,orderable: false},

			{data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });



	

	

});

	

	

	

	

	

        })(jQuery);

	

    </script>

       @include('admin/footer')</div>  