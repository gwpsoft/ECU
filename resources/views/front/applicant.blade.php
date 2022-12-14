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
      {!! Form::open(['url'=> 'submit-applicant', 'id'=>'submit_applicant', 'name'=>'submit_applicant']) !!}
                         
                    
                      <div class="row">
                        <div class="col-lg-14 col-md-12 col-sm-12 col-xs-12 table-responsive">
                <h1 class="mb-30">Sollicitatieformulier</h1>
<table class="table table-bordered">
<tbody>
<tr>
<th scope="row" colspan="4">Personalia:</th>
</tr>
<tr>
<th>Achternaam</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Achternaam" name="Surname" id="Surname"></td>
</tr>
<tr>
<th>Voornaam</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Voornaam" name="FirstName" id="FirstName"></td>
</tr>
<tr>
<th>Adres</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Adres" name="Adress" id="Adresss"></td>
</tr>
<tr>
<th>Postcode</th>
<td><input type="text" class="form-control" placeholder="Postcode" name="Postcode" id="Postcode"></td>
<th>Plaats</th>
<td><input type="text" class="form-control" placeholder="Plaats" name="place" id="place"></td>
</tr>           
             
<tr>
<th>Geboortedatum</th>
<td><input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Birthday" id="Birthday"></td>
<th>BSN nummer</th>
<td><input type="text" class="form-control" placeholder="BSN nummer" name="BSN_nummer" id="BSN_nummer"></td>
</tr>
<tr>
<th>Leeftijd</th>
<td><input type="text" class="form-control" name="Age" placeholder="Leeftijd" id="Age"></td>
<th>Burgerlijke staat</th>
<td>
 <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="Getrouwd" name="Marital_status" checked>
                        <label for="inlineRadio1"> Getrouwd </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio2" value="Ongehuwde" name="Marital_status">
                        <label for="inlineRadio2"> Ongehuwde </label>
                    </div>
</td>
</tr>         
<tr>
<th>Nationaliteit</th>
<td><input type="text" class="form-control" placeholder="Nationaliteit" name="Nationality" id="Nationaliteit"></td>
<th>Ziekenfonds</th>
<td><input type="text" class="form-control" placeholder="Ziekenfonds" name="Health_insurance" id="Ziektekostenverzekering"></td>
</tr>
<tr>
<th>Bankrekeningnummer</th>
<td><input type="text" class="form-control" placeholder="Bankrekeningnummer" name="Bank_Ac_Number" id="Bank_Ac_Number"></td>
<th>Ziekenfondsnummer</th>
<td><input type="text" class="form-control" placeholder="Ziekenfondsnummer" name="Health_insurance_number" id="Ziektekostenverzekering_nummer"></td>
</tr>  
<tr>
<th>Telefoonnr. (Mobiel)</th>
<td><input type="text" class="form-control" placeholder="Telefoonnr. (Mobiel)" name="Mobiel_no" id="Mobiel_telefoonnummer"></td>
<th>Telefoonnr (thuis)</th>
<td><input type="text" class="form-control" placeholder="Telefoonnr (thuis)" name="phone" id="Telefoonnummer_home"></td>
</tr>
<tr>
<th>Beschikbaar per</th>
<td><input type="text" class="form-control" placeholder="Beschikbaar per" name="available_at" id="Verkrijgbaar_bij"></td>
<th>Beheersing Nederlandse taal</th>
<td>
 <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio3" value="Ja" name="Dutch_proficiency" checked>
                        <label for="inlineRadio3"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio4" value="Nee" name="Dutch_proficiency" checked>
                        <label for="inlineRadio4"> Nee </label>
                    </div>
</td>
</tr> 
<tr>
<th>VCA-diploma</th>
<td >
 <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio5" value="Ja" name="VCA_certificate" checked>
                        <label for="inlineRadio5"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio6" value="Nee" name="VCA_certificate" checked>
                        <label for="inlineRadio6"> Nee </label>
                    </div>
