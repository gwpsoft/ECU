<!-- Header -->
    @include('admin/header')
     <title>Email ContainerBon</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="admin">Home</a></li>                    
                    <li class="active">Werkbonnen mailen naar</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">     
    @include('admin/sidebar')
     <div class="col-md-10">
    @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif    
     
    {!! Form::open(['url'=> 'admin/ContainerBon_email_sent']) !!}
    <input type="hidden" name="id" value="<?=$data->Con_Id?>" />   
    <input type="hidden" name="email" value="<?=$data->AanTo?>" /> 
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
  <?php $AanTo = explode (',',$data->AanTo);
  $CcTo = explode (',',$data->CcTo);
  ?>

    <div class="col-md-12">
                
                <div class="block">
                    <div class="header">                    
                       <h2>Bestelformulier Afvalcontainers mailen naar:</h2>                                    
                    </div>
                    <div class="content controls">                        
                   <div class="form-row">
                   <div class="col-md-6">
                    <div class="col-md-2" align="right">Aan:</div> <div class="col-md-6"></div><br />
                    
                   
                    <?php foreach ($AanTo as $To) { 
					$ContactInfo = DB::table('tblcontact')->select('Lastname','Firstname','Email')->where('id',$To)->first();
					?>
                        <div class="col-md-2">                       
                        <input type="checkbox" checked="checked" value="<?=@$ContactInfo->Email?>" name="to[]" style="float:left"/></div>                       
                        <div class="col-md-3"><?=@$ContactInfo->Email?></div>
                        <div class="col-md-3">(<?=@$ContactInfo->Firstname.' '.@$ContactInfo->Lastname?>)</div> 
                        <br />
                         <?php } ?>
                      </div>                       
                      <div class="col-md-6">  
                          <div class="col-md-2" align="right">CC:</div><div class="col-md-6"></div><br />
                    <?php foreach ($CcTo as $CC) { 
					$CC_Info = DB::table('tblcontact')->select('Lastname','Firstname','Email')->where('id',$CC)->first();
					?>
                        <div class="col-md-2">                       
                        <input type="checkbox" checked="checked" value="<?=@$CC_Info->Email?>" name="cc[]" style="float:left"/></div>                       
                        <div class="col-md-3"><?=@$CC_Info->Email?></div>
                        <div class="col-md-3">(<?=@$CC_Info->Firstname.' '.@$CC_Info->Lastname?>)</div>
                        <br /> 
                         <?php } ?>
                        </div>
                         
                </div>                        
            </div>
          </div>
          
          <div class="block">
                    <div class="header" >                    
                       <h2>Inhoud van de mail (Bestelformulier Afvalcontainers is een PDF attachment)</h2>                                    
                    </div>
                    <div class="content controls">                
               <div class="form-row">                            
                            <div class="col-md-12">                            
                            <textarea class="form-control" rows="8"  name="Text" style="height:300px">
  Beste [<?=$ContactInfo->Firstname.' '.$ContactInfo->Lastname?>],

  Wilt u zo vriendelijk zijn om deze te ondertekenen en te retourneren?
  
  Bij voorbaat dank voor de moeite,
  
  Met vriendelijke groet,
  
  
  Easy Clean Up B.V.
                            
                            </textarea>                            		
                            </div>                           
                        </div> 
            </div>            
          </div>
           <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-6">
                            {!! Form::submit('Verzenden', ['class' => 'btn btn-success']) !!}
                            </div>                                                
                    </div>
                     <br />  
                </div> 
      </div>          
             
          
            
      
          </div>
             
            </div>
            
    {!! Form::close() !!}        
    
       @include('admin/footer')</div>  