
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Lijst van de Personeels Aanvragen</title>
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
                            <h1>Lijst van de Personeels Aanvragen</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'welcome' );?>">Home</a></li>                              
                                <li class="active">Personeels Aanvragen</li>
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
    			
    			 <a href="<?php echo URL:: to( 'create_OrderServices' );?>" class="btn btn-success btn-large" style="float:right;margin-bottom:20px;">Nieuw Personeel's Aanvraag</a>&nbsp;&nbsp;
                 <a href="<?php echo URL:: to( 'welcome' );?>" class="btn btn-success btn-large" style="float:right;margin-bottom:20px;margin-right:10px;">Dashboard</a>
                <div style="margin-bottom:5%;"></div> 
                 <div class="col-md-12">
                
                <table  id="example" class="table table-striped" style="font-size:12px;" >
                <colgroup>
          <col class="col-md-1">
          <col class="col-md-1">         
            <col class="col-md-3">
             <col class="col-md-2">
              <col class="col-md-2">
              <col class="col-md-3">
             <col class="col-md-4">
        </colgroup>
<thead>
<tr>
 <th width="4%">ID.</th>
<th width="10%">Aanvraagnr.</th>                                    
<th width="15%">Project</th> 
<th width="12%">Datum aanvraag</th>                                   
<th width="10%">Begindatum </th> 
<th width="12%">Aantal mesen</th>
<th width="12%">Hoeveel dagen</th>
<th width="10%">Werkzaamheeden</th>
 <th width="25%">Opties</th>
</tr>
</thead>
   <tbody> 
   <?php $i =0;foreach ($Orders as $Order) {
   $ProjectName = DB::table('tblproject')->where('id', $Order->project_name)->first();
   $i++;
    if ($Order->Rev_Nummer != 0) {						   
		$RevNumber = '-'.$Order->Rev_Nummer;
	} else {
		$RevNumber = '';							
	}
   
   
   ?>
   <tr>
    <td><?=$Order->id?></td>
    <td>AP-<?php echo sprintf('%02d',$Order->Nummer).$RevNumber ?></td>
    <td>{{ @$ProjectName->Name }}</td> 
    <td>{{ @$Order->created_at }} </td>
    <td>{{ $Order->Begindatum }} </td>
    <td>{{ $Order->Aantal_Mensen }} </td>
    <td>{{ $Order->Hoeveel_Dagen }} </td>
    <td>{{ $Order->Werkzaamheden }} </td>
    <td>
   <a href="<?php echo URL:: to( 'edit_OrderServices', $Order->id );?>" title="Edit">
   <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/edit.png') }}" style="width:25px; height:25px; float:left"></a>
      <a href="<?php echo URL:: to( 'print_OrderServices',$Order->id); ?>" title="Afdrukken" class="widget-icon">
   <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/print-1.png') }}" style="width:25px; height:25px;float:right"></a>
   
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
}
		
		});
});
  </script>