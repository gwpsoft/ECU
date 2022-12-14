<!-- Header -->
    @include('admin/header')
     <title>Markt Prijslijst</title>  
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
                    <li><a href="admin">Home</a></li>                    
                    <li class="active">Markt Prijslijst</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/UpdateMarketRate']) !!}
    
     <input type="hidden" name="id" value="1" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
   <div class="col-md-10"> 
   
    @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif               
                 <div class="col-md-12">      
             
             <div class="block">
                    <div class="header" >                   
                       <h2>Markt Prijslijst</h2>
                       <span class="pull-right clickable"><i class="icon-chevron-down"></i></span>
                    </div>
                    <div class="content" style="display:none">
                    
                     <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>
    
      <tr>
      <!--<th class="center" width="10%">Article No</th>-->
      <th width="80%" class="center">Description</th>  
      <th width="20%" class="center">Price</th>
     <!-- <th width="20%" class="center">Unit</th> -->    
    </tr>
    </thead>
    <tbody>
    <tr style="border:none;"><td colspan="2" class="left"><h5>Transporttarief per container (voor dit tarief wordt de container geleverd en opgehaald)</h5></td></tr>
    
    
    <tr>
    
   
    
    <td class="left">
    Transportkosten containers met een inhoud van 3 m<sup>3</sup> tot en met 10 m<sup>3</sup>
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_10m3" value="{{  @$data->Price_10m3 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_10m3' , ':message' ) }}</span>
        
    </td>

    </tr>
    
    <tr>
    
   
    
    <td class="left">
    Transportkosten containers met een inhoud van 15 m<sup>3</sup> tot en met 40 m<sup>3</sup>   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_40m3" value="{{  @$data->Price_40m3 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_40m3' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    
     <tr style="border:none;"><td colspan="2" class="left"><h5>Verwerkingstariet per ton (1000 kg)</h5></td></tr>
   
     <tr>
    
    
    
    <td class="left">
    Bouw- en sloopafval (sorteerbaar)  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_sorteerbaar" value="{{  @$data->Price_sorteerbaar }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_sorteerbaar' , ':message' ) }}</span>
        
    </td>

    </tr>
    
    <tr>
    
   
    
    <td class="left">
   Bouw- en sloopafval (niet sorteerbaar)   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_niet_sorteerbaar" value="{{  @$data->Price_niet_sorteerbaar }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_niet_sorteerbaar' , ':message' ) }}</span>
        
    </td>
    
    </tr>
     <tr>
    
    
    
    <td class="left">
    Bedrijfsafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Bedrijfsafval" value="{{  @$data->Price_Bedrijfsafval }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Bedrijfsafval' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    
    <tr>
    
   
    
    <td class="left">
    Gemengd hout (A- enlof B- hout)  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_A_B_hout" value="{{  @$data->Price_A_B_hout }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_A_B_hout' , ':message' ) }}</span>
        
    </td>
    
    </tr>
     <tr>
    
  
    
    <td class="left">
    C- hout
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_C_hout" value="{{  @$data->Price_C_hout }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_C_hout' , ':message' ) }}</span>
        
    </td>
   
    </tr>
    
    <tr>
    
   
    
    <td class="left">
    Schoon puin(< 60 cm)  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_puin" value="{{  @$data->Price_Schoon_puin }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_puin' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    
     <tr>
    
   
    
    <td class="left">
    Puin Grof (> 60 cm)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_Grof" value="{{  @$data->Price_Puin_Grof }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_Grof' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    
    <tr>
    
   
    
    <td class="left">
    Puin met 10% tot 25% zand I grond  
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_10" value="{{  @$data->Price_Puin_met_10 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_10' , ':message' ) }}</span>
        
    </td>
   
    </tr>
    
     <tr>
    
    
    
    <td class="left">
   Puin met 25% of meer zand I grond
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_25" value="{{  @$data->Price_Puin_met_25 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_25' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    
    <tr>
    
   
    
    <td class="left">
    Asfaltpuin 
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Asfaltpuin" value="{{  @$data->Price_Asfaltpuin }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Asfaltpuin' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    
     <tr>
    
   
    
    <td class="left">
    Schoon Gips
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_Gips" value="{{  @$data->Price_Schoon_Gips }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_Gips' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    
    <tr>
    
   
    
    <td class="left">
    Groenafval   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Groenafval" value="{{  @$data->Price_Groenafval }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Groenafval' , ':message' ) }}</span>
        
    </td>
   
    </tr>
    
    <tr>
    
   
    
    <td class="left">
    Dakafval   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakafval" value="{{  @$data->Price_Dakafval }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakafval' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    <tr>
    
   
    
    <td class="left">
    Dakgrind   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakgrind" value="{{  @$data->Price_Dakgrind }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakgrind' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    <tr>
    
   
    
    <td class="left">
    Schoon vlakglas   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_vlakglas" value="{{  @$data->Price_Schoon_vlakglas }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_vlakglas' , ':message' ) }}</span>
        
    </td>
   
    </tr>
    <tr>
    
   
    
    <td class="left">
    Opbrengsten metalen, per ton   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_metalen" value="{{  @$data->Price_Opbrengsten_metalen }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_metalen' , ':message' ) }}</span>
        
    </td>
    
    </tr>
    <tr>
    
    
    
    <td class="left">
    Opbrengsten Papier & Karton, per ton   
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_Papier" value="{{  @$data->Price_Opbrengsten_Papier }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_Papier' , ':message' ) }}</span>
        
    </td>
   
    </tr>
   
    
    </tbody>    
    </table>       
                   
                    </div>
                </div>  
                </div> 
               
                 <div class="col-md-6">    
         <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                            <div class="col-md-6" >
                         
                             {!! Form::reset('Cancel', ['class' => 'btn btn-primary']) !!}
                            		
                            </div>              
                            <div class="col-md-6" style="float:right">
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>                                                
                    </div>
                </div>                           
        </div>  
       
            </div>
            
    {!! Form::close() !!}        
  </div>    <br /> 
       @include('admin/footer')</div>  