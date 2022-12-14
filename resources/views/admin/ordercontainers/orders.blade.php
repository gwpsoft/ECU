<!-- Header -->
    @include('admin/header')
    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
</style>
<title>Lijst van Bestelformulier Afvalcontainers</title>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
                    <li class="active">Lijst van Bestelformulier Afvalcontainers</li>
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
                        <h2>Lijst van Bestelformulier Afvalcontainers</h2>
                        <div style="float:right"><a href=" <?php echo URL:: to( 'admin/create_order' ); ?> " class="btn btn-success">Nieuw bestellen</a>
                         </div>
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="waste">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">Bestelnr #</th>
                                    <th width="10%">Besteldatum </th>
                                    <th width="10%">Uitvoerdatum </th>
                                    <th width="10%">Klantnaam</th>
                                    <th width="10%">Project Naam</th>
                                    <th width="10%">Afvalverwerker</th>
                                    <th width="10%">Verzonden</th>
                                    <!--th width="10%">Sender Naam</th-->
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
        /*  $(document).ready(function() {
          // This will now be added just before the closing body tag, after jquery,
                  // and thus should work fine.
          });*/

          // However, to not worry about potential collisions if you were to use multiple
          // js libraries that want to use the dollar sign identifier, you might be better off
          // doing something like this, and running jQuery in no conflict mode:
          (function($) {
              // your normal jQuery code goes here.
              $(document).ready(function() { /* Do stuff */
  //alert("Fahad");

  	 /* Datatables */
    /*  if($("table.sortable_simple").length > 0)
          $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});

      if($("table.sortable_default").length > 0)
          $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null,null,null, null,null, null, null, null]});

      if($("table.sortable").length > 0)
          $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null,null, null, null,null,null, null],
  		"aaSorting": [[ 0, "desc" ]],
    });*/
       /*eof Datatables*/
      oTable = $('#waste').DataTable({

        "processing": true,

        "serverSide": true,
    "language": {
      "search": "Zoeken in de Orders:"
    },
        "ajax": "{{ route('datatable.getorders') }}",
     "order": [[ 0, "desc" ]],
        "columns": [

            {data: 'id', name: 'id'},

            {data: 'Rev_Nummer', name: 'Rev_Nummer'},

            {data: 'Order_Date', name: 'Order_Date'},

      {data: 'output_Date', name: 'output_Date'},

      {data: 'Customer', name: 'Customer'},

      {data: 'Project', name: 'Project'},

      {data: 'Code', name: 'Code'},

      {data: 'email_sent', name: 'email_sent'},

      {data: 'status', name: 'status',searchable: true ,orderable: true},

      {data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });


  	});
          })(jQuery);

      </script>

       @include('admin/footer')</div>