</td>
<th>Bereidheid tot halen</th>
<td> <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio7" value="Ja" name="Willingness_to_achieve" checked>
                        <label for="inlineRadio7"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio8" value="Nee" name="Willingness_to_achieve" checked>
                        <label for="inlineRadio8"> Nee </label>
                    </div>
    </td>
</tr>    
<tr>
<th>Binnen 3 maanden?</th>
<td><div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio9" value="Ja" name="Within_3_months" checked>
                        <label for="inlineRadio9"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio10" value="Nee" name="Within_3_months" checked>
                        <label for="inlineRadio10"> Nee </label>
                    </div></td>
<th>Op eigen kosten? </th>
<td><div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio11" value="Ja" name="own_expense" checked>
                        <label for="inlineRadio11"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio12" value="Nee" name="own_expense" checked>
                        <label for="inlineRadio12"> Nee </label>
                    </div></td>
</tr>
<tr>
<th>Rijbewijs</th>
<td><div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio13" value="Ja" name="License" checked>
                        <label for="inlineRadio13"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio14" value="Nee" name="License" checked>
                        <label for="inlineRadio14"> Nee </label>
                    </div></th>
<th>Eigen auto?</th>
<td><div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio15" value="Ja" name="Own_car" checked>
                        <label for="inlineRadio15"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio16" value="Nee" name="Own_car" checked>
                        <label for="inlineRadio16"> Nee </label>
                    </div></th>
</tr> 

</tbody>
</table>
<table class="table table-bordered">
<tbody>
<tr>
<th scope="row" colspan="4">Opleidingen en diploma’s :</th>
</tr>
<tr>
<th scope="row" style="width:15px;">1</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Opleiding en kwalificaties 1" name="Training_and_qualifications_1" id="Opleiding_en_kwalificaties_1"></th>
</tr>
<tr>
<th scope="row">2</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Opleiding en kwalificaties 2" name="Training_and_qualifications_2" id="Opleiding_en_kwalificaties_2"></th>
</tr>
<tr>
<th scope="row">3</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Opleiding en kwalificaties 3" name="Training_and_qualifications_3" id="Opleiding_en_kwalificaties_3"></th>
</tr>
<tr>
<th scope="row" colspan="4">Werkervaring:</th>
</tr>
<tr>
<th scope="row">1</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Werkervaring 1" name="Work_experience_1" id="Werkervaring_1"></th>
</tr>
<tr>
<th scope="row">2</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Werkervaring 2" name="Work_experience_2" id="Werkervaring_2"></th>
</tr>
<tr>
<th scope="row">3</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Werkervaring 3" name="Work_experience_3" id="Werkervaring_3"></th>
</tr>         
<tr>
<th scope="row">4</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Werkervaring 4" name="Work_experience_4" id="Werkervaring_4"></th>
</tr>

</tbody>
</table>
<table class="table table-bordered">
<tbody>
<tr>
<th scope="row" colspan="8">Ervaring met werkzaamheden:</th>
</tr>
<tr>
<td>Beton afwerken</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox1" type="checkbox" checked="" value="Yes" name="Concrete_finishing">
                        <label for="checkbox1" style="vertical-align:top;"> </label> </div></td>
<td>Bouwtekening lezen</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox2" type="checkbox" checked="" value="Yes" name="Construction_Drawing_Reading">
                        <label for="checkbox2" style="vertical-align:top;"> </label> </div></td>
<td>Hekken plaatsen </td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox3" type="checkbox" checked="" value="Yes" name="Gates_Places">
                        <label for="checkbox3" style="vertical-align:top;"> </label> </div></td>

<td>Sloop werkzaamheden</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox4" type="checkbox" checked="" value="Yes" name="demolition_work">
                        <label for="checkbox4" style="vertical-align:top;" > </label> </div></td>
</tr>
<tr>
<td>Beton bekistingen</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox5" type="checkbox" checked="" value="Yes" name="Concrete_Formwork">
                        <label for="checkbox5" style="vertical-align:top;"> </label> </div></td>
