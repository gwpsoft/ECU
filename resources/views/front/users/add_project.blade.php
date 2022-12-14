 @include('front/header')
 <title>Easy Clean Up | Add new Project</title>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>
 <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />  
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>  
  <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>
<style>
   .form-row {
    float: left;
    line-height: 30px;
    margin-bottom: 10px;
    width: 100%;
}
.help-inline-error { color:#800000	;}
.checkbox {
  padding-left: 20px; }
  .checkbox label {
    display: inline-block;
    position: relative;
    padding-left: 5px; }
    .checkbox label::before {
      content: "";
      display: inline-block;
      position: absolute;
      width: 17px;
      height: 17px;
      left: 0; 
      margin-left: -20px;
      border: 1px solid #cccccc;
      border-radius: 3px;
      background-color: #fff;
      -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
    .checkbox label::after {
      display: inline-block;
      position: absolute;
      width: 16px;
      height: 16px;
      left: 0;
      top: 0;
      margin-left: -21px;
      padding-left: 3px;
      padding-top: 1px;
      font-size: 11px;
      color: #555555; }
  .checkbox input[type="checkbox"] {
    opacity: 0; }
    .checkbox input[type="checkbox"]:focus + label::before {
      outline: thin dotted;
      outline: 5px auto -webkit-focus-ring-color;
      outline-offset: -2px; }
    .checkbox input[type="checkbox"]:checked + label::after {
      font-family: 'FontAwesome';
      content: "\f00c"; }
    .checkbox input[type="checkbox"]:disabled + label {
      opacity: 0.65; }
      .checkbox input[type="checkbox"]:disabled + label::before {
        background-color: #eeeeee;
        cursor: not-allowed; }
  .checkbox.checkbox-circle label::before {
    border-radius: 50%; }
  .checkbox.checkbox-inline {
    margin-top: 0; }

.checkbox-primary input[type="checkbox"]:checked + label::before {
  background-color: #428bca;
  border-color: #428bca; }
.checkbox-primary input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-danger input[type="checkbox"]:checked + label::before {
  background-color: #d9534f;
  border-color: #d9534f; }
.checkbox-danger input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-info input[type="checkbox"]:checked + label::before {
  background-color: #5bc0de;
  border-color: #5bc0de; }
.checkbox-info input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-warning input[type="checkbox"]:checked + label::before {
  background-color: #f0ad4e;
  border-color: #f0ad4e; }
.checkbox-warning input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-success input[type="checkbox"]:checked + label::before {
  background-color: #5cb85c;
  border-color: #5cb85c; }
.checkbox-success input[type="checkbox"]:checked + label::after {
  color: #fff; }

.radio {
  padding-left: 20px; }
  .radio label {
    display: inline-block;
    position: relative;
    padding-left: 5px; }
    .radio label::before {
      content: "";
      display: inline-block;
      position: absolute;
      width: 17px;
      height: 17px;
      left: 0;
      margin-left: -20px;
      border: 1px solid #cccccc;
      border-radius: 50%;
      background-color: #fff;
      -webkit-transition: border 0.15s ease-in-out;
      -o-transition: border 0.15s ease-in-out;
      transition: border 0.15s ease-in-out; }
    .radio label::after {
      display: inline-block;
      position: absolute;
      content: " ";
      width: 11px;
      height: 11px;
      left: 3px;
      top: 3px;
      margin-left: -20px;
      border-radius: 50%;
      background-color: #555555;
      -webkit-transform: scale(0, 0);
      -ms-transform: scale(0, 0);
      -o-transform: scale(0, 0);
      transform: scale(0, 0);
      -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
      -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
      -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
      transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33); }
  .radio input[type="radio"] {
    opacity: 0; }
    .radio input[type="radio"]:focus + label::before {
      outline: thin dotted;
      outline: 5px auto -webkit-focus-ring-color;
      outline-offset: -2px; }
    .radio input[type="radio"]:checked + label::after {
      -webkit-transform: scale(1, 1);
      -ms-transform: scale(1, 1);
      -o-transform: scale(1, 1);
      transform: scale(1, 1); }
    .radio input[type="radio"]:disabled + label {
      opacity: 0.65; }
      .radio input[type="radio"]:disabled + label::before {
        cursor: not-allowed; }
  .radio.radio-inline {
    margin-top: 0; }

.radio-primary input[type="radio"] + label::after {
  background-color: #428bca; }
.radio-primary input[type="radio"]:checked + label::before {
  border-color: #428bca; }
.radio-primary input[type="radio"]:checked + label::after {
  background-color: #428bca; }

.radio-danger input[type="radio"] + label::after {
  background-color: #d9534f; }
.radio-danger input[type="radio"]:checked + label::before {
  border-color: #d9534f; }
.radio-danger input[type="radio"]:checked + label::after {
  background-color: #d9534f; }

.radio-info input[type="radio"] + label::after {
  background-color: #5bc0de; }
.radio-info input[type="radio"]:checked + label::before {
  border-color: #5bc0de; }
.radio-info input[type="radio"]:checked + label::after {
  background-color: #5bc0de; }

.radio-warning input[type="radio"] + label::after {
  background-color: #f0ad4e; }
.radio-warning input[type="radio"]:checked + label::before {
  border-color: #f0ad4e; }
.radio-warning input[type="radio"]:checked + label::after {
  background-color: #f0ad4e; }

.radio-success input[type="radio"] + label::after {
  background-color: #5cb85c; }
.radio-success input[type="radio"]:checked + label::before {
  border-color: #5cb85c; }
.radio-success input[type="radio"]:checked + label::after {
  background-color: #5cb85c; }
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td { vertical-align:middle; }

/*.checkbox {
    display: block;
    margin-bottom: 0px;
    margin-top: 0px;
    min-height: 20px;
    position: relative;
}*/
   </style>
    <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Add New Project</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>
                                <li><a href="<?php echo URL:: to( 'projects' );?>">Projects</a></li>
                                <li class="active"><a href="<?php echo URL:: to( 'AddProject' );?>">Add New Project</a></li>
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
                    
                    
            <div class="col-md-18">
            @if (Session::has('message'))
            <div class="alert alert-success">
            <b>Success!</b> {{Session::get('message')}}
            <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
   @endif
   
       {!! Form::open(['url'=> 'AddProjectStore', 'id'=>'basicform', 'name'=>'basicform']) !!}
       
        <div id="sf1" class="frm">
        <fieldset>
        <legend>Stap 1 of 2</legend>
        <div class="col-md-18">        
        <h4>Project gegevens:</h4>
        </div>
        
         <div class="col-md-4">
        <div class="form-group"><label>Afdeling:</label><span class="text-hightlight">*</span>
             
            <select class="form-control" name="department_id">
            <option value="">Select Afdeling</option>
            @foreach ($departments as $department)
            <option value="{!! $department->id!!}">{!! $department->Name!!}</option> 
            @endforeach                                   
            </select>
        </div></div>
        
         <div class="col-md-4">
        <div class="form-group"><label>Actief:</label><span class="text-hightlight">*</span>
        
         
           <div class="checkbox checkbox-primary">
                        <input id="checkbox18" type="checkbox" checked="" name="account_the_payroll_nee_tax" value="No">
                        <label for="checkbox18">&nbsp; </label>
                    </div>
          
           </div></div>
           
        <div class="col-md-4">
        <div class="form-group"><label>Start datum:</label><span class="text-hightlight">*</span>       
      
        <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="start_date" id="start_date">
        </div>
        </div> 
     
 		<div class="col-md-4">
        <div class="form-group"><label>Eind datum:</label><span class="text-hightlight">*</span>       
      
        <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="end_date" id="end_date">
      </div> 
        </div>
        

		 <div class="col-md-4">
        <div class="form-group"><label>Beschrijving</label><span class="text-hightlight">*</span>        
       
         <input type="text" class="form-control" placeholder="Beschrijving" name="description" id="Beschrijving">
        </div>
        </div>
        
           <div class="col-md-4">
        <div class="form-group">
        <label>Containers Leveranciers</label><span class="text-hightlight">*</span>
         <select class="form-control" name="Shippingcompany_id">
                                    <option value="">Select Containers Leverancier</option>
                                      @foreach ($Shippingcompany as $Company)
                                      <option value="{!! $Company->id!!}">{!! $Company->Companyname !!}</option> 
                                    @endforeach                                      
                                </select>
       
        </div>
        </div>
        
             
        <div class="block">
                    <div class="header" >                    
                       <h2>Bestelformulier Afvalcontainers</h2>                                    
                    </div>
      
        
         <div class="col-md-4">
        <div class="form-group">
        <label>Fax</label>
        <input type="text" class="form-control" id="keetonderhoud" name="keetonderhoud"/>
        </div>
        </div>
        
         <div class="col-md-4">
        <div class="form-group">
        <label>Adres</label>
        <input type="text" class="form-control" id="specialistisch" name="specialistisch"/>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Postcode</label>
        <input type="text" class="form-control" id="opleveringsschoonmaak" name="opleveringsschoonmaak"/>
        </div>
        </div>
        
        <div class="col-md-4">
        <div class="form-group">
        <label>Stad</label>
        <input type="text" class="form-control" id="sloopweak" name="sloopweak"/>
        </div>
        </div>
        
        
        
       
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-primary open1" type="button">Volgende <span class="fa fa-arrow-right"></span></button> 
        </div>
        </div>        
        </fieldset>
        </div>

     

        <div id="sf2" class="frm" style="display: none;">
        <fieldset>
        <legend>Stap 2 of 2</legend>
        <div class="col-md-12">        
        <h4>Contact Informatie:</h4>
        </div>
        
        <div class="col-md-4">
        <div class="form-group">
        <label>Fax</label>
        <input type="text" class="form-control" id="keetonderhoud" name="keetonderhoud"/>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Adres</label>
        <input type="text" class="form-control" id="specialistisch" name="specialistisch"/>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Postcode</label>
        <input type="text" class="form-control" id="opleveringsschoonmaak" name="opleveringsschoonmaak"/>
        </div>
        </div>
        
        <div class="col-md-4">
        <div class="form-group">
        <label>Stad</label>
        <input type="text" class="form-control" id="sloopweak" name="sloopweak"/>
        </div>
        </div>
         <div class="col-md-12">        
        <h4>Contact Informatie:</h4>
        </div>
        
        
        <div class="col-md-4">
        <div class="form-group">
        <label>Bewaking van uw bouwplaats</label>
        <input type="text" class="form-control" id="bouwplaats" name="bouwplaats"/>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Containerservice</label>
        <input type="text" class="form-control" id="containerservice" name="containerservice"/>
        </div>
        </div>
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Terug</button> 
        <input class="btn btn-primary" type="submit" name="submit" value="Opslaan">
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
  $('#timepicker1').timepicker();
$('.datepicker').datepicker({
				format: 'yyyy-mm-dd'
			})
    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
		last_name: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        email: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        phone: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        comments: {
          required: true,
          minlength: 6,
         
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