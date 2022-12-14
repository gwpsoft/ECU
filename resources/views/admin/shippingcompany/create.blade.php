<!-- Header -->
    @include('admin/header')
     <title>Afvalcontainers levrancier toevoegen</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .center { text-align:center;} 
 .left { text-align:left}
 label { font-size:13px;}
table th,td { font-size:12px;}

</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>                     
                    <li class="active">Afvalcontainers levrancier toevoegen</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/store_ContainersLeverancier']) !!}
   <div class="col-md-12">
@if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-6">
                
                <div class="block">
                    <div class="header" >                    
                       <h2>Bedrijfsgegevens</h2> 
                       <span class="pull-right clickable">
                       <i class="icon-chevron-up"></i>
                       </span>                                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Bedrijfsnaam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Bedrijfsnaam" name="Companyname" value="{{ (Input::old('Companyname')) ? Input::old('Companyname') : '' }}"><span class="error">  {{ $errors->first( 'Companyname' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Code:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Code" name="Code" value="{{ (Input::old('Code')) ? Input::old('Code') : '' }}"><span class="error">  {{ $errors->first( 'Code' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Telefoon:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Telefoon" name="Phone" value="{{ (Input::old('Phone')) ? Input::old('Phone') : '' }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Mobiel" name="Mobile" value="{{ (Input::old('Mobile')) ? Input::old('Mobile') : '' }}"><span class="error">  {{ $errors->first( 'Mobile' , ':message' ) }}</span>
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Mobiel 2:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Mobiel 2" name="Mobile2" value="{{ (Input::old('Mobile2')) ? Input::old('Mobile2') : '' }}">
                            </div>                           
                        </div>  
                        
                          <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Fax" name="Fax" value="{{ (Input::old('Fax')) ? Input::old('Fax') : '' }}"><span class="error">  {{ $errors->first( 'Fax' , ':message' ) }}</span>
                            </div>                           
                        </div>  
                        
                        
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ (Input::old('Email')) ? Input::old('Email') : '' }}"><span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>
                            </div>                           
                        </div>
                        
                          <div class="form-row">
                            <div class="col-md-4">Email (Planning):</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Email (Planning)" name="Email_planniing" value="{{ (Input::old('Email_planniing')) ? Input::old('Email_planniing') : '' }}">
                            </div>                           
                        </div>
                        
                        
                </div>         
            </div>
             
             
             
                 
                    
             </div>
            
      <div class="col-md-6"> 
               
               <div class="block">
                    <div class="header">                  
                       <h2>Adres gegevens</h2> 
                    <span class="pull-right clickable"><i class="icon-chevron-up"></i></span>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Adres" name="Address" value="{{ (Input::old('Address')) ? Input::old('Address') : '' }}"><span class="error">  {{ $errors->first( 'Address' , ':message' ) }}</span>
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Postcode" name="Zipcode" value="{{ (Input::old('Zipcode')) ? Input::old('Zipcode') : '' }}"><span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span>
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Stad" name="City" value="{{ (Input::old('City')) ? Input::old('City') : '' }}"><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span>
                            </div>                           
                        </div>                          
                    </div>
                </div>
                
             <div class="block">
                    <div class="header" >                   
                       <h2>Prijslijst All-in</h2>
                       <span class="pull-right clickable "><i class="icon-chevron-down"></i></span>
                    
                    </div>
                    <div class="content controls" style="display:none">
                    
                    
                     <div class="form-row">
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-3"> 
                            	BSA	
                            </div> 
                              <div class="col-md-3"> 
                            	Hout	
                            </div> 
                              <div class="col-md-3"> 
                            	Puin
                            </div>                           
                        </div>
                    
                        <div class="form-row">
                            <div class="col-md-3">3m<sup>3</sup>:</div>
                            <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_3m3_bsa" value="{{ (Input::old('pr_3m3_bsa')) ? Input::old('pr_3m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_3m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                        
                         
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_3m3_hout" value="{{ (Input::old('pr_3m3_hout')) ? Input::old('pr_3m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_3m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                        
                      
                       
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_3m3_puin" value="{{ (Input::old('pr_3m3_puin')) ? Input::old('pr_3m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_3m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                         </div>  
                         
                     <div class="form-row">
                            <div class="col-md-3">6m<sup>3</sup>:</div>
                            <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_6m3_bsa" value="{{ (Input::old('pr_6m3_bsa')) ? Input::old('pr_6m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_6m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                        
                         
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_6m3_hout" value="{{ (Input::old('pr_6m3_hout')) ? Input::old('pr_6m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_6m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                        
                      
                       
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_6m3_puin" value="{{ (Input::old('pr_6m3_puin')) ? Input::old('pr_6m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_6m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                         </div>
                         
                         <div class="form-row">
                            <div class="col-md-3">10m<sup>3</sup>:</div>
                            <div class="col-md-2" > 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_10m3_bsa" value="{{ (Input::old('pr_10m3_bsa')) ? Input::old('pr_10m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_10m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                        
                         
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_10m3_hout" value="{{ (Input::old('pr_10m3_hout')) ? Input::old('pr_10m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_10m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                        
                      
                       
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_10m3_puin" value="{{ (Input::old('pr_10m3_puin')) ? Input::old('pr_10m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_10m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                         </div>
                         
                          <div class="form-row">
                            <div class="col-md-3">20m<sup>3</sup>:</div>
                            <div class="col-md-2" > 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_20m3_bsa" value="{{ (Input::old('pr_20m3_bsa')) ? Input::old('pr_20m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_20m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                        
                         
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_20m3_hout" value="{{ (Input::old('pr_20m3_hout')) ? Input::old('pr_20m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_20m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                        
                      
                       
                          <div class="col-md-2"> 
                            		<input type="text" class="form-control" placeholder="Prijs" name="pr_20m3_puin" value="{{ (Input::old('pr_20m3_puin')) ? Input::old('pr_20m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_20m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>                          
                      
                         </div>
                         
                               
                    </div>
                </div>                 
                
             </div>
             
             
         <div class="col-md-12">      
             
             <div class="block">
                    <div class="header" >                   
                       <h2>Prijslijst</h2>
                       <span class="pull-right clickable"><i class="icon-chevron-down"></i></span>
                    </div>
                    <div class="content" style="display:none">
                    
                     <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>
    
      <tr>
      <th class="center" width="10%">Article No</th>
      <th width="60%" class="center">Description</th>  
      <th width="15%" class="center">Price</th>
      <th width="20%" class="center">Unit</th>     
    </tr>
    </thead>
    <tbody>
    <tr style="border:none;"><td colspan="4" class="left"><h5>Transporttarief per container (voor dit tarief wordt de container geleverd en opgehaald)</h5></td></tr>
    
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_10m3" value="{{ (Input::old('article_no_10m3')) ? Input::old('article_no_10m3') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_10m3' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Transportkosten containers met een inhoud van 3 m<sup>3</sup> tot en met 10 m<sup>3</sup>
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_10m3" value="{{ (Input::old('Price_10m3')) ? Input::old('Price_10m3') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_10m3' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_10m3">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_10m3' , ':message' ) }}</span> 
    </td>
    </tr>
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_40m3" value="{{ (Input::old('article_no_40m3')) ? Input::old('article_no_40m3') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_40m3' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Transportkosten containers met een inhoud van 15 m<sup>3</sup> tot en met 40 m<sup>3</sup>   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_40m3" value="{{ (Input::old('Price_40m3')) ? Input::old('Price_40m3') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_40m3' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_40m3">
        <option value="">Selecteer Unit</option>
        <option value="KG">KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_40m3' , ':message' ) }}</span> 
    </td>
    </tr>
    
     <tr style="border:none;"><td colspan="4" class="left"><h5>Verwerkingstariet per ton (1000 kg)</h5></td></tr>
   
     <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_sorteerbaar" value="{{ (Input::old('article_no_sorteerbaar')) ? Input::old('article_no_sorteerbaar') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_sorteerbaar' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Bouw- en sloopafval (sorteerbaar)  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_sorteerbaar" value="{{ (Input::old('Price_sorteerbaar')) ? Input::old('Price_sorteerbaar') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_sorteerbaar' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_sorteerbaar">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_sorteerbaar' , ':message' ) }}</span> 
    </td>
    </tr>
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_niet_sorteerbaar" value="{{ (Input::old('article_no_niet_sorteerbaar')) ? Input::old('article_no_niet_sorteerbaar') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_niet_sorteerbaar' , ':message' ) }}</span>
    </td>
    
    <td class="left">
   Bouw- en sloopafval (niet sorteerbaar)   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_niet_sorteerbaar" value="{{ (Input::old('Price_niet_sorteerbaar')) ? Input::old('Price_niet_sorteerbaar') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_niet_sorteerbaar' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_niet_sorteerbaar">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_niet_sorteerbaar' , ':message' ) }}</span> 
    </td>
    </tr>
     <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Bedrijfsafval" value="{{ (Input::old('article_no_Bedrijfsafval')) ? Input::old('article_no_Bedrijfsafval') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Bedrijfsafval' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Bedrijfsafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Bedrijfsafval" value="{{ (Input::old('Price_Bedrijfsafval')) ? Input::old('Price_Bedrijfsafval') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Bedrijfsafval' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Bedrijfsafval">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Bedrijfsafval' , ':message' ) }}</span> 
    </td>
    </tr>
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_A_B_hout" value="{{ (Input::old('article_no_A_B_hout')) ? Input::old('article_no_A_B_hout') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_A_B_hout' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Gemengd hout (A- enlof B- hout)  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_A_B_hout" value="{{ (Input::old('Price_A_B_hout')) ? Input::old('Price_A_B_hout') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_A_B_hout' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_A_B_hout">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_A_B_hout' , ':message' ) }}</span> 
    </td>
    </tr>
     <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_C_hout" value="{{ (Input::old('article_no_C_hout')) ? Input::old('article_no_C_hout') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_C_hout' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    C- hout
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_C_hout" value="{{ (Input::old('Price_C_hout')) ? Input::old('Price_C_hout') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_C_hout' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_C_hout">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_C_hout' , ':message' ) }}</span> 
    </td>
    </tr>
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Schoon_puin" value="{{ (Input::old('article_no_Schoon_puin')) ? Input::old('article_no_Schoon_puin') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Schoon_puin' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Schoon puin(< 60 cm)  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_puin" value="{{ (Input::old('Price_Schoon_puin')) ? Input::old('Price_Schoon_puin') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_puin' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Schoon_puin">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Schoon_puin' , ':message' ) }}</span> 
    </td>
    </tr>
    
     <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Puin_Grof" value="{{ (Input::old('article_no_Puin_Grof')) ? Input::old('article_no_Puin_Grof') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Puin_Grof' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Puin Grof (> 60 cm)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_Grof" value="{{ (Input::old('Price_Puin_Grof')) ? Input::old('Price_Puin_Grof') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_Grof' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Puin_Grof">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Puin_Grof' , ':message' ) }}</span> 
    </td>
    </tr>
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Puin_met_10" value="{{ (Input::old('article_no_Puin_met_10')) ? Input::old('article_no_Puin_met_10') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Puin_met_10' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Puin met 10% tot 25% zand I grond  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_10" value="{{ (Input::old('Price_Puin_met_10')) ? Input::old('Price_Puin_met_10') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_10' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Puin_met_10">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Puin_met_10' , ':message' ) }}</span> 
    </td>
    </tr>
    
     <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Puin_met_25" value="{{ (Input::old('article_no_Puin_met_25')) ? Input::old('article_no_Puin_met_25') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Puin_met_25' , ':message' ) }}</span>
    </td>
    
    <td class="left">
   Puin met 25% of meer zand I grond
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_25" value="{{ (Input::old('Price_Puin_met_25')) ? Input::old('Price_Puin_met_25') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_25' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Puin_met_25">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Puin_met_25' , ':message' ) }}</span> 
    </td>
    </tr>
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Asfaltpuin" value="{{ (Input::old('article_no_Asfaltpuin')) ? Input::old('article_no_Asfaltpuin') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Asfaltpuin' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Asfaltpuin 
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Asfaltpuin" value="{{ (Input::old('Price_Asfaltpuin')) ? Input::old('Price_Asfaltpuin') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Asfaltpuin' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Asfaltpuin">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Asfaltpuin' , ':message' ) }}</span> 
    </td>
    </tr>
    
     <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Schoon_Gips" value="{{ (Input::old('article_no_Schoon_Gips')) ? Input::old('article_no_Schoon_Gips') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Schoon_Gips' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Schoon Gips
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_Gips" value="{{ (Input::old('Price_Schoon_Gips')) ? Input::old('Price_Schoon_Gips') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_Gips' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Schoon_Gips">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Schoon_Gips' , ':message' ) }}</span> 
    </td>
    </tr>
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Groenafval" value="{{ (Input::old('article_no_Groenafval')) ? Input::old('article_no_Groenafval') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Groenafval' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Groenafval   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Groenafval" value="{{ (Input::old('Price_Groenafval')) ? Input::old('Price_Groenafval') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Groenafval' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Groenafval">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Groenafval' , ':message' ) }}</span> 
    </td>
    </tr>    
    
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Dakafval" value="{{ (Input::old('article_no_Dakafval')) ? Input::old('article_no_Dakafval') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Dakafval' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Dakafval   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakafval" value="{{ (Input::old('Price_Dakafval')) ? Input::old('Price_Dakafval') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakafval' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Dakafval">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Dakafval' , ':message' ) }}</span> 
    </td>
    </tr>
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Dakgrind" value="{{ (Input::old('article_no_Dakgrind')) ? Input::old('article_no_Dakgrind') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Dakgrind' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Dakgrind   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakgrind" value="{{ (Input::old('Price_Dakgrind')) ? Input::old('Price_Dakgrind') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakgrind' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Dakgrind">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Dakgrind' , ':message' ) }}</span> 
    </td>
    </tr>
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Schoon_vlakglas" value="{{ (Input::old('article_no_Schoon_vlakglas')) ? Input::old('article_no_Schoon_vlakglas') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Schoon_vlakglas' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Schoon vlakglas   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_vlakglas" value="{{ (Input::old('Price_Schoon_vlakglas')) ? Input::old('Price_Schoon_vlakglas') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_vlakglas' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Schoon_vlakglas">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Schoon_vlakglas' , ':message' ) }}</span> 
    </td>
    </tr>
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Opbrengsten_metalen" value="{{ (Input::old('article_no_Opbrengsten_metalen')) ? Input::old('article_no_Opbrengsten_metalen') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Opbrengsten_metalen' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Opbrengsten metalen, per ton   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_metalen" value="{{ (Input::old('Price_Opbrengsten_metalen')) ? Input::old('Price_Opbrengsten_metalen') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_metalen' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Opbrengsten_metalen">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Opbrengsten_metalen' , ':message' ) }}</span> 
    </td>
    </tr>
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_Opbrengsten_Papier" value="{{ (Input::old('article_no_Opbrengsten_Papier')) ? Input::old('article_no_Opbrengsten_Papier') : '' }}">    
    <span class="error">  {{ $errors->first( 'article_no_Opbrengsten_Papier' , ':message' ) }}</span>
    </td>
    
    <td class="left">
    Opbrengsten Papier & Karton, per ton   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_Papier" value="{{ (Input::old('Price_Opbrengsten_Papier')) ? Input::old('Price_Opbrengsten_Papier') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_Papier' , ':message' ) }}</span>
        
    </td>
    <td>
        <select class="form-control" name="Unit_Opbrengsten_Papier">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
        <span class="error">  {{ $errors->first( 'Unit_Opbrengsten_Papier' , ':message' ) }}</span> 
    </td>
    </tr>
    <!---Extra Fields ---->
      <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_field1" value="{{ (Input::old('article_no_field1')) ? Input::old('article_no_field1') : '' }}">    
   
    </td>
    
    <td class="left">
      <input type="text" class="form-control" placeholder="Description" name="description_field1" value="{{ (Input::old('description_field1')) ? Input::old('description_field1') : '' }}">    
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_field1" value="{{ (Input::old('Price_field1')) ? Input::old('Price_field1') : '' }}"></div> <div class="col-md-1"> €</div>
        
    </td>
    <td>
        <select class="form-control" name="Unit_field1">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
    </td>
    </tr>
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_field2" value="{{ (Input::old('article_no_field2')) ? Input::old('article_no_field2') : '' }}">
    </td>
    
    <td class="left">
     <input type="text" class="form-control" placeholder="Description" name="description_field2" value="{{ (Input::old('description_field2')) ? Input::old('description_field2') : '' }}">    
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_field2" value="{{ (Input::old('Price_field2')) ? Input::old('Price_field2') : '' }}"></div> <div class="col-md-1"> €</div>
    </td>
    <td>
        <select class="form-control" name="Unit_field2">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
    </td>
    </tr>
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_field3" value="{{ (Input::old('article_no_field3')) ? Input::old('article_no_field3') : '' }}">
    </td>
    
    <td class="left">
     <input type="text" class="form-control" placeholder="Description" name="description_field3" value="{{ (Input::old('description_field3')) ? Input::old('description_field3') : '' }}">    
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_field3" value="{{ (Input::old('Price_field3')) ? Input::old('Price_field3') : '' }}"></div> <div class="col-md-1"> €</div>
        
    </td>
    <td>
        <select class="form-control" name="Unit_field3">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select> 
    </td>
    </tr>
    <tr>
    
    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_field4" value="{{ (Input::old('article_no_field4')) ? Input::old('article_no_field4') : '' }}">
    </td>
    
    <td class="left">
     <input type="text" class="form-control" placeholder="Description" name="description_field4" value="{{ (Input::old('description_field4')) ? Input::old('description_field4') : '' }}">    
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_field4" value="{{ (Input::old('Price_field4')) ? Input::old('Price_field4') : '' }}"></div> <div class="col-md-1"> €</div>
    </td>
    <td>
        <select class="form-control" name="Unit_field4">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option> 
        <option value="WEEK">Per WEEK</option>   
        <option value="MAAND">Per MAAND</option>                                   
        </select>
    </td>
    </tr>
    
    </tbody>    
    </table>       
                   
                    </div>
                </div>  
                </div> 
                 <div class="col-md-12">      
         <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                             <div class="col-md-3" align="center" > 
                <a href="<?php echo URL:: to( 'admin/ContainersLeverancier' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
                </div> 
                
                    <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}
                </div>
                             
                <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan & Afsluiten', ['class' => 'btn btn-success','name' => 'Save_Close']) !!}
                </div>
                
                 <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan & Nieuw', ['class' => 'btn btn-success','name' => 'Save_New']) !!}
                </div>
                    </div>
                </div>                           
        </div>  
      
            </div>
            
    {!! Form::close() !!}        
  </div>    <br />
 
  
  
       @include('admin/footer')</div>  