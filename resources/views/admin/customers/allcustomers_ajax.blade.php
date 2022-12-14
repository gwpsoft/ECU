<!-- Header -->



    @include('admin/header')



    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

</style>

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

 <title>Klantenlijst</title>

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>

                    <li class="active">Klantenlijst</li>

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

                        <h2>Klantenlijst</h2>

                        <div style="float:right"><a href=" <?php echo URL:: to( 'admin/create_customer' ); ?> " class="btn btn-success">+ Nieuw Klant</a>

                         </div>

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="customers">

                            <thead>

                                <tr>



                                    <th width="5%">ID</th>

                                    <th width="15%">Name</th>

                                    <th width="15%">Note</th>

                                    <th width="15%">Options</th>

                                </tr>

                            </thead>



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
          window.location.href = APP_URL + 'admin/delete_customer/' + id ;
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

	 oTable = $('#customers').DataTable({
  "search": {
                caseInsensitive: false
            },
        "processing": true,

        "serverSide": true,


        "ajax": "{{ route('datatable.customers') }}",

        "columns": [

            {data: 'Id', name: 'Id'},

            {data: 'Name', name: 'Name'},

            {data: 'Notes', name: 'Notes'},

			/*{data: 'agencyName', name: 'agencyName'},

			{data: 'status', name: 'status'},*/

			{data: 'Opties', name: 'Opties', 'searchable': false}

        ]

    });





	});

        })(jQuery);



    </script>





       @include('admin/footer')</div>
