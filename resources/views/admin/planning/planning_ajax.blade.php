<!-- Header -->

    @include('admin/header')



    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

</style>

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

 <title>Dagelijkse projecten</title>

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>

                    <li class="active">Dagelijkse projecten</li>

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

                        <h2 class="heading">Dagelijkse projecten</h2>

                        <div style="float:right">

                        <a class="btn btn-success" data-toggle="modal" href="#modal_default_2" title="Toevoegen">+ Nieuw Plan</a>

                         </div>

                    </div>

                    <div class="content">



                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="projects">

                            <thead>

                                <tr>



                                    <th width="5%">ID</th>

                                    <th width="15%">Week Nr.</th>

                                    <th width="15%">Datum</th>

                                    <th width="15%">Dag</th>

                                    <th width="15%">Regie</th>

                                    <th width="10%">Aangenomen</th>

                                      <th width="10%">Totaal</th>

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
<div class="modal in modal-info" id="modal_default_2"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Personeels planning</h4>

                </div>

                {!! Form::open(['url'=> 'admin/addPlanProject', 'id' => 'planning']) !!}

                <div class="modal-body clearfix">



                    <div class="block">

                    <div class="content">
<div class="form-row">
 <div class="col-md-4">Select Datum:</div>
  <div class="col-md-8">


   <div class="input-group">

                             <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                            		<input type="text" class="datepicker form-control" placeholder="Datum" name="date" id="date"  />

                            </div>


                             </div>
</div>
                      <div class="form-row">

                      <div class="col-md-4">Select Project:</div>
  <div class="col-md-8">

                   	<select name="project_id" id="project_id" class="select2 col-md-12">

                                    <?php

									foreach ($activeprojects as $Projects) {?>

                                    <option value="<?=$Projects->id?>"><?=$Projects->Name?></option>

                                    <?php } ?>

                                </select>
</div>
 </div></div>

 </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Opslaan</button>

                </div>



                 {!! Form::close() !!}

            </div>

        </div>

    </div>


  <script>





     function deleteRecord()

            {
			var msg = confirm("Weet u het zeker of u de planning van deze datum wilt verwijderen?");
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





	 /* Datatables */
	$('.heading,.active').html('Lijst van de dagelijkse projecten');
	 oTable = $('#projects').DataTable({

        "processing": true,

        "serverSide": true,
		"language": {
			"search": "Zoeken:"
		  },
        "ajax": "{{ route('datatable.planning') }}",
		"order": [[ 0, "desc" ]],
        "columns": [

            {data: 'id', name: 'id'},

			{data: 'week_no', name: 'week_no'},

            {data: 'date', name: 'date'},


            {data: 'day', name: 'day'},

		    {data: 'Regie', name: 'Regie'},

			{data: 'Aangenomen', name: 'Aangenomen'},

			{data: 'Total', name: 'Total'},

			{data: 'Opties', name: 'Opties', searchable: false,orderable: false}

        ]

    });


	});

        })(jQuery);



    </script>

       @include('admin/footer')</div>
