<!-- Header -->

    @include('admin/header')

     <title>Weekstaat via e-mail verzenden . . . </title>  

<style>

 .checker {float:right !important; }

 .error { color:#fff; }

</style> 
<script>

$('#attachment').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
       // alert('is checked');
    } else {
		$(this).val('0');
		$(this).removeAttr('checked');
       // alert('is not checked');
    }
});	


</script>
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


 @if (Session::has('error'))

   <div class="alert alert-danger">

                        <b>Error!</b> {{Session::get('error')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif
    

    

    

    

     

    {!! Form::open(['url'=> 'admin/weekcard/weekcard_sent_WO_Regie']) !!}

    <input type="hidden" name="weekcard_Id" value="<?=@$week_details[0]->weekcard_Id?>" />

    <input type="hidden" name="weeknumber" value="<?=@$week_details[0]->Weeknumber?>" />
    
     <input type="hidden" name="email" value="<?=@$week_details[0]->contact_email?>" />
     
      <input type="hidden" name="Project" value="<?=@$week_details[0]->Project?>" />

     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

  <div class="col-md-6">     

          <div class="block">

                    <div class="header" >                    

                       <h2>Inhoud van de mail (werkbon is een PDF attachment)</h2>                                    

                    </div>

                    <div class="content controls">                

               <div class="form-row">                            

                            <div class="col-md-12">                            

                             <textarea class="form-control" rows="8"  name="Text" style="height:300px">
Beste <?=@$week_details[0]->contact_firstname.' '.@$week_details[0]->contact_lastname?>,

Bij deze ontvangt u de weekstaat voor week: <?php echo $value = substr(@$week_details[0]->Weeknumber, 0, -2).'-'.substr(@$week_details[0]->Weeknumber, -2); ?> van het project: <?php echo $week_details[0]->Project?>.

Wilt u zo vriendelijk zijn om deze te ondertekenen en te retourneren?

Let op! er kunnen meerdere bijlages toegevoegd zijn. 

Bij voorbaat dank voor de moeite,

Met vriendelijke groet,


Easy Clean Up B.V.
Kollen bergweg 78
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



    <div class="col-md-6">

                

                <div class="block">

                    <div class="header">                    

                       <h2>Werkbonnen mailen naar:</h2>                                    

                    </div>

                    <div class="content controls">                        
<?php if (!empty($GetEmails[0]->AanTo)) {
		
		@$TOEmails = explode(',',$GetEmails[0]->AanTo);
		@$CCEmails = explode(',',$GetEmails[0]->CcTo);
		
		?>
       
        <?php
		if (!empty($TOEmails)) { ?>
         <div class="header" style="background:none">   
        <h2 align="">Aan</h2>
        </div>
        <?php 
		foreach ($TOEmails as  $To) {
		
		@$Aan = DB::table('tblcontact')->select('*')->where('Id',$To)->get();
		if (!empty($Aan)) {
	?>
                   <div class="form-row">

                        <div class="col-md-2">

                        <input type="checkbox" checked="checked" value="<?=@$Aan[0]->Email?>" name="Aan[]" style="float:left"/>

                        </div>

                        <div class="col-md-4"><?=@$Aan[0]->Firstname.' '.@$Aan[0]->Lastname?></div>

                        <div class="col-md-6">(<?=@$Aan[0]->Email?>)</div> 

                </div>                        

<?php } } } if (!empty($CCEmails[0])) { ?>
 <div class="header" style="background:none">   
<h2 align="">CC</h2>
        </div>
        <?php
		foreach ($CCEmails as  $CC) {
		
		$CCEmail = DB::table('tblcontact')->select('*')->where('Id',$CC)->get();
		if (!empty($CCEmail)) {
	?>
                   <div class="form-row">

                        <div class="col-md-2">

                        <input type="checkbox" checked="checked" value="<?=@$CCEmail[0]->Email?>" name="Cc[]" style="float:left"/>

                        </div>

                        <div class="col-md-4"><?=@$CCEmail[0]->Firstname.' '.@$CCEmail[0]->Lastname?></div>

                        <div class="col-md-6">(<?=@$CCEmail[0]->Email?>)</div> 

                </div>
<?php } } } }?>

<div class="form-row">

                        <div class="col-md-2">

                        <input type="checkbox" id="attachment" name="attachment" style="float:left"/>

                        </div>

                        <div class="col-md-4">Bijlagen Documenten</div>

                        <div class="col-md-6">&nbsp;</div> 

                </div>


            </div>

          </div>


  {!! Form::close() !!}     

   <div class="block">

                    <div class="header" >
  
                            
    
                       <h2>Documenten van de werknemer</h2>

                    </div>

                    <div class="content">
                        

                     <table class="table table-bordered table-striped no-footer" width="100%">
                     <tr>
                     <th>Document Type</th>
                     <th>Opties</th>
                     </tr>
                     <?php 
					 if (!empty($week_documents)) {					
					 foreach ($week_documents as $Doc ) { ?>                     
                     <tr>
                    
                    <!-- <td><?php echo $Doc?></td> -->                   
                     <td><?php $ext = pathinfo($Doc, PATHINFO_EXTENSION);
					 if ($ext == 'jpg' || $ext == 'JPG') { ?>
                     <a href="../../uploads/weekcard/document/<?php echo $Doc?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/jpg.png') }}" style=" cursor:pointer; width:32px; height:32px;"></a> <?php } 
					 if ($ext == 'png' || $ext == 'PNG') { ?>  <a href="../../uploads/weekcard/document/<?php echo $Doc?>" title="Downloaden"><img class=" " src="{{ URL::asset('assets/img/icons/png.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
					 <?php } if ($ext == 'xls' || $ext == 'XLS') { ?>
                     <a href="../../uploads/weekcard/document/<?php echo $Doc?>" title="Downloaden"><img src="{{ URL::asset('assets/img/icons/xls.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
                     <?php } if ($ext == 'pdf' || $ext == 'PDF') { ?> 
                      <a href="../../uploads/weekcard/document/<?php echo $Doc?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/pdf.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
                      <?php } if (($ext == 'docx' || $ext == 'doc') || ($ext == 'DOCX' || $ext == 'DOC')) { ?> 
                      <a href="../../uploads/weekcard/document/<?php echo $Doc?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/docx.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
                      <?php }?>
                      
                      </td>
                      <td>                    
                      <a href="<?php echo URL:: to( 'admin/DeleteWeekcardDoc',$Doc ); ?>" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a></td>
                     </tr>
                     <?php } } else {?>
                     
                     <tr>
                     <td colspan="4" align="center"> Geen bestand gevonden...!</td>
                     </tr>
                     <?php } ?>
                     </table>   

                        

                                                

                    </div>

                </div>      
          <div class="block">

                    <div class="header">                    

                       <h2>Bijlage:</h2>                                    

                    </div>

                    <div class="content controls">
                    <form method="post" action="<?php echo URL:: to( 'admin/EmailAttachment' ); ?>"  enctype="multipart/form-data"> 
                    <input type="hidden" name="weekcard_Id" value="<?=@$week_details[0]->weekcard_Id?>" />                       
					<div class="form-row">
							                          
                                                        
                            <div class="col-md-4">Document uploaden:</div>
                            <div class="col-md-7">
                            <div class="input-group file">                                    
                                    <input class="form-control" type="text">
                                    <input name="File" type="file">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button">Browsen</button>
                                    </span>
                                </div>
                                  <span class=""> Bestand Types: (pdf, docx, docx, xls, jpg, png, bmp)</span>                    
                            </div> 
                            
                        </div>
                        <div class="form-row">
                        <div class="col-md-9">&nbsp;</div>
                        <div class="col-md-3">
                         <button type="submit" class="btn btn-success">Uploaden</button>
                         </div>
                        </div>
                        </form>
            </div>

          </div>






     </div>
                

             

          

            

      

          </div>

             

            </div>

            

     

    

       @include('admin/footer')</div>  