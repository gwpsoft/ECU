
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Lijst van Bestelformulier Afvalcontainers</title>
   <link href="{{ URL::asset('assets/frontend/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />  
 <style>
.table th { text-align:center; background-color:#428bca; color:#fff;}
.table td { text-align:center; }
label { font-weight:normal;}



.dataTables_filter input {
display: inline;
width: 70%;
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
border: 1px solid #ccc;
transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);}


</style>   
    
    
    
   <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Lijst van Bestelformulier Afvalcontainers</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'welcome' );?>">Home</a></li>                              
                                <li class="active">Orders</li>
                            </ul>               
                            <!-- ./breadcrumbs -->
                        </div>
                        <!-- ./page title -->
                    </div>
                    <!-- ./page content holder -->
                </div>
                
                  <!-- page content wrapper -->
                <div class="page-content-wrap">                    
                    
                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>                    
                    
                    <!-- page content holder -->
                    <div class="page-content-holder">
                    
                    
                     <div class="col-md-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                    <b>Success!</b> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>                     
                    @endif
    			 
                
    			 <a href="<?php echo URL:: to( 'OrderWasteContainer_create' );?>" class="btn btn-success btn-large" style="float:right;margin-bottom:20px;">Add new Order</a>&nbsp;&nbsp;<a href="<?php echo URL:: to( 'welcome' );?>" class="btn btn-success btn-large" style="float:right;margin-bottom:20px; margin-right:10px;">Dashboard</a>
                <div style="margin-bottom:5%;"></div> 
                 <div class="col-md-12">
                
                <table  id="example" class="table table-striped" style="font-size:12px;" >
                <colgroup>
          <col class="col-md-1">
          <col class="col-md-2">         
            <col class="col-md-4">
             <col class="col-md-2">
              <col class="col-md-1">
              <col class="col-md-1">
             <col class="col-md-4">
        </colgroup>
<thead>
<tr>
<th>ID.</th>
<th>Bestellen #</th>
<th>Project Naam</th>
<th>Dagdeel / gewenste tijd</th>
<th>Besteldatum</th>
<th>Status</th>
<th>Options</th>
</tr>
</thead>
   <tbody> 
   <?php $i =0;foreach ($Orders as $Order) {
   $ProjectName = DB::table('tblproject')->where('id', $Order->project_name)->first();
   $i++;?>
   <tr>
  	<td><?=$Order->id?></td>
    <td>BN-00{{ $Order->Nummer }}</td>
  <td>{{ @$ProjectName->Name }}</td>    
   <td>
    <?php
		 if ($Order->Half_day_time == 0) { echo '';}
		 if ($Order->Half_day_time == 1) { echo 'Zo spoedig mogelijk';}
		 if ($Order->Half_day_time == 2) { echo 'Ochtend';}
		 if ($Order->Half_day_time == 3) { echo 'Middag';}
		 if ($Order->Half_day_time == 4) { echo 'Avond';}
		 if ($Order->Half_day_time == 5) { echo 'Zie opmerkingen';} 
	?>
   </td>
   <td>{{ $Order->Order_Date }}</td>
   <td><?php echo $Order->Status == 0  ? 'Besteld'  : ($Order->Status == 1 ? 'Gewijzigd' : 'Geannuleerd') ;?></td>
   <td><a href="<?php echo URL:: to( 'OrderWasteContainer_edit/'. $Order->id );?>" title="Edit"><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/edit.png') }}" style="width:30px; height:30px;"></a>
   <a href="<?php echo URL:: to( 'Order_print',$Order->id); ?>" title="Afdrukken" class="widget-icon"><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/print-1.png') }}" style="width:30px; height:30px;"></a>
   <!-- <a href="<?php echo URL:: to( 'messages/'. $Order->id );?>" title="Messages">
   <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/view-messages.png') }}" style="width:30px; height:30px;"></a>-->
</td>
     </tr>           
     <?php } ?>           
      </tbody>          
                </table>
                 
                 </div>
                
      </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>            
                
</div>         
                
       @include('front/footer')
       
       <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
  <script>
 $(document).ready(function(){
   $('#example').DataTable({
		"oLanguage": {
  "sSearch": "<span>Zoeken:</span> _INPUT_" //search
},
 "order": [[ 0, "desc" ]],
		
		});
});
  </script>