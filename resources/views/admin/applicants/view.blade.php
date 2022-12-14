<!-- Header -->
    @include('admin/header')
     <title>Sollicitatieformullier view</title> 
      
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .strong { font-weight:bold;}
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin' ); ?>">Home</a></li>                    
                    <li class="active">Sollicitatieformullier view</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar')    
   
   <div class="col-md-12">

   <br />
   </div>
  <div class="col-md-12">  
    <div class="col-md-12">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Sollicitatieformullier</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-3 strong">Achternaam:</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Surname;  ?>
                            </div>
                               <div class="col-md-3 strong">Voornaam:</div>
                            <div class="col-md-3">
                            <?php echo $data->FirstName; ?> 
                            		
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-3 strong">Adres:</div>
                            <div class="col-md-3">
                            <?php echo $data->Adress; ?> 
                            		
                            </div>
                            <div class="col-md-3 strong">Postcode:</div>
                            <div class="col-md-3">
                            <?php echo $data->Postcode; ?>  
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Plaats:</div>
                            <div class="col-md-3">
                            <?php echo $data->place; ?>  
                            </div>
                             <div class="col-md-3 strong">Geboortedatum:</div>
                            <div class="col-md-3">
                             <?php echo $data->Birthday; ?>
                            </div>
                        </div>                                  
                      
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">BSN nummer:</div>
                            <div class="col-md-3">
                            <?php echo $data->BSN_nummer; ?>                             
                        </div>
                         <div class="col-md-3 strong">Leeftijd:</div>
                            <div class="col-md-3">
                            <?php echo $data->Age; ?>                             
                        </div>
                        </div>
                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Burgerlijke staat:</div>
                            <div class="col-md-3">
                            <?php echo $data->Marital_status; ?>                             
                        </div>
                         <div class="col-md-3 strong">Nationaliteit:</div>
                            <div class="col-md-3">
                            <?php echo $data->Nationality; ?>                             
                        </div>
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-3 strong">Ziekenfonds:</div>
                            <div class="col-md-3">
                            <?php echo $data->Health_insurance; ?>                             
                        </div>
                         <div class="col-md-3 strong">Bankrekeningnummer:</div>
                            <div class="col-md-3">
                            <?php echo $data->Bank_Ac_Number; ?>                             
                        </div>
                        </div>                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Ziekenfondsnummer:</div>
                            <div class="col-md-3">
                            <?php echo $data->Health_insurance_number; ?>                             
                        </div>
                         <div class="col-md-3 strong">Telefoonnr. (Mobiel):</div>
                            <div class="col-md-3">
                            <?php echo $data->Mobiel_no; ?>                             
                        </div>
                        </div>                        
                        
                         <div class="form-row">
                            <div class="col-md-3 strong">Telefoonnr (thuis):</div>
                            <div class="col-md-3">
                            <?php echo $data->phone; ?>                             
                        </div>
                         <div class="col-md-3 strong">Beschikbaar per:</div>
                            <div class="col-md-3">
                            <?php echo $data->available_at; ?>                             
                        </div>
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-3 strong">Beheersing Nederlandse taal:</div>
                            <div class="col-md-3">
                            <?php echo $data->Dutch_proficiency  == 'Ja' ? : 'Nee'; ?>                             
                        </div>
                         <div class="col-md-3 strong">VCA-diploma:</div>
                            <div class="col-md-3">
                             <?php echo $data->VCA_certificate == 'Ja' ? : 'Nee'; ?> 
                        </div>
                        </div>                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Bereidheid tot halen:</div>
                            <div class="col-md-3">
                            <?php echo $data->Willingness_to_achieve; ?>                             
                        </div>
                         <div class="col-md-3 strong">Binnen 3 maanden?:</div>
                            <div class="col-md-3">
                            <?php echo $data->Within_3_months; ?>                             
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Op eigen kosten?:</div>
                            <div class="col-md-3">
                            <?php echo $data->own_expense; ?>                             
                        </div>
                         <div class="col-md-3 strong">Rijbewijs:</div>
                            <div class="col-md-3">
                            <?php echo $data->License; ?>                             
                        </div>
                        </div>
                        
                       <div class="form-row">
                            <div class="col-md-3 strong">Eigen auto?:</div>
                            <div class="col-md-3">
                            <?php echo $data->Own_car; ?>                             
                        </div>
                          </div>
                        
                        
                        
                </div>         
            </div>
            
            
            
            <div class="block">
                    <div class="header" >
                    
                       <h2>Opleidingen en diploma’s</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-1 strong">1:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Training_and_qualifications_1;  ?>
                            </div>                             
                          </div>
                       
                   
                    
                        
                      <div class="form-row">
                          <div class="col-md-1 strong">2:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Training_and_qualifications_2;  ?>
                            </div>                              
                          </div>
                          
                          
                          <div class="form-row">
                          <div class="col-md-1 strong">3:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Training_and_qualifications_3;  ?>
                            </div>                             
                          </div>
                        
                        
                        
                </div>         
            </div>
            
            
            <div class="block">
                    <div class="header" >
                    
                       <h2>Werkervaring</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-1 strong">1:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Work_experience_1;  ?>
                            </div>                             
                          </div>
                       
                   
                    
                        
                      <div class="form-row">
                          <div class="col-md-1 strong">2:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Work_experience_2;  ?>
                            </div>                             
                          </div>
                          
                          
                          <div class="form-row">
                          <div class="col-md-1 strong">3:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Work_experience_3;  ?>
                            </div>                             
                          </div>
                        
                         <div class="form-row">
                          <div class="col-md-1 strong">4:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Work_experience_4;  ?>
                            </div>                             
                          </div>
                        
                </div>         
            </div>
            
            
            
            <div class="block">
                    <div class="header" >
                    
                       <h2>Ervaring met werkzaamheden:</h2>
                     <!---->               
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-3 strong">Beton afwerken:</div>
                            <div class="col-md-3"> 
                             <?php echo $data->Concrete_finishing == 'Ja' ? : 'Nee'; ?>
                            </div>
                               <div class="col-md-3 strong">Bouwtekening lezen:</div>
                            <div class="col-md-3">
                             <?php echo $data->Construction_Drawing_Reading == 'Ja' ? : 'Nee'; ?> 
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-3 strong">Hekken plaatsen :</div>
                            <div class="col-md-3">
                            <?php echo $data->Gates_Places == 'Ja' ? : 'Nee'; ?>                            		
                            </div>
                            <div class="col-md-3 strong">Sloop werkzaamheden:</div>
                            <div class="col-md-3">
                             <?php echo $data->demolition_work == 'Ja' ? : 'Nee'; ?>
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Beton bekistingen:</div>
                            <div class="col-md-3">
                            <?php echo $data->Concrete_Formwork == 'Ja' ? : 'Nee'; ?>
                            </div>
                             <div class="col-md-3 strong">Gebruik van machines:</div>
                            <div class="col-md-3">
                             <?php echo $data->Use_of_machines == 'Ja' ? : 'Nee'; ?>
                            </div>
                        </div>                                  
                      
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Isoleren:</div>
                            <div class="col-md-3">
                             <?php echo $data->Isolate == 'Ja' ? : 'Nee'; ?>         
                        </div>
                         <div class="col-md-3 strong">Steigers bouwen:</div>
                            <div class="col-md-3">
                            <?php echo $data->building_Scaffolding == 'Ja' ? : 'Nee'; ?>          
                        </div>
                        </div>
                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Bouw opleveringen:</div>
                            <div class="col-md-3">
                            <?php echo $data->Building_Deliveries == 'Ja' ? : 'Nee'; ?> 
                        </div>
                         <div class="col-md-3 strong">Glasbewassing:</div>
                            <div class="col-md-3">
                            <?php echo $data->Glasbewassing == 'Ja' ? : 'Nee'; ?>           
                        </div>
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-3 strong">Leiding geven:</div>
                            <div class="col-md-3">
                             <?php echo $data->To_lead == 'Ja' ? : 'Nee'; ?> 
                                                   
                        </div>
                         <div class="col-md-3 strong">Stut en stempel werk:</div>
                            <div class="col-md-3">
                            <?php echo $data->Strut_and_stamping == 'Ja' ? : 'Nee'; ?>           
                        </div>
                        </div>                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Bouw opruimen:</div>
                            <div class="col-md-3">
                            <?php echo $data->Building_Cleaner == 'Ja' ? : 'Nee'; ?>          
                        </div>
                         <div class="col-md-3 strong">Grondwerk:</div>
                            <div class="col-md-3">
                               <?php echo $data->Earth_work == 'Ja' ? : 'Nee'; ?> 
                                                        
                        </div>
                        </div>                        
                        
                         <div class="form-row">
                            <div class="col-md-3 strong">Licht timmerwerk:</div>
                            <div class="col-md-3">
                           
                             <?php echo $data->Lich_carpentry == 'Ja' ? : 'Nee'; ?>                            
                        </div>
                         <div class="col-md-3 strong">Overige werkzaamheden:</div>
                            <div class="col-md-3">
                            <?php echo $data->Other_activities == 'Ja' ? : 'Nee'; ?>                             
                        </div>
                        </div>
                        <!----->
                         <div class="form-row">
                            <div class="col-md-3 strong">Z Z P:</div>
                            <div class="col-md-3">
                            <?php echo $data->zzp; ?>                             
                        </div>
                         <div class="col-md-3">Tarief:</div>
                            <div class="col-md-3">
                            <?php echo $data->tarief; ?>                             
                        </div>
                        </div>                        
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">In bezit van:</div>
                            <div class="col-md-3">
                            <?php echo $data->possession; ?>                             
                        </div>
                         <div class="col-md-3 strong">Datum gesprek:</div>
                            <div class="col-md-3">
                            <?php echo $data->Date_Interview; ?>                             
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-3 strong">Betreft vacature:</div>
                            <div class="col-md-3">
                            <?php echo $data->subject_Job; ?>                             
                        </div>
                         <div class="col-md-3 strong">Uitzendbureau:</div>
                            <div class="col-md-3">
                            <?php echo $agency->Name; ?>                             
                        </div>
                        </div>
                        
                       <div class="form-row">
                            <div class="col-md-3 strong">Onze Kenmerk:</div>
                            <div class="col-md-3">
                            <?php echo $data->our_Feature; ?>                             
                        </div>
                          <div class="col-md-3 strong">Startdatum:</div>
                            <div class="col-md-3">
                            <?php echo $data->Starting_date; ?>                             
                        </div> 
                          </div>
                          
                          
                           <div class="form-row">
                            <div class="col-md-3 strong">Earste project:</div>
                            <div class="col-md-3">
                            <?php echo $data->first_project; ?>                             
                        </div>                                      
                        
                          </div>
                        
                        
                        
                </div>         
            </div>
            
            <div class="block">
                    <div class="header" >
                    
                       <h2>Werknemersversverklaring</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-3 strong">Voornaam:</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_FirstName;  ?>
                            </div>                             
                             <div class="col-md-3 strong">Achternaam:</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_Surname;  ?>
                            </div>                            
                          </div>
                    
                        
                      <div class="form-row">
                          <div class="col-md-3 strong">Nationaliteit:</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Emp_Nationality;  ?>
                            </div>                             
                          </div>
                        
                        
                </div>         
            </div>
            
            <div class="block">
                    <div class="header" >
                    
                       <h2>Uw gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-3 strong">1a Naam en voorletter(s):</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_Name_and_initial;  ?>
                            </div>                             
                             <div class="col-md-3 strong">1b Burgerservicenummer (BSN):</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_Deposit_Plaintiff_Vice_number;  ?>
                            </div>                            
                          </div>
                    
                        <div class="form-row">
                          <div class="col-md-3 strong">1c Straat en huisnummer:</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_Street_Address;  ?>
                            </div>                             
                             <div class="col-md-3 strong">1d Postcode en woonplaats:</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_Postcode.' '.$data->Emp_residence;  ?>
                            </div>                            
                          </div>
                          
                          <div class="form-row">
                          <div class="col-md-3 strong">1e Land en regio Alleen invullen als u in het buitenland woont :</div>
                            <div class="col-md-9"> 
                            	<?php echo $data->Emp_Country_and_region;  ?>
                            </div>                             
                                 
                          </div>
                          
                          <div class="form-row">
                          <div class="col-md-3 strong ">1f Geboortedatum:</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_Birthday;  ?>
                            </div>                             
                             <div class="col-md-3 strong">1g Telefoonnummer:</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->Emp_telephone;  ?>
                            </div>                            
                          </div>
                        
                </div>         
            </div>
            
            
            <div class="block">
                    <div class="header" >
                    
                       <h2>Loonheffingskorting toepassen</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-7 strong">Wilt u dat uw werkgever of uitkeringsinstantie rekening houdt met de loonheffingskorting? U kunt de loonheffingskorting maar door 1 werkgever of uitkeringsinstantie tegelijkertijd laten toepassen. Zie ook de toelichting onderaan.</div>
                          
                            <div class="col-md-1">
							 <?php echo $data->account_the_payroll_ja_tax == 'Ja' ? : 'Nee'; ?> 
							</div>
                            <div class="col-md-3"> 
                            	<?php echo $data->account_the_payroll_tax_ja_date;  ?>
                            </div>                 
                           <br />
                            <div class="col-md-1">
							<?php echo $data->account_the_payroll_nee_tax == 'Ja' ? : 'Nee'; ?></div>
                            <div class="col-md-3"> 
                            	<?php echo $data->account_the_payroll_tax_nee_date;  ?>
                            </div> 
                          </div>        
                </div>         
            </div>
               
                            <div class="content controls" align="center">
                          <div class="form-row" align="center">
                           <div class="col-md-3"></div>
                          <div class="col-md-3">
        <a href=" <?php echo URL:: to( 'admin/applicants' ); ?> " class="btn btn-success" style="float:none;width:100%">Back</a>
        </div>                      
                    </div> </div>
                 
                </div> 
                 
   
       
            </div>
           
         
  </div>  
  
    <br />  
             
           <br />  
  
   
       @include('admin/footer')</div>  