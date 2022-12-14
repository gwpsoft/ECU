<!-- Header -->
@include('admin/header')
<style>
    .dataTables_length {
        width: 170px !important;
    }

    .dataTables_length select {
        width: 70px !important;
    }
    .disabledbtn{
        pointer-events: none;
        opacity: 0.5;
    }
</style>

<title>Lijst met verlofaanvragen</title>
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="<?php echo URL::to('admin/dashboard'); ?>">huis</a></li>
            <li class="active">Lijst met verlofaanvragen</li>
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
        @if (Session::has('errormessage'))
            <div class="alert alert-danger">
                <b>Fail!</b> {{Session::get('errormessage')}}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif


        <div class="block">
            <div class="header">
                <h2>Lijst met verlofaanvragen</h2>
                <div style="float:right">
                <!-- <a href=" <?php echo URL::to('admin/new_OrderServices'); ?> " class="btn btn-success">Nieuw Personeel's Aanvraag </a>-->
                </div>
            </div>
            <div class="content">

                <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="orders">
                    <thead>
                    <tr>
                        <th width="6%">ID</th>
                        <th width="10%">Verzoek door</th>

                        <th width="17%">Van datum</th>
                        <th width="12%">Tot datum</th>
                        <th width="12%">Totale dag</th>
                        <th width="12%">Vertrekken type</th>
                        <th width="8%">Toestand</th>

                        <th width="20%">Opties</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    (function($) {
        // your normal jQuery code goes here.
        $(document).ready(function() {
            /* Do stuff */

            oTable = $('#orders').DataTable({

                "processing": true,

                "serverSide": true,

                "ajax": "{{ route('datatable.getAllLeaves') }}",
                "order": [
                    [0, "desc"]
                ],
                "columns": [{
                    data: 'ID',
                    name: 'ID'
                },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'StartDate',
                        name: 'StartDate'
                    },
                    {
                        data: 'EndDate',
                        name: 'EndDate'
                    },
                    {
                        data: 'DAYS',
                        name: 'DAYS'
                    },
                    {
                        data: 'TYPE',
                        name: 'TYPE'
                    },
                    {
                        data: 'Status',
                        name: 'Status'
                    },


                    {
                        data: 'Opties',
                        name: 'Opties',
                        searchable: false,
                        orderable: false
                    }

                ]

            });

        });
    })(jQuery);
</script>

@include('admin/footer')</div>
