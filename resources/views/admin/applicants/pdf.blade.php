<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style>
        body {
        font-family:"Arial Black", Gadget, sans-serif;         
        }
		.center{ text-align:center;}
		li { font-size:16px; font-weight:normal; padding:6px;}
        table,td {
            border:1px solid #000;text-shadow:none; text-align:left; font-size:11px; font-weight:normal; padding:4px; }
			table,th {  border:1px solid #000; box-shadow:none;  text-align:left; font-size:12px; font-weight:bold; padding:3px;} 
		table  {
           border-collapse: collapse; }
		.strong{ font-weight:bold;}
        
    </style>
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td width="30%" >
		<img src="<?php echo url();?>/assets/img/icons/Logo.jpg" style=" vertical-align:top; width:125px; height:90px;"  />           

        </td>
        <td style="line-height:4px; vertical-align:bottom; font-size:14px;">
      SOLLICITATIEFORMULIER
      
        </td>
        </tr> 
        </table>
        
<table class="table table-bordered" width="100%">
<tbody>
<tr>
<th colspan="4">Personalia:</th>
</tr>
<tr>
<th align="left">Achternaam</th>
<td colspan="3"><?php echo $data->Surname;  ?>&nbsp;</td>
</tr>
<tr>
<th>Voornaam</th>
<td colspan="3">  <?php echo $data->FirstName; ?> &nbsp;</td>
</tr>
<tr>
<th>Adres</th>
<td colspan="3"><?php echo $data->Adress; ?> &nbsp;</td>
</tr>
<tr>
<th>Postcode</th>
<td><?php echo $data->Postcode; ?>  &nbsp;</td>
<th>Plaats</th>
<td> <?php echo $data->place; ?>  &nbsp;</td>
</tr>           
             
<tr>
<th>Geboortedatum</th>
<td><?php echo $data->Birthday; ?>&nbsp;</td>
<th>BSN nummer</th>
<td> <?php echo $data->BSN_nummer; ?>      &nbsp;</td>
</tr>
<tr>
<th>Leeftijd</th>
<td> <?php echo $data->Age; ?>    &nbsp;</td>
<th>Burgerlijke staat</th>
<td><?php echo $data->Marital_status; ?>&nbsp;</td>
</tr>         
<tr>
<th>Nationaliteit</th>
<td><?php echo $data->Nationality; ?>&nbsp;</td>
<th>Ziekenfonds</th>
<td><?php echo $data->Health_insurance; ?>  &nbsp;</td>
</tr>
<tr>
<th>Bankrekeningnummer</th>
<td><?php echo $data->Bank_Ac_Number; ?>   &nbsp;</td>
<th>Ziekenfondsnummer</th>
<td> <?php echo $data->Health_insurance_number; ?> &nbsp;</td>
</tr>  
<tr>
<th>Telefoonnr. (Mobiel)</th>
<td><?php echo $data->Mobiel_no; ?>&nbsp;</td>
<th>Telefoonnr (thuis)</th>
<td><?php echo $data->phone; ?>&nbsp;</td>
</tr>
<tr>
<th>Beschikbaar per</th>
<td><?php echo $data->available_at; ?>   &nbsp;</td>
<th>Beheersing Nederlandse taal</th>
<td><?php echo $data->Dutch_proficiency; ?>&nbsp;</td>
</tr> 
<tr>
<th>VCA-diploma</th>
<td><?php echo $data->VCA_certificate == 'Ja' ? : 'Nee'; ?> &nbsp;</td>
<th>Bereidheid tot halen</th>
<td><?php echo $data->Willingness_to_achieve; ?> &nbsp; </td>
</tr>    
<tr>
<th>Binnen 3 maanden?</th>
<td><?php echo $data->Within_3_months; ?>  &nbsp;</td>
<th>Op eigen kosten? </th>
<td> <?php echo $data->own_expense; ?>  &nbsp;</td>
</tr>
<tr>
<th>Rijbewijs</th>
<td> <?php echo $data->License; ?>  &nbsp;</td>
<th>Eigen auto?</th>
<td> <?php echo $data->Own_car; ?>  &nbsp;</td>
</tr> 

</tbody>
</table>
<table class="table table-bordered" width="100%">
<tbody>
<tr>
<th scope="row" colspan="4">Opleidingen en diploma’s :</th>
</tr>
<tr>
<th scope="row" style="width:15px;">1</th>
<td colspan="3"><?php echo $data->Training_and_qualifications_1;  ?>&nbsp;</th>
</tr>
<tr>
<th scope="row">2</th>
<td colspan="3"><?php echo $data->Training_and_qualifications_2;  ?>&nbsp;</th>
</tr>
<tr>
<th scope="row">3</th>
<td colspan="3"><?php echo $data->Training_and_qualifications_3;  ?>&nbsp;</th>
</tr>
<tr>
<th scope="row" colspan="4">Werkervaring:</th>
</tr>
<tr>
<th scope="row">1</th>
<td colspan="3"><?php echo $data->Work_experience_1;  ?>&nbsp;</th>
</tr>
<tr>
<th scope="row">2</th>
<td colspan="3"><?php echo $data->Work_experience_2;  ?>&nbsp;</th>
</tr>
<tr>
<th scope="row">3</th>
<td colspan="3"><?php echo $data->Work_experience_3;  ?>&nbsp;</th>
</tr>         
<tr>
<th scope="row">4</th>
<td colspan="3"><?php echo $data->Work_experience_4;  ?>&nbsp;</th>
</tr>

</tbody>
</table>
<table class="table table-bordered" width="100%">
<tbody>
<tr>
<th scope="row" colspan="8">Ervaring met werkzaamheden:</th>
</tr>
<tr>
<th>Beton afwerken</th>
<td align="center"><?php echo $data->Concrete_finishing == 'Ja' ? : 'Nee'; ?>&nbsp;</td>
<th>Bouwtekening lezen</th>
<td align="center"><?php echo $data->Construction_Drawing_Reading == 'Ja' ? : 'Nee'; ?>&nbsp;</td>
<th>Hekken plaatsen</th>
<td align="center"><?php echo $data->Gates_Places == 'Ja' ? : 'Nee'; ?> &nbsp;</td>

<th>Sloop werkzaamheden</th>
<td align="center"><?php echo $data->demolition_work == 'Ja' ? : 'Nee'; ?>&nbsp;</td>
</tr>
<tr>
<th>Beton bekistingen</th>
<td align="center"><?php echo $data->Concrete_Formwork == 'Ja' ? : 'Nee'; ?>&nbsp;</td>
<th>Gebruik van machines</th>
<td align="center"><?php echo $data->Use_of_machines == 'Ja' ? : 'Nee'; ?>&nbsp;</td>

<th>Isoleren</th>
<td align="center"><?php echo $data->Isolate == 'Ja' ? : 'Nee'; ?> &nbsp;</td>
<th>Steigers bouwen</th>
<td align="center"><?php echo $data->building_Scaffolding == 'Ja' ? : 'Nee'; ?>   &nbsp;</td>
</tr>
<tr>
<th>Bouw opleveringen</th>
<td align="center"><?php echo $data->Building_Deliveries == 'Ja' ? : 'Nee'; ?>&nbsp;</td>

<th>Glasbewassing</th>
<td align="center"><?php echo $data->Glasbewassing == 'Ja' ? : 'Nee'; ?>&nbsp;</td>

<th>Leiding geven</th>
<td align="center"><?php echo $data->To_lead == 'Ja' ? : 'Nee'; ?> &nbsp;</td>
<th>Stut en stempel werk</th>
<td align="center"><?php echo $data->Strut_and_stamping == 'Ja' ? : 'Nee'; ?> &nbsp;</td>
</tr>
<tr>
<th>Bouw opruimen</th>
<td align="center"><?php echo $data->Building_Cleaner == 'Ja' ? : 'Nee'; ?>&nbsp;</td>
<th>Grondwerk</th>
<td align="center"> <?php echo $data->Earth_work == 'Ja' ? : 'Nee'; ?>&nbsp;</td>

<th>Licht timmerwerk</th>
<td align="center" > <?php echo $data->Lich_carpentry == 'Ja' ? : 'Nee'; ?> &nbsp;</td>


<th>Overige werkzaamheden</th>
<td align="center" ><?php echo $data->Other_activities == 'Ja' ? : 'Nee'; ?> &nbsp;</td>
</tr>


</tbody>
</table>

<table class="table table-bordered" width="100%">
<tbody>
<tr>
<th width="15%" >Z Z P</th>
<td  colspan="3"><?php echo $data->zzp; ?> &nbsp;</td>
</tr>
<tr>
<th >Tarief</th>
<td colspan="3"><?php echo $data->tarief; ?>  &nbsp;</td>
</tr>
<tr>
<th >In bezit van</th>
<td colspan="3"><?php echo $data->possession; ?> &nbsp;</td>
</tr>
</tbody>
</table>
   
<table class="table table-bordered" width="100%">
<tbody>
<tr>
<th  >Datum gesprek</th>
<td  ><?php echo $data->Date_Interview; ?></td>
<th  >Betreft vacature</th>
<td  ><?php echo $data->subject_Job; ?> </td>
</tr>
<tr>
<th >Uitzendbureau</th>
<td  colspan="3"><?php echo $agency->Name; ?></td>
</tr>
<tr>
<th >Onze Kenmerk</th>
<td  colspan="3"><?php echo $data->our_Feature; ?>  </td>
</tr>
<tr>
<th >Startdatum</th>
<td  ><?php echo $data->Starting_date; ?>  </td>
<th >Earste project</th>
<td  > <?php echo $data->first_project; ?>    </td>
</tr>
</tbody>
</table>   
   
   
       
 <p style="page-break-after:always;"></p>
 <h3>Werknemersversverklaring</h3>        
  <table class="table table-bordered" width="100%">
<tbody>

<tr>
<th width="15%" >Voornaam</th>
<td  colspan="3"><?php echo $data->Emp_FirstName;  ?> &nbsp;</td>
</tr>
<tr>
<th >Achternaam</th>
<td colspan="3"><?php echo $data->Emp_Surname; ?>  &nbsp;</td>
</tr>
<tr>
<th >Nationaliteit</th>
<td colspan="3"><?php echo $data->Emp_Nationality; ?> &nbsp;</td>
</tr>
</tbody>
</table>
<br />
<ul>
  <li>Ondergetekende werknemer verplicht zich altijd zijn identificatiebewijs bij zich te dragen tijdens werktijden en deze op verzoek te tonen.</li>
  <li>Ondergetekende werknemer verplicht zich altijd zijn / haar Persoonlijke </li>
</ul>
<p>Besclienningsmiddelen (PBM's) bij zich te hebben tijdens werktijden op het moment deze te hebben ontvangen.</p>
<ul>
  <li>Ondergetekende verklaart dat hij / zij naast deze werkgever geen andere uitkering heeft bij een uitkeringsinstantie.</li>
</ul>
<p>Bij overtreding van punt 1, 2 of 3 wordt de werknemer op eigen kosten naar huis gestuurd om de verplichte middelen en/of zijn legitimatiebewijs op te halen. De uren waarvoor de werknemer ingeroosterd stond worden niet beschouwd als gewerkte uren en daarom niet uitbetaald.<br /><br />
  <strong>De volgende documenten zijn geldige legitimatiebewijzen:</strong></p>
<ul>
  <li><strong>•	Nederlands nationaal paspoort </strong></li>
  <li><strong>•	Vluchtelingen- of vreemdelingenpaspoort.</strong></li>
  <li><strong>•	Diplomatiek paspoort of dienstpaspoort: aan personen die zich ten behoeve van hun land naar het buitenland gaan wordt een diplomatiek paspoort of een dienst paspoort verstrekt, als de minister van Buitenlandse Zaken van dit land dit noodzakelijk acht. </strong></li>
  <li><strong>•	Nederlandse identiteitskaart: de Europese identiteitskaart is per 1 oktober 2001 vervangen door de Nederlandse identiteitskaart.</strong></li>
  <li><strong>•	EER paspoort: dit is het paspoort van een ingezetene van de Europese Economische ruimte (EER). De EER bestaat uit landen van de Europese Unie (Nederland, België, Duitsland, Frankrijk, Italië, Luxemburg, Denemarken, Ierland, Verenigd Koningrijk, Griekenland, Spanje, Portugal, Oostenrijk, Finland en Zweden) plus Noorwegen, IJsland en Liechtenstein. Binnen de EER geldt een vrij verkeer van werknemers. Buitenlanders uit de EER hebben in Nederland wel een verblijfsvergunning nodig. (het zogenaamde E-document), maar geen tewerkstellingsvergunning. Buitenlanders uit EER hebben wel een verblijfsvergunning in Nederland knikken. (De zogenaamde e-paper), maar geen werkvergunning.</strong></li>
</ul>

 <p style="page-break-after:always;"></p>

<h3><u>Werknemersverklaring</u></h3>
<ul>
  <li><strong>•	Vreemdelingendocument: dit is een document waarover een vreemdeling moet beschikken ter vaststelling van zijn identiteit, nationaliteit en verblijfsrechtelijke status.</strong></li>
</ul>
<p><strong>Deze worden onderscheiden in:</strong></p>
<ul>
  <li><strong>•	Reguliere verblijfsvergunning voor bepaalde tjid</strong></li><br />
  <li><strong>•	Reguliere verblijfsvergunning voor onbepaalde tijd  </strong></li><br />
  <li><strong>•	Verblijfsvergunning asiel voor bepaalde tijd</strong></li><br />
  <li><strong>•	Verblijfsvergunning asiel voor onbepaalde tijd</strong></li>
</ul>
<br />
<p>De immigratie- en Naturalisatiedienst (IND) neemt de beslissing om deze vergunningen al clan niet te verlenen. De politie is verantwoordelijk voor het verstrekken van het verblijfsdocument zeif.<br />
  Het rijbewijs geldt bij indiensttreding nadrukkelijk niet als geldig document. Op het rijbewijs staat namelijk niets over de nationaliteit en verblijfsstatus. Het voldoet wel ter verificatie van de identiteit van een werknemer nit Nederland of nit de EER bij controles op de werkplek, maar niet voor vreemdelingen.<br />
 Het sofinummer geldt niet als middel ter verificatie van de identiteit. Het is een puur administratief gegeven en geldt noch bij de indiensttreding, noch bij controles op de werkplek als legitimatiebewijs. Wel rnoet de werknemer het aan zijn werkgever verstrekken bij de indiensttreding.<br />
  Werknemer verklaart het personeelshandboekje van Easy Clean Up BV te hebben ontvangen met uitleg over de regels en een veiligheidsinstructie<br />
  Handtekening,<br /><br /><br /><br /><br />
  ________________________<br /><br />
  Plaats:  Amsterdam<br /><br />
  Datum : ________________</p>
<div style=" border:1px solid #CCC; padding:5px; margin-left:80px; margin-top:15px; font-weight:normal; width:80%; text-align:center"><br />
  Let op!<br />
  <p>Je hebt instructie gekregen over de uit te voeren werkzaamheden. Zorg ervoor dat je deze uitvoert op de rnanier zoals je die is verteld. Als je denkt dat het gevaarlijk is, bel je direct naar kantoor.<p>
  </div>
  <br />
 
  </div> 
     </div>
     
  <p style="page-break-after:always;"></p>    
  <div style="margin-left:50%; float:left">   
   <p><strong>Model</strong></p>  
   <p>Opgaaf gegevens voor de loonheffingen</p>
   </div>
     
<h4 style="margin-bottom:4px;">Waarom dit formulier?</h4> 
 <table width="100%" cellpadding="1" cellspacing="0" border="0">
  <tbody>
 <tr>
 <td width="45%">Uw werkgever of uitkeringsinstantie houdt loonheffingen in op
uw loon of uitkering. Loonheffingen is de verzamelnaam voor loonbelasting/premie volksverzekeringen, premies werknemersverzekeringen en de inkomensafhankelijke bijdrage Zorgverzekeringswet. Voor de inhouding moet uw werkgever of uitkeringsinstantie
uw persoonlijke gegevens registreren.</td>
 <td width="45%"><strong>Invullen en inleveren</strong><br>
U moet dit formulier ingevuld en ondertekend vóór uw 1e werkdag bij uw werkgever inleveren. Gaat u werken op dezelfde dag waarop uw werkgever u aanneemt? Dan moet u deze opgaaf inleveren vóór u gaat werken. Als u een uitkering krijgt, moet u deze opgaaf inleveren voor de 1e betaling.</td>
 </tr>
  <tr>
 <td width="45%">
Met dit formulier geeft u deze gegevens op. Verder geeft u aan of u wilt dat uw werkgever of uitkeringsinstantie de loonheffingskorting toepast. Uw werkgever of uitkeringsinstantie houdt dan minder loonbelasting/premie volksverzekeringen in op uw loon of uitkering.<br><br>
<strong>Als u geen gegevens opgeeft</strong><br>
Als u uw persoonlijke gegevens niet – of fout – opgeeft, moet uw werkgever of uitkeringsinstantie 52% loonbelasting/premie volksverzekeringen inhouden. Dit is het hoogste belastingtarief. Bovendien moet uw werkgever over uw hele loon de premies werknemersverzekeringen en de inkomensafhankelijke bijdrage Zorgverzekeringswet berekenen. Dit geldt ook als u zich niet legitimeert.
</td>
 <td width="45%">

Bij het inleveren van deze opgaaf moet u zich legitimeren. Neem dus een geldig identiteitsbewijs mee.<br><br>

<strong>Let op!</strong><br><br>
Als er iets in uw gegevens verandert nadat u dit formulier hebt ingeleverd, moet u dit schriftelijk aan uw werkgever of uitkeringsinstantie doorgeven. Lever dan een nieuwe ‘Opgaaf gegevens voor de loonheffingen’ bij uw werkgever of uitkeringsinstantie in.<br><br>
<strong>Meer informative</strong><br>
Kijk voor meer informatie op www.belastingdienst.nl en zoek op ‘heffingskortingen’. Of bel de BelastingTelefoon: 0800 - 0543, bereikbaar van maandag tot en met donderdag van 8.00 tot 20.00 uur en op vrijdag van 8.00 tot 17.00 uur.
 </td>
 </tr>
 </tbody>
 </table>
<h4 style="margin-bottom:4px;">Uw gegevens</h4> 
<p>Heeft uw werkgever of uitkeringsinstantie uw gegevens al ingevuld? Controleer ze dan en verbeter ze als ze fout zijn.</p>
<table class="table table-bordered" width="100%" cellpadding="5">
<tbody>

<tr>
<th align="left">1a  Naam en voorletter(s)</th>
<td colspan="3"><?php echo $data->Emp_Name_and_initial;?>&nbsp;</td>
</tr>
<tr>
<th>1b  Burgerservicenummer (BSN)</th>
<td colspan="3">  <?php echo $data->Emp_Deposit_Plaintiff_Vice_number; ?> &nbsp;</td>
</tr>
<tr>
<th>1c  Straat en huisnummer</th>
<td colspan="3"><?php echo $data->Emp_Street_Address; ?> &nbsp;</td>
</tr>

<tr>
<th>1d Postcode en woonplaats</th>
<td> <?php echo $data->Emp_Postcode; ?>  &nbsp;</td>
<td colspan="2"> <?php echo $data->Emp_residence; ?>  &nbsp;</td>
</tr>

<tr>
<th>1e Land en regio Alleen invullen als u in het buitenland woont </th>
<td colspan="3"> <?php echo $data->Emp_Country_and_region; ?>  &nbsp;</td>
</tr>           
             
<tr>
<th>1f Geboortedatum  </th>
<td colspan="3"><?php echo $data->Emp_Birthday; ?>&nbsp;</td>
</tr>           
             
<tr>
<th>1g Telefoonnummer</th>
<td colspan="3"> <?php echo $data->Emp_telephone; ?> &nbsp;</td>
</tr>

</tbody>
</table>

 <p style="page-break-after:always;"></p> 
 
 <h4 style="margin-bottom:4px;">Loonheffingskorting toepassen</h4> 
 <table class="table table-bordered" width="100%" cellpadding="5">
<tbody>  
<tr>
            <th rowspan="2" width="45%">Wilt u dat uw werkgever of uitkeringsinstantie rekening houdt met de loonheffingskorting? U kunt de loonheffingskorting maar door 1 werkgever of uitkeringsinstantie tegelijkertijd laten toepassen. Zie ook de toelichting onderaan.</th>

 <td align="center">
              <?php echo $data->account_the_payroll_ja_tax == 'Ja' ? : 'Nee'; ?> 
            </td>
            <td align="center"><?php echo $data->account_the_payroll_tax_ja_date;  ?></td>
          
        </tr>
        <tr>
            <td align="center">
            <?php echo $data->account_the_payroll_nee_tax == 'Ja' ? : 'Nee'; ?>
            
          </td>
            <td align="center"><?php echo $data->account_the_payroll_tax_nee_date;  ?></td>           
        </tr>
</tbody>
</table>
<br>
 <h4 style="margin-bottom:4px;">ondertekening</h4> 
<p>Lever dit formulier no ondertekening in bij uw werkgever of uitkeringsinstantie.</p>
<table class="table table-bordered" width="100%" cellpadding="5" border="0">
<tbody>  
<tr>
    <th align="left">Datum</th>
    <td align="left">_____________________________</td>           
</tr>
<tr>
    <th align="left">&nbsp;</th>
    <td align="left">&nbsp;</td>           
</tr>
<tr>
    <th align="left">Handtekening Schrijf binnen het vak.</th>
    <td align="left">_____________________________</td>           
</tr>

</tbody>
</table>
<br>
 <h4 style="margin-bottom:4px;">Toelichting bij de vragen</h4> 

<table width="100%" cellpadding="1" cellspacing="0" border="0">
  <tbody>
 <tr>
 <td width="45%"><strong>Bij vraag 2</strong><br>
ledere werknemer en uitkeringsgerechtigde heeft recht op korting op de belasting, de zogenoemde loonheffingskorting. Uw werkgever of uitkeringsinstantie berekent automatisch de korting die voor u geldt. U krijgt deze korting rnaar bij rwerkgever of uitkeringsinstantie tegelijkertijd. Geef aan of u de loonheffingskorting door deze werk-gever of uitkeringsinstantie wilt laten toepassen. 
</td>
 <td width="45%"><strong>Loonheffingskorting en AOW-uitkering</strong><br><br>
Als u als alleenstaande of alleenstaande ouder een AOW-uitkering krijgt, hebt u misschien recht op de alleenstaande-ouderenkorting. U kunt de loonheffingskorting dan het beste Eaten toepassen door de Sociale Verzekeringsbank.
</td>
 </tr>
 <tr>
 <td width="45%"><br>
<strong>Let op! Krijgt</strong><br><br>
Krijgt u 2 of meer uitkeringen bij dezelfde uitkeringsinstantie? Vraag dan uw uitkeringsinstantie op welke uitkering u het beste de heffingskorting kunt laten toepassen.<br><br>
Loonheffingskorting en voorlopige aanslag
 Gaat u werken en krijgt u de algemene heffingskorting maandelijks van ons in de vorm van een voorlopige aanslag? En laat u de loon-heffingskorting door ow werkgever toepassen? Dan moet u deze vooriopige aanslag direct wijzigen of stopzetten. Anders krijgt u misschien te veel heffingskorting, want uw werkgever verrekent ook al (een deel van) de algemene heffingskorting met uw loon. Als u te veel hebt gekregen, moet u dit bedrag aan ons terugbetalen.
</td>
 <td width="45%">
<strong>Loonheffingskorting en bijstandsuitkering </strong><br><br>
Gaat u werken naast uw bijstandsuitkering? Vraag dan uw werkgever om de loonheffingskorting toe te passen. De gemeente houdt dan rekening met de loonheffingskorting die uw werkgever toepast.<br><br>
<strong>Let op!</strong><br><br>
 Als Li nu geen gebruik maakt van de loonheffingskorting, kunt u de eventueel te veel betaalde belasting na afioop van het kalenclerjaar terugvragen via uw a angifte inkomstenbelasting/ premie volksverzekeringen.

 </td>
 </tr> 
 </tbody>
 </table>
 <p style="page-break-after:always;"></p> 

<table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td width="30%" >
		<img src="<?php echo url();?>/assets/img/icons/Logo.jpg" style=" vertical-align:top; width:125px; height:90px;"  />           

        </td>
        <td style="line-height:4px; vertical-align:bottom; font-size:14px;">Veiligheidsinstructies      
        </td>
        </tr> 
        </table>


<table class="table table-bordered" width="100%">
<tbody>
<tr>
<th align="left">Belangrik:</th>
<td colspan="3">Neem geen risico’s  voor jezelf en breng anderen niet in gevaar.&nbsp;</td>
</tr>
</tbody>
</table>


<table class="table table-bordered" width="100%">
<tbody>

<tr>
<th align="left">Achternaam</th>
<td>Controleer je persoonlijke beschermingsmiddelen. Het dragen van veiligheidsschoenen en veiliOeidshelm is verplicht.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Gebruik waar nodig andere persoonlijke beschermingsmiddelen.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Informer nooduitgangen en EHBO post op elke project. Controleer of een oogdouche aanwezig is.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Neem contact met leiclinggevende/uitvoerder/bhv'er bij ongevallen.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Lees instructies op alle schoonmaakmiddelen.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Werk voorzichtig en volgens yoorschriften op steigers, ladders en trappen. Niet het dak betreden zonder instructies.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Nooit zonder toezicht een besloten ruimte betreden. Hier mag je nooit alleen werken.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Buig door je knieen en tit met een. rechte rug.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Werk voorzichtig met. elektrisch apparaten en kabels. Let op keuringsstickers&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Roken, drinken en drugs gebruik is verboden op de bouw.&nbsp;</td>
</tr>

<tr>
<th align="left">Personalia:</th>
<td>Werken met gevaarlijke stoffen is verboden.&nbsp;</td>
</tr>



</tbody>
</table>

<br><br>
<div style=" border:1px solid #CCC; padding:5px; margin-top:25px; font-weight:normal; width:100%; text-align:center">
 
  <p>Volg de instructies over de uit te voeren werkzaamheden. Zorg ervoor dat je uitvoert op de manier zoals je die is verteld. Als je denkt dat het gevaarlijk is, bel je direct naar kantoor (Tel: 020-6916115<p>
  </div>













</body>
</html>