<td>Gebruik van machines</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox6" type="checkbox" checked="" value="Yes" name="Use_of_machines">
                        <label for="checkbox6" style="vertical-align:top;" > </label> </div></td>

<td>Isoleren</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox7" type="checkbox" checked="" value="Yes" name="Isolate">
                        <label for="checkbox7" style="vertical-align:top;"> </label> </div></td>
<td>Steigers bouwen</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox8" type="checkbox" checked="" value="Yes" name="building_Scaffolding">
                        <label for="checkbox8" style="vertical-align:top;"> </label> </div></td>
</tr>
<tr>
<td>Bouw opleveringen</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox9" type="checkbox" checked="" value="Yes" name="Building_Deliveries">
                        <label for="checkbox9" style="vertical-align:top;"> </label> </div></td>

<td>Glasbewassing</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox10" type="checkbox" checked="" value="Yes" name="Glasbewassing">
                        <label for="checkbox10" style="vertical-align:top;"> </label> </div></td>

<td>Leiding geven</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox11" type="checkbox" checked="" value="Yes" name="To_lead">
                        <label for="checkbox11" style="vertical-align:top;"> </label> </div></td>
<td>Stut en stempel werk</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox12" type="checkbox" checked="" value="Yes" name="Strut_and_stamping">
                        <label for="checkbox12" style="vertical-align:top;"> </label> </div></td>
</tr>
<tr>
<td>Bouw opruimen</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox13" type="checkbox" checked="" value="Yes" name="Building_Cleaner">
                        <label for="checkbox13" style="vertical-align:top;"> </label> </div></td>
<td>Grondwerk</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox14" type="checkbox" checked="" value="Yes" name="Earth_work">
                        <label for="checkbox14" style="vertical-align:top;"> </label> </div></td>

<td>Licht timmerwerk</td>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox15" type="checkbox" checked="" value="Yes" name="Lich_carpentry">
                        <label for="checkbox15" style="vertical-align:top;"> </label> </div></td>


<td>Overige werkzaamheden</td>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox16" type="checkbox" checked="" value="Yes" name="Other_activities">
                        <label for="checkbox16" style="vertical-align:top"> </label>
                    </div>
                    
                    </td>
</tr>


</tbody>
</table>
<table class="table table-bordered">
<tbody>
<tr>
<th  class="col-md-2">Z Z P</th>
<td  class="col-md-10">
<div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio17" value="Ja" name="zzp" checked>
                        <label for="inlineRadio17"> Ja </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio18" value="Nee" name="zzp">
                        <label for="inlineRadio18"> Nee </label>
                    </div>
</td>
</tr>
<tr>
<th class="col-md-2">Tarief</th>
<td class="col-md-10"><input type="text" class="form-control" placeholder="Tarief" name="tarief" id="tarief"></td>
</tr>
<tr>
<th class="col-md-2">In bezit van</th>
<td class="col-md-10">
<div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio19" value="Geldige VAR" name="possession" checked>
                        <label for="inlineRadio19"> Geldige VAR </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio20" value="KvK" name="possession" >
                        <label for="inlineRadio20"> KvK </label>
                    </div>
                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio21" value="VCA" name="possession" >
                        <label for="inlineRadio21"> VCA </label>
                    </div>
                    
                     <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio22" value="Nee" name="possession" >
                        <label for="inlineRadio22"> Nee </label>
                    </div>

