<!-- Header -->

    @include('admin/header')

    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
.left { text-align:left}
div.checker span, div.radio span {
    background: rgba(0, 0, 0, 0.2) none repeat scroll 0 0;
    border: 1px solid transparent;
    border-radius: 3px;
    display: inline-block;
    position: relative;
    text-align: center;
}
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
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true,  "order": [[ 0, "desc" ]]});

    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null,null, null, null],  "order": [[ 0, "desc" ]]});

    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null,null],  "order": [[ 0, "desc" ]]});
    /* eof Datatables */

	});

	  $("table .checkall").click(function(){
        var iC = $(this).parents('th').index();
        var tB = $(this).parents('table').find('tbody');

        if($(this).is(':checked'))
            tB.find('tr').each(function(){
                var cb = $(this).find('td:eq('+iC+') input:checkbox');
                cb.parent('span').addClass('checked');
                cb.prop('checked',false);
            });
        else
            tB.find('tr').each(function(){
                var cb = $(this).find('td:eq('+iC+') input:checkbox');
                cb.parent('span').removeClass('checked')
                cb.prop('checked',false);
            });
    });




        })(jQuery);

    </script>

 <title>Lijst van Gebruikers</title>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                     <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Lijst van Gebruikers</li>
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
                        <h2>Lijst van Gebruikers</h2>
                       <!-- <div style="float:right"><a href=" <?php //echo URL:: to( 'admin/create_contact' ); ?> " class="btn btn-success">+ New Contact</a>-->
                         </div>

                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>

                                    <th width="5%">ID</th>
                                    <th width="15%">Naam</th>
                                    <th width="15%">E-mail</th>
                                    <th width="15%">Groep</th>
                                    <th width="15%">Staat</th>
                                    <th width="15%">Opties</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $value)


                                <tr>

                                    <td>{{ $value->id}}</td>
                                    <td>{{ $value->name }} </td>
                                    <td>{{ $value->email }}</td>
                                     <td>{{ $value->group_name }}</td>
                                     <td>{{ $value->status_name }}</td>
                                     <td>
 <a data-toggle="modal" href="#modal_default_3" title="uitzicht" class="widget-icon" onclick="add_rights('<?php echo $value->id;?>')"><span class="icon-indent-right"></span></a>
 <a data-toggle="modal" href="#modal_default_4" title="Bewerk" class="widget-icon" onclick="Update('<?php echo $value->id;?>','<?php echo $value->name;?>','<?php echo $value->email;?>','<?php echo $value->groups;?>','<?php echo $value->status;?>','<?php echo $value->txt_password;?>')"><span class="icon-pencil"></span></a>
 <a href="<?php echo URL:: to( 'admin/delete_user',$value->id); ?>" title="verwijderen" class="widget-icon" onclick="return confirm('Weet u het zeker of u deze gebruiker wilt verwijderen ?');"><span class="icon-remove"></span></a>

                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
  </div>

  <div class="modal  modal-info" id="modal_default_3"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Module rechten</h4>

                </div>

                {!! Form::open(['url'=> 'admin/ModuleRights']) !!}

                <div class="modal-body clearfix">

                    <div class="block">


   <input type="hidden" name="user_id"  id="user_id"/>

         <?php
		 //use DB;
		/* $Rights = DB::table('tbl_modules_rights')->where('user_id',67)->get();
		 if ($Rights) {
			 foreach ($Rights as $right) {
			 $selected[] = $right->module_id;
			 }
		 }
		 */
		 ?>

                    <div class="content">

                      <div class="form-row">



                            <div class="col-md-12">
                                <span id="data">

                         <table class="table table-bordered" style="text-align:center; font-size:12px;">
                        <thead>
                        <tr>

                        <th  class="center">Rechten</th>
                        <th  class="center">Module</th>

                        </tr>
                        </thead>
                        <tbody>
                             <?php foreach ($modules as $module) {?>
                             <tr>

                        <td  class="left"><input type="checkbox" name="modules[]" value=""</td>
                        <td  class="center"><?php echo $module->name?></td>

                        </tr>
                        <?php } ?>
                         </tbody>
                                </table>
                                </span>
                            </div>
 						</div>
 					</div>
 				</div>
              </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit form</button>
                </div>
                 {!! Form::close() !!}
            </div>
        </div>
    </div>


  <div class="modal in modal-info" id="modal_default_4"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Bewerk</h4>

                </div>

                {!! Form::open(['url'=> 'admin/UpdateUser', 'id' => 'User']) !!}

                <div class="modal-body clearfix">

                <input type="hidden" id="id" name="id" />

                    <div class="block">

                    <div class="content">

                    <div class="form-row">
                    <div class="col-md-4">Naam:</div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="name" id="name" />
                    </div>
                    </div>


                    <div class="form-row">
                    <div class="col-md-4">E-mail:</div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="email" id="email" />
                    </div>


 					</div>
                    <div class="form-row">
                    <div class="col-md-4">Staat:</div>
                    <div class="col-md-8">
                    <select name="status" id="status" class="select" style="width:100%">
                    <option value="0">Blocked</option>
                    <option value="1">Active</option>
                    </select>
                    </div>


 					</div>

 					<div class="form-row">
                    <div class="col-md-4">Groep:</div>
                    <div class="col-md-8">
                    <select name="group" id="group" class="select " style="width:100%">
                    <option value="0">Admin</option>
                    <option value="1">Client</option>
                    <option value="2">Personeel</option>
                    </select>
                    </div>
 					</div>

                    <div class="form-row">
                    <div class="col-md-4">Password:</div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="txt_password" id="txt_password" />
                    </div>
                    </div>
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

     </div>



       @include('admin/footer')
  </div>

       <script>

	   function Update (id,name,email,groups,status,txt_password) {

		  if (status == 'Active') {stat = 1;} else { stat = 0;}

		  if (groups == 'Admin') {group = 0;}
		  else if (groups == 'Client') {group = 1;}
		  else if (groups == 'Personeel') {group = 2;}
		  else { group = '';}
		  //alert (group);
		  $('#id').val(id);
		  $('#name').val(name);
		  $('#email').val(email);
		  $('#status').val(stat).prop("selected",true);
		  //$('#status').val(status);
		   $('#group').val(group).prop("selected",true);
		  //$('#groups').val(groups);
		  $('#txt_password').val(txt_password);
		  /* $('#modal_default_4').modal({
        	show: 'true'
    	});*/



		   }






       function add_rights(id) {

		   $('#user_id').val(id);

		$.get('<?php echo URL:: to( 'admin/AjaxGetModukeRights'); ?>/' + id,function(data) {

		$('#data').html(data);


		});






	 }


       </script>
