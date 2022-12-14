 @include('front/header')
 <title>Easy Clean Up | Get a Quote</title>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>
<style>
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
  </style>



    <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Home</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li class="active"><a href="<?php echo URL:: to( '/' );?>">Home</a></li>
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
       {!! Form::open(['url'=> 'quote', 'id'=>'basicform', 'name'=>'basicform']) !!}
       
        <div id="sf1" class="frm">
        <fieldset>
        <legend>Stap 1 of 3</legend>
        <div class="col-md-12">        
        <h4>Personal Information</h4>
        </div>
        
        <div class="col-md-6">
        <div class="form-group">
        <label>First Name <span class="text-hightlight">*</span></label>
        <input type="text" class="form-control" id="first_name" name="first_name"/>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label>Last Name <span class="text-hightlight">*</span></label>
        <input type="text" class="form-control" id="last_name" name="last_name"/>
        </div>
        </div>
        
        
        <div class="col-md-12">
        <div class="form-group">
        <label>Password <span class="text-hightlight">*</span></label>
        <input type="password" class="form-control" id="last_name" name="password"/>
        </div>
        </div>
        
        
        
        <div class="col-md-6">
        <div class="form-group">
        <label>E-Mail <span class="text-hightlight">*</span></label>
        <input type="text" class="form-control" id="email" name="email"/>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label>Phone No. <span class="text-hightlight">*</span></label>
        <input type="text" class="form-control" id="phone" name="phone"/>
        </div>
        </div>
        <div class="col-md-12">
        <div class="form-group">
        <label>Comments <span class="text-hightlight">*</span></label>
        <textarea class="form-control" rows="8" id="comments" name="comments"></textarea>
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
        <legend>Stap 2 of 3</legend>        
        <div class="col-md-12">        
        <h4>Geïnteresseerd in de inzet van . . . . </h4>
        </div>
        <table class="table table-bordered">
<tbody>

<tr>
<td>Bouwopruimer</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox4" type="checkbox" checked="" value="Yes" name="bouwopruimer">
                        <label for="checkbox4" style="vertical-align:top;" > </label> </div></td>

<td>Handyman</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox5" type="checkbox" checked="" value="Yes" name="handyman">
                        <label for="checkbox5" style="vertical-align:top;"> </label> </div></td>

<td>Koffiedame</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox6" type="checkbox" checked="" value="Yes" name="koffiedame">
                        <label for="checkbox6" style="vertical-align:top;" > </label> </div></td>
</tr>
<tr>
<td>Afvalagent</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox7" type="checkbox" checked="" value="Yes" name="afvalagent">
                        <label for="checkbox7" style="vertical-align:top;"> </label> </div></td>
<td>Betonafwerker</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox8" type="checkbox" checked="" value="Yes" name="betonafwerker">
                        <label for="checkbox8" style="vertical-align:top;"> </label> </div></td>

<td>Aanpiccalateur</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox9" type="checkbox" checked="" value="Yes" name="aanpiccalateur">
                        <label for="checkbox9" style="vertical-align:top;"> </label> </div></td>
</tr>
<tr>
<td>Magazijnbeheerder</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox10" type="checkbox" checked="" value="Yes" name="magazijnbeheerder">
                        <label for="checkbox10" style="vertical-align:top;"> </label> </div></td>

<td>Verkeersregelaar</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox11" type="checkbox" checked="" value="Yes" name="verkeersregelaar">
                        <label for="checkbox11" style="vertical-align:top;"> </label> </div></td>
                      
<td>Poortwachter/Beveiliger</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox12" type="checkbox" checked="" value="Yes" name="poortwachter">
                        <label for="checkbox12" style="vertical-align:top;"> </label> </div></td>
  </tr>
<tr>
<td>Glazenwasser</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox13" type="checkbox" checked="" value="Yes" name="glazenwasser">
                        <label for="checkbox13" style="vertical-align:top;"> </label> </div></td>
<td>Liftbot</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox14" type="checkbox" checked="" value="Yes" name="liftbot">
                        <label for="checkbox14" style="vertical-align:top;"> </label> </div></td>
                      
<td>Kantelsysteen (gratis)</td>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox15" type="checkbox" checked="" value="Yes" name="kantelsysteen">
                        <label for="checkbox15" style="vertical-align:top;"> </label> </div></td>
  </tr>
<tr>

<td>Rolcontainers (gratis)</td>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox16" type="checkbox" checked="" value="Yes" name="rolcontainers">
                        <label for="checkbox16" style="vertical-align:top"> </label>
                    </div>
                    
                    </td>
                    
                    
 <td>Professionele Stofzuigers (gratis)</td>
<td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox16" type="checkbox" checked="" value="Yes" name="professionele">
                        <label for="checkbox16" style="vertical-align:top"> </label>
                    </div>
                    
                    </td> 
                   
    <td>Kwaliteitsbewaker (gratis)</td>
    <td align="center" ><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
    <input id="checkbox16" type="checkbox" checked="" value="Yes" name="kwaliteitsbewaker">
    <label for="checkbox16" style="vertical-align:top"> </label>
    </div>
    
    </td> 
                    
</tr>


</tbody>
</table>
        
   
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
        <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button> 
        </div>
        </div>
        
        </fieldset>
        </div>

        <div id="sf3" class="frm" style="display: none;">
        <fieldset>
        <legend>Stap 3 of 3</legend>
        <div class="col-md-12">        
        <h4>Gewenste diensten . . . . . </h4>
        </div>
        
        
           <table class="table table-bordered">
<tbody>
<tr>
<td>Keetonderhoud</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox1" type="checkbox" checked="" value="Yes" name="keetonderhoud">
                        <label for="checkbox1" style="vertical-align:top;"> </label> </div></td>
<td>Specialistisch Onderhound</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox2" type="checkbox" checked="" value="Yes" name="specialistisch">
                        <label for="checkbox2" style="vertical-align:top;"> </label> </div></td>
<td>Opleveringsschoonmaak</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox3" type="checkbox" checked="" value="Yes" name="opleveringsschoonmaak">
                        <label for="checkbox3" style="vertical-align:top;"> </label> </div></td>
</tr>
<tr>
<td>Hak-en Sloopweak</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox4" type="checkbox" checked="" value="Yes" name="sloopweak">
                        <label for="checkbox4" style="vertical-align:top;" > </label> </div></td>

<td>Bewaking van uw bouwplaats</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox5" type="checkbox" checked="" value="Yes" name="bouwplaats">
                        <label for="checkbox5" style="vertical-align:top;"> </label> </div></td>

<td>Containerservice</td>
<td align="center"><div class="checkbox checkbox-primary" style=" margin-bottom: 0px;margin-top: 0px;">
                        <input id="checkbox6" type="checkbox" checked="" value="Yes" name="containerservice">
                        <label for="checkbox6" style="vertical-align:top;" > </label> </div></td>
</tr>

</tbody>
</table>
        
     
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
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