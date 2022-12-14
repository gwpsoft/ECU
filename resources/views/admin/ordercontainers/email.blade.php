<!-- Header -->
    @include('admin/header')
     <title>Email</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>                   
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
    
    
    
    
     
    {!! Form::open(['url'=> 'admin/Order_email_sent']) !!}
    <input type="hidden" name="id" value="<?=$data->id?>" />   
    <input type="hidden" name="email" value="<?=$data->ship_Email?>" /> 
     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
  	<input type="hidden" name="pro_name" value="<?php echo $project->Name?>" />

    <div class="col-md-6">
                
                <div class="block">
                    <div class="header">                    
                       <h2>Bestelformulier Afvalcontainers mailen naar:</h2>                                    
                    </div>
                    <div class="content controls">                        
                   <div class="form-row">
                        <div class="col-md-2">
                        <input type="checkbox" checked="checked" value="1" name="sendmail[<?=$data->Shippingcompany_id?>]" disabled="disabled" style="float:left"/></div>
                        
                        <div class="col-md-4"><?=$data->Companyname?></div>
                        <div class="col-md-6">(<?=$data->ship_Email?>)</div> 
                </div>                        
            </div>
          </div>
          
          <div class="block">
                    <div class="header" >                    
                       <h2>Bestelformulier Afvalcontainers wordt als PDF bijlage toegevoegd.</h2>                                    
                    </div>
                    <div class="content controls">                
               <div class="form-row">                            
                            <div class="col-md-12"> <? //$data->Companyname?>                           
                            <textarea class="form-control" rows="8"  name="Text" style="height:300px">
Geachte heer, mevrouw,
    
Hierbij ontvangt u een bestelling van ons, voor het project <?php echo $project->Name?>, in de bijlage. Graag verzoeken wij u om deze op de gewenste dag en tijdstip te laten uitvoeren. In geval van vragen of opmerkingen horen wij van u zo spoedig mogelijk.
    
Met vriendelijke groet,
    
    
Easy Clean Up B.V.
Kollenbergweg 78
1101 AV Amsterdam
    
Tel.: 020-6916115
                            
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