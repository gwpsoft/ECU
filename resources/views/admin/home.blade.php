<?php $Modules = DB::table('tbl_modules_rights')->select('module_id')->where(array('user_id' => Auth::user()->id))->get();
foreach ($Modules as $Module) {

    $SelectedModules[] = $Module->module_id;
}

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function PersonalRequest() {
        $.ajax({
            type: 'GET',
            url: '/admin/getPersonalRequests',
            //    data:'_token = <?php echo csrf_token() ?>',
            success: function(data) {
                $("#PersonalRequests").html(data);
                // alert(data);
                //console.log(data);
            }
        });
    }
    function ContainerRequest() {
        $.ajax({
            type: 'GET',
            url: '/admin/getContainerRequest',
            //    data:'_token = <?php echo csrf_token() ?>',
            success: function(data) {
                $("#ContainerRequest").html(data);
                // alert(data);
                //console.log(data);
            }
        });
    }
    function Messages() {
        $.ajax({
            type: 'GET',
            url: '/admin/getMessages',
            //    data:'_token = <?php echo csrf_token() ?>',
            success: function(data) {
                $("#Messages").html(data);
                // alert(data);
                //    console.log(data);
            }
        });
    }
    PersonalRequest();
    ContainerRequest();
    Messages();
    setInterval(function() {
        PersonalRequest();
        ContainerRequest();
        Messages();
    }, 3000);
