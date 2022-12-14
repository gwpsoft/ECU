@include('front/header')
 <title>Easy Clean Up | Aanvrager</title>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>        
 <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" />  
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>          
   <style>
   .form-row {
    float: left;
    line-height: 30px;
    margin-bottom: 10px;
    width: 100%;
}
   
   </style>       
          
            <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Aanvrager</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li ><a href="<?php echo URL:: to( '/' );?>">Home</a></li>
                                <li class="active"><a href="<?php echo URL:: to( 'applicant' );?>">Aanvrager</a></li>
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
                    
                    
                     <div class="col-md-10">
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
      {!! Form::open(['url'=> 'submit-applicant', 'id'=>'submit_applicant', 'name'=>'submit_applicant']) !!}
       
        <div id="sf1" class="frm">
        <fieldset>
        <legend>Stap 1 of 2</legend>
        <div class="col-md-12">
                
                <div class="block">
                    <div class="header" >                    
                       <h2>Personal Data</h2>                                    
                    </div>
                 
                        <div class="form-row">
                          <div class="col-md-2"> <label>Aanhef:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            	<select class="form-control" name="Gender" id="Gender">
                                <option value="">Select Salutation</option>
                                <option value="1">Mr.</option>
                                <option value="2">Mrs.</option>                                   
                                </select>
                            </div>
                            
                               <div class="col-md-2"><label>Initialen:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Initialen" name="initials" id="initials">
                            </div>                            
                          </div>
                        
                        <div class="form-row">
                            <div class="col-md-2"><label>Voornaam:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Voornaam" name="Firstname" id="Firstname">
                                  
                            </div>
                        
                        
                          <div class="col-md-2"><label>Achternaam:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Achternaam" name="Lastname" id="Lastname">
                            </div>
                        </div>
                        
                      
                        <div class="form-row">
                            <div class="col-md-2"><label>Geboortedatum:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4"> 
                                                   
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Birthday" id="Birthday">
                              
                               
                        </div>
                        
                        
                         <div class="col-md-2"><label>Sofinummer:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Sofinummer" name="Sofinumber" id="Sofinumber">
                            </div>
                        
                        
                        </div>
                      
                        
                        <div class="form-row">
                            <div class="col-md-2"><label>Datum in dienst:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4"> 
                            
                        <input type="text" class="datepicker form-control" name="Startdate" placeholder="<?=date('Y-m-d')?>" id="Startdate">
                           
                        </div>
                        </div>
                </div> 
                    
             </div>       
                    
         <div class="col-md-12">
                
                <div class="block">
                    <div class="header" >
                       <h2>Contact Informatie</h2>                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-2"><label>Telefoon:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Telefoon" name="Phone" id="Phone">
                            </div>
                            
                               <div class="col-md-2"><label>Mobiel:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Mobiel" name="Mobile" id="Mobile">
                            </div>  
                                                       
                        </div>
                       
                         <div class="form-row">
                            <div class="col-md-2"><label>Mobiel 2:</label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Mobiel 2" name="Mobile2" id="Mobile2">
                            </div>
                            
                               <div class="col-md-2"><label>Mobiel 3:</label></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Mobiel 3" name="Mobile3" value="Mobile3">
                            </div>                              
                        </div> 
                        
                        
                      
                        <div class="form-row">
                            <div class="col-md-2"><label>Email:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Email" name="Email" id="Email">
                            </div>                           
                        </div>
                                                
                    </div>
                </div> 
                    
             </div>           
                    
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button> 
        </div>
        </div>        
        </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
        <fieldset>
        <legend>Stap 2 of 2</legend>        
       
         <div class="col-md-12">
        
        <div class="block">
                    <div class="header" >
                    <div class="col-md-6">
                       <h2>ID Information</h2>
                    </div>                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-2"><label>Id Type:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<select class="form-control" name="Id_Type" id="Id_Type">
                                    <option value="">Select Type</option>
                                    <option value="passport">Passport</option>
                                    <option value="idcard">ID</option>
                                    <option value="other">Otherwise</option>                                     
                                </select>
                            </div>
                            
                               <div class="col-md-2"><label>Id Nummer:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Id Nummer" name="Id_Number" id="Id_Number">
                            </div>                          
                            
                        </div>
                  
                         <div class="form-row">
                            <div class="col-md-2"><label>Verloopdatum:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Verloopdatum" name="Id_Expirationdate" id="Id_Expirationdate">
                            </div>                           
                        </div>                                        
                    </div>
               
                
                
                
                 <div class="header" >
                    <div class="col-md-6">
                       <h2>Adres gegevens</h2>
                    </div>
                   
                    </div>
                <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-2"><label>Adres:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Adres" name="Address" id="Address">
                            </div>
                              <div class="col-md-2"><label>Postcode:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Postcode" name="Zipcode" id="Zipcode">
                            </div>                          
                                                       
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-2"><label>Stad:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Stad" name="City" id="City">
                            </div>                           
                        </div>                          
                    </div>
                
              </div> 
            
            
             <div class="col-md-12">    
             <div class="block">
                    <div class="header" >
                     <div class="col-md-6">
                       <h2>Extra gegevens</h2>
                   </div>
                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-2"><label>Actief:</label><span class="text-hightlight">*</span></div>
                           <div class="col-md-4"><input type="checkbox" checked="checked" value="1" name="Active" id="Active"></div> 
                                                        
                           <div class="col-md-2"><label>Uitzendbureau:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4"> 
                                <select class="form-control" name="Employmentagency_Id" id="Employmentagency_Id">
                                <option value="">Select Uitzendbureau</option>
                                @foreach ($data as $agency)
                                <option value="{!! $agency->id!!}">{!! $agency->Name!!}</option> 
                                @endforeach                             
                                </select>
                                
                            </div>                                           
                            </div>                          
                        </div>
                     
                        
                        
                        <div class="form-row">
                            <div class="col-md-2"><label>Tarief p/u:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Tarief p/u" name="Rate" id="Rate">€ 0.00
                            </div>
                         
                             
                           
                              <div class="col-md-2"><label>Kosten p/u:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4"> 
                            		<input type="text" class="form-control" placeholder="Kosten p/u" name="Cost" id="Cost"> € 0.00
                             </div>
                                    
                                    
                                                           
                        </div>
                        
                       <div class="form-row">
                            <div class="col-md-2"><label>Uitzendbureau notitie:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Uitzendbureau notitie" name="Employmentagencynote" id="Employmentagencynote">
                            </div>                           
                        </div>   
                                             
                        
                        <div class="form-row">
                            <div class="col-md-2"><label>Afspraken:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-7"> 
                            		<textarea class="form-control" name="Notes" placeholder="Afspraken" id="Notes"></textarea>
                            </div>                           
                        </div>
                                             
                    </div>
                </div>   
        
        </div>
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
         <input class="btn btn-primary open3" type="submit" name="submit" value="Submit">
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
$('.datepicker').datepicker({
				format: 'yyyy-mm-dd'
			})
    // validate form on keyup and submit
    var v = jQuery("#submit_applicant").validate({
      rules: {
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

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
    
   
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

  });
</script> 
@include('front/footer')