</td>
</tr>
</tbody>
</table>
<table class="table table-bordered">
<tbody>
<tr>
<th  class="col-md-2">Datum gesprek</th>
<td  class="col-md-4"><input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Date_Interview" id="Date_Interview"></th>
<th  class="col-md-2">Betreft vacature</th>
<td  class="col-md-4"><input type="text" class="form-control" placeholder="Onderwerp Vacature" name="subject_Job" id="subject_Job"></th>
</tr>
<tr>
<th  class="col-md-2">Uitzendbureau</th>
<td class="col-md-10" colspan="3">
<select name="employment_agency" class="form-control">
<?php foreach ($data as $agency) {?>
<option value="<?=$agency->id?>"><?=$agency->Name?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<th class="col-md-2">Onze Kenmerk</th>
<td  class="col-md-10" colspan="3"><input type="text" class="form-control" placeholder="Onze Feature" name="our_Feature" id="our_Feature"></th>
</tr>
<tr>
<th class="col-md-2">Startdatum</th>
<td  class="col-md-4"><input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Starting_date" id="Starting_date"></th>
<th class="col-md-2">Earste project</th>
<td  class="col-md-4"><input type="text" class=" form-control" placeholder="Eerste project" name="first_project" id="first_project"></th>
</tr>
</tbody>
</table>

<h2><u>Werknemersversverklaring</u></h2><br />

<table class="table table-bordered">
<tbody>
<tr>
<th  class="col-md-2">Voornaam</th>
<td colspan="2"><input type="text" class="form-control" placeholder="Voornaam" name="Emp_FirstName" id="Voornaam"></td>
</tr>
<tr>
<th  class="col-md-2">Achternaam</th>
<td colspan="2"><input type="text" class="form-control" placeholder="Achternaam" name="Emp_Surname" id="Achternaam"></td>
</tr>
<tr>
<th>Nationaliteit</th>
<td colspan="3"><input type="text" class="form-control" placeholder="Nationaliteit" name="Emp_Nationality" id="Nationaliteit"></td>
</tr>

</tbody>
</table>
 


<h2><u>Uw gegevens</u></h2><br />
<p>Heeft uw werkgever of uitkeringsinstantie uw gegevens al ingevuld? Controleer ze dan en verbeter als ze fout zijn.</p>
<table class="table table-bordered">
<tbody>
<tr>
<th  class="col-md-4">1a Naam en voorletter(s)</th>
<td colspan="2"><input type="text" class="form-control" placeholder="1a Naam en voorletter(s)" name="Emp_Name_and_initial" id="Name_and_initial"></td>
</tr>
<tr>
<th>1b Burgerservicenummer (BSN)</th>
<td colspan="3"><input type="text" class="form-control" placeholder="1b Burgerservicenummer (BSN)" name="Emp_Deposit_Plaintiff_Vice_number" id="Borgeiservicenumrne"></td>
</tr>


<tr>
<th  class="col-md-2">1c Straat en huisnummer</th>
<td colspan="2"><input type="text" class="form-control" placeholder="1c Straat en huisnummer" name="Emp_Street_Address" id="Street_Address"></td>
</tr>

<tr>
<th  class="col-md-2">1d Postcode en woonplaats</th>
<td><input type="text" class="form-control" placeholder="Postcode" name="Emp_Postcode" id="Emp_Postcode"></td>
<td><input type="text" class="form-control" placeholder="woonplaats" name="Emp_residence" id="woonplaats"></td>
</tr>

<tr>
<th  class="col-md-2">1e Land en regio Alleen invullen als u in het buitenland woont 
</th>
<td colspan="2"><input type="text" class="form-control" placeholder="Land en regio Alleen invullen als u in het buitenland woont" name="Emp_Country_and_region" id="Country_and_region"></td>
</tr>

<tr>
<th  class="col-md-2">1f Geboortedatum  </th>
<td colspan="2"><input type="text" class="datepicker form-control" placeholder="Geboortedatum" name="Emp_Birthday" id="Geboortedatum"></td>
</tr>

<tr>
<th  class="col-md-2">1g Telefoonnummer</th>
<td colspan="2"><input type="text" class="form-control" placeholder="Telefoonnummer" name="Emp_telephone" id="Telefoonnummer"></td>
</tr>

</tbody></table>

<h2><u>Loonheffingskorting toepassen</u></h2><br />


<table class="table table-bordered">
<tbody>

 <tr>
            <th rowspan="2" class="col-md-6">Wilt u dat uw werkgever of uitkeringsinstantie rekening houdt met de loonheffingskorting? U kunt de loonheffingskorting maar door 1 werkgever of uitkeringsinstantie tegelijkertijd laten toepassen. Zie ook de toelichting onderaan.</th>
             <td align="center">
               <div class="checkbox checkbox-primary">
                        <input id="checkbox17" type="checkbox" checked="" name="account_the_payroll_ja_tax" value="Yes">
                        <label for="checkbox17"> Ja, Vanaf </label>
                    </div>
            </td>
            <td align="center"><input type="text" class="datepicker form-control" name="account_the_payroll_tax_ja_date" id="Achternaam" placeholder="<?=date('Y-m-d')?>"></td>
          
        </tr>
        <tr>
            <td align="center">
            <div class="checkbox checkbox-primary">
                        <input id="checkbox18" type="checkbox" checked="" name="account_the_payroll_nee_tax" value="No">
                        <label for="checkbox18"> Nee, Vanaf </label>
                    </div>
            
          </td>
            <td align="center"><input type="text" class="datepicker form-control" name="account_the_payroll_tax_nee_date" id="Achternaam" placeholder="<?=date('Y-m-d')?>"></td>
           
        </tr>

</tbody>
</table>
              </div>    
                         <div class="form-group">
        <div class="col-md-12" align="right">
       
         <input class="btn btn-primary open3" type="submit" name="submit" value="Opslaan">
        </div>
        </div>          
                        </div>
                   
                    </div>
                    <!-- ./page content holder -->
                </div>
<script type="text/javascript">
  
  jQuery().ready(function() {
$('.datepicker').datepicker({
				format: 'yyyy-mm-dd'
			});
			
	$('#BSN_nummer').keyup(function () {
         $('#Borgeiservicenumrne').val($(this).val());
     });
	 $('#Postcode').keyup(function () {
         $('#Emp_Postcode').val($(this).val());
     });
	 $('#place').keyup(function () {
         $('#woonplaats').val($(this).val());
     });
	 $('#FirstName').keyup(function () {
         $('#Name_and_initial').val($(this).val());
     });
	  $('#Adresss').keyup(function () {
         $('#Street_Address').val($(this).val());
     });
	 $('#Telefoonnummer_home').keyup(function () {
         $('#Telefoonnummer').val($(this).val());
     });		
			
    // validate form on keyup and submit
   var v = jQuery("#submit_applicant").validate({
      rules: {
        Surname: {
          required: true,
          minlength: 1
        },
		FirstName: {
          required: true,
          minlength: 2
        },
        Adresss: {
          required: true,
          minlength: 10,
        },
        Postcode: {
          required: true,
          minlength: 3,
        },
         place: {
          required: true,
          minlength: 6,
         
        },
        Birthday: {
          required: true,
          minlength: 2,
          maxlength: 10
        },
        Age: {
          required: true,
          minlength: 2,
        },
        Nationality: {
          required: true,
          minlength: 2,         
        },
        Mobiel_no: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
         phone: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        available_at: {
          required: true,
          minlength: 1         
        },
        Emp_FirstName: {
          required: true,
          minlength: 1
        },
        Emp_Surname: {
          required: true,
          minlength: 1
        },
        Emp_Nationality: {
          required: true,
          minlength: 2,         
          maxlength: 100
        },
        Emp_Name_and_initial: {
          required: true,
          minlength: 4,
          maxlength: 10
        },
        Emp_Deposit_Plaintiff_Vice_number: {
          required: true,
          minlength: 6
        },
        Emp_Street_Address: {
          required: true,
          minlength: 1
        },
		Emp_Postcode: {
          required: true,
          minlength: 1
        },
        Emp_residence: {
          required: true,
          minlength: 2,
          maxlength: 20,
        },
         Emp_Birthday: {
          required: true,
          minlength: 2,
          maxlength: 15,
        },
        Emp_telephone: {
          required: true,
          minlength: 6         
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

  });
</script> 
@include('front/footer')