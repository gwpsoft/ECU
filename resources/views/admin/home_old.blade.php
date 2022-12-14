<?php $Modules = DB::table('tbl_modules_rights')->select('module_id')->where(array('user_id'=>Auth::user()->id))->get();
foreach ($Modules as $Module) {

		$SelectedModules [] = $Module->module_id;

		}

?>

<div class="row">


 <div class="col-md-6">



  <div class="block">



    <div class="header" >
                <h2>Personeel Functies</h2>
                    </div>

  <div class="content controls">
  <?php  if ($SelectedModules != '' && in_array(1,@$SelectedModules)) {?>

    <div class="col-md-4">

        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

            <a href="<?php echo URL:: to( 'admin/ActiveEmp' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/employees.png') }}">

                </div>

                </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/ActiveEmp' ); ?>">Personeel</a>

            </div>

   		</div>

	</div>

<?php } if ($SelectedModules != '' && in_array(5,@$SelectedModules)) {?>

    <div class="col-md-4">

        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

             <a href="<?php echo URL:: to( 'admin/agencies' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Agency.png') }}">

                </div>

                </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/agencies' ); ?>">Uitzendbureau</a>

            </div>

   		</div>

	</div>

   <?php } if ($SelectedModules != '' && in_array(6,@$SelectedModules)) {?>

    <div class="col-md-4">

        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

            <a href="<?php echo URL:: to( 'admin/projectmanager' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Project Manager.png') }}">

                </div>

                </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/projectmanager' ); ?>">Project Manager</a>

            </div>

   		</div>

	</div>
<?php } ?>
    </div>

    </div>



    <div class="block">



    <div class="header" >



                <h2>Klant Functies</h2>



                    </div>

  <div class="content controls">
      <p>{{ URL::asset('assets/img/icons/Customers.png') }}</p>
<?php  if ($SelectedModules != '' && in_array(7,@$SelectedModules)) {?>
    <div class="col-md-4">


        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

            <a href="<?php echo URL:: to( 'admin/customers' ); ?>">

                <div class="info">
                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Customers.png') }}">

                </div>

                </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/customers' ); ?>">Klant</a>

            </div>

   		</div>

	</div>
 <?php } if ($SelectedModules != '' && in_array(8,@$SelectedModules)) {?>


    <div class="col-md-4">

        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

            <a href="<?php echo URL:: to( 'admin/departments' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Department.png') }}">

                </div>

                </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/departments' ); ?>">Afdeling</a>

            </div>

   		</div>

	</div>
 <?php } if ($SelectedModules != '' && in_array(2,@$SelectedModules)) {?>
    <div class="col-md-4">

        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

            <a href="<?php echo URL:: to( 'admin/AllActiveprojects' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Project.png') }}">

                </div>

                </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/AllActiveprojects' ); ?>">Project</a>

            </div>

   		</div>

	</div>

<?php } ?>

    </div>

     <div class="content controls">
