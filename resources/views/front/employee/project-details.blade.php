
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Project Details</title>
  
    
    
    
   <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Project Details</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li> 
                                  <li><a href="<?php echo URL:: to( 'projects' );?>">Projects</a></li>                            
                                <li class="active">Project Details</li>
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
                <div style="margin:5%;"></div> 
                 <a href="javascript:history.back()" class="btn btn-success btn-large" style="float:right">Terug</a>
                 <div class="col-md-12">

<h3><?=$GetProjectDetails->project_name?></h3>               
  <table  class="table table-striped" style="font-size:12px;" >
   <tbody> 
    <tr style="font-size:14px; background-color:#000 !important; text-decoration:underline;">						
	<th>Title</th>      
    <th>Value</th>
    <th>Title</th>      
    <th>Value</th>
    <th>Title</th>      
    <th>Value</th>
    <th>Title</th>      
    <th>Value</th>
 </tr> 
   
 <tr align="center">						
	<th>3m<sup>3</sup></th>      
    <td><?=$GetProjectDetails->con_3m3?>&nbsp;</td>
    <th>3m<sup>3</sup> Price</th>      
    <td><?=$GetProjectDetails->con_3m3_price?>&nbsp;</td>
    <th>6m<sup>3</sup></th>      
    <td><?=$GetProjectDetails->con_6m3?>&nbsp;</td>
    <th>6m<sup>3</sup> Price</th>      
    <td><?=$GetProjectDetails->con_6m3_price?>&nbsp;</td>
 </tr> 
 
 
 <tr align="center">						
	<th>10m<sup>3</sup></th>      
    <td><?=$GetProjectDetails->con_10m3?>&nbsp;</td>
    <th>10m<sup>3</sup> Price</th>      
    <td><?=$GetProjectDetails->con_10m3_price?>&nbsp;</td>
    <th>Bouwopruimer</th>      
    <td><?=$GetProjectDetails->bouwopruimer?>&nbsp;</td>
    <th>Bouwopruimer Price</th>      
    <td><?=$GetProjectDetails->bouwopruimer_price?>&nbsp;</td>
 </tr> 
 
 
  <tr align="center">						
	<th>Handyman</th>      
    <td><?=$GetProjectDetails->handyman?>&nbsp;</td>
    <th>Handyman Price</th>      
    <td><?=$GetProjectDetails->handyman_price?>&nbsp;</td>
    <th>Koffiedame</th>      
    <td><?=$GetProjectDetails->koffiedame?>&nbsp;</td>
    <th>Koffiedame Price</th>      
    <td><?=$GetProjectDetails->koffiedame_price?>&nbsp;</td>
 </tr> 
 
 <tr align="center">						
	<th>Afvalagent</th>      
    <td><?=$GetProjectDetails->afvalagent?>&nbsp;</td>
    <th>Afvalagent Price</th>      
    <td><?=$GetProjectDetails->afvalagent_price?>&nbsp;</td>
    <th>Betonafwerker</th>      
    <td><?=$GetProjectDetails->betonafwerker?>&nbsp;</td>
    <th>Betonafwerker Price</th>      
    <td><?=$GetProjectDetails->betonafwerker_price?>&nbsp;</td>
 </tr> 
 
 <tr align="center">						
	<th>Aanpiccalateur</th>      
    <td><?=$GetProjectDetails->aanpiccalateur?>&nbsp;</td>
    <th>Aanpiccalateur Price</th>      
    <td><?=$GetProjectDetails->aanpiccalateur_price?>&nbsp;</td>
    <th>Magazijnbeheerder</th>      
    <td><?=$GetProjectDetails->magazijnbeheerder?>&nbsp;</td>
    <th>Magazijnbeheerder Price</th>      
    <td><?=$GetProjectDetails->magazijnbeheerder_price?>&nbsp;</td>
 </tr>
 
 <tr align="center">						
	<th>Verkeersregelaar</th>      
    <td><?=$GetProjectDetails->verkeersregelaar?>&nbsp;</td>
    <th>Verkeersregelaar Price</th>      
    <td><?=$GetProjectDetails->verkeersregelaar_price?>&nbsp;</td>
    <th>Poortwachter / Beveiliger</th>      
    <td><?=$GetProjectDetails->poortwachter?>&nbsp;</td>
    <th>Poortwachter / Beveiliger Price</th>      
    <td><?=$GetProjectDetails->poortwachter_price?>&nbsp;</td>
 </tr>
 
 <tr align="center">						
	<th>Glazenwasser</th>      
    <td><?=$GetProjectDetails->glazenwasser?>&nbsp;</td>
    <th>Glazenwasser Price</th>      
    <td><?=$GetProjectDetails->glazenwasser_price?>&nbsp;</td>
    <th>Liftbot</th>      
    <td><?=$GetProjectDetails->liftbot?>&nbsp;</td>
    <th>Liftbot Price</th>      
    <td><?=$GetProjectDetails->liftbot_price?>&nbsp;</td>
 </tr>
    
  <tr align="center">						
	<th>Kantelsysteen (gratis)</th>      
    <td><?=$GetProjectDetails->kantelsysteen?></td>
    <th>Kantelsysteen (gratis) Price</th>      
    <td><?=$GetProjectDetails->kantelsysteen_price?>&nbsp;</td>
    <th>Rolcontainers (gratis)</th>      
    <td><?=$GetProjectDetails->rolcontainers?>&nbsp;</td>
    <th>Rolcontainers (gratis) Price</th>      
    <td><?=$GetProjectDetails->rolcontainers_price?>&nbsp;</td>
 </tr>  
    
   <tr align="center">						
	<th>Professionele Stofzuigers (gratis)</th>      
    <td><?=$GetProjectDetails->professionele?>&nbsp;</td>
    <th>Professionele Stofzuigers (gratis) Price</th>      
    <td><?=$GetProjectDetails->professionele_price?>&nbsp;</td>
    <th>Kwaliteitsbewaker (gratis)</th>      
    <td><?=$GetProjectDetails->kwaliteitsbewaker?>&nbsp;</td>
    <th>Kwaliteitsbewaker (gratis) Price</th>      
    <td><?=$GetProjectDetails->kwaliteitsbewaker_price?>&nbsp;</td>
 </tr> 
 
  <tr align="center">	
    <th>Keetonderhoud</th>
    <td><?=$GetProjectDetails->keetonderhoud?>&nbsp;</td>
    <th>Keetonderhoud Price</th>
    <td><?=$GetProjectDetails->keetonderhoud_price?>&nbsp;</td>
     <th>Specialistisch Onderhound</th>
    <td><?=$GetProjectDetails->specialistisch?>&nbsp;</td>
    <th>Specialistisch Onderhound Price</th>
    <td><?=$GetProjectDetails->specialistisch_price?>&nbsp;</td>
 </tr>
 
  <tr align="center">	
    <th>Opleverings schoonmaak</th>
    <td><?=$GetProjectDetails->opleveringsschoonmaak?>&nbsp;</td>
    <th>Opleverings schoonmaak Price</th>
    <td><?=$GetProjectDetails->opleveringsschoonmaak_price?>&nbsp;</td>
     <th>Hak-en Sloopweak</th>
    <td><?=$GetProjectDetails->sloopweak?>&nbsp;</td>
    <th>Hak-en Sloopweak Price</th>
    <td><?=$GetProjectDetails->sloopweak_price?>&nbsp;</td>
</tr>
 
  <tr align="center">	
    <th>Bewaking van uw bouwplaats</th>
    <td><?=$GetProjectDetails->bouwplaats?>&nbsp;</td>
    <th>Bewaking van uw bouwplaats Price</th>
    <td><?=$GetProjectDetails->bouwplaats_price?>&nbsp;</td>
     <th>Containerservice</th>
    <td><?=$GetProjectDetails->containerservice?>&nbsp;</td>
    <th>Containerservice Price</th>
    <td><?=$GetProjectDetails->containerservice_price?>&nbsp;</td>
</tr>
 
 
 
 
 
 
 
 
 
 
   
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
       
   