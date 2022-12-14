@include('front/header')
 <title>Easy Clean Up | Afvalcontainers</title> 
 <meta name="_token" content="{!! csrf_token() !!}"/>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>        
 <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
   <link href="https://valor-software.com/ngx-bootstrap/assets/css/glyphicons.css" rel="stylesheet">  
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script> 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" rel="stylesheet" id="bootstrap-css"> 
  <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>
   <script type='text/javascript' src="{{ URL::asset('assets/js/jquery-confirm.js') }}"></script>  
 <!--<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>        
 <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />  
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>  
  <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script> -->  
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
                            <h1>Afvalcontainers</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li ><a href="<?php echo URL:: to( 'welcome' );?>">Home</a></li>
                                <li class="active"><a href="<?php echo URL:: to( 'OrderWasteContainers' );?>">Afvalcontainers</a></li>
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
   {!! Form::open(['url'=> 'update_OrderWasteContainer', 'id' => 'order']) !!}
        <input type="hidden" name="Customer_id" id="Customer_id" value="<?=$data['Customer_id']?>"  />
        <input type="hidden" name="id" value="<?=$data['id']?>" />
        <input type="hidden" name="Nummer" value="<?=sprintf('%02d',$data['Nummer'])?>" />
        <input type="hidden" id="status" name="Status" />
        <input type="hidden" name="Rev_Nummer" value="<?=sprintf('%02d',$data['Nummer'])?>" />
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
        <div id="sf1" class="frm">
        <fieldset>
        <legend>Stap 1 of 3</legend>
        <div class="col-md-18">
                
                <div class="block">
                    <div class="header" >                    
                       <h2>Bestelformulier Afvalcontainers</h2>                                    
                    </div>
                 
                  <div class="form-row">
                            <div class="col-md-2"><label>Klantnaam:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Klantnaam" name="Customer_Name" id="Customer_Name" value="<?=$data['Customer_Name'];?>" readonly="readonly"/>
                            </div>
                            
                               <div class="col-md-2"><label>Projectnummer:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Projectnummer" name="Projectnummer" id="Projectnummer" value="<?=$data['Projectnummer'];?>" readonly="readonly">
                            </div>  
                                                       
                        </div>
                       
                         <div class="form-row">
                            <div class="col-md-2"><label>Project naam:</label></div>
                            <div class="col-md-4">
                            <select class="form-control" id="project_name" name="project_name" style="width: 100%;">
                                <option value="">Select Project</option>
                                @foreach ($Projects as $Project)
                                <option value="{!! $Project->Id !!}" <?php if (@$data['project_name'] == $Project->Id) { ?> selected="selected" <?php } ?>>
                                {!! $Project->Name!!}
                                </option>
                                 @endforeach                                 
                                </select> 
                            		
                            </div>
                            
                               <div class="col-md-2"><label>Werkadres:</label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Werkadres" name="Work_Address" id="Work_Address" value="<?=$data['Work_Address'];?>" readonly="readonly">
                            </div>                              
                        </div> 
                        
                      
                        <div class="form-row">
                            <div class="col-md-2"><label>Postcode & plaats:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Postcode & plaats" name="Postcode" id="Postcode" value="<?=$data['Postcode']?>" readonly="readonly">
                            </div>  
                              <div class="col-md-2"><label>Contactpersoon:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Contactpersoon" name="Contact" id="Contact" value="<?=$data['Contact']?>" readonly="readonly">
                            </div>                            
                        </div>
                         
                        
                            <div class="form-row">
                            <div class="col-md-2"><label>Telefoonnummer:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Telefoonnummer" name="phone_number" id="phone_number" value="<?=$data['phone_number']?>" readonly="readonly">
                            </div> 
                             <div class="col-md-2"><label>E-mail adres:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="E-mail adres" name="Email" id="Email" value="<?=$data['Email']?>" readonly="readonly">
                            </div>
                        </div>
                 
                        <div class="form-row">
                         
                            
                            
                              <div class="col-md-2"><label>Fax:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="FAX" name="Fax" id="Fax" value="<?=$data['Fax']?>" readonly="readonly">
                                  
                            </div> 
                                <div class="col-md-2"><label>Besteldatum:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Order_Date" id="Order_Date" value="<?=$data['Order_Date']?>" readonly="readonly">
                            </div>                           
                          </div>
                        
                        <div class="form-row">                      
                              <div class="col-md-2"><label>Tijd:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4">
                            <div class="bootstrap-timepicker timepicker">
            <input id="timepicker1" type="text" class="form-control input-small" name="time" value="<?=$data['time']?>" readonly="readonly">
         
        </div>         
                            
                        </div>
                        
                          <div class="col-md-2"><label>Nummer:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Nummer" id="Nummer" value="BN-00<?=$data['Nummer']?>" readonly="readonly">
                            </div>
                        
                        
                        </div>
                        
                      
                        <div class="form-row">
                        
                          <?php if (@$data['Rev_Nummer'] !=0){ ?>
                           
                              <div class="col-md-2"><label>Gewijzigd Nummer:</label></div>
                            <div class="col-md-4"> 
                            <input type="text" class="form-control" placeholder="Revised Nummer" id="Revised_Nummer" readonly="readonly" value="BN-00<?=@$data['Rev_Nummer']?>" readonly="readonly">
                          
                            </div>
                            <?php } ?>        
                        </div>
                </div> 
                    
             </div>       
                    
         <div class="col-md-18">
                
                <div class="block">
                    <div class="header" >
                       <h2>Opdracht</h2>                   
                    </div>
                    <div class="content controls">
                       
                        
                                                    
                            <div class="form-row">
                            
                              <div class="col-md-2"><label>Uitvoerdatum:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="datepicker form-control" placeholder="Uitvoerdatum" name="output_Date" id="output_Date" value="<?=$data['output_Date']?>">
                            </div>                 
                            
                            
                            <div class="col-md-2"><label>Dagdeel / gewenste tijd:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4">
                            <select class="form-control" name="Half_day_time" id="Half_day_time">
                            <option value="">Selecteer Dagdeel gewenste tijd</option>
                            <option value="1" <?php if ($data['Half_day_time'] == 1) { echo 'selected';}?>>Zo spoedig mogelijk</option>
                            <option value="2" <?php if ($data['Half_day_time'] == 2) { echo 'selected';}?>>Ochtend</option>
                            <option value="3" <?php if ($data['Half_day_time'] == 3) { echo 'selected';}?>>Middag</option>
                            <option value="4" <?php if ($data['Half_day_time'] == 4) { echo 'selected';}?>>Avond</option>
                            <option value="5" <?php if ($data['Half_day_time'] == 5) { echo 'selected';}?>>Zie opmerkingen</option>                            
                            </select>                         
                            		
                            </div>
                            </div>
                             <div class="form-row">
                            <div class="col-md-2"><label>Opmerkingen:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-10">
                            <textarea class="form-control" placeholder="Opmerkingen" name="Comments" id="Comments"><?=$data['Comments']?></textarea> 
                            		
                            </div>                               
                        </div>                          
                                                
                    </div>
                </div> 
                    
             </div>           
                    
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>        
        <div class="form-group">
        <div class="col-md-14" align="right">
        <button class="btn btn-primary open1" type="button">Volgende <span class="fa fa-arrow-right"></span></button> 
        </div>
        </div>        
        </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
        <fieldset>
        <legend>Stap 2 of 3</legend>        
       
         <div class="col-md-4">
        
        
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
       <td><input type="number" class="form-control"  name="3m3_plaats" id="3m3_plaats" value="<?=$data['3m3_plaats']?>" ></td>
      <td><input type="number" class="form-control"  name="3m3_Wissel" id="3m3_Wissel" value="<?=$data['3m3_Wissel']?>"></td>
      <td><input type="number" class="form-control"  name="3m3_Afvoer" id="3m3_Afvoer" value="<?=$data['3m3_Afvoer']?>"></td>
    </tr>
    <tr>
      <th scope="row">6m<sup>3</sup></th>
      <td><input type="number" class="form-control"  name="6m3_plaats" id="6m3_plaats" value="<?=$data['6m3_plaats']?>"></td>
      <td><input type="number" class="form-control"  name="6m3_Wissel" id="6m3_Wissel" value="<?=$data['6m3_Wissel']?>"></td>
      <td><input type="number" class="form-control"  name="6m3_Afvoer" id="6m3_Afvoer" value="<?=$data['6m3_Afvoer']?>"></td>
    </tr>
    <tr>
      <th scope="row">10m<sup>3</sup></th>
       <td><input type="number" class="form-control"  name="10m3_plaats" id="10m3_plaats" value="<?=$data['10m3_plaats']?>"></td>
      <td><input type="number" class="form-control"  name="10m3_Wissel" id="10m3_Wissel" value="<?=$data['10m3_Wissel']?>"></td>
      <td><input type="number" class="form-control"  name="10m3_Afvoer" id="10m3_Afvoer" value="<?=$data['10m3_Afvoer']?>"></td>
    </tr>
     <tr>
      <th scope="row">10m<sup>3</sup> dicht</th>
       <td><input type="number" class="form-control"  name="10m3_plaats_dicht" id="10m3_plaats_dicht" value="<?=$data['10m3_plaats_dicht']?>" ></td>
      <td><input type="number" class="form-control"  name="10m3_Wissel_dicht" id="10m3_Wissel_dicht" value="<?=$data['10m3_Wissel_dicht']?>"></td>
      <td><input type="number" class="form-control"  name="10m3_Afvoer_dicht" id="10m3_Afvoer_dicht" value="<?=$data['10m3_Afvoer_dicht']?>"></td>
    </tr>
    <tr>
      <th scope="row">20m<sup>3</sup></th>
       <td><input type="number" class="form-control"  name="20m3_plaats" id="20m3_plaats" value="<?=$data['20m3_plaats']?>"></td>
      <td><input type="number" class="form-control"  name="20m3_Wissel" id="20m3_Wissel" value="<?=$data['20m3_Wissel']?>"></td>
      <td><input type="number" class="form-control"  name="20m3_Afvoer" id="20m3_Afvoer" value="<?=$data['20m3_Afvoer']?>"></td>
    </tr>
    <tr>
      <th scope="row">40m<sup>3</sup></th>
      <td><input type="number" class="form-control"  name="40m3_plaats" id="40m3_plaats" value="<?=$data['40m3_plaats']?>"></td>
      <td><input type="number" class="form-control"  name="40m3_Wissel" id="40m3_Wissel" value="<?=$data['40m3_Wissel']?>"></td>
      <td><input type="number" class="form-control"  name="40m3_Afvoer" id="40m3_Afvoer" value="<?=$data['40m3_Afvoer']?>"></td>
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
     <td scope="row"><input  class="form-control"  name="3m3_Bsa" id="3m3_Bsa"  value="<?=$data['3m3_Bsa']?>"></td>
       <td><input type="number" class="form-control"  name="3m3_Puin" id="3m3_Puin" value="<?=$data['3m3_Puin']?>"></td>
      <td><input type="number" class="form-control"  name="3m3_Hout" id="3m3_Hout" value="<?=$data['3m3_Hout']?>"></td>      
       <td><input type="number" class="form-control"  name="3m3_Plastic_Folie" id="3m3_Plastic_Folie" value="<?=$data['3m3_Plastic_Folie']?>"></td>
      <td><input type="number" class="form-control"  name="3m3_Papier" id="3m3_Papier" value="<?=$data['3m3_Papier']?>"></td>
      <td><input type="number" class="form-control"  name="3m3_Diverse" id="3m3_Diverse" value="<?=$data['3m3_Diverse']?>"></td>
      <td><input type="text" class="form-control"  name="3m3_Opmerkingen" id="3m3_Opmerkingen" value="<?=$data['3m3_Opmerkingen']?>"></td>
      
    </tr>
    <td scope="row"><input  class="form-control"  name="6m3_Bsa" id="6m3_Bsa" value="<?=$data['6m3_Bsa']?>"></td>
       <td><input type="number" class="form-control"  name="6m3_Puin" id="6m3_Puin" value="<?=$data['6m3_Puin']?>"></td>
      <td><input  type="number" class="form-control"  name="6m3_Hout" id="6m3_Hout" value="<?=$data['6m3_Hout']?>"></td>     
       <td><input type="number" class="form-control"  name="6m3_Plastic_Folie" id="6m3_Plastic_Folie" value="<?=$data['6m3_Plastic_Folie']?>"></td>
      <td><input  type="number" class="form-control"  name="6m3_Papier" id="6m3_Papier" value="<?=$data['6m3_Papier']?>"></td>
       <td><input type="number" class="form-control"  name="6m3_Diverse" id="6m3_Diverse" value="<?=$data['6m3_Diverse']?>"></td>
      <td><input type="text" class="form-control"  name="6m3_Opmerkingen" id="6m3_Opmerkingen" value="<?=$data['6m3_Opmerkingen']?>"></td>
     
    </tr>
     <td scope="row"><input  class="form-control"  name="10m3_Bsa" id="10m3_Bsa" value="<?=$data['10m3_Bsa']?>"></td>
       <td><input type="number" class="form-control"  name="10m3_Puin" id="10m3_Puin" value="<?=$data['10m3_Puin']?>"></td>
      <td><input type="number" class="form-control"  name="10m3_Hout" id="10m3_Hout" value="<?=$data['10m3_Hout']?>"></td>      
       <td><input type="number" class="form-control"  name="10m3_Plastic_Folie" id="10m3_Plastic_Folie" value="<?=$data['10m3_Plastic_Folie']?>" ></td>
      <td><input type="number" class="form-control"  name="10m3_Papier" id="10m3_Papier" value="<?=$data['10m3_Papier']?>" ></td>
      <td><input type="number" class="form-control"  name="10m3_Diverse" id="10m3_Diverse" value="<?=$data['10m3_Diverse']?>" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen" id="10m3_Opmerkingen" value="<?=$data['10m3_Opmerkingen']?>" ></td>
      
    </tr>
      <td scope="row"><input  class="form-control"  name="10m3_Bsa_dicht" id="10m3_Bsa_dicht" value="<?=$data['10m3_Bsa_dicht']?>" ></td>
       <td><input type="number" class="form-control"  name="10m3_Puin_dicht" id="10m3_Puin_dicht" value="<?=$data['10m3_Puin_dicht']?>" ></td>
      <td><input type="number" class="form-control"  name="10m3_Hout_dicht" id="10m3_Hout_dicht" value="<?=$data['10m3_Hout_dicht']?>" ></td>     
       <td><input type="number" class="form-control"  name="10m3_Plastic_Folie_dicht" id="10m3_Plastic_Folie_dicht" value="<?=$data['10m3_Plastic_Folie_dicht']?>" ></td>
      <td><input type="number" class="form-control"  name="10m3_Papier_dicht" id="10m3_Papier_dicht" value="<?=$data['10m3_Papier_dicht']?>" ></td>
      <td><input  type="number" class="form-control"  name="10m3_Diverse_dicht" id="10m3_Diverse_dicht" value="<?=$data['10m3_Diverse_dicht']?>" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen_dicht" id="10m3_Opmerkingen_dicht" value="<?=$data['10m3_Opmerkingen_dicht']?>" ></td>
      
    </tr>
    <td scope="row"><input  class="form-control"  name="20m3_Bsa" id="20m3_Bsa" value="<?=$data['20m3_Bsa']?>" ></td>
       <td><input type="number" class="form-control"  name="20m3_Puin" id="20m3_Puin" value="<?=$data['20m3_Puin']?>" ></td>
      <td><input type="number" class="form-control"  name="20m3_Hout" id="20m3_Hout" value="<?=$data['20m3_Hout']?>" ></td>      
       <td><input type="number" class="form-control"  name="20m3_Plastic_Folie" id="20m3_Plastic_Folie" value="<?=$data['20m3_Plastic_Folie']?>" ></td>
      <td><input type="number" class="form-control"  name="20m3_Papier" id="20m3_Papier" value="<?=$data['20m3_Papier']?>" ></td>
      <td><input type="number" class="form-control"  name="20m3_Diverse" id="20m3_Diverse" value="<?=$data['20m3_Diverse']?>" ></td>
      <td><input type="text" class="form-control"  name="20m3_Opmerkingen" id="20m3_Opmerkingen" value="<?=$data['20m3_Opmerkingen']?>" ></td>
      
    </tr>
   <td scope="row"><input  class="form-control"  name="40m3_Bsa" id="40m3_Bsa" value="<?=$data['40m3_Bsa']?>" ></td>
       <td><input type="number" class="form-control"  name="40m3_Puin" id="40m3_Puin" value="<?=$data['40m3_Puin']?>" ></td>
      <td><input type="number" class="form-control"  name="40m3_Hout" id="40m3_Hout" value="<?=$data['40m3_Hout']?>" ></td>      
       <td><input type="number" class="form-control"  name="40m3_Plastic_Folie" id="40m3_Plastic_Folie" value="<?=$data['40m3_Plastic_Folie']?>" ></td>
      <td><input type="number" class="form-control"  name="40m3_Papier" id="40m3_Papier" value="<?=$data['40m3_Papier']?>" ></td>
      <td><input type="number" class="form-control"  name="40m3_Diverse" id="40m3_Diverse" value="<?=$data['40m3_Diverse']?>" ></td>
      <td><input type="text" class="form-control"  name="40m3_Opmerkingen" id="40m3_Opmerkingen" value="<?=$data['40m3_Opmerkingen']?>" ></td>
     
    </tr>
  
  </tbody>
