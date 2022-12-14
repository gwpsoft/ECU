@include('front/header')
 <title>Easy Clean Up | Aanvraag Personeel</title> 
 <meta name="_token" content="{!! csrf_token() !!}"/>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>        
 <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />  
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>  
  <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>
   <script type='text/javascript' src="{{ URL::asset('assets/js/jquery-confirm.js') }}"></script>         
   <style>
   .form-row {
    float: left;
    line-height: 30px;
    margin-bottom: 10px;
    width: 100%;
}
label { font-size:13px;}
table th,td { font-size:12px;}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 { padding-right:3px !important;}
.center { text-align:center;} 
.jconfirm .jconfirm-box {
  background: white;
}
th,td { text-align:left}
 /* .glyphicon glyphicon-chevron-up {
    border: 1px transparent solid;
    width: 100%;
    display: inline-block;
    margin: 0;
    padding: 8px 0;
    outline: 0;
    color: #333;
	position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
} 
.bootstrap-timepicker-widget table td span {
    width: 100%;}*/
   </style>    
  
  <?php $project = DB::table('tblproject')->select('Name')
			->where('id', '=', $data['project_name'])
            ->first();?>        
            <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Aanvraag Personeel</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li ><a href="<?php echo URL:: to( '/' );?>">Home</a></li>
                                <li class="active"><a href="<?php echo URL:: to( 'OrderServices' );?>">Aanvraag Personeel</a></li>
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
                    
                    
                     <div class="col-md-14">
   @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    @if (Session::has('error'))
   <div class="alert alert-danger">
                        <b>Error!</b> {{Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
   {!! Form::open(['url'=> 'update_OrderServices', 'id' => 'order']) !!}
        <input type="hidden" name="Customer_id" id="Customer_id" value="<?=$data['Customer_id']?>"  />
        <input type="hidden" name="id" value="<?=$data['id']?>" />
        <input type="hidden" name="Nummer" value="<?=$data['Nummer']?>" />
        <input type="hidden" id="status" name="Status" />
        <input type="hidden" name="Rev_Nummer" value="<?=$data['Nummer']?>" />
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
        <input type="hidden" name="Department_Id" id="Department_Id"  value="<?php echo $Dept;?>" />
         <input type="hidden" name="con_id" id="con_id"  value="<?php echo $contact_id;?>" />
        <div id="sf1" class="frm">
        <fieldset>
        <legend>Stap 1 of 2</legend>
        <div class="col-md-18">
                
                
                
                <div class="block">
                    <div class="header" >                    
                       <h2>Aanvraag Personeel</h2>                                    
                    </div>
                 
                  <div class="form-row">
                  
                    <div class="col-md-2"><label>Project naam:</label></div>
                            <div class="col-md-4"> 
                             <input type="hidden" name="project_id"  value="<?php echo $Projects[0]->Id?>" />
                            <input type="text" class="form-control" id="project_name" name="project_name" readonly="readonly" value="<?php echo $Projects[0]->Name?>" />
                            </div>
                  
                  
                               <div class="col-md-2"><label>Besteld door:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Besteld door" name="Contact_id" id="Contact_id" value="<?=$current_Username ?>" readonly="readonly">
                            </div>  
                                                       
                        </div>
                       
                         <div class="form-row">
                             <div class="col-md-2"><label>Afdeling:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Afdeling" id="Afdeling" name="Afdeling"  value="<?php echo $departments->Name?>" readonly="readonly">
                            </div>
                             <div class="col-md-2"><label>Telefoonnummer:</div>
                            <div class="col-md-4"> 
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" id="con_Telefoonnummer" name="con_Telefoonnummer" value="<?=$data['con_Telefoonnummer']?>" readonly="readonly">
                            </div> 
                                                        
                        </div> 
                        
                      
                        <div class="form-row">
                        
                         <div class="col-md-2"><label>Project Adres:</label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Project Adres" id="Work_Address" name="Work_Address" value="<?=$data['Work_Address']?>" readonly="readonly">
                            </div>    
                          <div class="col-md-2"><label>Mobilenummer:</label></div>
                            <div class="col-md-4"> 
                            	<input type="text" class="form-control" placeholder="Mobilenummer" id="con_Mobilenummer" name="con_Mobilenummer" value="<?=$Contacts[0]->Mobile;?>" readonly="readonly">
                            </div>  
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-2"><label>Postcode & plaats:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Postcode & plaats" name="Postcode" id="Postcode" value="<?=$data['Postcode']?>" readonly="readonly">
                            </div>  
                            
                               <div class="col-md-2"><label>Aangenomen door:</label></div>
                            <div class="col-md-4"> 
                            	<input type="text" class="form-control" placeholder="Aangenomen door" id="con_Aangenomendoor" name="con_Aangenomendoor" value="<?=$data['con_Aangenomendoor']?>" readonly="readonly">
                            </div>  
                                   
                        </div>
                         
                         
                          <div class="form-row">
                             
                            <div class="col-md-2"><label>Uitvoerder:</label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Uitvoerder" id="Uitvoerder" name="Uitvoerder"  value="<?php echo $Contacts[0]->Firstname.' '.$Contacts[0]->Lastname; ?>" readonly="readonly">
                            </div>
                            
                               <div class="col-md-2"><label>Aanvraagdatum :</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Order_Date" id="Order_Date" value="<?=$data['Order_Date']?>" readonly="readonly">
                            </div>    
                            
                         </div>
                        
                            <div class="form-row">
                            <div class="col-md-2"><label>Telefoonnummer:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Telefoonnummer" name="phone_number" id="phone_number" value="<?php echo $Contacts[0]->Phone?>" readonly="readonly">
                            </div> 
                             <div class="col-md-2"><label>Tijd:</label><span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4">                            
           					 <input id="timepicker1" type="text" class="form-control input-small" name="time" value="<?=$data['time']?>">                         
                        </div>
                             
                        </div>
                        
                        <div class="form-row">
                        
                          <div class="col-md-2"><label>Aanvraagnummer:</label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Aanvraagnummer" id="Nummer" readonly="readonly" value="<?php echo 'AP-'.sprintf('%02d',$data['Nummer']); ?>" >
                            </div>
                           <?php if (@$data['Rev_Nummer'] !=0){ ?>
                           
                              <div class="col-md-2"><label>Gewijzigd Nummer:</label></div>
                            <div class="col-md-4"> 
                            <input type="text" class="form-control" placeholder="Revised Nummer" id="Revised_Nummer" readonly="readonly" value="AP-<?=sprintf('%02d',@$data['Rev_Nummer'])?>">
                          
                            </div>
                            <?php } ?>        
                          </div>
                </div>
                
                    
         <div class="col-md-18">
                
                <div class="block">
                    <div class="header" >                    
                       <h2>Opdracht</h2>                                    
                    </div>
                    <div class="content controls">
              
                    <div class="form-row">
                            <div class="col-md-2">Begindatum:</div>
                            <div class="col-md-4">
                         
                            	<input type="text" class="datepicker form-control" placeholder="Begindatum" id="Begindatum" name="Begindatum" value="<?php echo date('Y-m-d')?>">
                                                    	
                            </div>
                           <div class="col-md-2">Begintijd:</div>
                            <div class="col-md-4">
                            	<input type="text" id="timepicker2" class="bootstrap-timepicker timepicker form-control" placeholder="Begintijd" name="Begintijd" value="<?=$data['Begintijd']?>">
                            </div>          
                            </div>
                             
        
        
        
                             <div class="form-row">
                             <div class="col-md-2">Aantal Mensen:</div>
                            <div class="col-md-4"> 
                            	<input type="text" class="form-control" placeholder="Aantal Mensen" name="Aantal_Mensen" id="Aantal_Mensen" value="<?=$data['Aantal_Mensen']?>">
                            </div> 
                            
                              <div class="col-md-2">Hoeveel Dagen:</div>
                            <div class="col-md-4"> 
                            	<input type="text" class="form-control" placeholder="Hoeveel Dagen" name="Hoeveel_Dagen" id="Hoeveel_Dagen" value="<?=$data['Hoeveel_Dagen']?>">
                            </div>       
                                                             
                            </div>
                             <div class="form-row">
                            
                              <div class="col-md-2">Melden Bij:</div>
                            <div class="col-md-4"> 
                            	<input type="text" class="form-control" placeholder="Melden Bij" name="Melden_Bij" id="Melden_Bij" value="<?=$data['Melden_Bij']?>">
                            </div>
                            
                            
                             <div class="col-md-2">Telefoonnummer:</div>
                            <div class="col-md-4"> 
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" name="Telefoonnummer" id="Telefoonnummer" value="<?=$data['Telefoonnummer']?>">
                            </div>             
                            </div>
                             
                            <div class="form-row">
                             
                            <div class="col-md-2">Werkzaamheden:</div>
                            <div class="col-md-2"> 
                            	<select class="form-control" placeholder="Werkzaamheden" name="Werkzaamheden" id="Werkzaamheden">
                                 <option value="">kiezen Werkzaamheden</option>
                                <option value="Handyman" <?php if ($data['Werkzaamheden'] == 'Handyman') { ?> selected="selected" <?php } ?>>Handyman</option>
                                <option value="Opruimer" <?php if ($data['Werkzaamheden'] == 'Opruimer') { ?> selected="selected" <?php } ?>>Opruimer</option>
                                <option value="Schoonmaker" <?php if ($data['Werkzaamheden'] == 'Schoonmaker') { ?> selected="selected" <?php } ?>>Schoonmaker</option>
                                <option value="Timmerman" <?php if ($data['Werkzaamheden'] == 'Timmerman') { ?> selected="selected" <?php } ?>>Timmerman</option>
                                <option value="Anders" <?php if ($data['Werkzaamheden'] == 'Anders') { ?> selected="selected" <?php } ?>>Anders</option>
                                </select>
                            </div> 
                            <div class="col-md-8">
                            <?php if ($data['Werkzaamheden'] == 'Anders') {
							$display = 'block';	
							 } else {
							$display = 'none';
							}
							?>
                            <input type="text" class="form-control" style="display:<?=$display?>;" placeholder="Anders" name="Anders" id="Anders" value="<?=$data['Anders']?>">
                            </div>
                       
                                  
                            </div> 
                            
                            <div class="form-row">
                             <div class="col-md-2">Benodigheden:</div>
                            <div class="col-md-10"> 
                            	 <textarea class="form-control" placeholder="Benodigheden" name="Benodigheden" id="Benodigheden"><?=$data['Benodigheden']?></textarea> 
                            </div>       
                            </div>

                            
                            
                            <div class="form-row">
                             <div class="col-md-2">Opmerkingen:</div>
                            <div class="col-md-10"> 
                            	 <textarea class="form-control" placeholder="Opmerkingen" name="Opmerkingen" id="Opmerkingen"><?=$data['Opmerkingen']?></textarea> 
                            </div>       
                            </div>
                            
                                                                                                     
                  		  </div>
                 	   </div> 
                    
             </div>           
                    
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>        
        <div class="form-group">
        <div class="col-md-14" align="right">
        <button class="btn btn-primary open1" type="button" id="step2">Volgende <span class="fa fa-arrow-right"></span></button> 
        </div>
        </div>        
        </fieldset>
        </div>

     
        
        <div id="sf2" class="frm" style="display: none;">
        <fieldset>
        <legend>Stap 2 of 2</legend>        
       <h2>Aanvraag Personeel</h2>
       
       	 <div class="col-md-18">
                
                <div class="block">
                    <div class="header" >                    
                       <h5>Aanvraag Personeel</h5>                                    
                    </div>
      <table class="table table-bordered" style="text-align:left !important" >
  <thead>
    <tr style="font-size:14px;"> 
        <th class="left" width="15%">Project naam:</th>
      <td class="left" colspan="3"  ><span id="project_name_view" ><?php echo $Projects[0]->Name?></span></td>  
     
      </tr>  
   
     <tr style="font-size:14px;"> 
      <th class="left" width="15%">Afdeling:</th>
      <td class="left" width="20%"  ><span id="Afdeling_view" ></span></td>
       <th class="left" width="15%"  >Besteld door:</th>     
      <td class="left" width="20%"><?=$current_Username ?></td> 
      </tr>
      <tr>
      
       <th class="left" width="15%"  >Project Adres:</th>     
      <td class="left" width="20%"><span id="Work_Address_view" class="left"></span></td> 
      <th class="left" width="15%">Telefoonnummer:</th>
      <td class="left" width="20%"  ><span id="con_Telefoonnummer_view" class="left"></span></td>
      
      </tr>
      <tr>
      
      <th class="left" width="15%">Postcode & plaats:</th>
      <td class="left" width="20%"  ><span id="Postcode_view"></span></td>
        <th class="left" width="15%">Mobilenummer:</th>
      <td class="left" width="20%"  ><span id="con_Mobilenummer_view"></span></td> 
    </tr>
    
    
     <tr>
      
      <th class="left" width="15%">Uitvoerder:</th>
      <td class="left" width="20%"  ><span id="Uitvoerder_view"></span></td>
          <th class="left" width="15%">Aangenomen door:</th>
      <td class="left" width="20%"  ><span id="con_Aangenomendoor_view"></span></td>  
    </tr>
    
    
     <tr>
      
       <th class="left" width="15%">Telefoonnummer:</th>
      <td class="left" width="20%"  ><span id="phone_number_view" class="left"></span></td>
       <th class="left" width="15%"  >Aanvraagdatum:</th>     
      <td class="left" width="20%"><span id="Order_Date_view"></span></th> 
    
    
    <tr>    
     <th class="left" width="15%">Tijd:</th>
      <td class="left" ><span id="timepicker1_view"></span></td>
      <th class="left" width="15%">Nummer:</th>
      <td class="left" ><span id="Nummer_view"></span></td>     
    </tr>
    
    </tr>
    
  </thead>
                    
   </table>           
                </div> 
                    
             </div>       
                    
         <div class="col-md-18">
                
                <div class="block">
                    <div class="header" >
                       <h5>Opdracht</h5>                   
                    </div>
                      <table class="table table-bordered" style="text-align:left;">
  <thead>
    <tr style="font-size:14px;">     
      <th class="left" width="15%">Begindatum:</th>
      <td class="left" width="20%"  ><span id="Begindatum_view"></span></td>
      <th class="left" width="15%"  >Begintijd:</th>     
      <td class="left" width="20%"><span id="timepicker2_view"></span></td>
      </tr>
      
       <tr style="font-size:14px;">     
      <th class="left" width="15%">Aantal Mensen:</th>
      <td class="left" width="20%"  ><span id="Aantal_Mensen_view"></span></td>
      <th class="left" width="15%"  >Hoeveel Dagen:</th>     
      <td class="left" width="20%"><span id="Hoeveel_Dagen_view"></span></td>
      </tr>
      
       <tr style="font-size:14px;">  
        <th class="left" width="15%"  >Melden Bij:</th>     
      <td class="left" width="20%"><span id="Melden_Bij_view"></span></td>
      <th class="left" width="15%">Telefoonnummer:</th>
      <td class="left" width="20%"  ><span id="Telefoonnummer_view"></span></td>   
     
      </tr>
      
      
       <tr style="font-size:14px;">     
            <th class="left" width="15%">Werkzaamheden:</th>
      <td class="left" ><span id="Werkzaamheden_view"></span> <span id="Anders_view"></span></td>

      </tr>      
       <tr>
       <th class="left" width="15%">Benodigheden:</th>
      <td class="left"  colspan="3"  ><span id="Benodigheden_view" style="float:left"></span></td>   
    </tr>
     <tr>
       <th class="left" width="15%">Opmerkingen:</th>
      <td class="left"  colspan="3"  ><span id="Opmerkingen_view" style="float:left"></span></td>   
    </tr>
    
    
     </thead>
    </table>   
                    
                    
                </div> 
                    
             </div>  
       
       
       
    <!--     <div class="col-md-4">
        
        
        <table class="table table-bordered" style="text-align:center;">
  <thead>
    
      <tr >
      <th rowspan="2" class="center">Container type</th>
      <th colspan="3" class="center">Aantal containers</th>     
    </tr>
    
    <tr >
      <th class="center">Plaats</th>
      <th class="center">Wissel</th>
      <th class="center">Afvoer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">3m<sup>3</sup></th>
      <td><span id="3m3_plaats_view"></span></td>
      <td><span id="3m3_Wissel_view"></span></td>
      <td><span id="3m3_Afvoeromments_view"></span></td>
    </tr>
    <tr>
      <th scope="row">6m<sup>3</sup></th>
      <td><span id="6m3_plaats_view"></span></td>
      <td><span id="6m3_Wissel_view"></span></td>
      <td><span id="6m3_Afvoer_view"></span></td>
    </tr>
    <tr>
      <th scope="row">10m<sup>3</sup></th>
       <td><span id="10m3_plaats_view"></span></td>
      <td><span id="10m3_Wissel_view"></span></td>
      <td><span id="10m3_Afvoer_view"></span></td>
      
    </tr>
     <tr>
      <th scope="row">10m<sup>3</sup> dicht</th>
      <td><span id="10m3_plaats_dicht_view"></span></td>
      <td><span id="10m3_Wissel_dicht_view"></span></td>
      <td><span id="10m3_Afvoer_dicht_view"></span></td>
    </tr>
    <tr>
      <th scope="row">20m<sup>3</sup></th>
      <td><span id="20m3_plaats_view"></span></td>
      <td><span id="20m3_Wissel_view"></span></td>
      <td><span id="20m3_Afvoer_view"></span></td>
     </tr>
    <tr>
      <th scope="row">40m<sup>3</sup></th>
       <td><span id="40m3_plaats_view"></span></td>
      <td><span id="40m3_Wissel_view"></span></td>
      <td><span id="40m3_Afvoer_view"></span></td>

    </tr>
  
  </tbody>
</table>
        
        </div>
        
        <div class="col-md-8">
        <table class="table table-bordered" style="text-align:center;">
  <thead>
      <tr>
        <th colspan="7" class="center" style="font-size:12px;">Aantal per afvalstroom</th>
      </tr>
    <tr style="font-size:12px;">     
      <th class="center" width="12%" >BSA</th>
      <th class="center"  width="12%">Puin</th>
      <th class="center"  width="12%">Hout</th>     
      <th class="center" width="12%">Plastic Folie</th>
      <th class="center" width="12%">Papier</th>
       <th class="center"  width="12%">Diverse</th>
      <th class="center"  width="25%">Opmerkingen</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><span id="3m3_Bsa_view"></span>&nbsp;</td>
       <td><span id="3m3_Puin_view"></span></td>
      <td><span id="3m3_Hout_view"></span></td>
      <td><span id="3m3_Diverse_view"></span></td>
       <td><span id="3m3_Plastic_Folie_view"></span></td>
      <td><span id="3m3_Papier_view"></span></td>
      <td><span id="3m3_Opmerkingen_view"></span></td>
      
    </tr>
    <tr>
     <td scope="row"><span id="6m3_Bsa_view"></span>&nbsp;</td>
       <td><span id="6m3_Puin_view"></span></td>
      <td><span id="6m3_Hout_view"></span></td>
      <td><span id="6m3_Diverse_view"></span></td>
       <td><span id="6m3_Plastic_Folie_view"></span></td>
      <td><span id="6m3_Papier_view"></span></td>
      <td><span id="6m3_Opmerkingen_view"></span></td>
    </tr>
    <tr>
     <td scope="row"><span id="10m3_Bsa_view"></span>&nbsp;</td>
       <td><span id="10m3_Puin_view"></span></td>
      <td><span id="10m3_Hout_view"></span></td>
      <td><span id="10m3_Diverse_view"></span></td>
       <td><span id="10m3_Plastic_Folie_view"></span></td>
      <td><span id="10m3_Papier_view"></span></td>
      <td><span id="10m3_Opmerkingen_view"></span></td>
      
    </tr>
    <tr>
     <td scope="row"><span id="10m3_Bsa_dicht_view"></span>&nbsp;</td>
       <td><span id="10m3_Puin_dicht_view"></span></td>
      <td><span id="10m3_Hout_dicht_view"></span></td>
      <td><span id="10m3_Diverse_dicht_view"></span></td>
       <td><span id="10m3_Plastic_Folie_dicht_view"></span></td>
      <td><span id="10m3_Papier_dicht_view"></span></td>
      <td><span id="10m3_Opmerkingen_dicht_view"></span></td>     
    </tr>
     <tr>
        <td scope="row"><span id="20m3_Bsa_view"></span>&nbsp;</td>
        <td><span id="20m3_Puin_view"></span></td>
        <td><span id="20m3_Hout_view"></span></td>
        <td><span id="20m3_Diverse_view"></span></td>
        <td><span id="20m3_Plastic_Folie_view"></span></td>
        <td><span id="20m3_Papier_view"></span></td>
        <td><span id="20m3_Opmerkingen_view"></span></td>
    </tr>
    <tr>
        <td scope="row"><span id="40m3_Bsa_view"></span>&nbsp;</td>
        <td><span id="40m3_Puin_view"></span></td>
        <td><span id="40m3_Hout_view"></span></td>
        <td><span id="40m3_Diverse_view"></span></td>
        <td><span id="40m3_Plastic_Folie_view"></span></td>
        <td><span id="40m3_Papier_view"></span></td>
        <td><span id="40m3_Opmerkingen_view"></span></td>
     
    </tr>
  
  </tbody>
</table>
        
        

        
        </div>-->
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-primary back1" type="button"><span class="fa fa-arrow-left"></span> Terug</button> 
         <input class="btn btn-success open2 submit" type="submit" name="Opslaan" value="Opslaan">
          <input class="btn btn-warning open2 modify" type="button" name="Wijzigen" value="Bestelling Wijzigen ">
        <input class="btn btn-danger open2 cancel" type="button" name="Annuleren" value="Bestelling Annuleren">
        </div>
        </div>        
        </fieldset>
        </div>
      </form>
	  <div>
        </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>

<script type="text/javascript">
  
   jQuery().ready(function() {
	  
	  $('.modify').on('click', function() {		
		$('#status').val('1');	
	});
	
	$('.cancel').on('click', function() {	
		$('#status').val('2');	
	});
	
	
	 // $(".open1").click(function() {
     $('.open1').on('click', function() {
	  //if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      //}
    });

    //$(".open2").click(function() {
		 $('.open2').on('click', function() {
      //if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      //}
    });
	
	
	//  $(".back1").click(function() {
	  $('.back1').on('click', function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    //$(".back3").click(function() {
	$('.back3').on('click', function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });
	
	
	//$('.cancel,.modify').click( function() {
	$('.cancel,.modify').on('click', function() {   
		$.confirm({
		title: 'Bevestigen!',
		content: 'Weet u het zeker dat u deze aanvraag wilt wijzigen?',
		confirmButton: 'JA',
		cancelButton: 'NEE',
		confirmButtonClass: 'btn-success',
		cancelButtonClass: 'btn-danger',
		confirm: function(){
		    //$.alert('Confirmed!');
			$('#order').submit();
		},
		cancel: function(){
			//$.alert('Canceled!')
		}
	});
		
	});  
	
	
	  
	 
	  $('select#project_name').on('change', function() {
		var project_id = $('select#project_name').val();
		//alert (project_id);		
		$.get("<?php echo URL:: to( 'Ajax_projectName'); ?>/" + project_id,function(data) {			
		$('#project_name_view').html(data.Name);
		});
	});	 
	
	  $('#timepicker1').timepicker();
	  $('.datepicker').datepicker({
				format: 'yyyy-mm-dd'
	 });
	 
	 $('#step2').click(function () {				
		$('#Customer_Name_view').html($('#Customer_Name').val());
		$('#Afdeling_view').html($('#Afdeling').val());
		//$('#project_name_view').val(data.Name);
		$('#Work_Address_view').html($('#Work_Address').val());
		$('#Postcode_view').html($('#Postcode').val());	
		$('#con_Mobilenummer_view').html($('#con_Mobilenummer').val());	
		$('#con_Telefoonnummer_view').html($('#con_Telefoonnummer').val());	
		$('#con_Aangenomendoor_view').html($('#con_Aangenomendoor').val());	
		$('#Contact_view').html($('#Contact').val());
		$('#phone_number_view').html($('#phone_number').val());
		$('#Uitvoerder_view').html($('#Uitvoerder').val());
		$('#Order_Date_view').html($('#Order_Date').val());
		$('#timepicker1_view').html($('#timepicker1').val());
		$('#Nummer_view').html($('#Nummer').val());	
		
		 $('#Begindatum_view').html($('#Begindatum').val());
		$('#timepicker2_view').html($('#timepicker2').val());
		$('#Aantal_Mensen_view').html($('#Aantal_Mensen').val());
        $('#Hoeveel_Dagen_view').html($('#Hoeveel_Dagen').val());
        $('#Werkzaamheden_view').html($('#Werkzaamheden').val());
        $('#Anders_view').html($('#Anders').val());
        $('#Melden_Bij_view').html($('#Melden_Bij').val());
        $('#Telefoonnummer_view').html($('#Telefoonnummer').val());
        $('#Benodigheden_view').html($('#Benodigheden').val());
        $('#Opmerkingen_view').html($('#Opmerkingen').val());
		});
		
    // validate form on keyup and submit
   var v = jQuery("#order").validate({
     /* rules: {
        Gender: {
          required: true,
          minlength: 1
        },
		initials: {
          required: true,
          minlength: 2
        },
        Email: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        Firstname: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
         Lastname: {
          required: true,
          minlength: 6,
         
        },
        Birthday: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        Sofinumber: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        Startdate: {
          required: true,
          minlength: 2,         
        },
        Phone: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
         Mobile: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        Id_Type: {
          required: true,
          minlength: 1         
        },
        Id_Number: {
          required: true,
          minlength: 1
        },
        Id_Expirationdate: {
          required: true,
          minlength: 1
        },
        Address: {
          required: true,
          minlength: 2,         
          maxlength: 100
        },
        Zipcode: {
          required: true,
          minlength: 4,
          maxlength: 15
        },
        City: {
          required: true,
          minlength: 6
        },
        Active: {
          required: true,
          minlength: 1
        },
		Employmentagency_Id: {
          required: true,
          minlength: 1
        },
        Rate: {
          required: true,
          minlength: 2,
          maxlength: 20,
        },
         Cost: {
          required: true,
          minlength: 2,
          maxlength: 15,
        },
        Employmentagencynote: {
          required: true,
          minlength: 6         
        },
		 Notes: {
          required: true,
          minlength: 6         
        }

      },*/
      errorElement: "span",
      errorClass: "help-inline-error",
    });
	
  
	
	 /* if (v.form()) {
	 
	}*/
	
	
  /*  $(".open3").click(function() {
      if (v.form()) {
       // $(".frm").hide("fast");
       // $("#sf4").show("slow");
      }
    });*/
  
    
  

  });
</script> 

@include('front/footer')