</script>
<div class="row">


    <div class="col-md-6">



        <div class="block">



            <div class="header">
                <h2>Personeel Functies</h2>
            </div>

            <div class="content controls">
                <?php if ($SelectedModules != '' && in_array(1, @$SelectedModules)) { ?>

                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/ActiveEmp'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/employees.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/ActiveEmp'); ?>">Personeel</a>

                        </div>

                    </div>

                </div>

                <?php }
                if ($SelectedModules != '' && in_array(5, @$SelectedModules)) { ?>

                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/agencies'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Agency.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/agencies'); ?>">Uitzendbureau</a>

                        </div>

                    </div>

                </div>

                <?php }
                if ($SelectedModules != '' && in_array(6, @$SelectedModules)) { ?>

                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/projectmanager'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Project Manager.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/projectmanager'); ?>">Project Manager</a>

                        </div>

                    </div>

                </div>
                <?php } ?>
            </div>

        </div>



        <div class="block">



            <div class="header">



                <h2>Klant Functies</h2>



            </div>

            <div class="content controls">
                <?php if ($SelectedModules != '' && in_array(7, @$SelectedModules)) { ?>
                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/customers'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Customers.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/customers'); ?>">Klant</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(8, @$SelectedModules)) { ?>


                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/departments'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Department.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/departments'); ?>">Afdeling</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(2, @$SelectedModules)) { ?>
                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/AllActiveprojects'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Project.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/AllActiveprojects'); ?>">Project</a>

                        </div>

                    </div>

                </div>

                <?php } ?>
            </div>

            <div class="content controls">
                <?php if ($SelectedModules != '' && in_array(9, @$SelectedModules)) { ?>
                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/contacts'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Contacts.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/contacts'); ?>">Contacten</a>

                        </div>

                    </div>

                </div>

                <?php }
                if ($SelectedModules != '' && in_array(10, @$SelectedModules)) { ?>

                <div class="col-md-4">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/notes'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Notes.png') }}">

                                </div>
                            </a>

                        </div>



                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/notes'); ?>">Afspraken</a>

                        </div>

                    </div>

                </div>

                <?php }
                if ($SelectedModules != '' && in_array(11, @$SelectedModules)) { ?>

                <div class="col-md-4">


                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/clients'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Clients.png') }}">

                                </div>
                            </a>

                        </div>



                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/clients'); ?>">Online Gebruikers</a>









                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="block block-drop-shadow">

                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/Planning'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/daily-project.png') }}">

                                </div>

                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/Planning'); ?>">Dagelijkse Projecten</a>

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



                <div class="header">



                    <h2>Management Functies</h2>



                </div>

                <div class="content controls">
                    <style>
                        /* .card-header {
                            display: flex;
                            align-items: center;
                            border-bottom-width: 1px;
                            padding-top: 0;
                            padding-bottom: 0;
                            padding-right: 0.625rem;
                            height: 3.5rem;
                            background-color: #fff
                        } */
                        /* @import url(https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css); */
                        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css);

                        .widget-subheading {
                            color: #858a8e;
                            font-size: 10px
                        }

                        .card-header.card-header-tab .card-header-title {
                            display: flex;
                            align-items: center;
                            white-space: nowrap
                        }

                        .card-header .header-icon {
                            font-size: 1.65rem;
                            margin-right: 0.625rem
                        }

                        .card-header.card-header-tab .card-header-title {
                            display: flex;
                            align-items: center;
                            white-space: nowrap
                        }

                        .btn-actions-pane-right {
                            margin-left: auto;
                            white-space: nowrap
                        }

                        .text-capitalize {
                            text-transform: capitalize !important
                        }

                        .scroll-area-sm {
                            height: 288px;
                            overflow-x: hidden
                        }

                        .list-group-item {
                            position: relative;
                            display: block;
                            padding: 0.75rem 1.25rem;
                            margin-bottom: -1px;
                            background-color: #fff;
                            border: 1px solid rgba(0, 0, 0, 0.125)
                        }

                        .list-group {
                            display: flex;
                            flex-direction: column;
                            padding-left: 0;
                            margin-bottom: 0
                        }

                        .todo-indicator {
                            position: absolute;
                            width: 4px;
                            height: 60%;
                            border-radius: 0.3rem;
                            left: 0.625rem;
                            top: 20%;
                            opacity: .6;
                            transition: opacity .2s;
                            /* margin-right: 50px; */
                        }

                        .bg-warning {
                            background-color: #f7b924 !important
                        }

                        .bg-danger {
                            background-color: #dc3545 !important
                        }

                        .bg-success {
                            background-color: #3ac47d !important
                        }

                        .bg-primary {
                            background-color: #007bff !important
                        }

                        .widget-content {
                            padding: 1rem;
                            flex-direction: row;
                            align-items: center
                        }

                        .widget-content .widget-content-wrapper {
                            display: flex;
                            flex: 1;
                            position: relative;
                            align-items: center
                        }

                        .widget-content .widget-content-right.widget-content-actions {
                            visibility: hidden;
                            opacity: 0;
                            transition: opacity .2s
                        }

                        .widget-content .widget-content-right {
                            margin-left: auto
                        }

                        .btn:not(:disabled):not(.disabled) {
                            cursor: pointer
                        }

                        .btn {
                            position: relative;
                            transition: color 0.15s, background-color 0.15s, border-color 0.15s, box-shadow 0.15s
                        }

                        .btn-outline-success {
                            color: #3ac47d;
                            border-color: #3ac47d
                        }

                        .btn-outline-success:hover {
                            color: #fff;
                            background-color: #3ac47d;
                            border-color: #3ac47d
                        }

                        .btn-outline-success:hover {
                            color: #fff;
                            background-color: #3ac47d;
                            border-color: #3ac47d
                        }

                        .btn-primary {
                            color: #fff;
                            background-color: #3f6ad8;
                            border-color: #3f6ad8
                        }

                        .btn {
                            position: relative;
                            transition: color 0.15s, background-color 0.15s, border-color 0.15s, box-shadow 0.15s;
                            outline: none !important
                        }

                        .badge-danger {
                            color: #fff;
                            background-color: #dc3545
                        }

                        .badge-success {
                            color: #fff;
                            background-color: #28a745
                        }

                        .badge-primary {
                            color: #fff;
                            background-color: #007bff
                        }

                        .badge-warning {
                            color: #212529;
                            background-color: #ffc107
                        }

                        .badge-info {
                            color: #fff;
                            background-color: #17a2b8
                        }

                        .bg-info {
                            background-color: #17a2b8 !important
                        }

                        /* .card-footer {
                            background-color: #fff
                        } */
                    </style>
                    <div class="row d-flex justify-content-center container">

                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li><a class="nav-link active" data-toggle="tab" href="#tab-3">
                                        <!-- <i class="fa fa-laptop"></i> -->Aanvraag Personeel
                                    </a></li>
                                <li><a class="nav-link" data-toggle="tab" href="#tab-4">Bestel Afvalcontainers</a></li>
                                <li><a class="nav-link " data-toggle="tab" href="#tab-5">Berichten</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-3" class="tab-pane active">
                                    <div class="panel-body">
                                        <center><b>Aanvraag Personeel</b></center>

                                        <div class="card-hover-shadow-2x mt-4 mb-3 card" style="margin-top: 20px;">

                                            <div class="scroll-area-sm">
                                                <perfect-scrollbar class="ps-show-limits">
                                                    <div style="position: static;" class="ps ps--active-y">
                                                        <div class="ps-content">
                                                            <ul class=" list-group list-group-flush" id="PersonalRequests">



                                                            </ul>
                                                        </div>
                                                    </div>
                                                </perfect-scrollbar>
                                            </div>
                                            <!-- <div class="d-block text-right card-footer"><button class="mr-2 btn btn-link btn-sm">Cancel</button><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Task</button></div> -->
                                        </div>
                                    </div>
                                </div>

                                <div id="tab-4" class="tab-pane">
                                    <div class="panel-body">
                                        <center><b>Bestel Afvalcontainers</b></center>
                                        <div class="card-hover-shadow-2x mb-3 card" style="margin-top: 20px;">

                                            <div class="scroll-area-sm">
                                                <perfect-scrollbar class="ps-show-limits">
                                                    <div style="position: static;" class="ps ps--active-y">
                                                        <div class="ps-content">
                                                            <ul class=" list-group list-group-flush" id="ContainerRequest">


                                                            </ul>
                                                        </div>
                                                    </div>
                                                </perfect-scrollbar>
                                            </div>
                                            <!-- <div class="d-block text-right card-footer"><button class="mr-2 btn btn-link btn-sm">Cancel</button><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Task</button></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-5" class="tab-pane ">
                                    <div class="panel-body">
                                        <center><b>Berichten</b></center>
                                        <div class="card-hover-shadow-2x mb-3 card" style="margin-top: 20px;">

                                            <div class="scroll-area-sm">
                                                <perfect-scrollbar class="ps-show-limits">
                                                    <div style="position: static;" class="ps ps--active-y">
                                                        <div class="ps-content">
                                                            <ul class=" list-group list-group-flush" id="Messages">




                                                            </ul>
                                                        </div>
                                                    </div>
                                                </perfect-scrollbar>
                                            </div>
                                            <!-- <div class="d-block text-right card-footer"><button class="mr-2 btn btn-link btn-sm">Cancel</button><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Task</button></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>



    </div>
    <div class="col-md-6">

        <div class="row">

            <div class="block">



                <div class="header">



                    <h2>Management Functies</h2>



                </div>

                <div class="content controls">
                    <?php if ($SelectedModules != '' && in_array(3, @$SelectedModules)) { ?>
                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/weekcard'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/weekstats.png') }}">

                                    </div>
                                </a>

                            </div>



                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/weekcard'); ?>">Weekstaten</a>

                            </div>

                        </div>

                    </div>
                    <?php }
                    if ($SelectedModules != '' && in_array(4, @$SelectedModules)) { ?>
                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/Week-Weekstaten'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Week_wise_projects.png') }}">

                                    </div>
                                </a>

                            </div>



                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/Week-Weekstaten'); ?>">Week Weekstaten</a>

                            </div>

                        </div>

                    </div>
                    <?php }
                    if ($SelectedModules != '' && in_array(12, @$SelectedModules)) { ?>
                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/applicants'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Applicant.png') }}">

                                    </div>
                                </a>

                            </div>

                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/applicants'); ?>">Aanvrager</a>

                            </div>

                        </div>

                    </div>
                    <?php }
                    if ($SelectedModules != '' && in_array(13, @$SelectedModules)) { ?>


                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/OrderWasteContainer'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/OrderContainer.png') }}">

                                    </div>
                                </a>

                            </div>

                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/OrderWasteContainer'); ?>">Bestel Afvalcontainers</a>

                            </div>

                        </div>

                    </div>
                    <?php }
                    if ($SelectedModules != '' && in_array(15, @$SelectedModules)) { ?>


                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/ContainersLeverancier'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/shipping.png') }}">

                                    </div>
                                </a>

                            </div>

                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/ContainersLeverancier'); ?>">Containers Leveranciers</a>

                            </div>

                        </div>

                    </div>

                    <?php } ?>

                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/MarketRate'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/market.png') }}">

                                    </div>
                                </a>

                            </div>

                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/MarketRate'); ?>">Marktrente</a>

                            </div>

                        </div>

                    </div>

                    <?php if ($SelectedModules != '' && in_array(17, @$SelectedModules)) { ?>
                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/comments'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/comments.png') }}">

                                    </div>
                                </a>

                            </div>

                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/comments'); ?>">Opmerkingen</a>

                            </div>

                        </div>

                    </div>
                    <?php }
                    if ($SelectedModules != '' && in_array(14, @$SelectedModules)) { ?>
                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/BestelformulierDiensten'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Personeels_Aanvragen.png') }}">

                                    </div>
                                </a>

                            </div>

                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/BestelformulierDiensten'); ?>">Aanvraag Personeel</a>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-4">



                        <div class="block block-drop-shadow">



                            <div class="user bg-default bg-light-rtl thumbs">

                                <a href="<?php echo URL::to('admin/article-list'); ?>">

                                    <div class="info">

                                        <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Contacts.png') }}">

                                    </div>
                                </a>

                            </div>

                            <div class="content list-group" align="center">

                                <a class="list-group-item" href="<?php echo URL::to('admin/article-list'); ?>">Artikelenlijst</a>

                            </div>

                        </div>

                    </div>
                    <?php } ?>
                </div>

            </div>

        </div>

    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->