<?php  if ($SelectedModules != '' && in_array(9,@$SelectedModules)) {?>
      <div class="col-md-4">

        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

             <a href="<?php echo URL:: to( 'admin/contacts' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Contacts.png') }}">

                </div>

                </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/contacts' ); ?>">Contacten</a>

            </div>

   		</div>

	</div>

 <?php } if ($SelectedModules != '' && in_array(10,@$SelectedModules)) {?>

    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/notes' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Notes.png') }}">

                </div> </a>

            </div>



            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/notes' ); ?>">Afspraken</a>

            </div>

   		</div>

	</div>

    <?php } if ($SelectedModules != '' && in_array(11,@$SelectedModules)) {?>

    <div class="col-md-4" >


        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/clients' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Clients.png') }}">

                </div> </a>

            </div>



            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/clients' ); ?>">Online Gebruikers</a>









        </div></div> </div>
    <div class="col-md-4">

        <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/AllActiveprojects' ); ?>">

                    <div class="info">

                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/daily-project.png') }}">

                    </div>

                </a>

            </div>

            <div class="content list-group" align="center">

                <a class="list-group-item" href="<?php echo URL:: to( 'admin/Planning' ); ?>">Dagelijkse Projecten</a>

            </div>

        </div>

    </div>
    <?php } ?>



    </div>

    </div>



    {{--

    <div class="block">



      <div class="header" >



        <h2>Instellingen</h2>



      </div>

      <div class="content controls">

        <div class="col-md-4">

          <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

              <a href="{{ url('admin/Update_All_Employees') }}" onclick="return confirm('Weet u zeker dat u dit wilt doen?');">

                <div class="info">

                  <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Customers.png') }}">

                </div>

              </a>

            </div>

            <div class="content list-group" align="center">

              <a class="list-group-item" href="{{ url('admin/Update_All_Employees') }}" onclick="return confirm('Weet u zeker dat u dit wilt doen?');">Personeel actief / inactief Controle</a>

            </div>

          </div>

        </div>

        <div class="col-md-4">

          <div class="block block-drop-shadow">

            <div class="user bg-default bg-light-rtl thumbs">

              <a href="{{ url('admin/Update_All_Projects') }}" onclick="return confirm('Weet u zeker dat u dit wilt doen?');">

                <div class="info">

                  <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Department.png') }}">

                </div>

              </a>

            </div>

            <div class="content list-group" align="center">

              <a class="list-group-item" href="{{ url('admin/Update_All_Projects') }}" onclick="return confirm('Weet u zeker dat u dit wilt doen?');">Projecten actief / inactief Controle</a>

            </div>

          </div>

        </div>



      </div>

    </div>

     --}}
    {{-- block ends here --}}


     <div class="content controls">

    </div>




   </div>





 <!-- <div class="col-md-1" style="width:5px;">

  </div>-->

  <div class="col-md-6">

<div class="row">

  <div class="block">



    <div class="header" >



                <h2>Management Functies</h2>



                    </div>

  <div class="content controls">
 <?php  if ($SelectedModules != '' && in_array(3,@$SelectedModules)) {?>
    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/weekcard' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/weekstats.png') }}">

                </div> </a>

            </div>



            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/weekcard' ); ?>">Weekstaten</a>

            </div>

   		</div>

	</div>
 <?php } if ($SelectedModules != '' && in_array(4,@$SelectedModules)) {?>
    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/Week-Weekstaten' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Week_wise_projects.png') }}">

                </div> </a>

            </div>



            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/Week-Weekstaten' ); ?>">Week Weekstaten</a>

            </div>

   		</div>

	</div>
 <?php } if ($SelectedModules != '' && in_array(12,@$SelectedModules)) {?>
    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/applicants' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Applicant.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/applicants' ); ?>">Aanvrager</a>

            </div>

   		</div>

	</div>
 <?php } if ($SelectedModules != '' && in_array(13,@$SelectedModules)) {?>


    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/OrderWasteContainer' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/OrderContainer.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/OrderWasteContainer' ); ?>">Bestel Afvalcontainers</a>

            </div>

   		</div>

	</div>
 <?php } if ($SelectedModules != '' && in_array(15,@$SelectedModules)) {?>


    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/ContainersLeverancier' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/shipping.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/ContainersLeverancier' ); ?>">Containers Leveranciers</a>

            </div>

   		</div>

	</div>

 <?php } ?>

    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/MarketRate' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/market.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/MarketRate' ); ?>">Marktrente</a>

            </div>

   		</div>

	</div>

 <?php  if ($SelectedModules != '' && in_array(17,@$SelectedModules)) {?>
<div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/comments' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/comments.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/comments' ); ?>">Opmerkingen</a>

            </div>

   		</div>

	</div>
  <?php } if ($SelectedModules != '' && in_array(14,@$SelectedModules)) {?>
    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/BestelformulierDiensten' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Personeels_Aanvragen.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/BestelformulierDiensten' ); ?>">Aanvraag Personeel</a>

            </div>

   		</div>

	</div>
    <div class="col-md-4">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/article-list' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Contacts.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/article-list' ); ?>">Artikelenlijst</a>

            </div>

   		</div>

	</div>
    <?php } ?>
