<!-- Header -->
    @include('admin/header')
     <title>Edit Enquiry Form</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="admin">Home</a></li>                    
                    <li class="active">Edit Enquiry Form</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/update_ClientProject']) !!}
    
    
   <!-- {!! Form::open(['url'=> 'edit_employee/$Get_Employee->id']) !!}-->
   <div class="col-md-10">
 
  <!--@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
     <b>Error!</b>  <br />
   @foreach ($errors->all() as $error)
  {{$error}}<br />
   @endforeach   
   </div>
   @endif-->
   <input type="hidden" name="id" value="{{$Project_Quote->id}}" />
   <input type="hidden" name="client_id" value="{{$Project_Quote->client_id}}"
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
   
    <div class="col-md-12">
      
      <div class="block">
                    <div class="header" >
                    
                       <h2>Edit Enquiry Form</h2>
                                    
                    </div>
                    <div class="content controls">
                    <div class="form-row">
                          
                            <div class="col-md-4"> 
                            Opdrachtgever:
                             <input type="text" class="form-control" placeholder="Opdrachtgever" name="opdrachtgever" value="{{$Project_Quote->opdrachtgever}}">
                            </div>
                             
                            <div class="col-md-4">
                            Week Number: 
                            <input type="text" class="form-control" placeholder="Week Number" name="week_number" value="{{$Project_Quote->week_number}}">
                            </div>
                            
                            <div class="col-md-4"> 
                            Project Name:
                            <input type="text" class="form-control" placeholder="Project Name" name="project_name" value="{{$Project_Quote->project_name}}">
                            </div>
                            
                           
                          </div>
                    	
                         <div class="form-row">
                           <div class="col-md-4"> 
                             Customer Project NR:
                             <input type="text" class="form-control" placeholder="Customer Project NR" name="customer_project_nr" value="{{$Project_Quote->customer_project_nr}}">
                            </div>
                          <div class="col-md-4"> 
                             ECU Project NR:
                             <input type="text" class="form-control" placeholder="ECU Project NR" name="edu_project_nr" value="{{$Project_Quote->edu_project_nr}}">
                            </div>
                         </div>                        
                    </div>
      			</div>
                
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Enquiry Details</h2>
                                    
                    </div>
    <div class="content controls">
        
       <div class="form-row">
          
            <div class="col-md-3"> 
           3m<sup>3</sup> :
            <input type="text" class="form-control" placeholder="3m3" name="con_3m3" value="{{$Project_Quote->con_3m3}}">
            </div>
             
            <div class="col-md-3">
            3m<sup>3</sup> Price: 
            <input type="text" class="form-control" placeholder="3m3 Price" name="con_3m3_price" value="{{$Project_Quote->con_3m3_price}}">
            </div>
            
            <div class="col-md-3"> 
            6m<sup>3</sup>:
            <input type="text" class="form-control" placeholder="6m3" name="con_6m3" value="{{$Project_Quote->con_6m3}}">
            </div>
            
             <div class="col-md-3"> 
             6m<sup>3</sup> Price:
             <input type="text" class="form-control" placeholder="6m3 Price" name="con_6m3_price" value="{{$Project_Quote->con_6m3_price}}">
            </div>
            
          </div>
          <div class="form-row">
          
            <div class="col-md-3"> 
           10m<sup>3</sup>:
          <input type="text" class="form-control" placeholder="10m3" name="con_10m3" value="{{$Project_Quote->con_10m3}}">
            </div>
             
            <div class="col-md-3">
            10m<sup>3</sup> Price:
          <input type="text" class="form-control" placeholder="10m3 Price" name="con_10m3_price" value="{{$Project_Quote->con_10m3_price}}">
            </div>
            
            <div class="col-md-3"> 
             Bouwopruimer:
            <input type="text" class="form-control" placeholder="Bouwopruimer" name="bouwopruimer" value="{{$Project_Quote->bouwopruimer}}">
            </div>
            
             <div class="col-md-3"> 
            Bouwopruimer Price:
                    <input type="text" class="form-control" placeholder="Bouwopruimer Price" name="bouwopruimer_price" value="{{$Project_Quote->bouwopruimer_price}}">
                 
            </div>
          </div>
          <div class="form-row">
          
            <div class="col-md-3"> 
            Handyman:
            <input type="text" class="form-control" placeholder="Handyman" name="handyman" value="{{$Project_Quote->handyman}}">
            </div>
             
            <div class="col-md-3">
            Handyman Price: 
            <input type="text" class="form-control" placeholder="Handyman Price" name="handyman_price" value="{{$Project_Quote->handyman_price}}">
            </div>
            
            <div class="col-md-3"> 
             Koffiedame:
            <input type="text" class="form-control" placeholder="Koffiedame" name="koffiedame" value="{{$Project_Quote->koffiedame}}">
            </div>
             <div class="col-md-3"> 
             Koffiedame Price:
                    <input type="text" class="form-control" placeholder="Koffiedame Price" name="koffiedame_price" value="{{$Project_Quote->koffiedame_price}}">
            </div>
          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Afvalagent:
                            <input type="text" class="form-control" placeholder="Afvalagent" name="afvalagent" value="{{$Project_Quote->afvalagent}}">
                            </div>
                             
                            <div class="col-md-3">
                            Afvalagent Price:
                            <input type="text" class="form-control" placeholder="Afvalagent Price" name="afvalagent_price" value="{{$Project_Quote->afvalagent_price}}">
                            </div>
                            
                            <div class="col-md-3"> 
                            Betonafwerker:
                            <input type="text" class="form-control" placeholder="Betonafwerker" name="betonafwerker" value="{{$Project_Quote->betonafwerker}}">
                            </div>
                            
                             <div class="col-md-3"> 
                             Betonafwerker price:
                             <input type="text" class="form-control" placeholder="Betonafwerker price" name="betonafwerker_price" value="{{$Project_Quote->betonafwerker_price}}">
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Aanpiccalateur:
                        <input type="text" class="form-control" placeholder="Aanpiccalateur" name="aanpiccalateur" value="{{$Project_Quote->aanpiccalateur}}">
                            </div>
                             
                            <div class="col-md-3">
                            Aanpiccalateur Price: 
                <input type="text" class="form-control" placeholder="Aanpiccalateur Price" name="aanpiccalateur_price" value="{{$Project_Quote->aanpiccalateur_price}}">
                            </div>
                            
                            <div class="col-md-3"> 
                            Magazijnbeheerder:
                      <input type="text" class="form-control" placeholder="Magazijnbeheerder" name="magazijnbeheerder" value="{{$Project_Quote->magazijnbeheerder}}">
                            </div>
                             <div class="col-md-3"> 
                             Magazijnbeheerder Price:
                         <input type="text" class="form-control" placeholder="Magazijnbeheerder Price" name="magazijnbeheerder_price" value="{{$Project_Quote->magazijnbeheerder_price}}">
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Verkeersregelaar:
                            		<input type="text" class="form-control" placeholder="Verkeersregelaar" name="verkeersregelaar" value="{{$Project_Quote->verkeersregelaar}}">
                            </div>
                             
                            <div class="col-md-3">
                            Verkeersregelaar Price: 
                            		<input type="text" class="form-control" placeholder="Verkeersregelaar Price" name="verkeersregelaar_price" value="{{$Project_Quote->verkeersregelaar_price}}">
                            </div>
                            
                            <div class="col-md-3"> 
                            Poortwachter/Beveiliger:
                            		<input type="text" class="form-control" placeholder="Poortwachter/Beveiliger" name="poortwachter" value="{{$Project_Quote->poortwachter}}">
                            </div>
                             <div class="col-md-3"> 
                            Poortwachter/Beveiliger Price:
                            		<input type="text" class="form-control" placeholder="Poortwachter/Beveiliger Price" name="poortwachter_price" value="{{$Project_Quote->poortwachter_price}}">
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                           Glazenwasser:
                            		<input type="text" class="form-control" placeholder="Glazenwasser" name="glazenwasser" value="{{$Project_Quote->glazenwasser}}">
                            </div>
                             
                            <div class="col-md-3">
                            Glazenwasser Price: 
                            		<input type="text" class="form-control" placeholder="Glazenwasser Price" name="glazenwasser_price" value="{{$Project_Quote->glazenwasser_price}}">
                            </div>
                            
                            <div class="col-md-3"> 
                            Liftbot:
                            		<input type="text" class="form-control" placeholder="Liftbot" name="liftbot" value="{{$Project_Quote->liftbot}}">
                            </div>
                             <div class="col-md-3"> 
                             Liftbot Price:
                            		<input type="text" class="form-control" placeholder="Liftbot Price" name="liftbot_price" value="{{$Project_Quote->liftbot_price}}">
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Kantelsysteen (gratis):
                            		<input type="text" class="form-control" placeholder="Kantelsysteen (gratis)" name="kantelsysteen" value="{{$Project_Quote->kantelsysteen}}">
                            </div>
                             
                            <div class="col-md-3">
                            Kantelsysteen (gratis) Price:
                            		<input type="text" class="form-control" placeholder="Kantelsysteen (gratis) Price" name="kantelsysteen_price" value="{{$Project_Quote->kantelsysteen_price}}">
                            </div>
                            
                            <div class="col-md-3"> 
                            Rolcontainers (gratis):
                            		<input type="text" class="form-control" placeholder="Rolcontainers (gratis)" name="rolcontainers" value="{{$Project_Quote->rolcontainers}}">
                            </div>
                             <div class="col-md-3"> 
                             Rolcontainers (gratis) Price:
                            		<input type="text" class="form-control" placeholder="Rolcontainers (gratis) Price" name="rolcontainers_price" value="{{$Project_Quote->rolcontainers_price}}">
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Professionele Stofzuigers (gratis):
                            <input type="text" class="form-control" placeholder="Professionele Stofzuigers (gratis)" name="professionele" value="{{$Project_Quote->professionele}}">
                            </div>
                             
                            <div class="col-md-3">
                            Professionele Stofzuigers (gratis) Price: 
                          <input type="text" class="form-control" placeholder="Professionele Stofzuigers (gratis) Price" name="professionele_price" value="{{$Project_Quote->professionele_price}}">
                                 
                            </div>
                            
                            <div class="col-md-3"> 
                            Kwaliteitsbewaker (gratis):
                            		<input type="text" class="form-control" placeholder="Kwaliteitsbewaker (gratis)" name="kwaliteitsbewaker" value="{{$Project_Quote->kwaliteitsbewaker}}">
                            </div>
                             <div class="col-md-3"> 
                             Kwaliteitsbewaker (gratis) Price:
                           <input type="text" class="form-control" placeholder="Kwaliteitsbewaker (gratis) Price" name="kwaliteitsbewaker_price" value="{{$Project_Quote->kwaliteitsbewaker_price}}">
                                  
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Keetonderhoud:
                            <input type="text" class="form-control" placeholder="Keetonderhoud" name="keetonderhoud" value="{{$Project_Quote->keetonderhoud}}">
                            </div>
                             
                            <div class="col-md-3">
                            Keetonderhoud Price:
                            <input type="text" class="form-control" placeholder="Keetonderhoud Price" name="keetonderhoud_price" value="{{$Project_Quote->keetonderhoud_price}}">
                            </div>
                            
                            <div class="col-md-3"> 
                            Specialistisch Onderhound:
                            <input type="text" class="form-control" placeholder="Specialistisch Onderhound" name="specialistisch" value="{{$Project_Quote->specialistisch}}">
                            </div>
                            
                             <div class="col-md-3"> 
                             Specialistisch Onderhound Price:
                            <input type="text" class="form-control" placeholder="Specialistisch Onderhound Price" name="specialistisch_price" value="{{$Project_Quote->specialistisch_price}}">
                                  
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Opleveringsschoonmaak:
                            		<input type="text" class="form-control" placeholder="Opleveringsschoonmaak" name="opleveringsschoonmaak" value="{{$Project_Quote->opleveringsschoonmaak}}">
                            </div>
                             
                            <div class="col-md-3">
                            Opleveringsschoonmaak Price: 
                            <input type="text" class="form-control" placeholder="Opleveringsschoonmaak Price" name="opleveringsschoonmaak_price" value="{{$Project_Quote->opleveringsschoonmaak_price}}">
                                  
                            </div>
                            
                            <div class="col-md-3"> 
                            Hak-en Sloopweak:
                            		<input type="text" class="form-control" placeholder="Hak-en Sloopweak" name="sloopweak" value="{{$Project_Quote->sloopweak}}">
                            </div>
                             <div class="col-md-3"> 
                             Hak-en Sloopweak Price:
                             <input type="text" class="form-control" placeholder="Hak-en Sloopweak Price" name="sloopweak_price" value="{{$Project_Quote->sloopweak_price}}">
                                
                            </div>
                          </div>
                          <div class="form-row">
                          
                            <div class="col-md-3"> 
                            Bewaking van uw bouwplaats:
                            <input type="text" class="form-control" placeholder="Bewaking van uw bouwplaats" name="bouwplaats" value="{{$Project_Quote->bouwplaats}}">
                            </div>
                             
                            <div class="col-md-3">
                           Bewaking van uw bouwplaats Price:
                            <input type="text" class="form-control" placeholder="Bewaking van uw bouwplaats Price" name="bouwplaats_price" value="{{$Project_Quote->bouwplaats_price}}">
                            </div>
                            
                            <div class="col-md-3"> 
                            Containerservice:
                            <input type="text" class="form-control" placeholder="Containerservice" name="containerservice" value="{{$Project_Quote->containerservice}}">
                            </div>
                             <div class="col-md-3"> 
                            Containerservice Price:
                            		<input type="text" class="form-control" placeholder="Containerservice Price" name="containerservice_price" value="{{$Project_Quote->containerservice_price}}">
                            </div>
                          </div>
                        
                         
                        
                        
                   
                </div>         
            </div>
                 
                    <div class="content controls"  >
                        <div class="form-row" >
                        <div class="col-md-6" > 
                        </div>
                            <div class="col-md-3" > 
                            <a href="<?php echo URL:: to( 'admin/view_clientProjects/'.$Project_Quote->client_id ); ?>" class="btn btn-primary" style="width:100%">Cancel</a>
                          
                          
                               <?php /*?>{!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-primary', 'style' => 'width:100%;']) !!}<?php */?>
                            	
                            </div>              
                            <div class="col-md-3">
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>                                                
                    </div>
                    <br />
                </div>
                </div>
            
            
        
       
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  