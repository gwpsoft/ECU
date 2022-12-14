<!-- Header -->



    @include('admin/header')



    <style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}











</style>



<!-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>-->

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

<!--    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->

 <title>Uitgebreid Zoeken</title>

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>

                    <li class="active">Uitgebreid Zoeken</li>

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





   <div class="block">

                    <div class="header">

                        <h2 class="heading">Uitgebreid Zoeken</h2>

                         <div style="float:right">
                        <!-- <a href=" <?php //echo URL:: to( 'admin/AvailabileEmp' ); ?> " class="btn btn-primary">Uitgebreid Zoeken</a> -->
                        <!-- <a href=" <?php echo URL:: to( 'admin/AdvanceSearch' ); ?> " class="btn btn-primary">Uitgebreid Zoeken</a>
                         <a href=" <?php echo URL:: to( 'admin/ActiveEmp' ); ?> " class="btn btn-success">Actief</a>

                        <a href=" <?php echo URL:: to( 'admin/InactiveEmp' ); ?> " class="btn btn-danger">Inactief</a>

                        <a href=" <?php echo URL:: to( 'admin/employees' ); ?> " class="btn btn-warning">Alle Personeel</a>

                       <a href=" <?php echo URL:: to( 'admin/create_employee' ); ?> " class="btn btn-success">+ Nieuw Personeel</a> -->

                         </div>

                      <a href=" <?php echo URL:: to( 'admin/ActiveEmp' ); ?> " class="btn btn-success pull-right" name="button">Terug</a>

                    </div>





                    <div class="content">

                      <form action="{{url('admin/AdvSearch')}}" method="post" id="myform">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="fname">Naam</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Naam">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="lname">E-mail</label>
                              <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">BSN Nummer</label>
                              <input type="text" class="form-control" placeholder="xxx.xxx.xxx" id="ssNumber" name="ssNumber">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputCity">Geschikt voor</label>
                              <select class="form-control" id="gesc" name="gesc">
                                <option value="">Geschikt voor</option>
                                @foreach($functies as $key => $functie)
                                  <option value="{{$functie->code}}">{{$functie->name}}</option>
                                @endforeach
                              </select>
                              <!-- <input type="text" name="gesc" class="form-control" id="gesc"> -->
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Stad</label>
                              <input type="text" class="form-control" placeholder="" id="city" name="city">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputCity">Nationaliteit</label>
                              <select class="form-control" id="nationality" name="nationality">
                                <option value="">Kies nationaliteit</option>
                                @foreach($countries as $key => $country)
                                  <option value="{{$country->id}}">{{$country->Name}}</option>
                                @endforeach
                              </select>
                              <!-- <input type="text" name="nationality" class="form-control" id="nationality"> -->
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Telefoon</label>
                              <input type="text" name="telephone" class="form-control" id="telephone">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputCity">Uitzendbureau</label>
                              <select class="form-control" id="agency" name="agency">
                                <option value="">Select Uitzendbureau</option>
                                @foreach($agencies as $key => $agency)
                                  <option value="{{$agency->Id}}">{{$agency->Name}}</option>
                                @endforeach
                              </select>
                              <!-- <input type="text" class="form-control" placeholder="" id="agency" name="agency"> -->
                            </div>
                          </div>
                          <div class="form-row">

                            <div class="form-group" style="display: inline-block; margin-left: 35px;">
                               <input type="checkbox" id="ownCar" name="ownCar" value="1" {{ ( $selects &&$selects['ownCar'] == 1) ? 'checked' : '' }} > Eigen auto
                            </div>
                            <div class="form-group" style="display: inline-block; margin-left: 30px;">
                              <input type="checkbox" id="vcaCert" name="vcaCert" value="1" {{ ( $selects && $selects['vcaCert'] == 1) ? 'checked' : '' }} > VCA Certificaat
                            </div>
                            <div class="form-group" style="display: inline-block; margin-left: 30px;">
                              <input type="checkbox" id="active" name="active" value="1" {{ ( $selects && $selects['active'] == 1) ? 'checked' : '' }} >
                              <label for="active">Actief</label>
                            </div>

                          </div>
                          <div class="form-group col-md-2 pull-left">
                             <button type="submit" class="btn btn-primary">Zoeken</button>

                             <button type="button" id="reset" class="btn btn-success" style="margin-left: 10px;" onclick="resetValues()">Reset</button>
                          </div>

                        </form>
                    </div>
                </div>


          <!--Table Block starting from here -->

   <div class="block">
                    <div class="header">
                        <h2 class="heading">Uitgebreid Zoeken</h2>
                    </div>

                    <div class="content">
                      @if(!empty($searchs))
                      <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="AdvSrch">

                          <thead>
                              <tr>
                                  <th >ID</th>

                                  <th >Voornaam</th>

                                  <th >Achternaam</th>

                                  <th >BSN nummer</th>

                                  <th >Stad</th>

                                  <th >Uitzendbureau</th>

                                  <th >Status</th>

                                  <th >Opties</th>

                              </tr>
                          </thead>

                          <tbody>
                            @foreach($searchs as $search )
                            <tr>
                              <td>{{$search->id}}</td>
                              <td>{{$search->Firstname}}</td>
                              <td>{{$search->Lastname}}</td>
                              <td>{{$search->Sofinumber}}</td>
                              <td>{{$search->City}}</td>
                              <td>{{ $search->Employmentagency_Name }}</td>

                              <td>
                                @if($search->Active)
                                <span class="label label-success">Actief</span>
                                @else
                                <span class="label label-danger">Inactief</span>
                                @endif
                              </td>

                              <td>
                                <a href='employee/{{$search->id}}'  title="Inzien" class="widget-icon">

                                <span class="icon-eye-open"></span></a>

                                <a href='edit_employee/{{$search->id}}' title="Bewerken" class="widget-icon">

                                <span class="icon-pencil"></span></a>

                                <a href='delete_employee/{{$search->id}}' title="verwijderen" class="widget-icon" onclick="deleteRecord();">

                                <span class="icon-trash"></span></a>

                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      @endif
                    </div>
        </div>
            </div>

  </div>
  <script type="text/javascript">
    var sels ={!! json_encode($selects); !!};
  </script>