</table>
                
        </div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Terug</button> 
          <button class="btn btn-primary open2" type="button" id="step3">Volgende <span class="fa fa-arrow-right"></span></button>
        </div>
        </div>        
        </fieldset>
        </div>
        
        <div id="sf3" class="frm" style="display: none;">
        <fieldset>
        <legend>Stap 3 of 3</legend>        
       <h2>Bestelling Plaatsen </h2>
       
       	 <div class="col-md-18">
                
                <div class="block">
                    <div class="header" >                    
                       <h5>Bestelformulier Afvalcontainers</h5>                                    
                    </div>
      <table class="table table-bordered" style="text-align:center;">
  <thead>
    <tr style="font-size:14px;">     
      <th class="left" width="15%">Klantnaam:</th>
      <td class="center" width="20%"  ><span id="Customer_Name_view"></span></td>
      <th class="left" width="15%"  >Projectnummer:</th>     
      <td class="center" width="20%"><span id="Projectnummer_view"></span></th> 
       <th class="left" width="15%">Project naam:</th>
      <td class="center" width="20%"  ><span id="project_name_view"><?=$project->Name?></span></td>   
    </tr>
   
     <tr style="font-size:14px;"> 
      <th class="left" width="15%"  >Werkadres:</th>     
      <td class="center" width="20%"><span id="Work_Address_view"></span></th>     
      <th class="left" width="15%">Postcode & plaats:</th>
      <td class="center" width="20%"  ><span id="Postcode_view"></span></td>
      <th class="left" width="15%"  >Contactpersoon:</th>     
      <td class="center" width="20%"><span id="Contact_view"></span></th>    
    </tr>
     <tr style="font-size:14px;">     
      <th class="left" width="15%">Telefoonnummer:</th>
      <td class="center" width="20%"  ><span id="phone_number_view"></span></td>
      <th class="left" width="15%"  >E-mail adres:</th>     
      <td class="center" width="20%"><span id="Email_view"></span></th> 
       <th class="left" width="15%">Fax:</th>
      <td class="center" width="20%"  ><span id="Fax_view"></span></td>   
    </tr>
    <tr style="font-size:14px;">     
     
      <th class="left" width="15%"  >Besteldatum:</th>     
      <td class="center" width="20%"><span id="Order_Date_view"></span></th>
       <th class="left" width="15%">Tijd:</th>
      <td class="center"  ><span id="timepicker1_view"></span></td>
       <th class="left" width="15%">Nummer:</th>
      <td class="center"  ><span id="Nummer_view"></span></td>   
    </tr>
     <tr style="font-size:14px;">   
     <th class="left" width="15%">Gewijzigd Nummer:</th>
      <td class="center"  ><span id="Revised_Nummer_view"></span></td>  
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
                      <table class="table table-bordered" style="text-align:center;">
  <thead>
    <tr style="font-size:14px;">     
      <th class="left" width="15%">Uitvoerdatum:</th>
      <td class="center" width="20%"  ><span id="output_Date_view"></span></td>
      <th class="left" width="15%"  >Dagdeel / gewenste tijd:</th>     
      <td class="center" width="20%"><span id="Half_day_time_view"></span></td>
      </tr>
       <tr>
       <th class="left" width="15%">Opmerkingen:</th>
      <td class="center"  colspan="3"  ><span id="Comments_view"></span></td>   
    </tr>
     </thead>
    </table>   
                    
                    
                </div> 
                    
             </div>  
       
       
       
         <div class="col-md-4">
        
        
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
        
        

        
        </div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-primary back3" type="button"><span class="fa fa-arrow-left"></span> Terug</button> 
         <input class="btn btn-success open3 submit" type="submit" name="Opslaan" value="Opslaan">
          <input class="btn btn-warning open3 modify" type="button" name="Wijzigen" value="Bestelling Wijzigen ">
        <input class="btn btn-danger open3 cancel" type="button" name="Annuleren" value="Bestelling Annuleren">
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
  
   //jQuery().ready(function() {
	  $(document).ready(function(){
	  $('.modify').on('click', function() {		
		$('#status').val('1');	
	});
	
	$('.cancel').on('click', function() {	
		$('#status').val('2');	
	});
	
	$('.open1').on('click', function() {	
		 $(".frm").hide("fast");
        $("#sf2").show("slow");
	});
	
	$('.open2').on('click', function() {	
		 $(".frm").hide("fast");
        $("#sf3").show("slow");
	});
	
	
	$('.back2').on('click', function() {	
		 $(".frm").hide("fast");
      $("#sf1").show("slow");
	});
	
	$('.back3').on('click', function() {	
		 $(".frm").hide("fast");
      $("#sf2").show("slow");
	});  
	
	
	$('.cancel,.modify').on('click', function() {
	$.confirm({
		title: 'Bevestigen!',
		content: 'Weet u zeker dat u wilt Status wijzigen?',
		confirmButton: 'Yes',
		cancelButton: 'No',
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
	
	 /// $('#timepicker1').timepicker();
	  $('.datepicker').datepicker({
				format: 'yyyy-mm-dd'
	 });
	 
	 $('#step3').click(function () {				
		$('#Customer_Name_view').html($('#Customer_Name').val());
		$('#Projectnummer_view').html($('#Projectnummer').val());
		//$('#project_name_view').val(data.Name);
		$('#Work_Address_view').html($('#Work_Address').val());
		$('#Postcode_view').html($('#Postcode').val());		
		$('#Contact_view').html($('#Contact').val());
		$('#phone_number_view').html($('#phone_number').val());
		$('#Email_view').html($('#Email').val());
		$('#Fax_view').html($('#Fax').val());
		$('#Order_Date_view').html($('#Order_Date').val());
		$('#timepicker1_view').html($('#timepicker1').val());
		$('#Nummer_view').html($('#Nummer').val());	
		$('#Revised_Nummer_view').html($('#Revised_Nummer').val());		
		$('#output_Date_view').html($('#output_Date').val());
		$('#Half_day_time_view').html($('#Half_day_time').val());
		$('#Comments_view').html($('#Comments').val());
		// container Order fields
		$('#3m3_plaats_view').html($('#3m3_plaats').val());
		$('#3m3_Wissel_view').html($('#3m3_Wissel').val());
		$('#3m3_Afvoeromments_view').html($('#3m3_Afvoer').val());
		$('#6m3_plaats_view').html($('#6m3_plaats').val());
		$('#6m3_Wissel_view').html($('#6m3_Wissel').val());
		$('#6m3_Afvoer_view').html($('#6m3_Afvoer').val());
		$('#10m3_plaats_view').html($('#10m3_plaats').val());
		$('#10m3_Wissel_view').html($('#10m3_Wissel').val());
		$('#10m3_Afvoer_view').html($('#10m3_Afvoer').val());
		$('#10m3_plaats_dicht_view').html($('#10m3_plaats_dicht').val());
		$('#10m3_Wissel_dicht_view').html($('#10m3_Wissel_dicht').val());
		$('#10m3_Afvoer_dicht_view').html($('#10m3_Afvoer_dicht').val());
		$('#20m3_plaats_view').html($('#20m3_plaats').val());
		$('#20m3_Wissel_view').html($('#20m3_Wissel').val());
		$('#20m3_Afvoer_view').html($('#20m3_Afvoer').val());
		$('#40m3_plaats_view').html($('#40m3_plaats').val());
		$('#40m3_Wissel_view').html($('#40m3_Wissel').val());
		$('#40m3_Afvoer_view').html($('#40m3_Afvoer').val());
		
		
		$('#3m3_Bsa_view').html($('#3m3_Bsa').val());
		$('#3m3_Puin_view').html($('#3m3_Puin').val());
		$('#3m3_Hout_view').html($('#3m3_Hout').val());
		$('#3m3_Diverse_view').html($('#3m3_Diverse').val());
		$('#3m3_Plastic_Folie_view').html($('#3m3_Plastic_Folie').val());
		$('#3m3_Papier_view').html($('#3m3_Papier').val());
		$('#3m3_Opmerkingen_view').html($('#3m3_Opmerkingen').val());
		
		$('#6m3_Bsa_view').html($('#6m3_Bsa').val());
		$('#6m3_Puin_view').html($('#6m3_Puin').val());
		$('#6m3_Hout_view').html($('#6m3_Hout').val());
		$('#6m3_Diverse_view').html($('#6m3_Diverse').val());
		$('#6m3_Plastic_Folie_view').html($('#6m3_Plastic_Folie').val());
		$('#6m3_Papier_view').html($('#6m3_Papier').val());
		$('#6m3_Opmerkingen_view').html($('#6m3_Opmerkingen').val());
		
		$('#10m3_Bsa_view').html($('#10m3_Bsa').val());
		$('#10m3_Puin_view').html($('#10m3_Puin').val());
		$('#10m3_Hout_view').html($('#10m3_Hout').val());
		$('#10m3_Diverse_view').html($('#10m3_Diverse').val());
		$('#10m3_Plastic_Folie_view').html($('#10m3_Plastic_Folie').val());
		$('#10m3_Papier_view').html($('#10m3_Papier').val());
		$('#10m3_Opmerkingen_view').html($('#10m3_Opmerkingen').val());
		
		$('#10m3_Bsa_dicht_view').html($('#10m3_Bsa_dicht').val());
		$('#10m3_Puin_dicht_view').html($('#10m3_Puin_dicht').val());
		$('#10m3_Hout_dicht_view').html($('#10m3_Hout_dicht').val());
		$('#10m3_Diverse_dicht_view').html($('#10m3_Diverse_dicht').val());
		$('#10m3_Plastic_Folie_dicht_view').html($('#10m3_Plastic_Folie_dicht').val());
		$('#10m3_Papier_dicht_view').html($('#10m3_Papier_dicht').val());
		$('#10m3_Opmerkingen_dicht_view').html($('#10m3_Opmerkingen_dicht').val());
		
		$('#20m3_Bsa_view').html($('#20m3_Bsa').val());
		$('#20m3_Puin_view').html($('#20m3_Puin').val());
		$('#20m3_Hout_view').html($('#20m3_Hout').val());
		$('#20m3_Diverse_view').html($('#20m3_Diverse').val());
		$('#20m3_Plastic_Folie_view').html($('#20m3_Plastic_Folie').val());
		$('#20m3_Papier_view').html($('#20m3_Papier').val());
		$('#20m3_Opmerkingen_view').html($('#20m3_Opmerkingen').val());
		
		$('#40m3_Bsa_view').html($('#40m3_Bsa').val());
		$('#40m3_Puin_view').html($('#40m3_Puin').val());
		$('#40m3_Hout_view').html($('#40m3_Hout').val());
		$('#40m3_Diverse_view').html($('#40m3_Diverse').val());
		$('#40m3_Plastic_Folie_view').html($('#40m3_Plastic_Folie').val());
		$('#40m3_Papier_view').html($('#40m3_Papier').val());
		$('#40m3_Opmerkingen_view').html($('#40m3_Opmerkingen').val());
		
		var Half = $('#Half_day_time_view').text();
		if (Half == '1') { $('#Half_day_time_view').html('Zo spoedig mogelijk'); }
		if (Half == '2') { $('#Half_day_time_view').html('Ochtend'); }
		if (Half == '3') { $('#Half_day_time_view').html('Middag'); }
		if (Half == '4') { $('#Half_day_time_view').html('Avond'); }
		if (Half == '5') { $('#Half_day_time_view').html('Zie opmerkingen'); }
		
		
		});
		
    // validate form on keyup and submit
   var v = $("#order").validate({
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
	
 /*  $('.open1').on('click', function() {	
		alert ('asdasd');
      //if (v.form()) {
       
      //}
    });*/

   /* $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });*/
	
	  if (v.form()) {
	 $('.cancel,.modify').click( function() {
	   
		
		
	});  
	}
	
	
  /*  $(".open3").click(function() {
      if (v.form()) {
       // $(".frm").hide("fast");
       // $("#sf4").show("slow");
      }
    });*/
  
    
   /* $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });*/

  });
</script> 

@include('front/footer')