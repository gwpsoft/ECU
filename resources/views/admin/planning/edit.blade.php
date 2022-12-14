<!-- Header -->
    @include('admin/header')
     <meta name="csrf-token" content="{{csrf_token()}}" />
     <title>Dagelijkse Projecten bewerken . . . .</title>  
<style>
.checker {float:right !important; }
.error { color:#fff; }
.center { text-align:center;} 
.left { text-align:left}
label { font-size:13px;}
table th,td { font-size:12px;}
div.radio { margin-left:0px;} .strong { font-weight:bold; font-size:14px;}
div.checker, div.checker span, div.checker input, div.radio, div.radio span, div.radio input { vertical-align:text-bottom;}
</style> 

<?php
/*echo '<pre>';
 print_r($Get_project);
die;*/

?>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Dagelijkse Projecten bewerken</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/UpdatePlanEmp']) !!}
   <div class="col-md-12">
      <input type="hidden" name="id" value="{{$Employee->id}}" />
      <input type="hidden" name="plan_id" value="{{$Employee->plan_id}}" /> 
       <input type="hidden" name="project" value="{{$Employee->project_id}}" /> 
      <input type="hidden" name="date" value="{{$Employee->date}}" />
  @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-6">
                
                <div class="block">
                    <div class="header">
                       <h2>Personeels planning</h2>
                    </div>
                    <div class="content controls">
                    
               <div class="form-row">
 <div class="col-md-4">Personeel selecteren:</div>
  <div class="col-md-8">
                   	<select name="employee"  class="select2 " style="width:100%">

                                    <?php 
									
									foreach (@$AllEmployees as $Emp) {?>

                                    <option value="<?=$Emp->id?>" <?php if ($Employee->employee_id == $Emp->id) {?> selected="selected" <?php } ?>><?=$Emp->Firstname.' '.$Emp->Lastname?></option>

                                    <?php } ?>                                 

                                </select>   
</div>
   </div>
 
 
 <div class="form-row">
 <div class="col-md-4">Functie:</div>
  <div class="col-md-8">
                   	<select name="Geschikt"  class="select2 " style="width:100%">

                                   <?php  
					   $options = array ('Opruimer','Schoonmaker','Handyman','Timmerman','ZZPer');
					   foreach ($Functie as $CWeeks) { ?>
                            <option value="<?php echo $CWeeks->code;?>" <?php if ($CWeeks->code == $Employee->Geschikt) { ?> selected="selected" <?php } ?>><?php echo $CWeeks->name;?></option>
                        <?php } ?>                             

                                </select>   
</div>
  

 </div> 
                    <div class="form-row">
                    <div class="col-md-4">Status:</div>
                    <div class="col-md-8"> 
                    <select name="status"  class="select2 " style="width:100%">
                    <option value="1" <?php if ($Employee->status == 1) { ?> selected="selected" <?php } ?>>Regie</option>
                    <option value="2" <?php if ($Employee->status == 2) { ?> selected="selected" <?php } ?>>Aangenomen</option>
                    </select>
                    
                    
                    
                                     
                    </div>
 </div>
 
 
 
 <div class="form-row">
                    <div class="col-md-4">Groep:</div>
                    <div class="col-md-8"> 
                    <select name="group"  class="select2 " style="width:100%">
                    <option value="A" selected="selected" <?php if ($Employee->group == 'A') { ?> selected="selected" <?php } ?>>Groep A</option>
                    <option value="B" <?php if ($Employee->group == 'B') { ?> selected="selected" <?php } ?>>Groep B</option>
                    <option value="C" <?php if ($Employee->group == 'C') { ?> selected="selected" <?php } ?>>Groep C</option>
                    <option value="D" <?php if ($Employee->group == 'D') { ?> selected="selected" <?php } ?>>Groep D</option>
                    <option value="E" <?php if ($Employee->group == 'E') { ?> selected="selected" <?php } ?>>Groep E</option>
                    <option value="F" <?php if ($Employee->group == 'F') { ?> selected="selected" <?php } ?>>Groep F</option>
                    <option value="G" <?php if ($Employee->group == 'G') { ?> selected="selected" <?php } ?>>Groep G</option>
                    <option value="H" <?php if ($Employee->group == 'H') { ?> selected="selected" <?php } ?>>Groep H</option>
                    <option value="I" <?php if ($Employee->group == 'I') { ?> selected="selected" <?php } ?>>Groep I</option>
                    <option value="J" <?php if ($Employee->group == 'J') { ?> selected="selected" <?php } ?>>Groep J</option>

                    </select>                      
                    </div>
                 
                </div>  
                
                
                
                <div class="form-row">

                            <div class="col-md-4">Opmerkingen:</div>

                            <div class="col-md-7">                            

                            <textarea class="form-control" rows="5" name="Notes"><?php echo $Employee->Notes?></textarea>

                            		<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->

                            </div>                           

                        </div>       
            </div>
                  
                    
             </div>
           
              </div>
           <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                             <div class="col-md-3" align="center" > 
                <a href="<?php echo URL:: to( 'admin/PlanningByDate',date('d-m-Y',strtotime($Employee->date)) ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
                </div> 
                
                    <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}
                </div>
                             
              <!--  <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan & Afsluiten', ['class' => 'btn btn-success','name' => 'Save_Close']) !!}
                </div>
                
                 <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan & Nieuw', ['class' => 'btn btn-success','name' => 'Save_New']) !!}
                </div>-->
                    </div>
                </div> 
    {!! Form::close() !!}        
  </div> <br />  <div style="clear:both; margin-bottom:25px;"></div>
       @include('admin/footer')</div>  