<!-- @if(!empty($selects))

@endif -->

  <script>


/////////////////// form reset fuction starts here /////////////////


/////////////////// form reset fuction ends here /////////////////

          $('#AdvSrch').DataTable();
        // $(document).ready(function() {
          if(sels['name']){
            $('#name').val(sels['name']);
          }

          if(sels['email']){
            $('#email').val(sels['email']);
          }

          if(sels['telephone']){
            $('#telephone').val(sels['telephone']);
          }

          if(sels['city']){
            $('#city').val(sels['city']);
          }

          if(sels['ss_num']){
            $('#ssNumber').val(sels['ss_num']);
          }

          if(sels['vcaCert']){
            $('#vcaCert').attr('checked',true);
          }

          if(sels['ownCar']){
            $("#ownCar").attr('checked', true);
          }

          if(sels['active']){
            $("#active").attr('checked', true);
          }

          if(sels['ges']){
            $("#gesc option[value="+sels['ges']+"]").attr('selected', 'selected');
          }
          if(sels['agency']){
            $("#agency option[value="+sels['agency']+"]").attr('selected', 'selected');
          }
          if(sels['nationality']){
            $("#nationality option[value="+sels['nationality']+"]").attr('selected', 'selected');
            // $('#nationality option[value="+sels['nationality']+"]')
          }



      function deleteRecord()
          {
              if (confirm("Bent u zeker dat u dit wilt Werknemer verwijderen?")) {
              }

           }

           function resetValues() {

             document.getElementById('name').value      = '';
             document.getElementById('email').value     = '';
             document.getElementById('ssNumber').value  = '';
             document.getElementById('city').value      = '';
             document.getElementById('telephone').value = '';
             document.getElementById('gesc').selectedIndex         = 0;
             document.getElementById('nationality').selectedIndex  = 0;
             document.getElementById('agency').selectedIndex       = 0;

             let ownCar = document.getElementById('uniform-ownCar').getElementsByTagName('span');
             ownCar[0].classList.remove("checked");
             document.getElementById('ownCar').value = ""

             let certificate = document.getElementById('uniform-vcaCert').getElementsByTagName('span');
             certificate[0].classList.remove("checked");
             document.getElementById('vcaCert').value = ""

             let active = document.getElementById('uniform-active').getElementsByTagName('span');
             active[0].classList.remove("checked");
             document.getElementById('active').value = ""

           }
    </script>

       @include('admin/footer')</div>
