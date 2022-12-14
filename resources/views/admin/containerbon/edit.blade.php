
    @include('admin/header')    
    <meta name="csrf-token" content="{{csrf_token()}}" />
     <title>Containerbon bewerken</title>
     <script type='text/javascript' src="{{ URL::asset('assets/js/jquery.validate-1.14.0.min.js') }}"></script>
       <script type='text/javascript' src="{{ URL::asset('assets/js/jquery-validate.bootstrap-tooltip.js') }}"></script>
<!-- <script type='text/javascript' src="https://thrilleratplay.github.io/jquery-validation-bootstrap-tooltip/js/jquery.validate-1.14.0.min.js"></script>
   <script type='text/javascript' src="https://thrilleratplay.github.io/jquery-validation-bootstrap-tooltip/js/jquery-validate.bootstrap-tooltip.js"></script>-->
<!--<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>-->
   
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .select2-container-disabled span { color:#000;}
 .save {
	  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    display: inline;
    float: left;
    padding: 0;
    width: 5px;
	margin: 0 8px 0 0;
	 }
div.checker  {
  margin-right: 0px !important;

 }
 div.radio { margin-left: -6px;margin-right: 2px;}
 th { font-size:12px; text-align:center} 
</style> 

<script>

 function project (id) {
	$('[name=Project_Id]').val(id);
 }


$(document).ready(function() {
// Dropdown List
	$('.select_price').on('click', function() {
		
		 $('#Gewicht').val(0); 
		$('#price_per').val(0);
		$('#transport_cost').val(0);
		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  		}).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		
		var Project_Id = $('[name=Project_Id]').val();
		var price = $('[name=price]:checked').val();
		$.get("<?php echo URL:: to( 'admin/AjaxPriceList'); ?>",{		
		Project_Id: Project_Id,
		Price: price
		 },function(ajaxresult){
			 setTimeout("finishAjax('meterial', '"+escape(ajaxresult)+"')", 400);
		});		
		
	 });

	$('#meterial,.weight,.price,#size,#Toeslag,#Gewicht').on('change', function() {
		
		$(document).ajaxStart(function () {
		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
		}).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
		});
		var Project_Id = $('[name=Project_Id]').val();		
		var size = $('#size').val();
		var price = $('[name=price]:checked').val();
		var meterial = $('#meterial').val();		
		var Gewicht = $('[name=Gewicht]').val();
		var Toeslag = $('#Toeslag').val();
		//var price_per = $('[name=price_per]').val();
		//alert (Toeslag);
		
		$.get("<?php echo URL:: to( 'admin/AjaxOrderBon'); ?>",{ 
		size:size,
		price: price,
		meterial: meterial,
		Project_Id: Project_Id,
		Gewicht:Gewicht,
		//price_per:price_per
		},function(ajaxresult){
		//alert (ajaxresult.Total);	
		//var nu = Number(ajaxresult.Total + Toeslag);
		if ($('[name=price]:checked').val() == 'price_all'){			
		$('#priceall').val(ajaxresult.Price);
		/*$('#Gewicht').val(0); 
		$('#price_per').val(0);
		$('#transport_cost').val(0);*/
		$('#All_price').val(ajaxresult.Price); 
		$('#total').text(ajaxresult.Total);		
		$('#net_price').val(ajaxresult.Actual);	
		$('#Inkoop').val(ajaxresult.Actual);	
		Toeslag = $('#Toeslag').val();
		priceall = $('#priceall').val();
		total = $('#total').text();
		gr_Total =  (Number(priceall)+ Number(Toeslag));		
			$('#total').text(gr_Total);
			$('#gr_total').val(gr_Total);			
		}
		if ($('[name=price]:checked').val() == 'weight'){			
		//$('#priceall').val(0); 
		//$('#All_price').val(0);
		Gewicht = $('#Gewicht').val();
		Toeslag = $('#Toeslag').val(); 
		Weight = Number(ajaxresult.Price * Gewicht) + Toeslag + ajaxresult.Transport;
		//$('#total').text('€ '+ajaxresult.Total); 
		//$('#gr_total').val(ajaxresult.Total);
		$('#transport_cost').val(ajaxresult.Transport); 
		$('#transport').val(ajaxresult.Transport);
		$('#Inkoop').val(ajaxresult.Total);
		$('#price_per').val(ajaxresult.Price);
		$('#price').val(ajaxresult.Price);
		gr_Total = (Number(ajaxresult.Price)*Number(Gewicht)) + Number(ajaxresult.Transport) + Number(Toeslag);
		//alert(gr_Total);
		$('#total').text(gr_Total);
		$('#gr_total').val(gr_Total);		
		}			 
		});	
		//calculate();	
	});
		var project_id = $('#project').val();		
		$.get('<?php echo URL:: to( 'admin/Ajaxproject'); ?>?project_id=' + project_id,function(data) {
			 
			 $('#Afdeling').val(data.DeptName);
			 $('#Klant').val(data.CustomerName);
			 $('#Project').val(data.Name);
			 $('#Klant_proj').val(data.Customer_ref);
			 $('#Project_nr').val(data.Project_ref);
			 $('#Uitvoerder').val(data.Contact_Id);
			 $('#Project_Fax').val(data.Fax);
			 $('#Adres').val(data.Address);
			 $('#Postcode').val(data.Zipcode);
			 $('#Stad').val(data.City);
			 $('#Vaste_prijs').val(data.Fixed);
			 $('#Tarief').val(data.Rate);
			 $('#Project_Id').val(data.Id).attr('selected', 'selected').change();
			 //var Project_Id = $('[name=Project_Id]').attr('selected', 'selected').change();;	
			 $('#alert_msg').val('');
			 
		});
	
});

	function finishAjax(id, response){
                      
		$('#'+id).html(unescape(response));
		$('#'+id).fadeIn();
	}