<div class="col-md-12">





    <div class="row">

        <div class="block">



            <div class="header">

                <h2>Rapport</h2>

            </div>

            <div class="content controls">


                <?php if ($SelectedModules != '' && in_array(18, @$SelectedModules)) { ?>
                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/total'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Report_Total.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/total'); ?>">Totalen</a>

                        </div>

                    </div>

                </div>

                <?php }
                if ($SelectedModules != '' && in_array(19, @$SelectedModules)) { ?>

                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/employeeoverview'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/employee_overview.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/employeeoverview'); ?>">Personeel Overzicht per Project</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(20, @$SelectedModules)) { ?>


                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/employmentagencyoverview'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/employment_agency_overview.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/employmentagencyoverview'); ?>">Uitzendbureau Overzicht</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(21, @$SelectedModules)) { ?>


                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/projectmanageroverview'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/project_manager_overview.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/projectmanageroverview'); ?>">Projectmanager Overzicht per Project</a>

                        </div>

                    </div>

                </div>

                <?php }
                if ($SelectedModules != '' && in_array(23, @$SelectedModules)) { ?>



                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/hoursoverview'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/hours_overview.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/hoursoverview'); ?>">Overzicht alle Uren</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(24, @$SelectedModules)) { ?>
                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/projectfixedoverview'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/project_fixed_overview.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/projectfixedoverview'); ?>">Overzicht&nbsp;van&nbsp;Uren op Aangnomen&nbsp;Project</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(25, @$SelectedModules)) { ?>
                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/expiredemployees'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/expired_employees.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/expiredemployees'); ?>">Binnenkort/verlopen Id's</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(22, @$SelectedModules)) { ?>
                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/weekcardoverviewchecked'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/weekcard_overview_checked.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/weekcardoverviewchecked'); ?>">Weekstaat&nbsp;Overzicht Goedgekeurd</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(26, @$SelectedModules)) { ?>
                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/hist_employee_project'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/history_employee_project.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/hist_employee_project'); ?>">Medewerkers per project</a>

                        </div>

                    </div>

                </div>
                <?php }
                if ($SelectedModules != '' && in_array(27, @$SelectedModules)) { ?>
                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/hist_project_employee'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/shipping.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/hist_project_employee'); ?>">Projecten per medewerker</a>

                        </div>

                    </div>

                </div>

                <?php }
                if ($SelectedModules != '' && in_array(28, @$SelectedModules)) { ?>

                <div class="col-md-2">



                    <div class="block block-drop-shadow">



                        <div class="user bg-default bg-light-rtl thumbs">

                            <a href="<?php echo URL::to('admin/report/Project_Overview_Containers'); ?>">

                                <div class="info">

                                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/Project_Overview_Containers.png') }}">

                                </div>
                            </a>

                        </div>

                        <div class="content list-group" align="center">

                            <a class="list-group-item" href="<?php echo URL::to('admin/report/Project_Overview_Containers'); ?>">Projecten per materialen</a>

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



        background-position: left top;

    }

    .img-border {
        border: none;
    }

    .thumbs a:hover {
        background-position: top top !important;
    }
</style>