</div>

</div>

</div>

</div>
</div>








 <div class="col-md-12">





<div class="row">

  <div class="block">



     <div class="header" >

       <h2>Rapport</h2>

     </div>

       <div class="content controls">


<?php if ($SelectedModules != '' && in_array(18,@$SelectedModules)) {?>
   <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/total' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Report_Total.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/total' ); ?>">Totalen</a>

            </div>

   		</div>

	</div>

  <?php } if ($SelectedModules != '' && in_array(19,@$SelectedModules)) {?>

      <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/employeeoverview' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/employee_overview.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/employeeoverview' ); ?>">Personeel Overzicht per Project</a>

            </div>

   		</div>

	</div>
<?php } if ($SelectedModules != '' && in_array(20,@$SelectedModules)) {?>


     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/employmentagencyoverview' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/employment_agency_overview.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/employmentagencyoverview' ); ?>">Uitzendbureau Overzicht</a>

            </div>

   		</div>

	</div>
<?php } if ($SelectedModules != '' && in_array(21,@$SelectedModules)) {?>


     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/projectmanageroverview' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/project_manager_overview.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/projectmanageroverview' ); ?>">Projectmanager Overzicht per Project</a>

            </div>

   		</div>

	</div>

   <?php } if ($SelectedModules != '' && in_array(23,@$SelectedModules)) {?>



     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/hoursoverview' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/hours_overview.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/hoursoverview' ); ?>">Overzicht alle Uren</a>

            </div>

   		</div>

	</div>
<?php } if ($SelectedModules != '' && in_array(24,@$SelectedModules)) {?>
     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/projectfixedoverview' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/project_fixed_overview.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/projectfixedoverview' ); ?>">Overzicht&nbsp;van&nbsp;Uren op Aangnomen&nbsp;Project</a>

            </div>

   		</div>

	</div>
<?php } if ($SelectedModules != '' && in_array(25,@$SelectedModules)) {?>
     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/expiredemployees' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/expired_employees.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/expiredemployees' ); ?>">Binnenkort/verlopen Id's</a>

            </div>

   		</div>

	</div>
<?php } if ($SelectedModules != '' && in_array(22,@$SelectedModules)) {?>
     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/weekcardoverviewchecked');?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/weekcard_overview_checked.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/weekcardoverviewchecked' ); ?>">Weekstaat&nbsp;Overzicht Goedgekeurd</a>

            </div>

   		</div>

	</div>
<?php } if ($SelectedModules != '' && in_array(26,@$SelectedModules)) {?>
     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/hist_employee_project' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/history_employee_project.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/hist_employee_project' ); ?>">Medewerkers per project</a>

            </div>

   		</div>

	</div>
<?php } if ($SelectedModules != '' && in_array(27,@$SelectedModules)) {?>
     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/hist_project_employee' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/shipping.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/hist_project_employee' ); ?>">Projecten per medewerker</a>

            </div>

   		</div>

	</div>

 <?php } if ($SelectedModules != '' && in_array(28,@$SelectedModules)) {?>

     <div class="col-md-2">



        <div class="block block-drop-shadow">



            <div class="user bg-default bg-light-rtl thumbs">

                <a href="<?php echo URL:: to( 'admin/report/Project_Overview_Containers' ); ?>">

                <div class="info">

                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Project_Overview_Containers.png') }}">

                </div> </a>

            </div>

            <div class="content list-group" align="center">

            <a class="list-group-item" href="<?php echo URL:: to( 'admin/report/Project_Overview_Containers' ); ?>">Projecten per materialen</a>

            </div>

   		</div>

	</div>

    <?php } ?>

  </div>



</div>

</div>

</div>

</div>









<style>

.thumbs {



	background-position:left top;

	}

.img-border { border:none;}

.thumbs a:hover {background-position:top top !important; }

</style>