function calculate() {
	
	transport = $('#transport_cost').val();
	
	Gewicht = $('#Gewicht').val();
	price_per = $('#price_per').val();
	priceall = $('#priceall').val();
	total = $('#total').html();
	if ($('[name=price]:checked').val() == 'weight'){			
		priceall = 0; 
		price_per = 0; 
	
	} if ($('[name=price]:checked').val() == 'price_all'){
		priceall = $('#priceall').val();
		//price_per = 0;
		//Total = (Number(total) + Number(Toeslag));
		//alert (Total);
	}
	//Total = (Number(transport) + Number(Toeslag) + Number(Gewicht) + Number(price_per) + Number(priceall));
	$('#total').text(Total);
	//$('#gr_total').val(Total);
}

$(document).ready(function(){
	
             $(".txt").each(function() { 
            $(this).change(function(){
               // calculateSum();
				$('.btn').css('display','inline');
            });
        });
 
 $("#checked").click(function(){
        $("#received").val("<?=date('Y-m-d')?>");
    }); 
 
});


		$(document).ready(function() {
			$('#weight').on('click', function() {		
				$("#Gewicht").attr("required", "true");
				$("#price_per").attr("required", "true");				
			});
			$('#price_all').on('click', function() {		
				$("#Gewicht").removeAttr("required");
				$("#price_per").removeAttr("required");				
			});
			$("#ContainerBon").validate({	
			
			
			});
		});
	
