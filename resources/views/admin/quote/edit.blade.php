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
   <div class="col-md-12">
 
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
    <div class="content">
        
        
        <table class="table table-bordered">
<tbody>

<tr>
<th>3m<sup>3</sup></th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox1" type="checkbox" <?php if ($Project_Quote->con_3m3 == 'Yes') {?>checked <?php } ?> value="Yes" name="con_3m3">
                        <label for="checkbox1" style="vertical-align:top;"> </label> </div></td>
<th>6m<sup>3</sup></th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox2" type="checkbox" <?php if ($Project_Quote->con_6m3 == 'Yes') {?>checked <?php } ?> value="Yes" name="con_6m3">
                        <label for="checkbox2" style="vertical-align:top;"> </label> </div></td>
<th>10m<sup>3</sup></th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox3" type="checkbox" <?php if ($Project_Quote->con_10m3 == 'Yes') {?>checked <?php } ?> value="Yes" name="con_10m3">
                        <label for="checkbox3" style="vertical-align:top;"> </label> </div></td>

<th>Bouwopruimer</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox4" type="checkbox" <?php if ($Project_Quote->bouwopruimer == 'Yes') {?>checked <?php } ?> value="Yes" name="bouwopruimer">
                        <label for="checkbox4" style="vertical-align:top;" > </label> </div></td>
</tr>
<tr>
<th>Handyman</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox5" type="checkbox" <?php if ($Project_Quote->handyman == 'Yes') {?>checked <?php } ?> value="Yes" name="handyman">
                        <label for="checkbox5" style="vertical-align:top;"> </label> </div></td>
<th>Koffiedame</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox6" type="checkbox" <?php if ($Project_Quote->koffiedame == 'Yes') {?>checked <?php } ?> value="Yes" name="koffiedame">
                        <label for="checkbox6" style="vertical-align:top;" > </label> </div></td>

<th>Afvalagent</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox7" type="checkbox" <?php if ($Project_Quote->afvalagent == 'Yes') {?>checked <?php } ?> value="Yes" name="afvalagent">
                        <label for="checkbox7" style="vertical-align:top;"> </label> </div></td>
<th>Betonafwerker</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox8" type="checkbox" <?php if ($Project_Quote->betonafwerker == 'Yes') {?>checked <?php } ?> value="Yes" name="betonafwerker">
                        <label for="checkbox8" style="vertical-align:top;"> </label> </div></td>
</tr>
<tr>
<th>Aanpiccalateur</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox9" type="checkbox" <?php if ($Project_Quote->aanpiccalateur == 'Yes') {?>checked <?php } ?> value="Yes" name="aanpiccalateur">
                        <label for="checkbox9" style="vertical-align:top;"> </label> </div></td>

<th>Magazijnbeheerder</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox10" type="checkbox" <?php if ($Project_Quote->magazijnbeheerder == 'Yes') {?>checked <?php } ?> value="Yes" name="magazijnbeheerder">
                        <label for="checkbox10" style="vertical-align:top;"> </label> </div></td>

<th>Verkeersregelaar</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox11" type="checkbox" <?php if ($Project_Quote->verkeersregelaar == 'Yes') {?>checked <?php } ?> value="Yes" name="verkeersregelaar">
                        <label for="checkbox11" style="vertical-align:top;"> </label> </div></td>
<th>Poortwachter/Beveiliger</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox12" type="checkbox" <?php if ($Project_Quote->poortwachter == 'Yes') {?>checked <?php } ?> value="Yes" name="poortwachter">
                        <label for="checkbox12" style="vertical-align:top;"> </label> </div></td>
</tr>
<tr>
<th>Glazenwasser</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox13" type="checkbox" <?php if ($Project_Quote->glazenwasser == 'Yes') {?>checked <?php } ?> value="Yes" name="glazenwasser">
                        <label for="checkbox13" style="vertical-align:top;"> </label> </div></td>
<th>Liftbot</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox14" type="checkbox" <?php if ($Project_Quote->liftbot == 'Yes') {?>checked <?php } ?> value="Yes" name="liftbot">
                        <label for="checkbox14" style="vertical-align:top;"> </label> </div></td>

<th> Kantelsysteen (gratis)</th>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox15" type="checkbox" <?php if ($Project_Quote->kantelsysteen == 'Yes') {?>checked <?php } ?> value="Yes" name="kantelsysteen">
                        <label for="checkbox15" style="vertical-align:top;"> </label> </div></td>


<th> Rolcontainers (gratis)</th>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox16" type="checkbox" <?php if ($Project_Quote->rolcontainers == 'Yes') {?>checked <?php } ?> value="Yes" name="rolcontainers">
                        <label for="checkbox16" style="vertical-align:top"> </label>
                    </div>
                    
                    </td>
</tr>

<tr>
<th>Professionele Stofzuigers (gratis)</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox13" type="checkbox" <?php if ($Project_Quote->professionele == 'Yes') {?>checked <?php } ?> value="Yes" name="professionele">
                        <label for="checkbox13" style="vertical-align:top;"> </label> </div></td>
<th>Kwaliteitsbewaker (gratis)</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox14" type="checkbox" <?php if ($Project_Quote->kwaliteitsbewaker == 'Yes') {?>checked <?php } ?> value="Yes" name="kwaliteitsbewaker">
                        <label for="checkbox14" style="vertical-align:top;"> </label> </div></td>

<th> Keetonderhoud</th>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox15" type="checkbox" <?php if ($Project_Quote->keetonderhoud == 'Yes') {?>checked <?php } ?> value="Yes" name="keetonderhoud">
                        <label for="checkbox15" style="vertical-align:top;"> </label> </div></td>


<th> Specialistisch Onderhound</th>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox16" type="checkbox" <?php if ($Project_Quote->specialistisch == 'Yes') {?>checked <?php } ?> value="Yes" name="specialistisch">
                        <label for="checkbox16" style="vertical-align:top"> </label>
                    </div>
                    
                    </td>
</tr>


<tr>
<th>Opleveringsschoonmaak</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox13" type="checkbox" <?php if ($Project_Quote->opleveringsschoonmaak == 'Yes') {?>checked <?php } ?> value="Yes" name="opleveringsschoonmaak">
                        <label for="checkbox13" style="vertical-align:top;"> </label> </div></td>
<th>Hak-en Sloopweak</th>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox14" type="checkbox" <?php if ($Project_Quote->sloopweak == 'Yes') {?>checked <?php } ?> value="Yes" name="sloopweak">
                        <label for="checkbox14" style="vertical-align:top;"> </label> </div></td>

<th> Bewaking van uw bouwplaats</th>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox15" type="checkbox" <?php if ($Project_Quote->bouwplaats == 'Yes') {?>checked <?php } ?> value="Yes" name="bouwplaats">
                        <label for="checkbox15" style="vertical-align:top;"> </label> </div></td>


<th> Containerservice</th>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox16" type="checkbox" <?php if ($Project_Quote->containerservice == 'Yes') {?>checked <?php } ?> value="Yes" name="containerservice">
                        <label for="checkbox16" style="vertical-align:top"> </label>
                    </div>
                    
                    </td>
</tr>


</tbody>
</table>
        
                   
                   
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