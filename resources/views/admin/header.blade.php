<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="icon" type="image/ico" href="{{ URL::asset('assets/img/favicon.ico') }}" />

    <link href="{{ URL::asset('assets/css/stylesheets.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/css/jquery-confirm.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .dataTables_processing {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 60px;
            margin-left: -50%;
            margin-top: -35px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            background: rgba(0, 0, 0, 0.3) none repeat scroll 0 0;
            width: 100%;
            color: #FFA91F !important;
        }

        .btn-secondary {
            color: #fff;
            background-color: #5b776f;
            border-color: #5b776f
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #6a857d;
            border-color: #6a857d
        }

        .btn-secondary.focus,
        .btn-secondary:focus {
            box-shadow: 0 0 0 .2rem rgba(108, 117, 125, .5)
        }

    </style>

    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/jquery/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/jquery/jquery-ui.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/jquery/jquery-migrate.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/jquery/globalize.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/cleditor/jquery.cleditor.min.js') }}"></script>


    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script type='text/javascript'
            src="{{ URL::asset('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/uniform/jquery.uniform.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}">
    </script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/select2/select2.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/tagsinput/jquery.tagsinput.min.js') }}">
    </script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/jquery/jquery-ui-timepicker-addon.js') }}">
    </script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/bootstrap/bootstrap-file-input.js') }}">
    </script>
    <script type='text/javascript'
            src="{{ URL::asset('assets/js/plugins/validationengine/languages/jquery.validationEngine-en.js') }}"></script>
    <script type='text/javascript'
            src="{{ URL::asset('assets/js/plugins/validationengine/jquery.validationEngine.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/knob/jquery.knob.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/sparkline/jquery.sparkline.min.js') }}">
    </script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/flot/jquery.flot.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/flot/jquery.flot.resize.js') }}"></script>

    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/maskedinput/jquery.maskedinput.min.js') }}">
    </script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/stepy/jquery.stepy.min.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/plugins.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/actions.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/charts.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/settings.js') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('assets/js/script.js') }}"></script>
    <script type="text/javascript">
        function loadreport() {

            alert(<?= URL::to('admin') ?> + '/report/' + total + '/weeknumber/' + $('weeknumbery').value + $('weeknumberw')
                .value);
            return false;
            document.location = <?= URL::to('admin') ?> + '/report/' + name + '/weeknumber/' + $('weeknumbery').value + $(
                'weeknumberw').value;
        }
    </script>

    <?php $Modules = DB::table('tbl_modules_rights')
        ->select('module_id')
        ->where(['user_id' => Auth::user()->id])
        ->get();
    if (!empty($Modules)) {
        foreach ($Modules as $Module) {
            @$SelectedModules[] = $Module->module_id;
        }
    }

    ?>
    {{-- $Mod->module_id --}}

    {{-- @php
$getENV = Config('app.environment');
if ($getENV == 'myLocal') {

}

@endphp --}}

    @if (Config('app.environment') === 'myLocal')
        <style media="screen">
            .wall-num7 {
                background: url('../img/wallpapers/wall_num14.jpg') center top no-repeat fixed #fffff4;
            }

        </style>
    @else

    @endif


    <style>
        .error {
            color: #af2f2f !important;
            font-weight: bold;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

    </style>
</head>

<body class="wall-num7" data-settings="open">

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <nav class="navbar brb" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-reorder"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL::to('admin/dashboard'); ?>">ECU
                        <!--<img src="img/logo.png"/>-->
                    </a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo URL::to('admin/dashboard'); ?>">
                                <span class="icon-home"></span> dashboard
                            </a>
                        </li>
                        <?php if (Auth::user()->group == 0) { ?>

                        <?php if (@$SelectedModules != '' && in_array(1, @$SelectedModules)) { ?>
                        <li>
                            <a href="<?php echo URL::to('admin/ActiveEmp'); ?>">
                                <span class="icon-pencil"></span> Personeel
                            </a>
                        </li>
                        <?php }
                        if (@$SelectedModules != '' && in_array(2, @$SelectedModules)) { ?>
                        <li>
                            <a href="<?php echo URL::to('admin/AllActiveprojects'); ?>">
                                <span class="icon-pencil"></span> Project
                            </a>
                        </li>
                        <?php }
                        if (@$SelectedModules != '' && in_array(3, @$SelectedModules)) { ?>
                        <li>
                            <a href="<?php echo URL::to('admin/weekcard'); ?>">
                                <span class="icon-pencil"></span> Weekstaat
                            </a>
                        </li>
                        <?php }
                        if (@$SelectedModules != '' && in_array(4, @$SelectedModules)) { ?>
                        <li>
                            <a href="<?php echo URL::to('admin/Week-Weekstaten'); ?>">
                                <span class="icon-pencil"></span> Week Weekstaten
                            </a>
                        </li>
                        <?php } ?>



                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="icon-pencil"></span> Modules</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">User Management<i class="icon-angle-right pull-right"></i></a>
                                    <ul class="dropdown-submenu">
                                        <?php if (@$SelectedModules != '' && in_array(29, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/users'); ?>">Gebruikers</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(34, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/version'); ?>">Version</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>




                                <li>
                                    <a href="#">Personeel Functies<i class="icon-angle-right pull-right"></i></a>
                                    <ul class="dropdown-submenu">
                                        <?php if (@$SelectedModules != '' && in_array(1, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/ActiveEmp'); ?>">Personeel</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(5, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/agencies'); ?>">Uitzendbureau</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(6, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/projectmanager'); ?>">Project Manager</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Klant Functies<i class="icon-angle-right pull-right"></i></a>
                                    <ul class="dropdown-submenu">
                                        <?php if (@$SelectedModules != '' && in_array(7, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/customers'); ?>">Klant</a></li>
                                        <?php if (@$SelectedModules != '' && in_array(8, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/departments'); ?>">Afdeling</a></li>
                                        <?php if (@$SelectedModules != '' && in_array(2, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/AllActiveprojects'); ?>">Project</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(9, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/contacts'); ?>">Contacts</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(10, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/notes'); ?>">Afspraken</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Vertrekken<i class="icon-angle-right pull-right"></i></a>
                                    <ul class="dropdown-submenu">

                                        <?php if (@$SelectedModules != '' && in_array(36, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/leavesManagement'); ?>">Vertrekken Mangement</a></li>

                                        <?php } ?>


                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Management Functies<i class="icon-angle-right pull-right"></i></a>
                                    <ul class="dropdown-submenu">
                                        <?php if (@$SelectedModules != '' && in_array(3, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/weekcard'); ?>">Weekstaat</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(4, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/Week-Weekstaten'); ?>">Week Weekstaten</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(11, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/clients'); ?>">Klanten</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(12, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/applicants'); ?>">Aanvrager</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(13, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/OrderWasteContainer'); ?>">Bestel Afvalcontainers</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(14, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/BestelformulierDiensten'); ?>">Aanvraag Personeel</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(15, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/ContainersLeverancier'); ?>">Containers Leveranciers</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(16, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/ContainerBons'); ?>">Container Bons</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(17, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/comments'); ?>">Opmerkingen</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(31, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/Keetonderhoud'); ?>">Keetonderhoud</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(32, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/Planning'); ?>">Dagelijkse Projecten</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(33, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/functie'); ?>">Functie Lijst</a></li>
                                        <?php } ?>
                                        <li><a href="<?php echo URL::to('admin/status'); ?>">Status waarden</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Rapport<i class="icon-angle-right pull-right"></i></a>
                                    <ul class="dropdown-submenu" style="width:260px;">
                                        <?php if (@$SelectedModules != '' && in_array(18, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/total'); ?>">Totalen</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(19, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/employeeoverview'); ?>">
                                                Personeel Overzicht per Project</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(20, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/employmentagencyoverview'); ?>">
                                                Uitzendbureau Overzicht</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(21, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/projectmanageroverview'); ?>">
                                                Projectmanager Overzicht per Project</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(22, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/weekcardoverviewchecked'); ?>">
                                                Weekstaat Overzicht Goedgekeurd</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(23, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/hoursoverview'); ?>">
                                                Overzicht alle Uren</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(24, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/projectfixedoverview'); ?>">
                                                Overzicht van Uren op Aangnomen Project</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(25, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/expiredemployees'); ?>">Binnenkort/verlopen Id's</a></li>
                                        <li class="divider"></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(26, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/hist_employee_project'); ?>">Medewerkers per project</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(27, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/hist_project_employee'); ?>">Projecten per medewerker</a></li>
                                        <?php }
                                        if (@$SelectedModules != '' && in_array(28, @$SelectedModules)) { ?>
                                        <li><a href="<?php echo URL::to('admin/report/Project_Overview_Containers'); ?>">Projecten per materialen</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <?php }
                        }
                        } ?>
                        <?php if (@$SelectedModules != '' && in_array(30, @$SelectedModules)) { ?>
                        <li>
                            <a href="<?php echo URL::to('admin/Berichten'); ?>">
                                <span class="icon-pencil"></span> Berichten
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (@$SelectedModules != '' && in_array(35, @$SelectedModules)) { ?>
                        <li>
                            <a href="<?php echo URL::to('admin/EMPBerichten'); ?>">
                                <span class="icon-pencil"></span> Personeel Berichten
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo URL::to('admin/logout'); ?>">
                                <span class="icon-pencil"></span> Logout
                            </a>
                        </li>
                    </ul>
                    <?php $URL =  $_SERVER['REQUEST_URI'];
                    if (strpos($URL,'admin/PlanningByDate') !== false) {
                    ?>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" id="myInput" class="form-control" placeholder="search..."/>
                        </div>
                    </form>
                    <?php
                    } else {
                      
                    }

                    ?>
                </div>
            </nav>

        </div>
    </div>