</script>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="admin">Home</a></li>                    
                    <li class="active">Containerbon bewerken</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
   
    @include('admin/sidebar') 
 
   {!! Form::open(['url'=> 'admin/AddContainerBon', 'id' => 'ContainerBon']) !!}  
   <input type="hidden" name="BonCard_No" value="<?=$Orders->id?>" />   
   <input type="hidden" name="project_id" value="<?=$Orders->Project_Id?>" id="project"/>
   <input type="hidden" name="Nummer" value="<?=$Orders->Nummer?>" />
   <input type="hidden" name="Transport_price" id="transport"/>
   <input type="hidden" name="All_price" id="All_price"/>
   <input type="hidden" name="gr_total" id="gr_total"/>
   <input type="hidden" name="net_price" id="net_price"/>
  <!-- <input type="hidden" name="price_per" id="price"/>-->
  
    <div class="col-md-12">
      @if (Session::has('message'))
   <div class="alert alert-success">
        <b>Success!</b> {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
   @endif 
      </div>
    <div class="col-md-12" id="mycontainer">          
                <div class="block" >
                    <div class="header" >
                    
                       <h2>Regel toevoegen</h2>
                            <div style="float:right">
                            <a href="<?=URL:: to( 'admin' ) . '/ContainerBon_pdf/'.$Orders->id;?>" title="Download PDF">
                            <img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer"></a>  |                            <a href="<?=URL:: to( 'admin' ) . '/ContainerBon_email/'.$Orders->id;?>" title="E-mailen">
                            <img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style="cursor:pointer">
                            </a> 
                                                </div>              
                    </div>
                    <div class="content" >
                      <div class="form-row" >                      
                      <table class="table table-bordered sort">
                      <thead>
                      <tr>
                      <th width="15%" style="vertical-align:middle">Datum</th>
                      <th width="11%" style="vertical-align:middle">Select Price</th>
                      <th width="5%" style="vertical-align:middle">Inhoud</th>
                      <th style="width:200px;vertical-align:middle">Omschrijving </th>
                      <th style="width:130px;vertical-align:middle">Gewicht (Ton)</th>
                      <th style="width:200px;vertical-align:middle">Prijs per ton</th>                       
                       <th style="width:200px;vertical-align:middle">Transport kosten</th> 
                        <th style="width:100px;vertical-align:middle">Toeslag</th>                        
                      <th style="width:150px;vertical-align:middle">All-in&nbsp;prijs</th>
                      <th style="width:150px;vertical-align:middle">Bedrag</th>
                      <th style="width:150px;vertical-align:middle">Inkoop</th>
                      <th width="15%" style="vertical-align:middle">Opmerkingen</th>
                      <th id="buttonheader" style="display:none;">&nbsp;</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
<td>
<div class="input-group">
<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
<input type="text" class="datepicker form-control txt" placeholder="<?=date('Y-m-d')?>" name="Sent_Date" required></div>
</td>
<td align="center">
<div class="radiobox-inline">
<label><div class="radio" style="">
<input type="radio"  name="price" id="weight" value="weight" class="select_price"></div>Per Gewicht</label>
<label><div class="radio" style="margin-left:-18px;">
<input type="radio" checked="checked" name="price" id="price_all" value="price_all" class="select_price"></div> 
All-in prijs</label></div>
</td>
<td><select name="size" class="select2 txt" id="size" style="width:100px;">
<option value="Rolcontainer">Rolcontainer</option>
<option value="3m3">3m &sup3;</option>
<option value="6m3">6m &sup3;</option>
<option value="10m3">10m &sup3;</option>
<option value="20m3">20m &sup3;</option>
<option value="30m3">30m &sup3;</option>
</select>
</td>
<td>
<select name="meterial" class="select1 txt" id="meterial" style="width:150px;" required>
<option value="">Select Omschrijving</option>
<option value="BSA">BSA</option>
<option value="Hout">Hout</option>
<option value="Puin">Puin</option>
</select>

</td>
<td style="vertical-align:middle"><input class="form-control weight txt" id="Gewicht" type="text" style="padding:2px;" name="Gewicht"></td>
<td style="vertical-align:middle" align="center"><!--<div id="price_per" class="price_per">0</div>-->
<input class="form-control txt price" type="text" style="padding:2px;width:45px;" name="price_per" id="price_per"></td>

<td style="vertical-align:middle" align="center"><input class="form-control txt" id="transport_cost" onchange="calculate();" type="text" style="padding:2px;" name="Transport"></td>
<td style="vertical-align:middle" align="center"><input class="form-control" id="Toeslag" type="text" style="padding:2px;" name="Toeslag"></td>



<td style="vertical-align:middle" align="center"><input class="form-control priceall" id="priceall" type="text" style="padding:2px;" name="PriceAll">
<!--<div id="priceall" class="priceall">0</div>--></td>
<td style="vertical-align:middle" align="center"><div id="total" class="total">0</div></td>
<td style="vertical-align:middle" align="center"><input class="form-control" id="Inkoop" type="text" style="padding:2px;" name="Inkoop"></td>
<td><input type="text" class="form-control txt"  style="padding:2px;" name="notes"/></td>
<td id="buttoncol"><button class="btn btn-success" type="submit" style="display:none;"><span class="icon-plus-sign"></span></button>
</td>
 </tr>
</tbody></table>
 </div></div></div>
  {!! Form::close() !!}  
 </div>

 <div class="col-md-12">
  @if (Session::has('DelSucess'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('DelSucess')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
   </div>
   
    <div class="col-md-12"> 
   <?php if (!empty($ContainersBons) ) { ?>
<div class="block">
 <span id="alert_msg"></span>
                    <div class="header" >
                    
                       <h2>Uitgevoerde opdrachten</h2>
                                
                    </div>
                    
                                       
                    <div class="content">
                      <div class="form-row">
                      
                      <table class="table table-bordered sort">
                      <thead>
                      <tr>
                       <th width="15%" style="vertical-align:middle">Datum</th>
                      <th width="11%" style="vertical-align:middle">Select Price</th>
                      <th width="5%" style="vertical-align:middle">Inhoud</th>
                      <th style="width:200px;vertical-align:middle">Omschrijving </th>
                      <th style="width:130px;vertical-align:middle">Gewicht (Ton)</th>
                      <th style="width:200px;vertical-align:middle">Prijs per ton</th>                       
                       <th style="width:200px;vertical-align:middle">Transport kosten</th> 
                        <th style="width:100px;vertical-align:middle">Toeslag</th>                        
                      <th style="width:150px;vertical-align:middle">All-in&nbsp;prijs</th>
                      <th style="width:150px;vertical-align:middle">Bedrag</th>
                       <th style="width:150px;vertical-align:middle">Inkoop</th>
                      <th width="15%" style="vertical-align:middle">Opmerkingen</th>
                      <th id="buttonheader" style="display:none;">&nbsp;</th>
                     <!-- <th width="15%" style="vertical-align:middle">Datum</th>
                      <th width="11%" style="vertical-align:middle">Select Price</th>
                      <th width="5%" style="vertical-align:middle">Inhoud</th>
                      <th style="width:200px;vertical-align:middle">Omschrijving </th>
                      <th style="width:130px;vertical-align:middle">Gewicht (Ton)</th>
                      <th style="width:200px;vertical-align:middle">Prijs per ton</th>  
                      <th style="width:150px;vertical-align:middle">All-in prijs</th>
                      <th style="width:150px;vertical-align:middle">Bedrag</th>
                      <th width="15%" style="vertical-align:middle">Afspraken</th>
                      <th id="buttonheader" style="display:none;">&nbsp;</th>-->
                      </tr>
                      </thead>
                      <tbody>

<?php $i=0;

		foreach ($ContainersBons as $Bons){
		 $i++;
		if (@$Bons->price == 'weight') {
		@$Description = array (							
							'sorteerbaar' =>	'Bouw- en sloopafval (sorteerbaar)' ,
							'niet_sorteerbaar' =>	'Bouw- en sloopafval (niet sorteerbaar)',
							'Bedrijfsafval'	=>	'Bedrijfsafval' ,
							'A_B_hout' =>	'Gemengd hout (A- enlof B- hout)',
							'C_hout' =>	'C- hout',
							'Schoon_puin' =>	'Schoon puin(< 60 cm)',
							'Puin_Grof' =>	'Puin Grof (> 60 cm)',
							'Puin_met_10' =>	'Puin met 10% tot 25% zand I grond ',
							'Puin_met_25' =>	'Puin met 25% of meer zand I grond ',
							'Asfaltpuin' =>	'Asfaltpuin ' ,
							'Schoon_Gips'	=>	'Schoon Gips  ' ,
							'Groenafval' => 'Groenafval',
							'Dakafval' => 'Dakafval',
							'Dakgrind' => 'Dakgrind',
							'Schoon_vlakglas' => 'Schoon vlakglas',
							'Opbrengsten_metalen' =>	'Opbrengsten metalen, per ton',
							'Opbrengsten_Papier' =>	'Opbrengsten Papier & Karton, per ton',	
				);
				
				if ($pricelist->description_field1) { 	
				$Description['field_1'] = $pricelist->description_field1;			
				}		
				if ($pricelist->description_field2) { 	
				$Description['field_2']=  $pricelist->description_field2 ;
				}		
				if ($pricelist->description_field3) { 		
				$Description['field_3']= $pricelist->description_field3;
				}
				if ($pricelist->description_field4) { 		
				$Description['field_4']= $pricelist->description_field4;
					}
		}
		
		if (@$Bons->price == 'price_all') {
					
					$Description = array (
					'BSA' => 'BSA',
					'Hout' => 'Hout',
					'Puin' => 'Puin'					
					);
					
		}
		
if ($Bons->price == 'weight') { $wieght = 'checked="checked"';  $price_all = ''; }
else {$wieght = '';  $price_all = 'checked="checked"'; }		
?>

<script>
  $(document).ready(function() {
	
	  
	  $('#weight_<?=$Bons->id?>').on('click', function() {		  	
				/*$("#Gewicht_<?=$Bons->id?>").attr("required", "true");
				$("#price_per_<?=$Bons->id?>").attr("required", "true");*/				
			});
			$('#price_all_<?=$Bons->id?>').on('click', function() {	
				/*$("#Gewicht_<?=$Bons->id?>").removeAttr("required");
				$("#price_per_<?=$Bons->id?>").removeAttr("required");	*/			
			});
	  
	   $(".txt_<?=$Bons->id?>").each(function() {
		   	//alert ('sdfsdf');	
            $(this).change(function(){              
				$('#<?=$Bons->id?>').css('background-color','#FFAD2A');
            });
        });
		
				// dropdown
		$('.select_price_<?=$Bons->id?>').on('click', function() {
		
		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		
		var Project_Id = $('[name=Project_Id]').val();
		var price = $('[name=price_<?=$i?>]:checked').val();
		$.get("<?php echo URL:: to( 'admin/AjaxPriceList'); ?>",{		
		Project_Id: Project_Id,
		Price: price
		 },function(ajaxresult){
			 setTimeout("finishAjax('meterial_<?=$Bons->id?>', '"+escape(ajaxresult)+"')", 400);
		});		
		
	 });
	 
	
	 
	 $('#meterial_<?=$Bons->id?>,.weight_<?=$Bons->id?>,.price_<?=$Bons->id?>,#size_<?=$Bons->id?>,#Toeslag_<?=$Bons->id?>,#Gewicht_<?=$Bons->id?>').on('change', function() {
		
		$(document).ajaxStart(function () {
		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
		}).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
		});
		var Project_Id = $('[name=Project_Id]').val();		
		var size = $('#size_<?=$Bons->id?>').val();
		var price = $('[name=price_<?=$i?>]:checked').val();
		var meterial = $('#meterial_<?=$Bons->id?>').val();
		var Gewicht = $('#Gewicht_<?=$Bons->id?>').val();
		var price_per = $('#price_per_<?=$Bons->id?>').val();
		//alert (Project_Id+'---'+size+'---'+price+'---'+meterial+'---'+Gewicht+'---'+price_per);
		
		
		
		$.get("<?php echo URL:: to( 'admin/AjaxOrderBon'); ?>",{ 
		size:size,
		price: price,
		meterial: meterial,
		Project_Id: Project_Id,
		Gewicht:Gewicht,
		//price_per:price_per
		//price_per:price_per		
		
		},function(ajaxresult){	
		
			//alert ($('[name=price_<?=$i?>]:checked').val());
		
				if ($('[name=price_<?=$i?>]:checked').val() == 'price_all'){			
					
					
					$('#priceall_<?=$Bons->id?>').val(ajaxresult.Price); 
					/*$('#Gewicht_<?=$Bons->id?>').val(0); 
					$('#price_per_<?=$Bons->id?>').val(0);
					$('#transport_cost_<?=$Bons->id?>').val(0);*/
					//$('#Inkoop_<?=$Bons->id?>').val(ajaxresult.Actual);
					$('#transport_cost_<?=$Bons->id?>').val(ajaxresult.Transport); 
					$('#All_price_<?=$Bons->id?>').val(ajaxresult.Price); 
					$('#total_<?=$Bons->id?>').text(ajaxresult.Total);
					$('#net_price_<?=$Bons->id?>').val(ajaxresult.Actual);	
					$('#Inkoop_<?=$Bons->id?>').val(ajaxresult.Actual);	
					Toeslag = $('#Toeslag_<?=$Bons->id?>').val();
					priceall = $('#priceall_<?=$Bons->id?>').val();
					total = $('#total_<?=$Bons->id?>').text();
					Gewicht = $('#Gewicht_<?=$Bons->id?>').val();
					
					gr_Total = (Number(priceall)+ Number(Toeslag)); //(Number(ajaxresult.Price)*Number(Gewicht)) + Number(ajaxresult.Transport) + Number(Toeslag);					
					//gr_Total =  (Number(ajaxresult.Total)+ Number(Toeslag));		
					$('#total_<?=$Bons->id?>').text(gr_Total);
					$('#gr_total_<?=$Bons->id?>').val(gr_Total);
				}
				
				if ($('[name=price_<?=$i?>]:checked').val() == 'weight'){
					
						
					Gewicht = $('#Gewicht_<?=$Bons->id?>').val();
					Toeslag = $('#Toeslag_<?=$Bons->id?>').val(); 
					Weight = Number(ajaxresult.Price * Gewicht) + Toeslag + ajaxresult.Transport;
					$('#Inkoop_<?=$Bons->id?>').val(ajaxresult.Actual);	
					//Inkoop = Number(ajaxresult.Total * Gewicht) + Toeslag + ajaxresult.Transport;
					//$('#Inkoop_<?=$Bons->id?>').val(Inkoop);
					$('#transport_cost_<?=$Bons->id?>').val(ajaxresult.Transport); 
					$('#transport_<?=$Bons->id?>').val(ajaxresult.Transport);
					//$('#net_price_<?=$Bons->id?>').val(ajaxresult.Actual);
					$('#price_per_<?=$Bons->id?>').val(ajaxresult.Price);
					$('#price_<?=$Bons->id?>').val(ajaxresult.Price);
					gr_Total = (Number(ajaxresult.Price)*Number(Gewicht)) + Number(ajaxresult.Transport) + Number(Toeslag);
					$('#total_<?=$Bons->id?>').text(gr_Total);
					$('#gr_total_<?=$Bons->id?>').val(gr_Total);
				}	
			});		
		});
		
		$('#submit_<?=$Bons->id?>').click(function() {
		
		

 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Project_Id = $('[name=Project_Id]').val();
		var size = $('#size_<?=$Bons->id?>').val();
		var price = $('[name=price_<?=$i?>]:checked').val();
		var meterial = $('#meterial_<?=$Bons->id?>').val();
		var Transport = $('#transport_<?=$Bons->id?>').val();
		var Total = $('#gr_total_<?=$Bons->id?>').val();
		var PriceAll = $('#All_price_<?=$Bons->id?>').val();
		var Sent_Date = $('[name=Sent_Date_<?=$Bons->id?>').val();
		var Gewicht = $('[name=Gewicht_<?=$Bons->id?>').val();
		var price_per = $('[name=price_per_<?=$Bons->id?>').val();
		var Note = $('[name=notes_<?=$Bons->id?>').val();
		var BonCard_No = $('[name=BonCard_No_<?=$Bons->id?>').val();
		var gr_total = $('#gr_total_<?=$Bons->id?>').val();
		Toeslag = $('#Toeslag_<?=$Bons->id?>').val();
		Inkoop = $('#Inkoop_<?=$Bons->id?>').val();
				
	$.get("<?php echo URL:: to( 'admin/AjaxEditBon'); ?>",{		
		Project_Id: Project_Id,
		Price: price,
		meterial:meterial,
		size : size,
		Transport : Transport,
		Total:Total,
		PriceAll:PriceAll,
		Sent_Date: Sent_Date,
		Gewicht:Gewicht,
		price_per:price_per,
		Note:Note,
		BonCard_No:BonCard_No,
		gr_total:gr_total,
		Toeslag:Toeslag,
		Inkoop:Inkoop
		
		 },function(ajaxresult){
			 $('#<?=$Bons->id?>').css('background-color','');
			setTimeout("finishAjax('alert_msg', '"+escape(ajaxresult)+"')", 450);
			$('.alert').hide();
			return false;
		});		
	});
	
	 function finishAjax(id, response){
                      
                        $('#'+id).html(unescape(response));
                        $('#'+id).fadeIn();
                    }
	
  });</script>
  
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <input type="hidden" name="BonCard_No_<?=$Bons->id?>" value="<?=$Bons->id?>" /> 
   <input type="hidden" name="project_id" value="<?=$Orders->Project_Id?>" id="project"/>
   <input type="hidden" name="Nummer" value="<?=$Orders->Nummer?>" />
   <input type="hidden" name="Transport_price" id="transport_<?=$Bons->id?>"/>
  <input type="hidden" name="All_price" id="All_price_<?=$Bons->id?>" value="<?=@$Bons->All_price?>"/>
  <input type="hidden" name="gr_total" id="gr_total_<?=$Bons->id?>" value="<?=@$Bons->total?>"/>
  <input type="hidden" name="net_price" id="net_price_<?=$Bons->id?>"/>
  <input type="hidden" name="price_per" id="price_<?=$Bons->id?>"/>

 <tr id="<?=$Bons->id?>">
<td>
<div class="input-group">
<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
<input type="text" class="datepicker form-control txt_<?=$Bons->id?>" placeholder="<?=date('Y-m-d')?>" name="Sent_Date_<?=$Bons->id?>" value="<?=$Bons->Sent_Date?>" required>
</div>
</td>
<td align="center">
<div class="radiobox-inline">
<label><div class="radio" style="">
<input type="radio"  name="price" id="weight_<?=$Bons->id?>" value="weight" <?=$wieght?> class="select_price_<?=$Bons->id?> txt_<?=$Bons->id?>"/></div>
Per Gewicht</label></div>

<label><div class="radio" style="margin-left:-18px;">
<input type="radio" name="price" id="price_all_<?=$Bons->id?>" value="price_all" <?=$price_all?> class="select_price_<?=$Bons->id?> txt_<?=$Bons->id?>"/></div> 
All-in prijs</label> </div>
</td>

<td><select name="size_<?=$Bons->id?>" class="select2 txt_<?=$Bons->id?>" id="size_<?=$Bons->id?>" style="width:75px;">
<option value="Rolcontainer" <?php if ($Bons->size == 'Rolcontainer') { ?> selected="selected" <?php } ?>>Rolcontainer</option>
<option value="3m3" <?php if ($Bons->size == '3m3') { ?> selected="selected" <?php } ?>>3m &sup3;</option>
<option value="6m3" <?php if ($Bons->size == '6m3') { ?> selected="selected" <?php } ?>>6m &sup3;</option>
<option value="10m3" <?php if ($Bons->size == '10m3') { ?> selected="selected" <?php } ?>>10m &sup3;</option>
<option value="20m3" <?php if ($Bons->size == '20m3') { ?> selected="selected" <?php } ?>>20m &sup3;</option>
<option value="30m3" <?php if ($Bons->size == '30m3') { ?> selected="selected" <?php } ?>>30m &sup3;</option>
</select>
</td>
<td>
<select name="meterial" class="select1 txt_<?=$Bons->id?>" id="meterial_<?=$Bons->id?>" style="width:150px;" required>
<option value="">Select Omschrijving</option>
<?php foreach (@$Description as $key =>$value) {?>
<option value="<?=$key?>" <?php if ($key == $Bons->meterial) {?> selected="selected" <?php } ?>><?=$value?></option>
<?php } ?>
</select>

</td>
<td style="vertical-align:middle"><input class="form-control price weight_<?=$Bons->id?> txt_<?=$Bons->id?>" type="text" style="padding:2px;" value="<?=$Bons->Gewicht?>" name="Gewicht"  id="Gewicht_<?=$Bons->id?>"></td>
<td style="vertical-align:middle">
<input class="form-control txt_<?=$Bons->id?> price price_per_<?=$Bons->id?>" type="text" style="padding:2px;width:45px;" name="price_per" id="price_per_<?=$Bons->id?>" value="<?=$Bons->price_per?>">
<!--<div id="price_per_<?=$Bons->id?>" class="price_per_<?=$Bons->id?>">€ <?=$Bons->price_per?></div>-->



<!--<div class="col-md-1" style="padding-left:4px;vertical-align:middle">€ </div><input class="form-control txt_<?=$Bons->id?>" type="text" style="padding:2px;width:45px;" name="price_per_<?=$Bons->id?>" value="<?=$Bons->price_per?>" id="price_per_<?=$Bons->id?>">--></td>

<td style="vertical-align:middle" align="center"><input class="form-control price txt_<?=$Bons->id?>" id="transport_cost_<?=$Bons->id?>" type="text" style="padding:2px;" name="Transport" value="<?=@$Bons->transport_price?>"></td>
<td style="vertical-align:middle" align="center">
<input class="form-control priceall txt_<?=$Bons->id?>" id="Toeslag_<?=$Bons->id?>" type="text" style="padding:2px;" name="Toeslag" value="<?=@$Bons->Toeslag?>">
<!--<div id="priceall_<?=$Bons->id?>" class="priceall"><?=@$Bons->All_price?></div>--></td>
<td style="vertical-align:middle" align="center">
<input class="form-control txt_<?=$Bons->id?> price" id="priceall_<?=$Bons->id?>" type="text" style="padding:2px;" name="PriceAll" value="<?=@$Bons->All_price?>">
</td>

<td style="vertical-align:middle" align="center"><div id="total_<?=$Bons->id?>" class="total"><?=@$Bons->total?></div></td>

<td style="vertical-align:middle" align="center">
<input class="form-control txt_<?=$Bons->id?> price" id="Inkoop_<?=$Bons->id?>" type="text" style="padding:2px;" name="Inkoop_<?=$Bons->id?>" value="<?=@$Bons->Inkoop?>">
</td>

<td><input type="text" class="form-control txt_<?=$Bons->id?> price"  style="padding:2px;" name="notes_<?=$Bons->id?>"  value="<?=$Bons->Notes?>"/></td>
<td id="buttoncol" width="50">
<button class="save" id="submit_<?=$Bons->id?>" type="button"><span class="icon-save"></span></button>
<a href="<?php echo URL:: to( 'admin/Delete-Bon',$Orders->id.'_'.$Bons->id); ?>" title="goedkeuren" onclick="return confirm('Weet u zeker dat u wilt verwijderen?');"><span class="icon-remove-sign"></span></a>
</td>
 </tr>
 

 <?php }?>
</tbody></table>
</div>
</div>
  </div>
    
   <?php }?> 
    </div>
    <div class="col-md-2">&nbsp; </div> 
    <div class="col-md-12">
       @if (Session::has('Sucess'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('Sucess')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif 
 
    {!! Form::open(['url'=> 'admin/OrderBon_update']) !!}
    <input type="hidden" name="id" value="<?=$Orders->id?>"  />
    <input type="hidden" name="Project_Id" value="<?=$Orders->Project_Id?>"/>
    
   
   
             
<!-- 
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif-->


   
    <div class="col-md-6">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Containerbon data</h2>
                                    
                    </div>
                    <div class="content controls">
                 <div class="form-row">
                            <div class="col-md-4">From datum:</div>
                            <div class="col-md-3"> 
                            		<div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="From_Date" value="{{ $Orders->From_Date}}" style="width:90px;" disabled="disabled">
                                </div>
                            </div>
                             <div class="col-md-1" align="right">     
                                To </div>
                                  <div class="col-md-3" > 
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="To_Date" value="{{ $Orders->To_Date }}" style="width:90px; " disabled="disabled">
                                </div>
                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Project:</div>
                            <div class="col-md-7"> 
                                
                                <select class="select2" style="width: 100%; color:#000 !important;" tabindex="-1" id="Project_Id" disabled="disabled"  >
                                <option value="">Kies een project</option>
                                <?php foreach ($AllProjects as $project) {?>
                                 <option value="<?=$project->Id?>" <?php if ($project->Id == $Orders->Project_Id) { ?> selected="selected" <?php } ?>><?=$project->Name?></option>
                                 <?php } ?>                                
                                </select> 
                              </div> 
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Verz. datum:</div>
                            <div class="col-md-7"> 
                            		<div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" name="Sent_Date" value="<?php echo strtotime($Orders->Sent_Date) > 0 ? $Orders->Sent_Date: '';?>">
                                </div>
                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Ontv. datum:</div>
                            <div class="col-md-7"> 
                        <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                  <input type="text" class="datepicker form-control" id="received"  name="Received_Date" value="<?php echo strtotime($Orders->Received_Date) > 0 ? $Orders->Received_Date: '';?>">
                                </div>
                                
                                <?php /*?><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>
                        </div>
                        </div>
                      
                        <div class="form-row">
                          <div class="col-md-4">Goedgekeurd:</div>
                            <div class="col-md-7"> 
                      		  <div class="input-group">
                                  <div class="checkbox-inline">
                                    <div class="checker">
                              <input type="checkbox" name="Checked" id="checked" value="1" <?php if ($Orders->Checked == 1) { ?> checked="checked" <?php } ?>>
                                    </div>
                                 </div>
                             </div>
                         </div>
                               <?php /*?> <span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>
                        </div>
                        
                        
                        	<div class="form-row">

                            <div class="col-md-4">Factuurdatum:</div>

                            <div class="col-md-7"> 

                            		<div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" class="datepicker form-control"  name="Billing_Date" value="<?php echo strtotime($Orders->Billing_Date) > 0 ? $Orders->Billing_Date: '';?>">

                                </div>

                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>

                        

                        </div>
                        
                      
                      <div class="form-row">

                            <div class="col-md-4">Factuurnr:</div>

                            <div class="col-md-7"> 

                       <input type="text" class=" form-control"  name="Billing_no" value="<?=@$Orders->Billing_no?>">

                             

                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>

                        

                        </div>  
                         
                </div>         
            </div>
            <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Extra gegevens</h2>
                    </div>                   
                    </div>
                    <div class="content controls">
                         <div class="form-row">
                            <div class="col-md-4">Opmerkingen:</div>
                            <div class="col-md-7">                            
                            <textarea class="form-control" rows="5" name="Notes"><?=$Orders->Notes?></textarea>
                            		<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->
                            </div>                           
                        </div>                                        
                    </div>
                </div>
             </div>
            
      <div class="col-md-6"> 
               <div class="block">
                    <div class="header" >                   
                       <h2>Project gegevens</h2>                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Klant:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Klant" readonly="readonly" >
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Afdeling" readonly="readonly">
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Project:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Project" readonly="readonly">
                            </div>                           
                        </div> 
                        
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Klant proj. nr.:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Klant_proj" readonly="readonly">
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Project nr:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Project_nr" readonly="readonly">
                            </div>                           
                        </div>
                                       
                                       
                                       
                           <div class="form-row">
                            <div class="col-md-4">Uitvoerder:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Uitvoerder" readonly="readonly">
                            </div>                           
                        </div>
                        
                        
                          <div class="form-row">
                            <div class="col-md-4">Project Fax:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Project_Fax" readonly="readonly">
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Adres" readonly="readonly">
                            </div>                           
                        </div>   
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Postcode" readonly="readonly">
                            </div>                           
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Stad" readonly="readonly">
                            </div>                           
                        </div>  
                        
                        <div class="form-row">
                            <div class="col-md-4">Vaste prijs:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Vaste_prijs" readonly="readonly">
                            </div>                           
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Tarief p/u:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Tarief" readonly="readonly">
                            </div>                           
                        </div>
                                  
                    </div>
                </div> 
                                    
        </div>  
       
         <center>
                <div class="content controls">
                <div class="form-row">
                
                <div class="col-md-3" align="center" > 
                 <a href="<?php echo URL:: to( 'admin/ContainerBons' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
               
                
                </div>              
                <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-success']) !!}
                </div>
                                         
                </div>
                </div>
          </center> 
             
            </div>
           
    {!! Form::close() !!}        
  </div>
  <br />   
       @include('admin/footer')</div>  