<!-- Header -->
    @include('admin/header')
     <title>Afvalcontainers levrancier</title>  
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
                    <li class="active">Afvalcontainers levrancier</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
   
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
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Bedrijfsnaam:</div>
                            <div class="col-md-7"> 
                            		{{$data->Companyname}}
                                  
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Code:</div>
                            <div class="col-md-7"> 
                            		{{$data->Code}}
                                  
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Telefoon:</div>
                            <div class="col-md-7"> 
                            {{$data->Phone}}
                            
                            
                            		
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7">
                            {{$data->Mobile}} 
                            		
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Mobiel 2:</div>
                            <div class="col-md-7"> 
                             {{$data->Mobile2}} 
                            		
                            </div>                           
                        </div>  
                          <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7"> 
                             {{$data->Fax}} 
                            </div>                           
                        </div>  
                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7">
                             {{$data->Email}}
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Email (Planning):</div>
                            <div class="col-md-7">
                             {{$data->Email_planniing}}
                        </div>
                        
                        
                </div>         
            </div>
                 
                    
             </div></div>
             
       </div>    
      <div class="col-md-6"> 
                
         <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Adres gegevens</h2>
                    </div>
                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7"> 
                            {{$data->Address}}  
                            		
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7">
                            {{$data->Zipcode}}   
                            		
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7"> 
                             {{$data->City}}   
                            	
                            </div>                           
                        </div>                          
                    </div>
                </div>    
                
                                 
            <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Prijslijst All-in</h2>
                    </div>
                   
                    </div>
                    <div class="content controls">
                    
                    
                     <div class="form-row">
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-3"> 
                            	<strong>BSA</strong>	
                            </div> 
                              <div class="col-md-3"> 
                            	<strong>Hout</strong>	
                            </div> 
                              <div class="col-md-3"> 
                            	<strong>Puin</strong>
                            </div>                           
                        </div>
                    
                        <div class="form-row">
                            <div class="col-md-3"><strong>3 m<sup>3</sup>:</strong></div>
                            <div class="col-md-3">
                            		{{ $data->pr_3m3_bsa }} € </div>                     
                      
                        
                         
                          <div class="col-md-3"> 
                            		{{ $data->pr_3m3_hout }} €</div>
                                                   
                      
                       
                          <div class="col-md-3"> 
                            		{{ $data->pr_3m3_puin }} €
                            </div>                          
                      
                         </div>  
                         
                     <div class="form-row">
                            <div class="col-md-3"><strong>6 m<sup>3</sup>:</strong></div>
                            <div class="col-md-3"> 
                            		{{ $data->pr_6m3_bsa }} €
                            </div>                        
                      
                        
                         
                          <div class="col-md-3"> 
                            		{{ $data->pr_6m3_hout }} €
                            </div>                       
                      
                       
                          <div class="col-md-3"> 
                            		{{ $data->pr_6m3_puin }} €
                            </div>                     
                      
                         </div>
                         
                         <div class="form-row">
                            <div class="col-md-3"><strong>10 m<sup>3</sup>:</strong></div>
                            <div class="col-md-3"> 
                            		{{ $data->pr_10m3_bsa }} €
                            </div>                        
                      
                        
                         
                          <div class="col-md-3"> 
                            		{{ $data->pr_10m3_hout }} €
                            </div>                        
                      
                       
                          <div class="col-md-3"> 
                            		{{ $data->pr_10m3_puin }} €
                            </div>                        
                      
                         </div>
                         
                          <div class="form-row">
                            <div class="col-md-3"><strong>20 m<sup>3</sup>:</strong></div>
                            <div class="col-md-3"> 
                            		{{ $data->pr_20m3_bsa }} €
                            </div>                        
                      
                        
                         
                          <div class="col-md-3"> 
                            		{{ $data->pr_20m3_hout }} €
                            </div>                        
                      
                       
                          <div class="col-md-3"> 
                            		{{ $data->pr_20m3_puin }} €
                            </div>                        
                      
                         </div>     
                    </div>
                </div>  
          </div> 
           
            <div class="col-md-12">      
             
             <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Prijslijst</h2>
                    </div>
                   
                    </div>
                    <div class="content">
                    
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
    <tr style="border:none;">
    <td colspan="4" class="left"><h5>Transporttarief per container (voor dit tarief wordt de container geleverd en opgehaald)</h5></td>
    </tr>
    
    
    <tr>    
    <td>{{ $data->article_no_10m3 }}</td>    
    <td class="left">Transportkosten containers met een inhoud van 3 m<sup>3</sup> tot en met 10 m<sup>3</sup></td>
    <td> {{  $data->Price_10m3 }} &nbsp; € </td>
    <td>Per {{ $data->Unit_10m3 }} </td>
    </tr>
    
    <tr>    
    <td>{{ $data->article_no_40m3 }}</td>    
    <td class="left">Transportkosten containers met een inhoud van 15 m<sup>3</sup> tot en met 40 m<sup>3</sup></td>
    <td>{{ $data->Price_40m3 }} &nbsp; € </td>
    <td>Per {{ $data->Unit_40m3 }} </td>
    </tr>
    
     <tr style="border:none;"><td colspan="4" class="left"><h5>Verwerkingstariet per ton (1000 kg)</h5></td></tr>
   
     <tr>
    
    <td>{{ $data->article_no_sorteerbaar }} </td>
    
    <td class="left">
    Bouw- en sloopafval (sorteerbaar)  
   </td>
    <td>{{ $data->Price_sorteerbaar }} &nbsp; € </td>
    <td>Per {{ $data->Unit_sorteerbaar }}</td>
    </tr>
    
    <tr>
    
    <td>{{ $data->article_no_niet_sorteerbaar }} </td>
    
    <td class="left">
   Bouw- en sloopafval (niet sorteerbaar)   
   </td>
    <td>{{  $data->Price_niet_sorteerbaar }} &nbsp; € </td>
    <td>Per {{ $data->Unit_niet_sorteerbaar }}</td>
    </tr>
     <tr>
    
    <td>{{  $data->article_no_Bedrijfsafval }}</td>    
    <td class="left">Bedrijfsafval</td>
    <td>{{  $data->Price_Bedrijfsafval }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Bedrijfsafval}} </td>
    </tr>
    
    <tr>
    
    <td>{{  $data->article_no_A_B_hout }} </td>
    
    <td class="left">
    Gemengd hout (A- enlof B- hout)  
   </td>
    <td>{{  $data->Price_A_B_hout }} &nbsp; € </td>
    <td>Per {{ $data->Unit_A_B_hout}}</td>
    </tr>
     <tr>
    
    <td>{{  $data->article_no_C_hout }}</td>
    
    <td class="left">C- hout</td>
    <td>{{  $data->Price_C_hout }} &nbsp; €</td>
    <td>Per {{ $data->Unit_C_hout}}</td>
    </tr>
    
    <tr>
    <td>{{  $data->article_no_Schoon_puin }}</td>    
    <td class="left">Schoon puin(< 60 cm)</td>
    <td>{{  $data->Price_Schoon_puin }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Schoon_puin}}</td>
    </tr>
    
     <tr>    
    <td>{{  $data->article_no_Puin_Grof }}</td>    
    <td class="left">Puin Grof (> 60 cm)</td>
    <td>{{  $data->Price_Puin_Grof }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Puin_Grof }}</td>
    </tr>
    
    <tr>    
    <td>{{  $data->article_no_Puin_met_10 }}</td>    
    <td class="left">Puin met 10% tot 25% zand I grond</td>
    <td>{{  $data->Price_Puin_met_10 }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Puin_met_10}}</td>
    </tr>
    
     <tr>    
    <td>{{  $data->article_no_Puin_met_25 }}</td>    
    <td class="left">Puin met 25% of meer zand I grond </td>
    <td>{{  $data->Price_Puin_met_25 }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Puin_met_25}}</td>
    </tr>
    
    <tr>
    
    <td>{{  $data->article_no_Asfaltpuin }}</td>    
    <td class="left">Asfaltpuin </td>
    <td>{{  $data->Price_Asfaltpuin }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Asfaltpuin }}</td>
    </tr>
    
     <tr>    
    <td>{{  $data->article_no_Schoon_Gips }}</td>    
    <td class="left">Schoon Gips</td>
    <td>{{  $data->Price_Schoon_Gips }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Schoon_Gips }}</td>
    </tr>
    
    <tr>    
    <td>{{  $data->article_no_Groenafval }}</td>    
    <td class="left">Groenafval</td>
    <td>{{  $data->Price_Groenafval }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Groenafval}}</td>
    </tr>
    
    <tr>    
    <td>{{  $data->article_no_Dakafval }}</td>    
    <td class="left">Dakafval</td>
    <td>{{  $data->Price_Dakafval }} &nbsp; € </td>
    <td>Per {{ $data->Unit_Dakafval}}</td>
    </tr>
    
    <tr>    
    <td>{{  $data->article_no_Dakgrind }}</td>    
    <td class="left">Dakgrind</td>
    <td>{{  $data->Price_Dakgrind }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Dakgrind}}</td>
    </tr>
     
    <tr>    
    <td>{{  $data->article_no_Schoon_vlakglas }}</td>    
    <td class="left">Schoon vlakglas </td>
    <td>{{  $data->Price_Schoon_vlakglas }} &nbsp; €</td>
    <td>Per {{$data->Unit_Schoon_vlakglas}}</td>
    </tr>
    
    <tr>    
    <td>{{  $data->article_no_Opbrengsten_metalen }}</td>    
    <td class="left">Opbrengsten metalen, per ton </td>
    <td>{{  $data->Price_Opbrengsten_metalen }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Opbrengsten_metalen}}</td>
    </tr>
    
    <tr>    
    <td>{{  $data->article_no_Opbrengsten_Papier }}</td>    
    <td class="left">Opbrengsten Papier & Karton, per ton </td>
    <td>{{  $data->Price_Opbrengsten_Papier }} &nbsp; €</td>
    <td>Per {{ $data->Unit_Opbrengsten_Papier}}</td>
    </tr>
    <!-----Extra fields--->
    <tr>    
    <td>{{  $data->article_no_field1 }}</td>    
    <td class="left">{{ $data->description_field1}} </td>
    <td>{{  $data->Price_field1 }} &nbsp; €</td>
    <td>Per {{ $data->Unit_field1}}</td>
    </tr>
    <tr>    
    <td>{{  $data->article_no_field2 }}</td>    
    <td class="left">{{ $data->description_field2}} </td>
    <td>{{  $data->Price_field2 }} &nbsp; €</td>
    <td>Per {{ $data->Unit_field2}}</td>
    </tr>
    <tr>    
    <td>{{  $data->article_no_field3 }}</td>    
    <td class="left">{{ $data->description_field3}} </td>
    <td>{{  $data->Price_field3 }} &nbsp; €</td>
    <td>Per {{ $data->Unit_field3}}</td>
    </tr>
    <tr>    
    <td>{{  $data->article_no_field4 }}</td>    
    <td class="left">{{ $data->description_field4}} </td>
    <td>{{  $data->Price_field4 }} &nbsp; €</td>
    <td>Per {{ $data->Unit_field4}}</td>
    </tr>
    
    </tbody>    
    </table>       
                   
                    </div>
                </div>  
                </div>    
                  
         
         <div class="col-md-3">           
         <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                            <div class="col-md-6" >
                         
                             <a href=" <?php echo URL:: to( 'admin/ContainersLeverancier' ); ?> " class="btn btn-success" style="float:none;width:100%">Back</a>
                            		
                            </div>              
                            <div class="col-md-6" style="float:right">
                          
                            </div>                                                
                    </div>
                </div>                           
      </div>
      </div> 
         
      
  </div> 
   <br />  
       @include('admin/footer')</div>  