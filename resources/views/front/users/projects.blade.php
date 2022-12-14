
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Projects</title>
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
                            <h1>Projects</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>                              
                                <li class="active">Projects</li>
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
    			
    			 <a href="<?php echo URL:: to( 'AddProject' );?>" class="btn btn-success btn-large" style="float:right;margin-bottom:20px;">Add new Project</a>
                <div style="margin-bottom:5%;"></div> 
                 <div class="col-md-12">
                
                <table  id="example" class="table table-striped" style="font-size:12px;" >
                <colgroup>
          <col class="col-md-1">
          <col class="col-md-4">         
            <col class="col-md-4">
             <col class="col-md-4">
             
        </colgroup>
                	<thead>
<tr>
<th>S No.</th>
<th>Project Name</th>
<th>Opdrachtgever</th>
<th>Options</th>
</tr>
</thead>
   <tbody> 
   <?php $i =0;foreach ($GetUserQuotation as $project) { $i++;?>
   <tr>
  	<td><?=$i?></td>
   <td><?=$project->project_name?></td>
   <td><?=$project->opdrachtgever?></td>
   <td><a href="<?php echo URL:: to( 'project-details/'. $project->id );?>" title="Project Details"><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/view-details.png') }}" style="width:30px; height:30px;"></a>
   <a href="<?php echo URL:: to( 'messages/'. $project->id );?>" title="Messages"><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/view-messages.png') }}" style="width:30px; height:30px;"></a>
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
    $('#example').DataTable();
});
  </script>