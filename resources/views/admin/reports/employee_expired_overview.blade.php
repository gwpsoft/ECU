<!-- Header -->
  @include('admin/header') 

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
			$('#print').on('click',function(){
printData();
})
		/*$( "#search" ).click(function() {
			 year  = document.getElementById('weeknumbery').value;
			week  = document.getElementById('weeknumberw').value;
			document.location.href="<?=URL:: to( 'admin' )?>/report/employeeoverview/weeknumber/" + year + week;
	});*/
			
		
		 /* Datatables */
    if($("table.sortable_simple").length > 0)
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});
    
    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null]});    
    /* eof Datatables */
	
	
	});
        })(jQuery);
	
    </script>
<script language="Javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}



</script>

    
    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
.weeknr_mini {
    color: #59ad2f ;
    font-size: 12px;
}
.weeknr_small {
    color: #59ad2f ;
    font-size: 18px;
}
.weeknr_large {
    color: #59ad2f ;
    font-size: 24px;
    font-weight: bold;
}
#year {
    cursor: pointer;
    margin-right: 30px;
}
.label { font-size:100%;} 
</style>





 <title>Report</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin' ); ?>">huis</a></li>
                    <li class="active">Report</li>
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
                        <h2>Dashboard</h2>
                    </div>
                    <div class="content">
                            <div class="col-md-2" id="print" style=" cursor:pointer;">
                            <img class=" " src="{{ URL::asset('assets/img/icons/print-1.png') }}" id="print" >
                            Afdrukken
   					 
</div>
                    </div>
                </div>
   
    
   
   <div class="block">
                    <div class="header">
                        <h2>Binnenkort/verlopen Id's</h2>
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="printTable">
                            <thead>
                                <tr>
                                    <th width="25%" align="left">Personeel</th>
                                     <th width="25%" align="left">Id Type</th>
                                    <th width="10%" align="left">Id Nummer</th>
                                    <th width="8%" align="left">Verloopdatum</th>
                                                                      
                                </tr>
                            </thead>
                            <?php if ($ExpiredEmployee){  ?>
                             <tbody>
							<?php foreach ($ExpiredEmployee as $Employee){?>
                           
                          
            <tr>
                <td>{{ @$Employee->Firstname }} {{ @$Employee->Lastname }}</td>
                <td>{{ @$Employee->Id_Type }} </td> 
                 <td>{{ @$Employee->Id_Number }}</td>
                <td>{{ @$Employee->Id_Expirationdate }} </td>             
              
            </tr>
                                <?php } ?>
                            </tbody>
                            <?php } ?>
                        </table>                                        

                    </div>
                </div>              
            </div>
  </div>   
       @include('admin/footer')</div>  
       
 <!--      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
    <script type="text/javascript">
	
	function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
        $(function () {
            $("#btnPrint").click(function () {
                var contents = $("#dvReport").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>Report</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                //frameDoc.document.write('<link href="style.css" rel="stylesheet" type="text/css" />');
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });
        });
    </script>
